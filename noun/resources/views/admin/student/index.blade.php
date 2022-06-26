@extends('layout.layout')

@section('content')
    <x-header>
        <x-header.heading>Students</x-header>
    </x-header>

    <x-table>
        <x-table.head :columns="[
            'Name',
            'Email',
            'Semester',
            'Also A Tutor',
            'Status',
            'Action'
        ]" />
        <x-table.body>
            @foreach ($data['users'] as $row)
                <tr>
                    <td>{{ $row->name }}</td>
                    <td>{{ $row->email }}</td>
                    <td>{{$row->subscribe->semester->year ?? null }}_{{$row->subscribe->semester->semester_no ?? null}}</td>
                    <td>{{ ($row->tutor_also) ? 'Yes' : 'No' }}</td>
                    <td>
                        <select class="form-control" name="forma" onchange="location = this.value;">
                        <option value="{{route('admin.student.status',$row->id)}}" {{ ($row->status ==1) ? 'selected' : '' }}>Active</option>
                        <option value="{{route('admin.student.status',$row->id)}}" {{ ($row->status ==0) ? 'selected' : '' }}>InActive</option>
                        </select>
                    </td>
                    <td class="w-25">
                        <div class="form-inline">
                            <a href="{{route('admin.students.show', $row->id)}}" class="btn btn-info btn-circle mr-2">
                                <i class="fas fa-eye"></i>
                            </a>
                        </div>
                     </td>
                </tr>
            @endforeach
        </x-table.body>
    </x-table>

@endsection
