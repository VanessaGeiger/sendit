@extends('admin_template')

@section('content')
    <section class="content-header">
        <h4>
            {{ $page_title or "Upload" }}
            <small>{{ $page_description or null }}</small>
        </h4>

    </section>

    <!-- Main content -->
    <section class="content">
        <p>Hier kann man Sachen uploaden und der ganze scheiß </p>
        @yield('content')

    </section><!-- /.content -->
@endsection