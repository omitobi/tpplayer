@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Welcome</div>

                    <div class="panel-body">
                        @include('includes.set')
                        @include('includes.tool')
                        @include('includes.list')
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
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection