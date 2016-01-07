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
            <form action="{{ url('/fileentry/add') }}" method="post" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <input type="file" name="filefield">
        <input type="submit">
    </form>

    </section><!-- /.content -->
@endsection
