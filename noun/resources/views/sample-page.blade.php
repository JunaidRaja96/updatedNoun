@extends('layout.layout')

@section('meta')
    {{-- additional meta tags here for this specific page --}}
@endsection

@section('style')
    {{-- additional links and style here for this specific page --}}
@endsection

@section('content')
    <x-header>
        <x-header.heading>Sample</x-header>
        <div>
            <button class="btn btn-primary ml-2">Add Sample</button>
        </div>
    </x-header>

    <x-table>
        <x-table.head :columns="[
            'Name',
            'Position',
            'Office',
            'Age',
            'Start date',
            'Salary'
        ]" />
        <x-table.body>
            <tr>
                <td>Tiger Nixon</td>
                <td>System Architect</td>
                <td>Edinburgh</td>
                <td>61</td>
                <td>2011-04-25</td>
                <td>$320,800</td>
            </tr>
        </x-table.body>
    </x-table>
@endsection

@Section('scripts')
    {{-- additional scripts here for this specific page --}}
@endsection
