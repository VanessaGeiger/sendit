@extends('admin_template')

@section('content')
    <section class="content-header">
        <h4>
            {{ $page_title or "Verlauf" }}
            <small>{{ $page_description or null }}</small>
        </h4>
        {{--  <!-- You can dynamically generate breadcrumbs here -->
          <ol class="breadcrumb">
              <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
              <li class="active">Here</li>
          </ol>--}}

        <ul class="timeline">

            <!-- timeline time label -->
            <li class="time-label">
        <span class="bg-red">
            04 Jan. 2015
        </span>
            </li>
            <!-- /.timeline-label -->

            <!-- timeline item -->
            <li>
                <!-- timeline icon -->
                <i class="fa fa-envelope bg-green"></i>
                <div class="timeline-item">
                    <span class="time"><i class="fa fa-clock-o"></i> 16:11</span>

                    <h3 class="timeline-header"><a href="#">SendIt Team</a> </h3>

                    <div class="timeline-body">
                        ...
                        Es wird :)
                    </div>

                    <div class="timeline-footer">
                        <a class="btn btn-primary btn-xs">...</a>
                    </div>
                </div>
            </li>
            <!-- END timeline item -->



        </ul>

    </section>

    <!-- Main content -->
    <section class="content">
        <p>Hier sieht man was bereits von einem hochgeladen wurde udn wann und ob der Link noch gültig ist </p>
        @yield('content')

    </section><!-- /.content -->
@endsection