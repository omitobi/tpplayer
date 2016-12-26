<div class="row">
    <form action="{{ route('music.add') }}" method="post">
        {{ csrf_field() }}
<div class="col-xs-9   col-lg-8 col-lg-offset-2 col-xs-offset-0">
    {{ csrf_field() }}
    <div class="form-group">

        <input type="text" name="link" class="form-control {{ $errors->has('link') ? 'has-error' : '' }}"
               value="{{ old('link') }}" placeholder="Enter Music Url" >

    </div>
</div>

<div class="col-xs-2 col-lg-2">
    <input type="submit" value="Add" class="btn btn-success">
</div>
 </form>
    @foreach($errors->all() as $error)
        <i class="alert-danger"> {{ $error }} </i>
    @endforeach
 </div>


<div class="nv-indexLine"></div>