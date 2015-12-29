@extends('admin_template')

@section('content')
    <section class="content-header">
        <h4>
            {{ $page_title or "Upload" }}
            <small>{{ $page_description or null }}</small>
        </h4>
        {{--  <!-- You can dynamically generate breadcrumbs here -->
          <ol class="breadcrumb">
              <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
              <li class="active">Here</li>
          </ol>--}}
    </section>

    <!-- Main content -->
    <section class="content">
        <p>Hier kann man Sachen uploaden und der ganze scheiß </p>
        @yield('content')

    </section><!-- /.content -->
@endsection