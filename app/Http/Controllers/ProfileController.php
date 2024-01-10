<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Tags;
use App\Models\User;
use App\Models\Category;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\ProfileUpdateRequest;

class ProfileController extends Controller
{
    public function index(Request $request): View
    {
        $tbl_category = Category::paginate(5);
        $tbl_tags = Tags::paginate(5);

        if ($request->ajax()) {
            if ($request->has('section') && $request->section == 'category') {
                return view('user.components.category-pagination', ['tbl_category' => $tbl_category]);
            } elseif ($request->has('section') && $request->section == 'tags') {
                return view('user.components.tags-pagination', ['tbl_tags' => $tbl_tags]);
            }
        }

        $user = User::where('users.id', '=', Auth::id());
        return view('user.profile.view', compact('tbl_category', 'tbl_tags'), [
            'user' => $request->user(),
        ]);
    }

    public function show($id)
    {
        $user = User::findOrFail($id);

        $tbl_blog = Blog::withoutTrashed()
            ->join('users', 'tbl_blog.user_id', '=', 'users.id')
            ->select('tbl_blog.*', 'users.name as user_name', 'users.user_image', 'users.id as user_id')
            ->where('tbl_blog.user_id', $id)
            ->get();


        return view('user.profile.view-other', compact('user', 'tbl_blog'));
    }

    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('user.profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /** 
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $user = $request->user(); // Get the authenticated user directly from the request

        $user->fill($request->validated()); // Fill user attributes from validated request data

        if ($request->hasFile('user_image')) {
            $destination = 'uploads/' . $user->user_image;

            // Delete existing image
            if (File::exists($destination)) {
                File::delete($destination);
            }

            // Upload new image
            $file = $request->file('user_image');
            $filename = $file->getClientOriginalName();
            $file->move('uploads/', $filename);
            $user->user_image = $filename;
        }

        $user->update(); // Save the updated user model to the database
        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return Redirect::to('/');
    }
}
