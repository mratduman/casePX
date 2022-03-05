<!DOCTYPE html>
<html lang="tr">
<head>
    <title>Projx</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @php
    /*
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    */
    @endphp
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <script type="text/javascript">
        const token = "{{csrf_token()}}";

        function examStart(id) {
            $.post("{{route('exam_start')}}", {id:id,_token:token}, function (result) {
                $("#middle_area").html(null);
                $("#middle_area").html(result);
            });
        }

        function optionSelected(examId,questionId,optionId) {
            $.post("{{route('option_selected')}}", {examId:examId,questionId:questionId,optionId:optionId,_token:token});
        }

        function finish(examId) {
            $.post("{{route('exam_finish')}}", {examId:examId,_token:token}, function (result) {
                if (result==false) {
                    alert("Yanıtlanmamış sorular var! Bütün soruları yanıtlayın.");
                }else {
                    console.log(result);
                    $("#middle_area").html(null);
                    $("#middle_area").html(result);
                }
            });
        }
    </script>
</head>
<body>

<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Murat</a>
        </div>
    </div>
</nav>
