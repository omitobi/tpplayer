<div class="col-lg-10 container">
    <form action="{{ route('music.add') }}" method="post">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="link">Music URL:</label>
            <input type="text" name="link" class="form-control {{ $errors->has('link') ? 'has-error' : '' }}" value="{{ old('link') }}">
        </div>
        <input type="submit" value="Add" class="btn btn-success">
        @foreach($errors->all() as $error)
           <i class="alert-danger"> {{ $error }} </i>
        @endforeach

    </form>
    <div class="nv-indexLine"></div>

</div>