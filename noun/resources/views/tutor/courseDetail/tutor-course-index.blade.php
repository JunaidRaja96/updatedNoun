@extends('layout.layout')

@section('content')
    <x-header>
        <x-header.heading>Tutor Course</x-header>
        <div>
            <a href="{{route('course.create')}}" class="btn btn-primary ml-2">Add Course Details</a>
        </div>
    </x-header>

    <x-table>
        <x-table.head :columns="[
            'Course Name',
            'Course Code',
            'Working days in a week',
            'To',
            'From',
            'Connecting Link',
            'Actions'
        ]" />
        <x-table.body>
            @foreach ($data as $row)
                <tr>
                    <td>{{$row->course->title}}</td>
                    <td>{{$row->course->code}}</td>
                    <td>{{ $row->select_days }}</td>
                    <td>{{ date("h:i:a",strtotime($row->to)) }}</td>
                    <td>{{ date("h:i:a",strtotime($row->from)) }}</td>
                    <td>{{ $row->link }}</td>
                    <td class="w-25">
                        <div class="form-inline">
                            <a href="{{route('course.edit', $row->id)}}" class="btn btn-warning btn-circle mr-2">
                                <i class="fas fa-pen"></i>
                            </a>
                            <form method="POST" action="{{route('course.destroy',  $row->id)}}">
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
