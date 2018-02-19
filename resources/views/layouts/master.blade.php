<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    @include('partials.head')
</head>
<body class="hold-transition skin-blue sidebar-mini">
    <div id="app" class="wrapper">

        @include('partials.header')

        @include('partials.sidebar')

        {{-- Content Wrapper --}}
        <div class="content-wrapper">
            <section class="content-header">
                <h1>
                    @yield('header')
                </h1>
            </section>

            {{-- Main content --}}
            <section class="content container-fluid">
                @yield('content')
            </section>
        </div>

        @include('partials.footer')
    </div>

    {{-- Scripts --}}
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>
    <script>
        $(function() {
            $('#dataTable').DataTable();
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
</body>
</html>