<div class="container-fluid text-center">
    <div class="row content">
        <div class="col-sm-2 sidenav" id="myNavbar">
            <p>
                <form method="post" action="{{route('search')}}">
                    @csrf
                    <input type="text" class="form-control" name="search" placeholder="Sınav arayın" required />
                </form>
            </p>
            @foreach($exams as $exam)
                <p>
                    <a onclick="examStart({{$exam->id}})">
                        <img src="{{$exam->image_url}}" class="image_list" />
                        {{$exam->title}}
                    </a>
                    <br />
                    {{$exam->description}}
                </p>
                <hr /><br />
            @endforeach
        </div>
        <div class="col-sm-8 text-left" id="middle_area">
