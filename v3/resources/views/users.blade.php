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
    <div class="box-body">
        <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
            <div class="row">

                <div class="col-sm-12">
                    <div id="example1_filter" class="dataTables_filter">
                        <label class="pull-right">
                            Search:
                            <input class="form-control input-sm" type="search" placeholder="" aria-controls="example1">
                        </label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                        <thead>
                        <tr role="row">
                            <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 187px;" aria-sort="ascending" aria-label="Name">Name</th>
                            <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 167px;" aria-sort="ascending" aria-label="Abteilung">Abteilung</th>
                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 207px;" aria-label="E-Mail">E-Mail</th>
                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 182px;" aria-label="Telefonnummer">Telefonnummer</th>
                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 142px;" aria-label="Fax">Fax</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($users as $user)

                        <tr class="{cycle values="even,odd"}" role="row">
                            <td class="sorting_1">{{ $user->name }}</td>
                            <td>{{ $user->department }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->phone }}</td>
                            <td> -</td>
                            <td><a class="" href="{{ URL::route('users') }}/{{ $user->id }}">
                                    <i class="fa fa-edit"></i>
                                    Edit
                                </a></td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

        </section>

        <!-- Main content -->
        <section class="content">
            <p> </p>
            @yield('content')

        </section><!-- /.content -->
@endsection