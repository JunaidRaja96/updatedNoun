@extends('layout.layout')

@section('content')
    <x-header>
        <x-header.heading>User Contact</x-header>
    </x-header>

    <x-table>
        <x-table.head :columns="[
            'Name',
            'Email',
            'Phone',
            'Message',
            'Action'
        ]" />
        <x-table.body>
            @foreach ($data as $row)
                <tr>
                    <td>{{ $row->name }}</td>
                    <td>{{ $row->email }}</td>
                    <td>{{$row->phone_number}}</td>
                    <td>{{$row->message}}</td>
                    <td class="w-25">
                        <div class="form-inline">
                            <a href="{{route('admin.usercontact.show', $row->id)}}" class="btn btn-primary btn-circle btn-md">
                                <i class="fas fa-eye"></i>
                            </a>
                        <form method="POST" action="{{route('admin.usercontact.destroy', $row->id)}}">
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
