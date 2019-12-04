@extends('layout.md')

@section('content')

<div class="row">
    <div class="col-xl-3 col-md-6 mb-4">

        <!--Card-->
        <div class="card card-cascade cascading-admin-card">

            <!--Card Data-->
            <div class="admin-up">
                <a href="{!! route('contractors') !!}">
                    <i class="fa fa-suitcase fa-5x warning-color"></i>
                </a>
                <div class="data">
                    <p>DELA</p>
                    <h4 class="font-weight-bold dark-grey-text">26</h4>
                </div>
            </div>
            <!--/.Card Data-->

            <!--Card content-->
            <div class="card-body">
                <div class="progress">
                    <div class="progress-bar red accent-2" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <!--Text-->
                <p class="card-text">Better than last week (25%)</p>
            </div>
            <!--/.Card content-->

        </div>
        <!--/.Card-->

    </div>

    <div class="col-xl-3 col-md-6 mb-4">

        <!--Card-->
        <div class="card card-cascade cascading-admin-card">

            <!--Card Data-->
            <div class="admin-up">
                <a href="{!! route('projects') !!}">
                    <i class="fa fa-list-alt fa-5x light-blue lighten-1"></i>
                </a>
                <div class="data">
                    <p>PROJECTS</p>
                    <h4 class="font-weight-bold dark-grey-text">65</h4>
                </div>
            </div>
            <!--/.Card Data-->

            <!--Card content-->
            <div class="card-body">
                <div class="progress">
                    <div class="progress-bar red accent-2" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <!--Text-->
                <p class="card-text">Better than last week (75%)</p>
            </div>
            <!--/.Card content-->

        </div>
        <!--/.Card-->

    </div>

    <div class="col-xl-3 col-md-6 mb-4">

        <!--Card-->
        <div class="card card-cascade cascading-admin-card">

            <!--Card Data-->
            <div class="admin-up">
                <a href="{!! route('contragents') !!}">
                    <i class="fa fa-building fa-5x cyan"></i>
                </a>
                <div class="data">
                    <p>CONTRAGENTS</p>
                    <h4 class="font-weight-bold dark-grey-text">10103</h4>
                </div>
            </div>
            <!--/.Card Data-->

            <!--Card content-->
            <div class="card-body">
                <div class="progress">
                    <div class="progress-bar bg-primary" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <!--Text-->
                <p class="card-text">Better than last week (25%)</p>
            </div>
            <!--/.Card content-->

        </div>
        <!--/.Card-->

    </div>


    <div class="col-xl-3 col-md-6 mb-4">

        <!--Card-->
        <div class="card card-cascade cascading-admin-card">

            <!--Card Data-->
            <div class="admin-up">
                <a href="{!! route('persons') !!}">
                    <i class="fa fa-male fa-5x red accent-2"></i>
                </a>
                <div class="data">
                    <p>PERSONS</p>
                    <h4 class="font-weight-bold dark-grey-text">10124</h4>
                </div>
            </div>
            <!--/.Card Data-->

            <!--Card content-->
            <div class="card-body">
                <div class="progress">
                    <div class="progress-bar bg-primary" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <!--Text-->
                <p class="card-text">Better than last week (25%)</p>
            </div>
            <!--/.Card content-->

        </div>
        <!--/.Card-->

    </div>


    <div class="col-xl-3 col-md-6 mb-4">

        <!--Card-->
        <div class="card card-cascade cascading-admin-card">

            <!--Card Data-->
            <div class="admin-up">
                <a href="{!! route('events') !!}">
                    <i class="fa fa-male fa-5x default-color"></i>
                </a>
                <div class="data">
                    <p>TASKS</p>
                    <h4 class="font-weight-bold dark-grey-text">215</h4>
                </div>
            </div>
            <!--/.Card Data-->

            <!--Card content-->
            <div class="card-body">
                <div class="progress">
                    <div class="progress-bar bg-primary" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <!--Text-->
                <p class="card-text">Better than last week (25%)</p>
            </div>
            <!--/.Card content-->

        </div>
        <!--/.Card-->

    </div>

    <div class="col-xl-3 col-md-6 mb-4">

        <!--Card-->
        <div class="card card-cascade cascading-admin-card">

            <!--Card Data-->
            <div class="admin-up">
                <a href="{!! route('documents') !!}">
                    <i class="fa fa-list fa-5x purple darken-2"></i>
                </a>
                <div class="data">
                    <p>DOCUMENTS</p>
                    <h4 class="font-weight-bold dark-grey-text">103</h4>
                </div>
            </div>
            <!--/.Card Data-->

            <!--Card content-->
            <div class="card-body">
                <div class="progress">
                    <div class="progress-bar bg-primary" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <!--Text-->
                <p class="card-text">Better than last week (25%)</p>
            </div>
            <!--/.Card content-->

        </div>
        <!--/.Card-->

    </div>

</div>


<div class="row">
    <div class="col-md-6">
        @include('activity.show', ['activities' => $activities])
    </div>

    <div class="col-md-6">
        <div class="card">
            <div class="card-header white-text primary-color">
                <h4 class="card-title">Notifications</h4>
            </div>
            <!-- /.panel-heading -->
            <div class="card-body">
                <div class="list-group">
                    <a href="#" class="list-group-item">
                        <i class="fa fa-comment fa-fw"></i> New Comment
                        <span class="pull-right text-muted small"><em>4 minutes ago</em>
                        </span>
                    </a>
                    <a href="#" class="list-group-item">
                        <i class="fa fa-twitter fa-fw"></i> 3 New Followers
                        <span class="pull-right text-muted small"><em>12 minutes ago</em>
                        </span>
                    </a>
                    <a href="#" class="list-group-item">
                        <i class="fa fa-envelope fa-fw"></i> Message Sent
                        <span class="pull-right text-muted small"><em>27 minutes ago</em>
                        </span>
                    </a>
                    <a href="#" class="list-group-item">
                        <i class="fa fa-tasks fa-fw"></i> New Task
                        <span class="pull-right text-muted small"><em>43 minutes ago</em>
                        </span>
                    </a>
                    <a href="#" class="list-group-item">
                        <i class="fa fa-upload fa-fw"></i> Server Rebooted
                        <span class="pull-right text-muted small"><em>11:32 AM</em>
                        </span>
                    </a>
                    <a href="#" class="list-group-item">
                        <i class="fa fa-bolt fa-fw"></i> Server Crashed!
                        <span class="pull-right text-muted small"><em>11:13 AM</em>
                        </span>
                    </a>
                    <a href="#" class="list-group-item">
                        <i class="fa fa-warning fa-fw"></i> Server Not Responding
                        <span class="pull-right text-muted small"><em>10:57 AM</em>
                        </span>
                    </a>
                    <a href="#" class="list-group-item">
                        <i class="fa fa-shopping-cart fa-fw"></i> New Order Placed
                        <span class="pull-right text-muted small"><em>9:49 AM</em>
                        </span>
                    </a>
                    <a href="#" class="list-group-item">
                        <i class="fa fa-money fa-fw"></i> Payment Received
                        <span class="pull-right text-muted small"><em>Yesterday</em>
                        </span>
                    </a>
                </div>
                <!-- /.list-group -->
                <a href="#" class="btn btn-default btn-block">View All Alerts</a>
            </div>
            <!-- /.panel-body -->
        </div>
    </div>
</div>

<style>
    .huge {
        font-size: 40px;
    }

</style>
@stop