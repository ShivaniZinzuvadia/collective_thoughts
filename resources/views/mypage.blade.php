<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Collective Thoughts</title>
    <!-- Styles -->
    <link rel="stylesheet" type="text/css" href="{{ asset('public/css/bootstrap.min.css') }}">
    <link href="{{ asset('public/vendors/bootstrapvalidator/css/bootstrapValidator.min.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <style>
        .carousel-item {
            height: 550px;
        }

        .carousel-item img {
            position: absolute;
            top: 0;
            left: 0;
            min-height: 550px;
            opacity: 0.6;
        }

        .carousel-caption {
            top: 50%;
            transform: translateY(-50%);
            bottom: initial;
        }

        .carousel-caption h3,
        .carousel-caption p {
            font-weight: bold;
            color: black
        }
    </style>
</head>

<body>
    <div class="contaier">

        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                @for($count=0; $count<$thoughtCount; $count++) <li data-target="#carouselExampleIndicators" data-slide-to="{{$count+1}}" class="active">
                    </li>
                    @endfor
            </ol>
            <div class="carousel-inner">
                @for($t=0; $t<$thoughtCount; $t++) <div class="carousel-item @if($t==0) active @endif">
                    <img class="d-block w-100" src="{{asset($thoughts[$t]['image'])}}" alt="{{$thoughts[$t]['title']}}">
                    <div class="carousel-caption d-none d-md-block">
                        <h3>{{$thoughts[$t]['thought']}}</h3>
                        <p>-{{$thoughts[$t]['said_by']}}</p>
                    </div>
            </div>
            @endfor
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    </div>
    <!-- Scripts -->
    <script src="{{ asset('public/js/jquery.min.js') }}" type="text/javascript"></script>
    <script type="text/javascript" src="{{ asset('public/vendors/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('public/js/app.js') }}"></script>
</body>

</html>
