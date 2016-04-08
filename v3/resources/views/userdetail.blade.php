@extends('admin_template')

@section('content')

<div class="row">
        <div class="col-md-5">
        <div class="box box-danger">

            <div class="box-header with-border">
                <h3 class="box-title">{{ $user->name }} </h3>
                <small class="pull-right">zuletz online: 07.01.2016, 14:11:03</small>
                    <br>
                <span>
                    {{ $user->email }} <br>
                    {{ $user->department }} <br>
                    {{ $user->phone }} <br>
                    <a class="" href="{{ URL::route('users') }}/{{ $user->id }}">
                        <i class="fa fa-edit"></i>
                        Bearbeiten
                    </a>
                </span>
            </div>
        </div>
        </div>
</div>

            <div class="box box">
                <div class="box-header">
                    <h3 class="box-title">Alle Dateien</h3>
                </div>
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                        <thead>
                        <tr role="row">
                            <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 187px;" aria-sort="ascending" aria-label="Dateiname">Dateiname</th>
                            <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 167px;" aria-sort="ascending" aria-label="Dateipfad">Dateipfad</th>
                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 207px;" aria-label="Dateigroeße">Dateigröße</th>
                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 182px;" aria-label="Datum">Datum</th>


                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                       @foreach ($entries as $entry)

                            <tr class="{cycle values="even,odd"}" role="row">
                            <td class="sorting_1">{{ $entry->original_filename }}</td>
                            <td>/Bla/Irgendwo/Wasweissich/Beispiel/Bild.jpg</td>
                            <td>{{ $entry->human_filesize() }}</td>
                            <td>{{ $entry->created_at->format('d. M. Y - H:i:s') }}</td>
                            <td>
                                <a href="{{ URL::route('editfile', $entry->hash) }}">Bearbeiten</a>
                             {{--   {!! Form::open(array('url' => 'fileentry/edit/' . $entry->hash)) !!}
                                {!! Form::submit('Bearbeiten', array('class' => 'btn btn-warning')) !!}
                                {!! Form::close() !!}--}}
                            </td>

                                <td>
                                {!! Form::open(array('url' => 'fileentry/delete/' . $entry->hash)) !!}
                                {!! Form::hidden('_method', 'DELETE') !!}
                                {!! Form::submit('Löschen', array('class' => 'btn btn-warning')) !!}
                                {!! Form::close() !!}

                            </td>
                                <td>
                            <a class=""  href="#">
                                <i class="fa fa-archive"></i>
                                Archivieren

                            </a></td>
                        <td>
                            <a class="" href="#">
                                <i class="fa fa-download"></i>
                                Download
                            </a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>





@endsection