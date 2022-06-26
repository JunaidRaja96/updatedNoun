@extends('layout.web')
@section('content')

<header class="bg-gradient-primary py-5 mb-5">
    <div class="container-fluid px-4 px-lg-5 my-5">
        <div class="text-center text-white">
            <h1 class="display-4 fw-bolder">Blogs</h1>
            <p class="lead fw-normal text-white-50 mb-0">
                <a class="text-white-50" href="{{ url('/') }}">Home</a>
                /
                Blogs


            </p>
        </div>
    </div>
</header>
<div class="row">
    <!-- Blog entries-->
    <div class="col-lg-8">
        <!-- Featured blog post-->
        <!-- Nested row for non-featured blog posts-->
        <div class="row">
            @foreach ( $records as $record)
                <div class="col-lg-6 mb-4">
                    <!-- Blog post-->
                    <div class="card  h-100">
                        @isset($record->image)
                        <img class="card-img-top" src="{{asset($record->image)}}" alt="..." />
                        @endisset
                        <div class="card-body">
                            <div class="small text-muted">{{date_format($record->created_at,"d/M/Y")}}</div>
                            <h2 class="card-title h4">{{$record->title}}</h2>
                            <p class=" card-text">{{$record->description}}</p>
                            <a class="btn btn-primary" href="{{route('blog.show',["slug" => $record->slug])}}">Read more →</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <!-- Pagination-->
        {{-- <nav aria-label="Pagination">
            <hr class="my-0" />
            <ul class="pagination justify-content-center my-4">
                <li class="page-item disabled"><a class="page-link" href="#" tabindex="-1" aria-disabled="true">Newer</a></li>
                <li class="page-item active" aria-current="page"><a class="page-link" href="#!">1</a></li>
                <li class="page-item"><a class="page-link" href="#!">2</a></li>
                <li class="page-item"><a class="page-link" href="#!">3</a></li>
                <li class="page-item disabled"><a class="page-link" href="#!">...</a></li>
                <li class="page-item"><a class="page-link" href="#!">15</a></li>
                <li class="page-item"><a class="page-link" href="#!">Older</a></li>
            </ul>
        </nav> --}}
    </div>
    <!-- Side widgets-->
    <div class="col-lg-4">
        <!-- Search widget-->
        <div class="card mb-4">
            <div class="card-header">Search</div>
            <div class="card-body">
                <form method="get" action="{{route('blog')}}">
                    <div class="input-group">
                        <div class="form-inline">
                            <input class="form-control" type="text" placeholder="Enter search term..." aria-label="Enter search term..." name="search" aria-describedby="button-search" value="{{request()->get('search')}}"/>
                        </div>
                        <div class="input-group-append">
                                <button class="btn btn-primary" id="button-search" type="submit">Go</button>
                                @if(request()->get('search'))
                                    <a  href="{{route('blog')}}" class="btn btn-danger">Clear</a>
                                @endif
                            </div>
                        </div>
                    </form>
            </div>
        </div>
        <!-- Categories widget-->
        <div class="card mb-4">
            <div class="card-header">Categories</div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-6">
                            <span><a href="{{route('blog')}}" class="badge badge-pill badge-primary p-2">All</a></span>
                         @foreach ($categories as $category)
                            <span><a href="{{route('blog') . '?category=' . $category->id}}" class="badge badge-pill badge-primary  p-2">{{$category->name}}</a></span>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <!-- Side widget-->
        <div class="card mb-4">
            <div class="card-header">Side Widget</div>
            <div class="card-body">You can put anything you want inside of these side widgets. They are easy to use, and feature the Bootstrap 5 card component!</div>
        </div>
    </div>
</div>

@endsection
