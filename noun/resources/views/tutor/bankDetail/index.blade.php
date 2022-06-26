@extends('layout.layout')

@section('content')
    <x-header>
        <x-header.heading>Bank Course</x-header>
        <div>
            <a href="{{route('bankdetail.create')}}" class="btn btn-primary ml-2">Add Bank Details</a>
        </div>
    </x-header>

    <x-table>
        <x-table.head :columns="[
            'Bank Name',
            'Account Name',
            'Account Number',
            'Actions'
        ]" />
        <x-table.body>
            @foreach ($data as $row)
                <tr>
                    <td>{{$row->bank_name}}</td>
                    <td>{{$row->account_name}}</td>
                    <td>{{$row->account_number}}</td>
                    <td class="w-25">
                        <div class="form-inline">
                            <a href="{{route('bankdetail.edit', $row->id)}}" class="btn btn-warning btn-circle mr-2">
                                <i class="fas fa-pen"></i>
                            </a>
                            <form method="POST" action="{{route('bankdetail.destroy', $row->id)}}">
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
