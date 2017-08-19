/**
 * Created by omitobisam on 24.02.17.
 */

$(document).ready(function() {
    var activeSystemClass = $('.list-group-item.active');
    var update_playlist_modal = $('#update-playlist-modal');
    var pl_del_modal = $('#pl-delete-modal');
    //something is entered in search form
    $('#system-search').keyup( function() {
        var that = this;
        // affect all table rows on in systems table
        var tableBody = $('.table-list-search tbody');
        var tableRowsClass = $('.table-list-search tbody tr');
        $('.search-sf').remove();
        tableRowsClass.each( function(i, val) {

            //Lower text for case insensitive
            var rowText = $(val).text().toLowerCase();
            var inputText = $(that).val().toLowerCase();
            if(inputText != '')
            {
                $('.search-query-sf').remove();
                tableBody.prepend('<tr class="search-query-sf"><td colspan="6"><strong>Searching for: "'
                    + $(that).val()
                    + '"</strong></td></tr>');
            }
            else
            {
                $('.search-query-sf').remove();
            }

            if( rowText.indexOf( inputText ) == -1 )
            {
                //hide rows
                tableRowsClass.eq(i).hide();

            }
            else
            {
                $('.search-sf').remove();
                tableRowsClass.eq(i).show();
            }
        });
        //all tr elements are hidden
        if(tableRowsClass.children(':visible').length == 0)
        {
            tableBody.append('<tr class="search-sf"><td class="text-muted" colspan="6">No entries found.</td></tr>');
        }
    });



    $("#new-playlist-form").on('submit', function (e) {
        e.preventDefault();
        // var url = this.route.value;
        $this = $(this);

        $.ajax({
            type: "POST",
            url: "/api/playlists",
            cache: false,
            data: {
                name: this.name.value,
                type: this.type.value,
                description: this.description.value,
                _token: this._token.value
            },
            error: function(xhr, status, error) {
                var err = JSON.parse(xhr.responseText);
                $this.find('#new-playlist-form-btn').notify(
                    err.message,
                    "error"
                );
            },
            success: function (response) {
                if(response.result === 'success'){
                    $this.find('#new-playlist-form-btn').notify(
                        response.message,
                        "success"
                    );

                    setTimeout(function () {
                        location.replace('/dashboard');
                    }, 1500);
                } else {
                    $this.find('#new-playlist-form-btn').notify(
                        response.message,
                        "error", { position:"right" }
                    );
                }
                // if (typeof response.error !== 'undefined'){
                //
                // }
            }
        });
    });
    
    $(".pl_edit").on('click', function () {
        // var pl_list_tb = $('#pl_list_tb');
        var pl_ = $(this).closest('tr');
        var pl_name = pl_.find('.pl_name').text();
        var pl_type = pl_.find('.pl_type').text();
        var pl_core = pl_.find('.pl_core').text();
        var pl_description = pl_.find('.pl_description').text();
        update_playlist_modal.find('.upl_core_playlist').val(pl_core);
        update_playlist_modal.find('input[name=name]').val(pl_name);
        update_playlist_modal.find('input[name=type]').val(pl_type);
        update_playlist_modal.find('textarea').val(pl_description);
        update_playlist_modal.find('h5').text("Updating '"+pl_name+"' playlist");
    });


    $("#update-playlist-form").on('submit', function (e) {
        e.preventDefault();
        $this = $(this);

        $.ajax({
            type: "PUT",
            url: "/api/playlists/"+this.upl_core_playlist.value,
            cache: false,
            data: {
                name: this.name.value,
                type: this.type.value,
                description: this.description.value,
                _token: this._token.value
            },
            error: function(xhr, status, error) {
                var err = JSON.parse(xhr.responseText);
                $this.find('.update_pl_btn').notify(
                    err.message,
                    "error"
                );
            },
            success: function (response) {
                if(response.result === 'success'){
                    $this.find('.update_pl_btn').notify(
                        response.message,
                        "success"
                    );

                    setTimeout(function () {
                        location.replace('/dashboard');
                    }, 1500);
                } else {
                    $this.find('.update_pl_btn').notify(
                        response.message,
                        "error", { position:"right" }
                    );
                }
                // if (typeof response.error !== 'undefined'){
                //
                // }
            }
        });
    });


    $(".pl_delete").on('click', function () {
        var pl_ = $(this).closest('tr');
        var pl_name = pl_.find('.pl_name').text();
        var pl_core = pl_.find('.pl_core').text();

        // $('#delete-modal').find('#exampleModalLabel').text('Delete '+ sel_name);
        pl_del_modal.find('h5').text('Playlist: '+pl_name);
        pl_del_modal.find('form input[name=pl_delete_core]').val(pl_core);
    });


    /**
     * Delete a playlist
     */
    pl_del_modal.find(".delete-pl-btn").on('click', function (e) {
        $this = $(this);
        var pl_delete_core = pl_del_modal.find('.pl_delete_core').val();
        $.ajax({
            type: "DELETE",
            url: "/api/playlists/" + pl_delete_core,
            cache: false,
            data: {_token: pl_del_modal.find('#pl-delete-music-form').children(':first-child').val()},
            error: function(xhr, status, error) {
                var err = JSON.parse(xhr.responseText);
                $this.notify(
                    err.message,
                    "error"
                );
            },
            success: function (response) {
                if (response.result === 'success') {
                    $this.notify(
                        response.message,
                        "success"
                    );

                    setTimeout(function () {
                        location.replace('/dashboard');
                    }, 1500);

                } else {
                    $this.notify(
                        response.message,
                        "error"
                    );
                }
            }
        });
    });
});
