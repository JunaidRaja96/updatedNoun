@extends('layout.layout')
@section('content')

<x-header>
<x-header.heading>
    Blogs
</x-header.heading>
<div>
    <a class="btn btn-primary ml-2" href="{{route('admin.blogs.create')}}" >Add Blogs</a>
</div>
</x-header>
<div class="row">
    @foreach ($blog as $row)
    <div class="col-12 col-sm-6 col-md-4 mb-4">
        <!-- Blog post-->
        <div class="card h-100">
            @if (isset($row->image))
                <img class="card-img-top" src="{{ asset($row->image) }}" alt="blog-image" />
            @else
                <img class="card-img-top" src="{{ asset('images/default/landscape.jpg') }}" alt="blog-default-image" />
            @endif
            <div class="card-body">
                <div class="small text-muted">{{ $row->created_at}}</div>
                <h2 class="card-title h4">{{ $row->title }}</h2>
                <p class="card-text">{{ $row->description }}</p>
                <div class="row">
                    <div class="col-sm-2">
                        <a href="{{route('admin.blogs.edit', $row->id)}}" class="btn btn-warning btn-circle btn-md">
                            <i class="fas fa-pen"></i>
                        </a>
                    </div>
                    <div class="col-sm-2">
                        <a href="{{route('blog.show',["slug" => $row->slug])}}" class="btn btn-primary btn-circle btn-md">
                            <i class="fas fa-eye"></i>
                        </a>
                    </div>
                    <div class="col-sm-2">

                        <form method="post" action="{{route('admin.blogs.destroy',$row->id)}}" >
                            @method('delete')
                            @csrf
                            <button type="submit"  class="btn btn-danger btn-circle btn-md">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </div>
                </div>
                {{-- <a class="btn btn-primary" href="#!">Read more →</a> --}}
            </div>
        </div>
    </div>

    @endforeach
</div>
@endsection
