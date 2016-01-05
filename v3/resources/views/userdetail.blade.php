@extends('admin_template')

@section('content')
    <section class="content-header">
        <h4>
            {{ $page_title or null }}
            <small>{{ $page_description or null }}</small>
        </h4>
<div class="row">
        <div class="col-md-5">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Username bearbeiten</h3>
                </div>
                <form role="form">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="exampleInputName1">Name</label>
                            <input id="exampleInputName1" class="form-control" type="text" placeholder="">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Email address</label>
                            <input id="exampleInputEmail1" class="form-control" type="email" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputAbteilung1">Abteilung</label>
                            <input id="exampleInputAbteilung1" class="form-control" type="text" placeholder="">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputTelNr1">Telefonnummer</label>
                            <input id="exampleInputTelNr1" class="form-control" type="tel" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFaxNr1">Faxnummer</label>
                            <input id="exampleInputFaxNr1" class="form-control" type="text" placeholder="">
                        </div>

                    </div>

                    <div class="box-footer">
                        <button class="btn btn-xs" type="submit">Speichern</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </section>


    <!-- Main content -->
    <section class="content">

        @yield('content')

    </section><!-- /.content -->
@endsection