@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Dashboard</div>

                    <div class="panel-body">
                        @include('includes.dashboard.playlist')
                        @include('includes.modals.playlist_new')
                        @include('includes.modals.playlist_update')
                        @include('includes.modals.playlist_delete')
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