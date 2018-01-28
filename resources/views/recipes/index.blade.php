<html>
<head>
    {{--<title>{{ config('recipe.title') }}</title>--}}
    <title>Get Cooking</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css"
          rel="stylesheet">
    <!-- JS -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.2.8/angular.min.js"></script> <!-- load angular -->

    <!-- ANGULAR -->
    <!-- all angular resources will be loaded from the /public folder -->
    <script src="js/controllers/mainCtrl.js"></script> <!-- load our controller -->
    <script src="js/services/commentService.js"></script> <!-- load our service -->
    <script src="js/app.js"></script> <!-- load our application -->

</head>
<body>
<div class="container">
{{--    <h1>{{ config('recipe.title') }}</h1>--}}
    <h1>Get Cooking</h1>
    <h5>Page {{ $recipes->currentPage() }} of {{ $recipes->lastPage() }}</h5>
    <hr>
    <ul>
        @foreach ($recipes as $post)
            <li>
                <a href="/recipes/{{ $post->slug }}">{{ $post->title }}</a>
                <em>({{ $post->created_at->format('M jS Y g:ia') }})</em>
                <p>
                    {{ str_limit($post->body) }}
                </p>
            </li>
        @endforeach
    </ul>
    <hr>
    {!! $recipes->render() !!}
</div>
</body>
</html>