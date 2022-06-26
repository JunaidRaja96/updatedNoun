@extends('layout.layout')
@section('content')
<div class="card shadow mb-4">
    <div class="card-header">
        <h3 class="text-center">Past Questions</h3>
    </div>
    <div class="card-body">
        <x-table>
            <x-table.head :columns="[
                'Year',
                '1 Semester',
                '2 Semester',

            ]" />
            <x-table.body>
                {{-- @dd($data) --}}
                @foreach ($data as $year => $questions)
                    <tr>
                        <td>{{ $year }}</td>

                        @foreach ( $questions as $question )
                            <td>
                            <a href="{{ asset($question->file) }}" download>{{ $question->code }}</a>
                            </td>
                        @endforeach
                    </tr>
                @endforeach

            </x-table.body>
        </x-table>
    </div>
</div>

@endsection
