
<footer class="container-fluid text-center">
    @foreach($social_networks as $network)
        <a href="{{$network->url}}" target="_blank" class="icon_link">
            <i class="{{$network->icon}}" style="font-size:24px"></i>
        </a>
    @endforeach
</footer>

</body>
</html>
