@extends('admin_template')

@section('content')
    <section class="content-header">
        <h4>
            {{ $page_title or "Whoops!" }}
            <small>{{ $page_description or null }}</small>
        </h4>

    </section>

    <!-- Main content -->
    <section class="content">
        <p>Hier ist irgendwas schief gelaufen! <br>
            Bitte wende dich an den Admin, falls der Fehler weiterhin auftaucht.</p>
        @yield('content')

    </section><!-- /.content -->
@endsection