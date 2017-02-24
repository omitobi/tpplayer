/**
 * Created by omitobisam on 24.02.17.
 */

$(document).ready(function() {
    var activeSystemClass = $('.list-group-item.active');

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
                this.submit.notify(
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
});
