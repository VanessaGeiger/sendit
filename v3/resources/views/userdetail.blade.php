@extends('admin_template')

@section('content')
    <section class="content-header">
        <h4>
            {{ $page_title or "Benutzerverwaltung" }}
            <small>{{ $page_description or null }}</small>
        </h4>
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Alle Benutzer</h3>
            </div>

    </section>

    <!-- Main content -->
    <section class="content">
        <p> </p>
        @yield('content')

    </section><!-- /.content -->
@endsection