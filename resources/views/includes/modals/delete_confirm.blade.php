<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" id="delete-modal">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="exampleModalLabel">Delete Music</h4>
        </div>

        <div class="modal-body">
            {{--<form>--}}
                {{--<div class="form-group">--}}
                    {{--<label for="recipient-name" class="control-label">Recipient:</label>--}}
                    {{--<input type="text" class="form-control" id="recipient-name">--}}
                {{--</div>--}}
                {{--<div class="form-group">--}}
                    {{--<label for="message-text" class="control-label">Message:</label>--}}
                    {{--<textarea class="form-control" id="message-text"></textarea>--}}
                {{--</div>--}}
            {{--</form>--}}
            <form id="delete-music-form">
                {{ csrf_field() }}
                <input type="hidden" value="" class="command">
            </form>
            <h3>Are you sure you want to delete?</h3>
            <h5>Music</h5>
        </div>

        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-danger delete-music-btn">Delete</button>
        </div>
    </div>
  </div>
</div>