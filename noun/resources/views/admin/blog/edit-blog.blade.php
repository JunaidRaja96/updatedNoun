@extends('layout.layout')
@section('style')
<link href="//cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <script src="//cdn.quilljs.com/1.3.6/quill.js"></script>
    <style>

        #editor-container {
            height: 375px;
          }
    </style>
@endsection
@section('scripts')
<script>

    var quill = new Quill('#editor-container', {

modules: {
toolbar: [
  [{ header: [1, 2, false] }],
  ['bold', 'italic', 'underline'],
  ['image', 'code-block']
]
},
placeholder: 'Compose an epic...',
theme: 'snow'  // or 'bubble'
});
</script>

@endsection

@section('content')

<x-header>
    <x-header.heading>
        Edit Blog
    </x-header.heading>
</x-header>
<div class="card shadow mb-4">

    <div class="card-body">
        <form method="POST" action="{{ route('admin.blogs.update',$blog->id) }}" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="mb-3"><label>Blog Title</label>
                <input class="form-control" name="title" value="{{$blog->title}}" type="text">
                @error('title')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3"><label>Blog Category</label>
                <select name="category_id" class="form-control">
                        <option value="" selected >Select Category</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{$category->id== $blog->category_id ? 'selected':''}}>{{ $category->name }}</option>
                    @endforeach
                </select>
                @error('category_id')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3"><label>Blog Thumbnail</label>
                <input class="form-control-file" name="image" type="file">
            </div>
            <div class="mb-3">
                <img src="{{asset($blog->image)}}" alt="not given" height="200px" width="300px">
                {{-- <span class=" text-lg">Image Name: {{$blog->image ?? "not given"}}</span> --}}
            </div>
            <div class="mb-3"><label for="exampleFormControlTextarea1">Blog Description</label><textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description">{{$blog->description}}</textarea></div>
            @error('description')
            <p class="text-danger">{{ $message }}</p>
            @enderror
            <div class="mb-3">
                <label for="exampleFormControlblog">Blog</label>
                <input id="blog-content" type="hidden" name="content"/>
                <div id="editor-container">
                    {!! $blog->content !!}
                </div>
                @error('content')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <input type="submit" id="addblog" class=" m-0 btn btn-primary" style="float:right" value="Update Blog">
                <script>
                    document.getElementById('addblog').addEventListener('click',function(e){
                        document.getElementById('blog-content').value = document.getElementById('editor-container').querySelector('.ql-editor').innerHTML;
                    });
                </script>
            </div>
        </form>
    </div>
</div>
@endsection
