@extends('admin_template')

@section('content')


    <!-- Main content -->


        <div class="row">
            <div class="col-md-6">
                <div class="box box-danger">
                    <div class="box-header with-border">
                        <h3 class="box-title">Upload</h3>
                    </div>
                    <form role="form" action="{{ url('/fileentry/add') }}" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="exampleInputEmpfaenger">Empfänger</label>
                                <input id="exampleInputEmail1" class="form-control" type="email" name="email" placeholder="Enter email">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputBetreff1">Betreff</label>
                                <input id="exampleInputBetreff1" class="form-control" type="text" name="subject" placeholder="Betreff">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputMailtext1">Nachricht</label>
                            <textarea class="form-control" name="mailcontent" placeholder="Enter ..." rows="3"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">Datei hochladen</label>
                                <input id="exampleInputFile" type="file" name="filefield">

                            </div>

                        </div>
                        <div class="box-footer">
                            <button class="btn btn-google" type="submit">Hochladen</button>
                        </div>
                    </form>
                </div>




        {{--    <form action="{{ url('/fileentry/add') }}" method="post" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <input type="file" name="filefield">
        <input type="submit">
    </form>--}}


@endsection
