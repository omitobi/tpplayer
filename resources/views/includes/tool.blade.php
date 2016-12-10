<div class="pull-left">
    <div>
        <div style="width: 300px; height: 300px; background-image:url('images/cover.jpg')">

        </div>
        <audio controls="controls" src="" id="player">
            Your browser does not support the audio element.
        </audio>
        <div id="controller">
            <a id="dur">Last Duration</a>
            <a class="button gradient" id="next">Next</a>
            <a class="button gradient" id="prev">Previous</a>
            <a class="button gradient" id="pause">Pause</a>
            <a class="button gradient" id="play">Play</a>
            <a class="button" id="vup" onclick="document.getElementById('player').volume += 0.1"></a>
            <a class="button" id="vdown" onclick="document.getElementById('player').volume -= 0.1"></a>
            <a class="button" id="mute" onclick="document.getElementById('player').volume = 0">Mute </a>
        </div>
    </div>
</div>