<div class="modal fade new-playlist-sm" tabindex="-1" role="dialog" id="new-playlist-modal">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h5 class="modal-title">Add to Music</h5>
            </div>

            <div class="modal-body">
                <div class="row">

                    <form class="new-playlist-form" method="post" id="new-music-form">
                        <div class="form-group">
                            {{ csrf_field() }}
                            <input type="text" name="name" required="required" class="form-control {{ $errors->has('name') ? 'has-error' : '' }}" value="{{ $music->name }}">
                            <input type="text" name="type" class="form-control {{ $errors->has('type') ? 'has-error' : '' }}" value="{{ $music->link }}">
                            <input type="text" name="description" class="form-control {{ $errors->has('description') ? 'has-error' : '' }}" value="{{ $music->duration }}">
                        </div>
                        <input type="submit" value="Add" class="btn btn-primary updater" id="update-btn" >
                        @foreach($errors->all() as $error)
                            <i class="alert-danger"> {{ $error }} </i>
                        @endforeach
                    </form>

                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>