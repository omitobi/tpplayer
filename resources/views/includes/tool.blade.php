
<div class="col-lg-3 col-xs-12">
    <div class="row">
        <div>
            <div >
                <img src="images/cover.jpg" width="100%">
            </div>
            <audio controls="controls" id="player" style="width:100%;">
                Your browser does not support the audio element.
            </audio>
            <div id="controller" class="row">
                <div class="col-xs-2">
                    <a class="btn active small" id="prev"> &lt;&lt;</a>
                </div>
                <div class="col-xs-2 col-lg-offset-1">
                    <a class="btn active small" id="next">&gt;&gt;</a>
                </div>
                <div class="col-xs-2  col-lg-3 col-lg-offset-1">
                    <a class="btn btn-primary" id="vup" onclick="document.getElementById('player').volume += 0.1">^</a>
                </div>
                <div class="col-xs-2 col-lg-3 ">
                    <a class="btn btn-success" id="vdown" onclick="document.getElementById('player').volume -= 0.1">v</a>
                </div>
                <div class="col-xs- col-lg-3">
                    <a class="btn btn-danger" id="mute" onclick="document.getElementById('player').volume = 0">(X)</a>
                </div>
                <div class="col-xs-2 col-lg-3" >
                    <a class="btn btn-danger" id="unmute" onclick="document.getElementById('player').volume = 1">(&gt;)</a>
                </div>
                <div class="col-xs-2 col-lg-3" >
                    <a class="btn" id="random">(~)</a>

                </div><div class="col-xs-2 col-lg-3" >
                    <a class="btn btn-block" id="repeat"> (o) </a>
                </div>
                {{--<a id="dur">Last Duration</a>--}}


                {{--<a class="button gradient" id="pause">Pause</a>--}}
                {{--<a class="button gradient" id="play">Play</a>--}}




                {{--<a class="button loadAll" style="cursor: auto">All</a>--}}
            </div>
        </div>
    </div>

    @include('includes.section.now_playing')


</div>