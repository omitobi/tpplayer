@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading"><i>{{ $musics->playlist_name }} Playlist</i></div>

                    <div class="panel-body">
                        @include('includes.set')
                        <div class="row">
                            @include('includes.tool')
                            @include('includes.list')
                            @include('includes.modal')

                            </div>


                        {{--<div id="list" class="pull-right" style="width: 60%">--}}
                            {{--<table class="table table-striped">--}}
                                {{--<thead>--}}
                                {{--<tr>--}}
                                    {{--<th>Name </th>--}}
                                    {{--<th>Link</th>--}}
                                    {{--<th style="width: 10px">Available</th>--}}
                                {{--</tr>--}}
                                {{--</thead>--}}
                                {{--<tbody id="fullList">--}}
                                {{--@foreach($musics as $music)--}}
                                    {{--<tr>--}}
                                        {{--<td>{{$music->name}}</td>--}}
                                        {{--<td>{{$music->link}}</td>--}}
                                        {{--<td>{{$music->duration}}</td>--}}
                                    {{--</tr>--}}
                                {{--@endforeach--}}
                                {{--</tbody>--}}
                            {{--</table>--}}
                        </div>
                    <hr>
                        <div class="panel-body">
                            <div>
                                <div><b class="text-danger">Disclaimer!</b></div>
                                <i>The link you shared is solely your responsibility, and TP_Player developer will not be responsible for it (especially in a case of infringement of intellectual property). You can read more
                                    <a href="#">Here</a></i>. We do not save the music, and so unless requested any public links would be removed every 30 days.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection