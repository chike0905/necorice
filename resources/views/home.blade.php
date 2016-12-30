@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    <div>
                        <div id="message">位置情報の読み込み中です</div>
                        <form action="/checkin" method="post">
                            {!! csrf_field() !!}
                            <input type="hidden" id="latitude" value="">
                            <input type="hidden" id="longitude" value="">
                            <input type="submit" class="btn btn-primary" value="Check in">
                        </form>
                    </div>
                    <script>
                        function errorFunc(errornum){
                            var massage = document.getElementById("message");
                            massage.innerHTML = "Error-" + errornum + ":位置情報が取得できませんでした";
                        }
                        function successFunc(position){
                            var massage = document.getElementById("message");
                            massage.innerHTML = "緯度:" + position.coords.latitude + "/ 経度:"+ position.coords.longitude;
                            document.getElementById("latitude").value = position.coords.latitude;
                            document.getElementById("longitude").value = position.coords.longitude;
                        }
                        if(navigator.geolocation){
                        // 現在位置を取得できる場合の処理
                            navigator.geolocation.getCurrentPosition( successFunc , errorFunc);
                        } else {
                        // 現在位置を取得できない場合の処理
                            alert( "あなたの端末では、現在位置を取得できません。" ) ;
                        }
                    </script>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
