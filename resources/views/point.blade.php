<div class="content">
    <?php
    $examSession = \Illuminate\Support\Facades\Session::get("$examId");
    $title = $examSession["title"];
    $point = $examSession["point"];
    ?>

    <h4>{{$title}}</h4>

    <h5>Aldığınız puan: <i class="text-danger">{{$point}}</i></h5>

</div>
