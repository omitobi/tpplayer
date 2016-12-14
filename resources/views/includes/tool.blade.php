<div class="pull-left">
    <div>
        <div style="width: 300px; height: 300px; background-image:url('images/cover.jpg')">

        </div>
        <audio controls="controls" id="player" style="width: 300px;">
            Your browser does not support the audio element.
        </audio>
        <div id="controller">
            {{--<a id="dur">Last Duration</a>--}}
            <a class="btn active small" id="prev"> &lt;&lt;</a>
            <a class="btn active small" id="next">&gt;&gt;</a>
            {{--<a class="button gradient" id="pause">Pause</a>--}}
            {{--<a class="button gradient" id="play">Play</a>--}}
            <a class="btn btn-primary" id="vup" onclick="document.getElementById('player').volume += 0.1">^</a>
            <a class="btn btn-success" id="vdown" onclick="document.getElementById('player').volume -= 0.1">v</a>
            <a class="btn btn-danger" id="mute" onclick="document.getElementById('player').volume = 0">(X)</a>
            <a class="btn btn-danger" id="unmute" onclick="document.getElementById('player').volume = 1">(&gt;)</a>
            {{--<a class="button loadAll" style="cursor: auto">All</a>--}}
        </div>
    </div>
</div>