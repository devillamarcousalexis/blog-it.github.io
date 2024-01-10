<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function index()
    {
        $tbl_category = Category::get();
        $users = User::get();
        return view('user.category.view-category', compact('tbl_category', 'users'));
    }

    public function create()
    {
        $tbl_category = Category::get();
        return view('user.category.add-category', compact('tbl_category'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_name' => 'required|string'
        ]);

        $tbl_category = new Category;
        $tbl_category->category_name = $request->category_name;
        $tbl_category->save();
        return redirect()->back()->with('message', "A new category has been posted!");
    }

    public function edit($id)
    {
        $tbl_category = Category::findOrFail($id);
        return view('user.category.edit-category', compact('tbl_category'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'category_name' => 'required|string'
        ]);

        $tbl_category = Category::findOrFail($id);
        $tbl_category->update([
            'category_name' => $request->category_name
        ]);

        return redirect()->back()->with('message', "A category has been updated!");
    }

    public function destroy($id)
    {
        $tbl_category = Category::find($id)->delete();
        return redirect()->back()->with('message', "A category has been deleted!");
    }
}
