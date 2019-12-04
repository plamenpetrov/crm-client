<div id="slide-out" class="side-nav sn-bg-4 mdb-sidenav">
    <ul class="custom-scrollbar list-unstyled" style="max-height:100vh;">
        <a class="navbar-brand" href="#"><strong>Kantora</strong></a>
        <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-collapse collapse" id="navbarSupportedContent" style="">

        </div>
        <!-- Logo -->
        <li>
            <div class="logo-wrapper waves-light">
                <a href="#"><img src="https://mdbootstrap.com/img/logo/mdb-transparent.png" class="img-fluid flex-center"></a>
            </div>
        </li>
        <!--/Social-->
        <!--Search Form-->
        <li>
            <form class="search-form" role="search">
                <div class="form-group md-form mt-0 pt-1 waves-light">
                    <input type="text" class="form-control" placeholder="Search">
                </div>
            </form>
        </li>
        <!--/.Search Form-->
        <!-- Side navigation links -->
        <li>
            <ul class="collapsible collapsible-accordion">
                <li><a class="collapsible-header waves-effect arrow-r"><i class="fa fa-chevron-right"></i> Submit blog<i class="fa fa-angle-down rotate-icon"></i></a>
                    <div class="collapsible-body">
                        <ul>
                            <li><a href="#" class="waves-effect">Submit listing</a>
                            </li>
                            <li><a href="#" class="waves-effect">Registration form</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li><a class="collapsible-header waves-effect arrow-r"><i class="fa fa-hand-pointer-o"></i> Instruction<i class="fa fa-angle-down rotate-icon"></i></a>
                    <div class="collapsible-body">
                        <ul>
                            <li><a href="#" class="waves-effect">For bloggers</a>
                            </li>
                            <li><a href="#" class="waves-effect">For authors</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li><a class="collapsible-header waves-effect arrow-r"><i class="fa fa-eye"></i> About<i class="fa fa-angle-down rotate-icon"></i></a>
                    <div class="collapsible-body">
                        <ul>
                            <li><a href="#" class="waves-effect">Introduction</a>
                            </li>
                            <li><a href="#" class="waves-effect">Monthly meetings</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li><a class="collapsible-header waves-effect arrow-r"><i class="fa fa-envelope-o"></i> Contact me<i class="fa fa-angle-down rotate-icon"></i></a>
                    <div class="collapsible-body">
                        <ul>
                            <li><a href="#" class="waves-effect">FAQ</a>
                            </li>
                            <li><a href="#" class="waves-effect">Write a message</a>
                            </li>
                            <li><a href="#" class="waves-effect">FAQ</a>
                            </li>
                            <li><a href="#" class="waves-effect">Write a message</a>
                            </li>
                            <li><a href="#" class="waves-effect">FAQ</a>
                            </li>
                            <li><a href="#" class="waves-effect">Write a message</a>
                            </li>
                            <li><a href="#" class="waves-effect">FAQ</a>
                            </li>
                            <li><a href="#" class="waves-effect">Write a message</a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </li>
        <!--/. Side navigation links -->
    </ul>
    <div class="sidenav-bg mask-strong"></div>
</div>

<nav class="navbar fixed-top navbar-toggleable-md navbar-expand-lg scrolling-navbar double-nav top-nav-collapse">
    <a class="navbar-brand" href="#"><strong>Kantora</strong></a>
    <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="float-left">
        <a href="#" data-activates="slide-out" class="button-collapse"><i class="fa fa-bars"></i></a>
    </div>
    <!-- Breadcrumb-->
    @if(\Cache::has('leftNav'))
    {!! \Cache::get('leftNav') !!}
    @else
    <?php \Cache::put('leftNav', treeToUL(Session::get('navigation')['left'], 'left'), 10); ?>
    {!! \Cache::get('leftNav') !!}
    @endif

    <div class="collapse navbar-collapse" id="navbarSupportedContent">

        <form class="form-inline my-1">
            <div class="form-sm mt-0">
                <input class="form-control form-control-sm mr-sm-2 mb-0" type="text" placeholder="Search" aria-label="Search">
            </div>
            <button class="btn btn-outline-white btn-sm my-0" type="submit">Search</button>
        </form>

        <ul class="nav navbar-nav nav-flex-icons ml-auto">
            <!-- Dropdown -->
            <li class="nav-item dropdown notifications-nav">
                <a class="nav-link dropdown-toggle waves-effect" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="badge red">3</span> <i class="fa fa-bell"></i>
                    <span class="d-none d-md-inline-block">{!! \UI::translate('labels.choose-layout') !!}</span>
                </a>
                <div class="dropdown-menu dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
                    @if($layouts)
                    @foreach($layouts as $layout)
                    <a class="dropdown-item waves-effect waves-light" href="{!! route('changelayout', [$layout]) !!}">
                        <i class="fa fa-money mr-2" aria-hidden="true"></i>
                        <span>{!! \UI::translate('labels.' . $layout) !!}</span>
                    </a>
                    @endforeach
                    @endif

                </div>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle waves-effect" href="#" id="userDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-flag"></i> <span class="clearfix d-none d-sm-inline-block">{!! \UI::translate('labels.languages') !!}</span>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">

                    @if(Session::has('languages'))
                    @foreach(Session::get('languages') as $k=>$lang)
                    <a class="dropdown-item waves-effect waves-light" href="/lang/{!! $lang['lang'] !!}">
                        <img src="{!!asset('images/flags/'.$lang['lang'].'.png')!!}" >
                        {!! \UI::translate('labels.' . $lang['lang']) !!}
                    </a>
                    @endforeach
                    @endif

                </div>
            </li>


            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle waves-effect" href="#" id="userDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-user"></i> <span class="clearfix d-none d-sm-inline-block">{!! \UI::translate('labels.profile') !!}</span>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                    <a class="dropdown-item waves-effect waves-light" href="{!! route('profile') !!}">{!! \UI::translate('labels.profile') !!}</a>
                    <a class="dropdown-item waves-effect waves-light" href="{!! route('settings') !!}">{!! \UI::translate('labels.settings') !!}</a>
                    <a class="dropdown-item waves-effect waves-light" href="{!! route('logout') !!}">{!! \UI::translate('labels.logout') !!}</a>
                </div>
            </li>
        </ul>
    </div>
</nav>

<script>

    // SideNav Initialization
    $(".button-collapse").sideNav();

</script>
