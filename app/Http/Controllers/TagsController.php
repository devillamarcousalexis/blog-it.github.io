<?php

namespace App\Http\Controllers;

use App\Models\Tags;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TagsController extends Controller
{
    public function index()
    {
        $tbl_tags = Tags::get();
        $users = User::get();
        return view('user.tags.view-tags', compact('tbl_tags', 'users'));
    }

    public function create()
    {
        $tbl_tags = Tags::get();
        return view('user.tags.add-tags', compact('tbl_tags'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'tags_name' => 'required|string'
        ]);

        $tbl_tags = new Tags;
        $tbl_tags->tags_name = $request->tags_name;
        $tbl_tags->save();
        return redirect()->back()->with('message', "A new tags has been posted!");
    }

    public function edit($id)
    {
        $tbl_tags = Tags::findOrFail($id);
        return view('user.tags.edit-tags', compact('tbl_tags'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'tags_name' => 'required|string'
        ]);

        $tbl_tags = Tags::findOrFail($id);
        $tbl_tags->update([
            'tags_name' => $request->tags_name
        ]);

        return redirect()->back()->with('message', "A tags has been updated!");
    }

    public function destroy($id)
    {
        $tbl_tags = Tags::find($id)->delete();
        return redirect()->back()->with('message', "A tags has been deleted!");
    }
}