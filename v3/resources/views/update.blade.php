@extends('admin_template')

@section('content')


        <!-- Main content -->
<div class="row">
    <div class="col-md-6">
        <div class="box box-danger">
            <div class="box-header with-border">
                <h3 class="box-title">Update</h3>
            </div>

            {{--Upload mit Email--}}

            <form role="form" action="{{ URL::route('updatefile', $entry->hash) }}" method="post" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                {!! Form::hidden('_method', 'PUT') !!}





                                    <div class="form-group">
                                        <label>Gültigkeitsdauer:</label>
                                        <input id="datepicker" class="form-control" type="hidden" name="datepicker" value="{{ 'expiration' }}">
                        <div class="input-group">
                            <div id="reportrange" class="pull-right" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc; width: 100%">
                                <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>&nbsp;
                                <span></span> <b class="caret"></b>
                            </div>
                        </div>
                    </div><!-- /.form group -->






        </div>
        <div class="box-footer">
            <button class="btn btn-google" type="submit">Aktualisieren</button>
        </div>
        </form>
    </div>












@endsection
