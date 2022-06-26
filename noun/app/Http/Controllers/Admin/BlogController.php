<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\BlogCategory;
use Illuminate\Support\Str;
use App\Http\Requests\BlogRequest;


class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blog = Blog::Latest()->get();
        return view('admin.blog.index', compact('blog'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = BlogCategory::all();
        return view('admin.blog.create-blog',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BlogRequest $request)
    {

        $validatedData = $request->validated();

        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('images/blog'), $imageName);

        Blog::create(
            [
            'category_id' => $request->category_id,
            'title' => $request->title,
            'slug' => Str::slug($request->title, '-'),
            'description' => $request->description,
            'image' => $imageName,
            'content' => $request->content],
        );
        return redirect()->route('admin.blogs.index')->with('sweetalert',[
            'title' => 'Blog created successfully',
            'desc' => '',
            'type' => 'success'
        ]);
    }

    // ['departure' => 'Oakland', 'destination' => 'San Diego'],
    // ['price' => 99]

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = BlogCategory::all();
        $blog = Blog::findOrFail($id);
        return view('admin.blog.edit-blog',compact(['categories','blog']));


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BlogRequest $request, $id)
    {
        $validatedData = $request->validated();


        $blog = new Blog();
        $record = $blog->find($id);

        if(isset($request->image))
        {
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images/blog'), $imageName);
            $record->image = $imageName;
        }

        $record->title = $request->title ?? $record->title;
        $record->category_id = $request->category_id ?? $record->category_id;
        $record->description = $request->description ?? $record->description;
        $record->slug =  Str::slug($request->title, '-') ?? $record->slug;
        $record->content = $request->content ?? $record->content;
        $record->save();
        return redirect()->route('admin.blogs.index')->with('sweetalert',[
            'title' => 'Blog Updated successfully',
            'desc' => '',
            'type' => 'success'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $blog = new Blog();
        $record = $blog->find($id);
        $record->delete();
        return redirect()->route('admin.blogs.index')->with('sweetalert',[
            'title' => 'Blog Deleted successfully',
            'desc' => '',
            'type' => 'success'
        ]);
    }
}
