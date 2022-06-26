@extends('layout.layout')

@section('content')
    <x-header>
        <x-header.heading>Blog Categories</x-header>
        <div>
            <a href="{{ route('admin.categories.create') }}" class="btn btn-primary ml-2">Add Category</a>
        </div>
    </x-header>

    <x-table>
        <x-table.head :columns="[
            'Name',
            'Actions'
        ]" />
        <x-table.body>
            @foreach ($data as $row)
                <tr>
                    <td>{{ $row->name }}</td>
                    <td class="w-25">

                                <div class="form-inline">
                                    <a href="{{route('admin.categories.edit',['category' => $row->id])}}" class="btn btn-warning btn-circle mr-2">
                                        <i class="fas fa-pen"></i>
                                    </a>
                                    <form method="POST" action="{{route('admin.categories.destroy', ['category' => $row->id])}}">
                                        @method('DELETE')
                                        @csrf
                                        <button class="btn btn-danger btn-circle">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>

                    </td>
                </tr>
            @endforeach
        </x-table.body>
    </x-table>

@endsection
