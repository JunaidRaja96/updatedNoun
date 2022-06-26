<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Blog,User,BlogCategory};


class BlogController extends Controller
{
    public function list(Request $request)
    {


        $records = Blog::query();
        if (isset($request->search)) {
            $records = $records->where('title','LIKE', '%' . $request->search . '%');
        }
        if (isset($request->course)) {
            $records = $records->where('category_id', $request->category);
        }
        $records = $records->get();

        $category = new BlogCategory();
        $categories = $category->get();

        return view('web.blog',compact(['records','categories']));

    }
    public function single($slug)
    {
        $blog = new Blog();

        $record = $blog->where('slug',$slug)->first();

        abort_if(!isset($record),404);

        return view('web.single-blog',compact('record'));
    }

}
