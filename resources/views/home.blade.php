@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    <h1>You are logged in!</h1>
                    @include('includes.set')
                    @include('includes.tool')
                    @include('includes.list')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
