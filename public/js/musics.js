$(document).ready( function() {
    var player = document.getElementById('player');

    $(player).attr('src', 'http://lgfkc.gcichurches.org/worshipmusic/mp3/Glorious Day (Living He Loved Me).mp3');

    playNow();

    function playNow() {
        player.play();
    }

    //When the track ends, play again
    player.on('ended', function() {
        playNow();
        // $musicList.val($('#mlist option:selected').next().val()).change();
    });

});