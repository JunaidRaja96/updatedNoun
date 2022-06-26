<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogCategory;
use Illuminate\Http\Request;

class BlogCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = BlogCategory::all();
        return view('admin.blogCategories.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.blogCategories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'category' => 'required|unique:blog_categories,name|min:3|max:20',
        ]);

        BlogCategory::create(['name' =>$request->category]);
        return redirect()->route('admin.categories.index')->with('sweetalert',[
            'title' => 'Category created successfully',
            'desc' => '',
            'type' => 'success'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BlogCategory  $blogCategory
     * @return \Illuminate\Http\Response
     */
    public function show(BlogCategory $blogCategory)
    {
        return 'Blog Categories Show';
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BlogCategory  $blogCategory
     * @return \Illuminate\Http\Response
     */
    public function edit($category)
    {
        $data = BlogCategory::findOrFail($category);
        return view('admin.blogCategories.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BlogCategory  $blogCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $category)
    {
        BlogCategory::findOrFail($category)->update(['name' => $request->category]);
        return redirect()->route('admin.categories.index')->with('sweetalert',[
            'title' => 'Category updated successfully',
            'type' => 'success'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BlogCategory  $blogCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy($category)
    {
        BlogCategory::findOrFail($category)->delete();
        return redirect()->route('admin.categories.index')->with('sweetalert',[
            'title' => 'Category deleted successfully',
            'type' => 'success'
        ]);
    }
}
