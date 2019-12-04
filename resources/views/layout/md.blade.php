<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>{!! Config::get('app.name') !!}</title>
        <!-- Font Awesome -->
        <link rel="stylesheet" href="/css/fontawesome/fontawesome-all.min.css">
        <!-- Bootstrap core CSS -->
        <link href="/MDB/css/bootstrap.min.css" rel="stylesheet">
        <!-- Material Design Bootstrap -->
        <link href="/MDB/css/mdb.min.css" rel="stylesheet">
        <!-- Your custom styles (optional) -->
        <link href="{!! asset('css/select2/select2.min.css') !!}" rel="stylesheet">
        <link href="{!! asset('css/select2/select2.md.css') !!}" rel="stylesheet">
        <link href="{!! asset('css/select2/select2-bootstrap.min.css') !!}" rel="stylesheet">
        <link href="/MDB/css/style.css" rel="stylesheet">
        
    </head>

    <body class="hidden-sn mdb-skin">

        <!-- SCRIPTS -->
        <!-- JQuery -->
        <script type="text/javascript" src="/MDB/js/jquery-3.2.1.min.js"></script>
        <!-- Bootstrap tooltips -->
        <script src="{!! asset('js/messaging/jquery.bootstrap-growl.min.js') !!}" type="text/javascript"></script>
        <script type="text/javascript" src="/MDB/js/popper.min.js"></script>
        <!-- Bootstrap core JavaScript -->
        <script type="text/javascript" src="/MDB/js/bootstrap.min.js"></script>
        <!-- MDB core JavaScript -->
        <script type="text/javascript" src="/MDB/js/mdb.min.js"></script>
        <script src="{!! asset('js/select2/select2.min.js') !!}" type="text/javascript"></script>

        <script src="https://js.pusher.com/4.1/pusher.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
        
        @if (Session::has('cookieString'))
        <!--Main Navigation-->
        <header>
            @include('layout.partials.navigation')
        </header>
        <!--Main Navigation-->
        @endif
        @include ('partials.messaging')
        <!--Main Layout-->
        <main>
            {!! Breadcrumbs::renderIfExists() !!}
            <div class="container-fluid">
                @yield('content')
            </div>
        </main>
        <!--Main Layout-->

        <!-- /Start your project here-->

        <script>
            // Enable pusher logging - don't include this in production
            Pusher.logToConsole = true;

            var pusher = new Pusher('184a574f8c7b7f460348', {
              cluster: 'eu',
              encrypted: true
            });

            var channel = pusher.subscribe('events');
            channel.bind('App\\Events\\EventCreated', function(data) {
                $.bootstrapGrowl(data.event.event.name, {
                    ele: 'body', // which element to append to
                    type: 'success', // (null, 'info', 'danger', 'success')
                    offset: {from: 'top', amount: 40}, // 'top', or 'bottom'
                    align: 'right', // ('left', 'right', or 'center')
                    width: 'auto', // (integer, or 'auto')
                    delay: 8000, // Time while the message will be displayed. It's not equivalent to the *demo* timeOut!
                    stackup_spacing: 10 // spacing between consecutively stacked growls.
                });
            });
//            
//            var callback = function(data) {
//                console.dir(data);
//                // add comment into page
//            };
//
//
//            pusher.bind('App\\Events\\EventCreated', callback);
        </script>

        @if (Session::has('cookieString'))
        @include('js/initjs')
        @endif
    </body>

</html>
