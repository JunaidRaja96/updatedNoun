{{--
    =========================================================================
    | HOW TO USE:
    =========================================================================
        return redirect()->route('route name')->with('sweetalert',[
        'title' => 'Category created successfully',
        'desc' => '',
        'type' => 'info' // they can be "success, error, info, warning, ''"
        ]);

    =========================================================================
    | HOW TO USE:
    =========================================================================
 --}}

<script src="{{ asset("vendor/sweetalert/sweetalert.min.js") }}"></script>
@if (session('sweetalert'))
    <script>
        swal(
            "{{ session('sweetalert')['title'] ?? '' }}",
            "{{ session('sweetalert')['desc'] ?? '' }}",
            "{{ session('sweetalert')['type'] ?? '' }}"
            );
    </script>
@endif
