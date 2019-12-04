<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

        <link rel="shortcut icon" type="image/ico" href="/images/favicon.ico">

        <script src="{!! asset('js/jquery-2.1.3.min.js') !!}" type="text/javascript"></script>
        <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
        <!--<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js" type="text/javascript"></script>-->

        <script src="{!! asset('js/jquery-ui.min.js') !!}" type="text/javascript"></script>
        <script src="{!! asset('js/bootstrap.min.js') !!}"></script>
        <script src="{!! asset('js/messaging/jquery.bootstrap-growl.min.js') !!}" type="text/javascript"></script>
        <script src="{!! asset('js/datatables/jquery.dataTables.min.js') !!}"></script>
        
        <script src="{!! asset('js/fullcalendar/moment.min.js') !!}"></script>
        <script src="{!! asset('js/fullcalendar/fullcalendar.min.js') !!}"></script>
        <script src="{!! asset('js/fullcalendar/gcal.min.js') !!}" type="text/javascript"></script>
        <script src="{!! asset('js/validator.min.js') !!}" type="text/javascript"></script>
        <script src="{!! asset('js/select2/select2.min.js') !!}" type="text/javascript"></script>
        
        <link href="{!! asset('css/bootstrap.min.css') !!}" rel="stylesheet">
        <link href='{!! asset("css/bootswatch/bootswatch-$bootswatch.css") !!}' rel="stylesheet" />
        
        <link href="{!! asset('css/jquery.dataTables.min.css') !!}" rel="stylesheet">
        
        <link href="{!! asset('css/fullcalendar/fullcalendar.min.css') !!}" rel="stylesheet">
        <link href="{!! asset('css/fullcalendar/fullcalendar.print.min.css') !!}" media="print" rel="stylesheet">
        <link href="{!! asset('css/fontawesome/fontawesome-all.min.css') !!}" rel="stylesheet">
        <link href="{!! asset('css/select2/select2.min.css') !!}" rel="stylesheet">
        
        <link href="{!! asset('css/custom.css') !!}" rel="stylesheet">
        <link href="{!! asset('css/style.css') !!}" rel="stylesheet">
    </head>
    <body>
        @if(Session::has('cookieString'))
            @include('layout.partials.navigation')
            <div class="breadcrumb col-lg-12">
                <div class="col-lg-8"><h2>{!! Breadcrumbs::renderIfExists() !!}</h2></div>
                <div class="col-lg-4">
                    <form action="#" method="get" class="searchForm">
                        <div class="input-group">
                            <input type="text" name="q" class="form-control" placeholder="Search...">
                            <span class="input-group-btn">
                                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
                            </span>
                        </div>
                    </form>
                </div>
            </div>
        @endif
        @include ('partials.messaging')
        <div class="wrap" style="margin: 60px 15px 0 15px">
            <div class="row">
                <div class="col-lg-12">
                    @yield('content')
                </div>
            </div>  
            <div class="clearfix"></div>
        </div>
        <div class="footer">
        </div>
        @if (Session::has('cookieString'))
        @include('js/initjs')
        @endif
    </body>
</html>
