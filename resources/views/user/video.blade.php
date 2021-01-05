@extends('admin.layout')
@section('container')
    <div class="container-fluid">
        <div class="col-md-12 personal-info">
           
            <h3 class="text-primary text-center">{{$video->name}}</h3>
   
            <div class="row">
                <div class="col-md-12 col-xs-12">
                    <div id="player"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-xs-12 text-center">
            <button disabled class="btn btn-danger" onclick="location.href='{{URL::to('video/complete/'.$video->id)}}'" id="complete-video">Vui lòng đợi <span>30</span>s</button>
        </div>
    </div>
    <script>
        var tag = document.createElement('script');
        tag.src = "https://www.youtube.com/player_api";
        var firstScriptTag = document.getElementsByTagName('script')[0];
        firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);
        var player;
        function onYouTubePlayerAPIReady() {
          player = new YT.Player('player', {
            height: '500px',
            width: '100%',
            videoId: '{{$video->link}}',
            playerVars: { 
                'autoplay': 0,
                'controls': 0, 
                'rel' : 0,
                'fs' : 0,
            },
            events: {
                'onStateChange': onPlayerStateChange
            }
          });
        }
        var count = 30;

        function onPlayerStateChange(event) {
            if(count == 30){
                countDown();
            }
            setTimeout(function(){
                $('#complete-video').text("Hoàn thành");
                $('#complete-video').removeClass("btn-danger");
                $('#complete-video').addClass("btn-success");
                $('#complete-video').prop("disabled", false);
            },30000);
        }
        function countDown(){
            if(count > 0){
                count = count - 1;
                $('#complete-video span').text(count);
                console.log(count);
                setTimeout("countDown()", 1000);
            }
        }
    </script>
@endsection
