@extends('layout.layout')

@section('content')
    <x-header>
        <x-header.heading>Semesters</x-header>
        <div>
            <a href="{{route('admin.semester.create')}}" class="btn btn-primary ml-2">Add Semester</a>
        </div>
    </x-header>

    <x-table>
        <x-table.head :columns="[
            'Year',
            'Semester_NO',
            'Status',
            'Action'
        ]" />
        <x-table.body>
            @foreach ($data as $row)
                <tr>
                    <td>{{ $row->year }}</td>
                    <td>{{ $row->semester_no }}</td>
                    <td>
                        @if($row->status ==1)
                        Active
                        @else
                        InActive
                        @endif
                    </td>
                    <td class="w-25">
                        <div class="form-inline">
                            <a href="{{route('admin.semester.edit', $row->id)}}" class="btn btn-warning btn-circle mr-2">
                                <i class="fas fa-pen"></i>
                            </a>
                            <form method="POST" action="{{route('admin.semester.destroy', $row->id)}}">
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
