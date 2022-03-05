        </div>
        <div class="col-sm-2 sidenav">
            <div class="well">
                @foreach($articles as $article)
                    <p>
                        <b>{{$article->title}}</b><br />
                        {{$article->article}}
                    </p>
                @endforeach
            </div>
        </div>
    </div>
</div>
