@extends('admin_template')

@section('content')
        <h4>
            {{ $page_title or "Dashboard" }}
            <small>{{ $page_description or null }}</small>
        </h4>
        {{--  <!-- You can dynamically generate breadcrumbs here -->
          <ol class="breadcrumb">
              <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
              <li class="active">Here</li>
          </ol>--}}

        <div class="row">
            <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-red">
                    <div class="inner">
                        <h3>{{$active}}</h3>
                        <p>Aktive Links</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-exchange"></i>
                    </div>
                    <a class="small-box-footer" href="#">
                        Mehr Info
                        <i class="fa fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>



            <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-green">
                    <div class="inner">
                        <h3>{{$downloaded}}</h3>
                        <p>Dateien gedownloaded</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-arrow-circle-down "></i>
                    </div>
                    <a class="small-box-footer" href="#">
                        Mehr Info
                        <i class="fa fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <h3>{{$total_size}}</h3>
                        <p>Datenvolumen gesamt</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-briefcase"></i>
                    </div>
                    <a class="small-box-footer" href="#">
                        Mehr Info
                        <i class="fa fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
            </div>


        {{--Liste der letzten Downloads--}}
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Neuste Uploads</h3>
                <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse" type="button">
                        <i class="fa fa-minus"></i>
                    </button>
                    <button class="btn btn-box-tool" data-widget="remove" type="button">
                        <i class="fa fa-times"></i>
                    </button>
                </div>
            </div>

        <div class="box-body">
            <div class="table-responsive">
                <table class="table no-margin">
                    <thead>
                    <tr>
                        <th>Datum</th>
                        <th>Titel</th>
                        <th>Status</th>
                        <th>Empfänger</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($files as $file)


                    <tr class="{cycle values="even,odd"}" role="row">
                        <td>
                            {{$file->created_at->format('d. M. Y - H:i:s')}}
                        </td>
                        <td>{{$file->original_filename}}</td>
                        <td>
                            
                              @if ($file->downloads)
                                 <span class="label label-success">geladen</span>
                              @else
                                 <span class="label label-danger">ungeöffnet</span>
                              @endif
                            
                        </td>

                        <td>
                            {{ $file->recipient }}
                        </td>
                    </tr>
                    @endforeach
                    
                    


                    </tbody>
                </table>
            </div>
        </div>
        <div class="box-footer clearfix">
             <a class="btn btn-sm btn-default btn-flat pull-right" href="javascript::;">Alle Uploads</a>
        </div>
        </div>
        </div>


    <!-- Main content -->
    <
        @yield('content')

@endsection