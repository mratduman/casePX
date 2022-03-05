@extends('layouts.master')

@section('content')
    <h1>Sınavlar</h1>

    <div class="content">
        @foreach($exams as $exam)
            <div class="row">
                <img src="{{$exam->image_url}}" title="{{$exam->title}}" class="image_list" />
                <p>
                    <label>{{$exam->title}}</label> <br />
                    {{$exam->description}}...

                    <button onclick="examStart({{$exam->id}})" class="btn btn-success btn-xs">
                        Sınava Başla
                    </button>
                </p>
            </div>
            <hr />
        @endforeach
    </div>
@endsection
