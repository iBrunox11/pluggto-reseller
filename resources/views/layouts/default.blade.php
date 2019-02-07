
<!DOCTYPE html>
<html ng-app="pluggtoAdmin">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="Robots" content="index,no-follow">
        <title>Reseller Admin - @yield('title')</title>
        <link rel="stylesheet" href="{{ URL::asset('css/pluggtoadmin.css?v=6.0') }}">
        <link rel="stylesheet" href="{{ URL::asset('css/mediaqueries.css?v=6.0') }}">
        <link rel="stylesheet" href="{{ URL::asset('semantic/semantic.min.css') }}">
    	<link rel="icon" href="{{ URL::asset('favicon.ico?v=1.0') }}" />
    </head>
    <body>
    
        <!-- <div class="pusher">
            @if(Auth::check())
            <div class="ui three item menu">
            <a class="active item">Editorials</a>
            <a class="item">Reviews</a>
            <a class="item">Upcoming Events</a>
            </div>
            @endif
            <div class="ui basic segment content-div">
                <div id="global-loading" ng-class="{active: loading}" class="ui inverted dimmer">
                    <div class="ui large text loader">Carregando ...</div>
                </div>
                <div>
                    @yield('content')
                </div>
            </div>
        </div> -->
        
        <!-- JavaScript -->        
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="{{ URL::asset('semantic/semantic.min.js') }}"></script>
        <script src="{{ URL::asset('js/jquery-mask.js') }}"></script>
        <script src="{{ URL::asset('js/alasql.min.js') }}"></script>
        <script src="{{ URL::asset('js/xlsx.core.min.js') }}"></script>
        
        <!-- Default -->
        <script src="{{ URL::asset('js/pluggtoadmin.js?v=7.0') }}"></script>

        <!-- Angular -->
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.1/angular.min.js"></script>
        <script src="{{ URL::asset('js/infinite-scroll.min.js') }}"></script>
        <script src="{{ URL::asset('js/angular/app.js?v=2.0') }}"></script>
    
        <!-- Controllers -->
        <script src="{{ URL::asset('js/angular/messageService.js?v=7.0') }}"></script>
        <script src="{{ URL::asset('js/angular/modalService.js?v=7.0') }}"></script>
        <script src="{{ URL::asset('js/angular/usersController.js?v=7.0') }}"></script>
        <script src="{{ URL::asset('js/angular/pricingsController.js?v=7.0') }}"></script>
        <script src="{{ URL::asset('js/angular/paymentsController.js?v=7.0') }}"></script>
        <script src="{{ URL::asset('js/angular/npsController.js?v=7.0') }}"></script>
        <script src="{{ URL::asset('js/angular/proposalsController.js?v=7.0') }}"></script>
    </body>

    <script>
        $(document).ready(function(){
            $('.semantic-message').insertBefore('.content-div');
        });
    </script>
</html>
