
<div class="row">
    <form method="post" class="new-music">
        {{ csrf_field() }}
        <input type="hidden" name="route" id="route" value="{{ route('api.music.add') }}">
        <div class="col-xs-9   col-lg-8 col-lg-offset-2 col-xs-offset-0">
            <div class="form-group">
                <input type="text" name="link" class="form-control {{ $errors->has('link') ? 'has-error' : '' }}"
                    value="{{ old('link') }}" placeholder="Enter Music Url" >
            </div>
        </div>

<div class="col-xs-2 col-lg-2">
    <input type="submit" value="Add" class="btn btn-success">
    <a class="btn btn-default" id="add-bulk-toggle" data-toggle="modal" data-target=".bulk-modal-lg">Add Bulk</a>
</div>
 </form>
    @foreach($errors->all() as $error)
        <i class="alert-danger"> {{ $error }} </i>
    @endforeach
</div>


<div class="nv-indexLine"></div>