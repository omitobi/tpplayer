// jQuery(document).ready(function() {
//
//     container = $('.container');
//     cover = $('.cover');
//     play = $('#play');
//     pause = $('#pause');
//     mute = $('#mute');
//     muted = $('#muted');
//     close = $('#close');
// });

$(document).ready( function(){
//        $('audio').attr('src', 'http://dataup.sdasofia.org/MUSIC/Music-christian/The%20Forester%20Sister/Greatest%20Gospel%20Hits/Precious%20Memories.mp3');
//        document.getElementById('mlist').options[document.getElementById('mlist').selectedIndex].value
    var $audio = $('#player');
    var $play = $('#play');
    var $pause = $('#pause');
    var $mute = $('#mute');
    var $next = $('#next');


    var $musicList = $('#mlist');
    var fullList = $('#fullList');
    var $pageCheck = $('#pageCheck');

    var $mPage = "<div class='pageBody'><iframe "+
        "src='http://dataup.sdasofia.org/MUSIC/Music-christian/The%20Forester%20Sister/Greatest%20Gospel%20Hits/' style='width: 100%; height:500px'>" +
        "Here</iframe></div>";
    if($('#pageCheck').is(":checked"))
        $(".pageBody").after($mPage);

    $pageCheck.on('click', function () {
        var mCheck = $pageCheck.is(":checked");
        if(mCheck) {
            $("#mURLBody").after($mPage);
        } else {
            $(".pageBody").empty();
        }
    });


    $('#urlAdd').click(function () {
        var $urlBox = $(".urlBox");
        var $url = $urlBox.val();
        if ($('.err').length) {
            $( ".err" ).empty();
        }
        if($url == ''|| $url == 'http//something.com/music/GodIsgood.mp3' || !/^http/.test($url)){
            $( "form" ).after( "<p style='color: red' class='err'><i>You need to add a URL</i></p>" );
        } else {
            $sName = $url.substring($url.lastIndexOf('/') + 1);
            $sName = $sName.replace(/%20/gi," ");
            $sName = $sName.replace(".mp3","");
            if(!$sName.length)
            {
                alert('Url is bad');
                exit;
            }
            $musicList.append($('<option>',
                {
                    value: $url,
                    text: $sName
                }));
            $('#myModal').modal('toggle');
            $( "#pageCheck" ).prop( "checked", false );
            $(".pageBody").empty();
            $urlBox.val('');
            fullList.empty();
            loadTable();
        }
    });

    loadTable();
    function loadTable() {
        $("#mlist option").each(function()
        {
            var $sURL = $(this).val();
            var $sName = $(this).text();

            $tableStruct = "<tr>" +
                "<td>" +
                $sName +
                "</td>" +
                "<td>" +
                $sURL +
                "</td>" +
                "<td>Yess</td>" +
                "</tr>";
            fullList.append(
                $tableStruct
            );
        });
    }



    var $musicNow = $musicList.val();
    $('#player').attr('src', $musicNow);

    //Default switch to the next song
    playNow();

    function playNow() {
        var $musicNow = $musicList.val();
        $('#player').attr('src', $musicNow);
        document.getElementById('player').play();
    }

    $musicList.on('change',  function () {
        playNow();
    });

    function nextTrack() {
        var $nextSong = $('#mlist option:selected').next().val();
        if($nextSong == undefined) {
            $nextSong =  $musicList.find('option:first').prop('selected', 'selected').val();
            $musicList.val($nextSong).change();
        }else {
            $musicList.val($nextSong).change();
        }
    }

    $next.on('click', function () {
        nextTrack();
    });

    $('#dur').on('click', function () {
        // audio.addEventListener('timeupdate',function(){
        //     var currentTimeMs = audio.currentTime*1000;
        //     console.log(currentTimeMs);
        // },false);
        // alert($('audio').currentTime);

    });



    var $player = document.getElementById('player');
    playPause();
    function playPause() {
        if(!$player.paused){
            // $('#play').attr('id', 'pause');
            // div = $("#dummy").html("<a class='button gradient' id='pause'></a>");
             // $("controller").prepend(div);

        }else {
            // $('#pause').attr('id', 'play');
            // div = $("#pause").html("<a class='button gradient' id='play'></a>");
        }
    }


    $pause.on('click', function () {
        // alert('Pausing');
        playPause();
        $player.pause();
        // player.pause();
    });

    $play.on('click', function () {
        // alert('Pausing');
        playPause();
        $player.play();
        // player.pause();
    });

    $audio.on('ended', function() {
        nextTrack();
        // $musicList.val($('#mlist option:selected').next().val()).change();
    });

});





    // song = new Audio('music/track1.ogg','http://dataup.sdasofia.org/MUSIC/Music-christian/The%20Forester%20Sister/Greatest%20Gospel%20Hits/Amazing%20grace.mp3');
    // duration = song.duration;
//
//     if (song.canPlayType('audio/mpeg;')) {
//         song.type= 'audio/mpeg';
//         song.src= 'http://dataup.sdasofia.org/MUSIC/Music-christian/The%20Forester%20Sister/Greatest%20Gospel%20Hits/Amazing%20grace.mp3';
//     } else {
//         song.type= 'audio/ogg';
//         song.src= 'music/track1.ogg';
//     }
//
//
//
//     play.live('click', function(e) {
//         e.preventDefault();
//         song.play();
//
//         $(this).replaceWith('<a class="button gradient" id="pause" href="" title=""></a>');
//         container.addClass('containerLarge');
//         cover.addClass('coverLarge');
//         $('#close').fadeIn(300);
//         $('#seek').attr('max',song.duration);
//     });
//
//     pause.live('click', function(e) {
//         e.preventDefault();
//         song.pause();
//         $(this).replaceWith('<a class="button gradient" id="play" href="" title=""></a>');
//
//     });
//
//     mute.live('click', function(e) {
//         e.preventDefault();
//         song.volume = 0;
//         $(this).replaceWith('<a class="button gradient" id="muted" href="" title=""></a>');
//
//     });
//
//     muted.live('click', function(e) {
//         e.preventDefault();
//         song.volume = 1;
//         $(this).replaceWith('<a class="button gradient" id="mute" href="" title=""></a>');
//
//     });
//
//     $('#close').click(function(e) {
//         e.preventDefault();
//         container.removeClass('containerLarge');
//         cover.removeClass('coverLarge');
//         song.pause();
//         song.currentTime = 0;
//         $('#pause').replaceWith('<a class="button gradient" id="play" href="" title=""></a>');
//         $('#close').fadeOut(300);
//     });
//
//
//
//     $("#seek").bind("change", function() {
//         song.currentTime = $(this).val();
//         $("#seek").attr("max", song.duration);
//     });
//
//     song.addEventListener('timeupdate',function (){
//         curtime = parseInt(song.currentTime, 10);
//         $("#seek").attr("value", curtime);
//     });
//
//
//
//
//
//
//
//
//
//
//
// });