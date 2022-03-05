<div class="content">

    <?php
        $examSession = \Illuminate\Support\Facades\Session::get("$examId");
        $title = $examSession["title"];
        $image_url = $examSession["image_url"];
        $questions = $examSession["questions"];
    ?>

    <div class="row">
        <h4>{{$title}}</h4>
        <img src="{{asset($image_url)}}" class="image_list" />
    </div>

    @foreach($questions as $question)
        @if(isset($question["id"]))
            <div class="row">
            <p><b>Soru:</b> {{$question["question"]}}</p>
            @foreach($questions[$question["id"]]["options"] as $option)
                <input type="radio" name="option[{{$question["id"]}}]" onclick="optionSelected({{$examId}},{{$question["id"]}},{{$option['id']}})" required>
                <label for="option[{{$question['id']}}]">{{$option["option"]}}</label>
                <br />
            @endforeach
            </div>
            <hr />
        @endif
    @endforeach
        <div class="row">
            <button type="button" class="btn btn-success" onclick="finish({{$examId}})">Sınavı Bitir</button>
        </div><br /><br /><br />
</div>
