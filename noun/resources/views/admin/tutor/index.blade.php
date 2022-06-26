@extends('layout.layout')

@section('content')
    <x-header>
        <x-header.heading>Students</x-header>
    </x-header>

    <x-table>
        <x-table.head :columns="[
            'Name',
            'Email',
            'Status',

        ]" />
        <x-table.body>
            @foreach ($data['users'] as $row)
                <tr>
                    <td>{{ $row->name }}</td>
                    <td>{{ $row->email }}</td>
                    <td>
                        <select class="form-control" name="forma" onchange="location = this.value;">
                        <option value="{{route('admin.tutor.status',$row->id)}}" {{ ($row->status ==1) ? 'selected' : '' }}>Active</option>
                        <option value="{{route('admin.tutor.status',$row->id)}}" {{ ($row->status ==0) ? 'selected' : '' }}>InActive</option>
                        </select>
                    </td>
                </tr>
            @endforeach
        </x-table.body>
    </x-table>

@endsection
