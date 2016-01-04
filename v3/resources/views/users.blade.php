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
                <div class="col-sm-6">
                    <div id="example1_length" class="dataTables_length">
                        <label>
                            Show
                            <select class="form-control input-sm" name="example1_length" aria-controls="example1">
                                <option value="10">10</option>
                                <option value="25">25</option>
                                <option value="50">50</option>
                                <option value="100">100</option>
                            </select>
                            entries
                        </label>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div id="example1_filter" class="dataTables_filter">
                        <label>
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
                            <td>Otterbach IT</td>
                            <td>v.geiger@ottebrach.de</td>
                            <td>07222-952184</td>
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
            <div class="row">
                <div class="col-sm-5">
                    <div id="example1_info" class="dataTables_info" role="status" aria-live="polite">Showing 1 to 10 of 57 entries</div>
                </div>
                <div class="col-sm-7">
                    <div id="example1_paginate" class="dataTables_paginate paging_simple_numbers">
                        <ul class="pagination">
                            <li id="example1_previous" class="paginate_button previous disabled">
                                <a href="#" aria-controls="example1" data-dt-idx="0" tabindex="0">Previous</a>
                            </li>
                            <li class="paginate_button active">
                                <a href="#" aria-controls="example1" data-dt-idx="1" tabindex="0">1</a>
                            </li>
                            <li class="paginate_button ">
                                <a href="#" aria-controls="example1" data-dt-idx="2" tabindex="0">2</a>
                            </li>
                            <li class="paginate_button ">
                                <a href="#" aria-controls="example1" data-dt-idx="3" tabindex="0">3</a>
                            </li>
                            <li class="paginate_button ">
                                <a href="#" aria-controls="example1" data-dt-idx="4" tabindex="0">4</a>
                            </li>
                            <li class="paginate_button ">
                                <a href="#" aria-controls="example1" data-dt-idx="5" tabindex="0">5</a>
                            </li>
                            <li class="paginate_button ">
                                <a href="#" aria-controls="example1" data-dt-idx="6" tabindex="0">6</a>
                            </li>
                            <li id="example1_next" class="paginate_button next">
                                <a href="#" aria-controls="example1" data-dt-idx="7" tabindex="0">Next</a>
                            </li>
                        </ul>
                    </div>
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