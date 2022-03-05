@extends('layouts.master')

@section('content')

    <div class="row">
        <div class="content">
            <div class="slideshow-container">
                @foreach($exams as $exam)
                <div class="mySlides">
                    <img src="{{asset($exam->image_url)}}" onclick="examStart({{$exam->id}})" style="width:100%">
                    <div class="text" onclick="examStart({{$exam->id}})">{{$exam->title}}</div>
                </div>
                @endforeach

                <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                <a class="next" onclick="plusSlides(1)">&#10095;</a>

            </div>
            <br>

            <div style="text-align:center">
                <?php
                    foreach ($exams as $exam) {
                        echo '<span class="dot" onclick="currentSlide(1)"></span>';
                    }
                ?>
            </div>
        </div>
    </div>

    <script src="{{asset('js/slider.js')}}"></script>
@endsection
