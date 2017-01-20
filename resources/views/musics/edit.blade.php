@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Welcome</div>

                    <div class="panel-body">
                        {{--@include('includes.set')--}}

                        {{--Edit form--}}
                        <div class="h1">Update the Music</div>
                        <div class="col-lg-10 container">
                            {{--/api/musics/update/{{ $music->id }}--}}

                            <form class="update-form">
                                <div class="form-group">
                                    {{ csrf_field() }}
                                    {{ method_field('PATCH') }}
                                    <input type="hidden" name="id" value="{{ $music->id }}">
                                    <label for="name">Name :</label>
                                    <input type="text" name="name" class="form-control {{ $errors->has('name') ? 'has-error' : '' }}" value="{{ $music->name }}">
                                    <label for="link">Link :</label>
                                    <input type="text" name="link" class="form-control {{ $errors->has('link') ? 'has-error' : '' }}" value="{{ $music->link }}">
                                    <label for="duration">Duration</label>
                                    <input type="text" name="duration" class="form-control {{ $errors->has('duration') ? 'has-error' : '' }}" value="{{ $music->duration }}">
                                </div>
                                <input type="submit" value="Update!" class="btn btn-primary updater" id="update-btn" >
                                @foreach($errors->all() as $error)
                                    <i class="alert-danger"> {{ $error }} </i>
                                @endforeach
                            </form>
                            <div class="nv-indexLine"></div>

                        </div>
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
@endsection