@extends('layouts.app')

@section('header')
<script>
    function magic(){
        const max = 130000;
        const winner = Math.floor(Math.random() * Math.floor(max));
        //console.log(winner);
        const url = "http://localhost/englishDict/public/api/dictionary/";

        document.getElementById('definition').style.display = "none";
        document.getElementById('wooo').style.display = "none";

        fetch(url+winner)
        .then((resp) => resp.json())
        .then((json_resp) => {

            console.log(json_resp);
            var magicSquare = document.getElementById('magicSquare');
            var definition = document.getElementById('definition');
            var name = document.getElementById('name').value;

            if(name == ""){ name = "Carlos the Unknown"; }

            magicSquare.innerHTML = `Hi ${name}! You are now a <span style="color:red">${(json_resp.data.word).toUpperCase()}</span>`;
            definition.innerHTML = `That means:<br>${json_resp.data.definition}`;
        })
        .catch(function(error) {
            console.log(error);
            // If there is any error you will catch them here
        });
    }
    function magicOverload(){
        document.getElementById('definition').style.display = "";
        var dice = Math.random();
        if( dice < 0.25 || dice > 0.75){
            document.getElementById('wooo').style.display = "";
        }
    }
</script>
@endsection

@section('content')
<div class="container">
    <h2 class="logo">
        Surprise! You found a secret stage!
    </h2>
    <br>
    <h5 class="logo">Type in your name!</h5>
    <br>
    <div class="row justify-content-center">
        <input class="form-control" type="text" id="name">
    </div>
    <br>
    <div class="row justify-content-center">
        <input class="btn btn-primary" type="button" value="Click Me!" onclick="magic()"/>
    </div>
    <br>
    <div class="row justify-content-center">
        <h2 class="logo" id="magicSquare"></h2>
    </div>
    <br>
    <div class="row justify-content-center">
        <input class="btn btn-primary" type="button" value="Want more information? Click Me!" onclick="magicOverload()"/>
    </div>
    <br>
    <div class="row justify-content-center">
        <p style="background-color: white" class="logo" id="definition"></p>
    </div>
    <br>
    <div class="row justify-content-center">
        <h1 style="display:none;font-size:3em !important;color:red !important" class="logo" id="wooo">WOOOW!</h1>
    </div>
</div>
@endsection

@section('scripts')
@endsection
    