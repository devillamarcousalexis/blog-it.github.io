<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Tags;
use App\Models\User;
use App\Models\Comment;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\PublishedTags;
use App\Models\PublishedCategory;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    public function index(Request $request)
    {

        $search_param = $request->query('q');

        if ($search_param) {
            $searched = Blog::search($search_param)->get();
        } else {
            $searched = Blog::join('users', 'tbl_blog.user_id', '=', 'users.id')
                ->select('tbl_blog.*', 'users.name', 'users.user_image')
                ->get();
        }

        $tbl_blog = Blog::withoutTrashed()
            ->leftJoin('tbl_published_category', 'tbl_blog.blog_id', '=', 'tbl_published_category.blog_id')
            ->leftJoin('tbl_category', 'tbl_published_category.category_id', '=', 'tbl_category.category_id')
            ->leftJoin('tbl_published_tags', 'tbl_blog.blog_id', '=', 'tbl_published_tags.blog_id')
            ->leftJoin('tbl_tags', 'tbl_published_tags.tags_id', '=', 'tbl_tags.tags_id')
            ->leftJoin('tbl_comment', 'tbl_blog.blog_id', '=', 'tbl_comment.blog_id')
            ->leftJoin('users', 'tbl_blog.user_id', '=', 'users.id')
            ->select('tbl_blog.*', 'users.name', 'tbl_tags.tags_name', 'tbl_category.category_name', 'tbl_comment.comment_content')
            ->where('tbl_blog.blog_title', '!=', null)
            ->with('comments')
            ->get();
        // Group the results by blog_id and include categories and tags in nested arrays
        $groupedBlogs = [];
        foreach ($tbl_blog as $data) {
            $blogId = $data->blog_id;

            if (!isset($groupedBlogs[$blogId])) {
                $groupedBlogs[$blogId] = (object)[
                    'blog_id' => $data->blog_id,
                    'blog_title' => $data->blog_title,
                    'blog_content' => $data->blog_content,
                    'created_at' => $data->created_at,
                    'categories' => [],
                    'tags' => [],
                ];
            }
            if ($data->category_name && !in_array($data->category_name, $groupedBlogs[$blogId]->categories)) {
                $groupedBlogs[$blogId]->categories[] = $data->category_name;
            }


            if ($data->tags_name && !in_array($data->tags_name, $groupedBlogs[$blogId]->tags)) {
                $groupedBlogs[$blogId]->tags[] = $data->tags_name;
            }
        }

        // Convert the grouped blogs array back to a simple array
        $tbl_blog = array_values($groupedBlogs);

        $users = User::get();

        // Convert the result to a collection of Eloquent models
        $tbl_blog = collect($tbl_blog);

        // Fetch comments for each blog post with user names
        $tbl_blog->each(function ($blog) {
            $blog->comments = Comment::where('blog_id', $blog->blog_id)
                ->with('user') // Load the user relationship
                ->get()
                ->map(function ($comment) {
                    return [
                        'content' => $comment->comment_content,
                        'user_name' => optional($comment->user)->name, // Get the user name
                    ];
                })
                ->toArray();
        });
        $blog = Blog::where('tbl_blog.user_id', '=', Auth::id())
            ->get();
        return view('user.blog.view-blog', compact('tbl_blog', 'blog', 'users',  'searched', 'search_param'));
    }

    public function show($id)
    {
        $tbl_blog = Blog::withoutTrashed()
            ->leftJoin('tbl_published_category', 'tbl_blog.blog_id', '=', 'tbl_published_category.blog_id')
            ->leftJoin('tbl_category', 'tbl_published_category.category_id', '=', 'tbl_category.category_id')
            ->leftJoin('tbl_published_tags', 'tbl_blog.blog_id', '=', 'tbl_published_tags.blog_id')
            ->leftJoin('tbl_tags', 'tbl_published_tags.tags_id', '=', 'tbl_tags.tags_id')
            ->leftJoin('tbl_comment', 'tbl_blog.blog_id', '=', 'tbl_comment.blog_id')
            ->leftJoin('users', 'tbl_comment.user_id', '=', 'users.id')
            ->select(
                'tbl_blog.*',
                'tbl_tags.tags_name',
                'tbl_category.category_name',
                'tbl_comment.comment_content',
                'users.user_image',
                'users.name as user_name' // Alias for the user's name
            )
            ->with(['comments.user'])
            ->where('tbl_blog.blog_id', $id)
            ->get();

        $tbl_comment = Comment::withoutTrashed()
            ->leftJoin('users', 'tbl_comment.user_id', '=', 'users.id')
            ->select('tbl_comment.*', 'users.name as user_name')
            ->where('tbl_comment.blog_id', $id)
            ->get();
        // Group the results by blog_id and include categories and tags in nested arrays
        $groupedBlogs = [];
        foreach ($tbl_blog as $data) {
            $blogId = $data->blog_id;

            if (!isset($groupedBlogs[$blogId])) {
                $groupedBlogs[$blogId] = (object)[
                    'blog_id' => $data->blog_id,
                    'blog_title' => $data->blog_title,
                    'blog_content' => $data->blog_content,
                    'created_at' => $data->created_at,
                    'categories' => [],
                    'tags' => [],
                ];
            }

            if ($data->category_name && !in_array($data->category_name, $groupedBlogs[$blogId]->categories)) {
                $groupedBlogs[$blogId]->categories[] = $data->category_name;
            }

            if ($data->tags_name && !in_array($data->tags_name, $groupedBlogs[$blogId]->tags)) {
                $groupedBlogs[$blogId]->tags[] = $data->tags_name;
            }

            // Add comments to the grouped blog
            $groupedBlogs[$blogId]->comments = $data->comments->map(function ($comment) {
                return [
                    'content' => $comment->comment_content,
                    'user_name' => optional($comment->user)->name,
                ];
            });
        }

        // Convert the grouped blogs array back to a simple array
        $tbl_blog = array_values($groupedBlogs);

        $user_data = Blog::join('users', 'tbl_blog.user_id', '=', 'users.id')
            ->select('tbl_blog.*', 'users.name', 'users.user_image')
            ->where('tbl_blog.blog_id', $id)
            ->get();
        return view('user.blog.show-blog', compact('tbl_blog', 'tbl_comment', 'user_data'));
    }

    public function create()
    {
        $tbl_blog = Blog::get();
        $tbl_category = Category::get();
        $tbl_tags = Tags::get();
        return view('user.blog.add-blog', compact('tbl_blog', 'tbl_category', 'tbl_tags'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'blog_title' => 'required|string',
            'blog_content' => 'required|string',
            'category_id' => 'required|array',
            'tags_id' => 'required|array',
        ]);

        $tbl_blog = new Blog;
        $tbl_blog->blog_title = $request->blog_title;
        $tbl_blog->blog_content = $request->blog_content;
        $tbl_blog->user_image = Auth::user()->user_image;
        $tbl_blog->user_name = Auth::user()->name;
        $tbl_blog->user_id = Auth::id();
        $tbl_blog->save();

        foreach ($request->category_id as $categoryId) {
            $publishedCategory = new PublishedCategory;
            $publishedCategory->blog_id = $tbl_blog->blog_id; // Assuming 'id' is the primary key of the Blog model
            $publishedCategory->category_id = $categoryId;
            $publishedCategory->save();
        }

        foreach ($request->tags_id as $tagsId) {
            $PublishedTags = new PublishedTags();
            $PublishedTags->blog_id = $tbl_blog->blog_id; // Assuming 'id' is the primary key of the Blog model
            $PublishedTags->tags_id = $tagsId;
            $PublishedTags->save();
        }

        return redirect()->back()->with('message', "A new blog has been posted!");
    }

    public function edit($id)
    {
        $tbl_blog = Blog::findOrFail($id);
        return view('user.blog.edit-blog', compact('tbl_blog'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'blog_title' => 'required|string',
            'blog_content' => 'required|string',
        ]);

        $tbl_blog = Blog::findOrFail($id);
        $tbl_blog->update([
            'blog_title' => $request->blog_title,
            'blog_content' => $request->blog_content
        ]);

        return redirect()->back()->with('message', "A blog has been updated!");
    }

    public function destroy($id)
    {
        $tbl_blog = Blog::find($id)->delete();
        return redirect()->back()->with('message', "A blog has been deleted!");
    }
}
