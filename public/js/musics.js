$(document).ready( function() {
    var player = document.getElementById('player');

    $(player).attr('src', 'http://lgfkc.gcichurches.org/worshipmusic/mp3/Glorious Day (Living He Loved Me).mp3');

    playNow();

    function playNow() {
        player.play();
    }

    //When the track ends, play again
    $(player).on('ended', function() {
        playNow();
        // $musicList.val($('#mlist option:selected').next().val()).change();
    });

    $('.loadAll').on('click', function () {
        // alert('yes');
        $.ajax({
            url: '/api/musics',
            type: 'get',
            dataType: 'json',
            // beforeSend: function () {
            //     if (!$modal.find('.dimmer').hasClass('active')) {
            //         $modal.find('.dimmer').addClass('active');
            //     }
            // },
            success: function(data) {
                alert(data[1].link);
            },
            error: "something"
        });

    });


});