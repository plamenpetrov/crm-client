@extends('layout.md')

@section('content')

<!-- START MODAL -->
<!-- Modal contragents relation -->
<div class="modal fade" id="contragent-relation-modal" role="dialog" aria-labelledby="contragent-relation-modalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="contragent-relation-modalLabel">{!! UI::translate('contragents.contragent-create-relations') !!}</h4>
            </div>
            <div class="modal-body">
                {!! Form::open(['url' => URL::route('contragent_relation'), 'method' => 'post', 'id' => 'form-contragent-relation', 'data-toggle' => 'validator', 'role' => 'form']) !!}
                <select class="search-contragent" class="form-control input-lg" name="relationid" style="width: 100%"></select>
                <input type="hidden" name="contragentid" value="{!! $contragent['id'] !!}" />
                {!! Form::close() !!}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">{!! UI::translate('labels.discard') !!}</button>
                <button type="button" id="save-contragent-relation" class="btn btn-primary">{!! UI::translate('labels.save') !!}</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="delete-contragent-relation-modal" role="dialog" aria-labelledby="delete-contragent-relation-modalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="contragent-relation-modalLabel">{!! UI::translate('contragents.contragent-delete-relations') !!}</h4>
            </div>
            <div class="modal-body">
                <p>{!! UI::translate('contragents.contragent-delete-relations-confirm') !!}</p>

                {!! Form::open(['url' => URL::route('contragent_relation_delete'), 'id' => 'form-delete-contragent-relation', 'data-toggle' => 'validator', 'role' => 'form']) !!}

                {!! method_field('DELETE') !!}
                {!! Form::hidden('contragentid', null, ['id' => 'contragentid']); !!}
                {!! Form::hidden('relationid', null, ['id' => 'relationid']); !!}

                {!! Form::close() !!}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">{!! UI::translate('labels.discard') !!}</button>
                <button type="button" id="button-delete-contragent-relation" class="btn btn-primary">{!! UI::translate('labels.save') !!}</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal person relation -->

<div class="modal fade" id="contragent-person-modal" role="dialog" aria-labelledby="contragent-person-modalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="contragent-person-modalLabel">{!! UI::translate('contragents.contragent-create-person') !!}</h4>
            </div>
            <div class="modal-body">
                {!! Form::open(['url' => URL::route('contragent_person'), 'method' => 'post', 'id' => 'form-contragent-person', 'data-toggle' => 'validator', 'role' => 'form']) !!}
                <select class="search-person" class="form-control input-lg" name="personid" style="width: 100%"></select>
                <input type="hidden" name="contragentid" value="{!! $contragent['id'] !!}" />
                {!! Form::close() !!}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">{!! UI::translate('labels.discard') !!}</button>
                <button type="button" id="save-contragent-person" class="btn btn-primary">{!! UI::translate('labels.save') !!}</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="delete-contragent-person-modal" role="dialog" aria-labelledby="delete-contragent-person-modalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="contragent-person-modalLabel">{!! UI::translate('contragents.contragent-delete-person') !!}</h4>
            </div>
            <div class="modal-body">
                <p>{!! UI::translate('contragents.contragent-delete-person-confirm') !!}</p>

                {!! Form::open(['url' => URL::route('contragent_person_delete'), 'id' => 'form-delete-contragent-person', 'data-toggle' => 'validator', 'role' => 'form']) !!}

                {!! method_field('DELETE') !!}
                {!! Form::hidden('contragentid', null, ['id' => 'contragentid']); !!}
                {!! Form::hidden('personid', null, ['id' => 'personid']); !!}

                {!! Form::close() !!}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">{!! UI::translate('labels.discard') !!}</button>
                <button type="button" id="button-delete-contragent-person" class="btn btn-primary">{!! UI::translate('labels.save') !!}</button>
            </div>
        </div>
    </div>
</div>

<!--Modal: Name-->
<div class="modal fade" id="modalMap" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">

        <!--Content-->
        <div class="modal-content">

            <!--Body-->
            <div class="modal-body mb-0 p-0">

                <!--Google map-->
                <div id="map-container" class="z-depth-1-half" style="height: 400px"></div>

            </div>

            <!--Footer-->
            <div class="modal-footer justify-content-center">

                <!--<button type="button" class="btn btn-info btn-md">Save location <i class="fa fa-map-marker ml-1"></i></button>-->
                <button type="button" class="btn btn-outline-info btn-md" data-dismiss="modal">Close <i class="fa fa-times ml-1"></i></button>

            </div>

        </div>
        <!--/.Content-->

    </div>
</div>

<!-- END MODALS -->

<section>
<a class="btn btn-warning btn-sm" href="{!! route('contragent_edit', $contragent['id']) !!}" />
    <i class="fa fa-edit"></i>{!! UI::translate('labels.edit') !!}
</a>

<a class="btn btn-primary btn-sm" href="javascript: window.print();" />
    <i class="fa fa-print"></i>{!! UI::translate('labels.print') !!}
</a>

<hr>
</section>

<section>
    <div class="tabs-wrapper">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs nav-justified info-color-dark" role="tablist">
            <li role="presentation" class="nav-item active">
                <a href="#home" aria-controls="home" role="tab" data-toggle="tab" class="nav-link active">
                    <span class="fa fa-home"></span>
                    <span class="d-none d-sm-block">
                        {!! $contragent['contragentname'] !!}
                    </span>
                </a>
            </li>

            <li role="presentation" class="nav-item">
                <a href="#contragents-relations" aria-controls="contragents-relations" role="tab" data-toggle="tab" class="nav-link">
                    <span class="fa fa-object-group"></span>
                    <span class="d-none d-sm-block">
                        {!! UI::translate('contragents.contragent-relations') !!}
                    </span>
                    <span class="badge red">
                        @if (count($contragents_relation_count) > 0)
                            {!! count($contragents_relation_count) !!}
                        @else
                            0
                        @endif
                    </span>
                </a>
            </li>
            <li role="presentation" class="nav-item">
                <a href="#contragents-persons" aria-controls="contragents-persons" role="tab" data-toggle="tab" class="nav-link">
                    <span class="fa fa-users"></span>
                    <span class="d-none d-sm-block">
                        {!! UI::translate('contragents.contragent-persons') !!}
                    </span>
                    <span class="badge red">
                        @if (count($persons) > 0)
                            {!! count($persons) !!}
                        @else
                            0
                        @endif
                    </span>
                </a>
            </li>
            <li role="presentation" class="nav-item">
                <a href="#contragents-history" aria-controls="contragents-history" role="tab" data-toggle="tab" class="nav-link">
                    <span class="fa fa-users"></span>
                     <span class="d-none d-sm-block">{!! UI::translate('contragents.show-contragent-changes') !!}</span>
                </a>
            </li>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content card">
            <div role="tabpanel" class="tab-pane active" id="home">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <!--Card-->
                            <div class="">
                                <!--Name-->
                                <div class="text-center">
                                    <h3 class="mb-3 font-weight-bold"><strong>{!! $contragent['contragentname'] !!} {!! $contragent['contragentorganizationtype']['type'] !!}</strong></h3>
                                    <h6 class="font-weight-bold blue-text mb-4">{!! $contragent['contragenttype']['type'] !!}</h6>

                                </div>

                                <ul class="striped list-unstyled">
                                    <li>
                                        <i class="fa fa-id-card fa-lg"></i>
                                        <strong>{!! UI::translate('contragents.contragent-EIK') !!}:</strong>
                                        {!! $contragent['contragentEIK'] !!}
                                    </li>

                                    <li>
                                        <i class="fa fa-id-card fa-lg"></i> 
                                        <strong>{!! UI::translate('contragents.contragent-DanNom') !!}</strong>
                                        {!! $contragent['contragentDanNom'] !!}
                                    </li>

                                    <li>
                                        <i class="fa fa-map fa-fw fa-lg"></i> 
                                        <strong>{!! UI::translate('contragents.contragent-contact-address') !!}</strong>
                                        <a href="#" type="button" class="" data-toggle="modal" data-target="#modalMap">
                                            <span id="address">{!! $contragent['contragentcontactaddress'] !!}</span>
                                            <i class="fa fa-map-marker fa-fw fa-lg"></i> 
                                        </a>
                                    </li>
                                    <li></li>
                                </ul>

                            </div>

                            <div class="row text-center">
                                <div class="col-4 col-sm-4 col-lg-4">
                                    <a class="btn-floating primary-color waves-effect waves-light"><i class="fa fa-map-marker"></i></a>
                                    <p>{!! $contragent['contragentregistrationaddress'] !!}</p>
                                    <!--<p>United States</p>-->
                                </div>

                                <div class="col-4 col-sm-4 col-lg-4">
                                    <a class="btn-floating primary-color waves-effect waves-light"><i class="fa fa-phone"></i></a>
                                    <p>{!! $contragent['contragentphone'] !!}</p>
                                </div>

                                <div class="col-4 col-sm-4 col-lg-4">
                                    <a class="btn-floating primary-color waves-effect waves-light"><i class="fa fa-envelope"></i></a>
                                    <p><a href="mailto:{!! $contragent['contragentemail'] !!}">{!! $contragent['contragentemail'] !!}</a></p>
                                    <!--<p>sale@gmail.com</p>-->
                                </div>
                            </div>

                            <div class="">
                                <p>
                                    <em>
                                        {!! UI::translate('labels.createdby') !!}: {!! $contragent['createdby'] !!}
                                        {!! UI::translate('labels.createdat') !!}: {!! diffForHumman($contragent['createdat']) !!}
                                    </em>
                                </p>

                                <p>
                                    <em>
                                        {!! UI::translate('labels.updatedby') !!}: {!! $contragent['updatedby'] !!}
                                        {!! UI::translate('labels.updatedat') !!}: {!! diffForHumman($contragent['updatedat']) !!}
                                    </em>
                                </p>
                            </div>
                        </div>
                        <!--Card-->

                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <table class="table no-header">
                                <tbody>
                                    <tr>
                                        <td>
                                            <i class="fa fa-link fa-lg"></i>
                                            <h2>{!! UI::translate('contragents.contragent-relations') !!}</h2>
                                        </td>
                                        <td>
                                            @if (count($contragents_relation) > 0)
                                                {!! count($contragents_relation) !!}
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <i class="fa fa-link fa-lg"></i>
                                            {!! UI::translate('contragents.contragent-persons') !!}
                                        </td>
                                        <td>
                                            @if (count($persons) > 0)
                                                {!! count($persons) !!}
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <i class="fa fa-suitcase fa-lg"></i>
                                            {!! UI::translate('contragents.contragent-contractors') !!}
                                        </td>
                                        <td>
                                            2
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <i class="fa fa-list-alt fa-lg"></i>
                                            {!! UI::translate('contragents.contragent-projects') !!}
                                        </td>
                                        <td>
                                            3
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                    </div>
                </div>
            </div>

            <div role="tabpanel" class="tab-pane" id="contragents-relations">
                <div class="row">
                    <section>
                        <button href="#" class="btn btn-success form-control ml-3" data-toggle="modal" data-target="#contragent-relation-modal">
                            <i class="fa fa-plus"></i> {!! UI::translate('contragents.contragent-create-relations') !!}
                        </button>
                    </section>
                </div>

                <div class="row">
                    @forelse($contragents_relation as $relType => $relationType)
                        <div class="col-lg-12">
                            <div class="card mb-2 d-flex">
                                <div class="card-header" style="background-color: {!! $relationType[0]['type']['color']['color'] !!};">
                                    <h4 class="h4-responsive mb-0 white-text">{!! $relType !!}</h4>
                                </div>

                                @foreach($relationType as $relation)
                                    <div class="card-body ml-1 mb-2">
                                        <!--Dropdown primary-->
                                        <div class="dropdown float-right">

                                            <!--Trigger-->
                                            <button class="btn btn-primary btn-sm dropdown-toggle pull-right" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="caret"></i>
                                            </button>

                                            <!--Menu-->
                                            <div class="dropdown-menu dropdown-primary">
                                                <a href="#" 
                                                   data-uri="{!! route('contragent_relation_delete') !!}" 
                                                   contragent-id="{!! $contragent['id'] !!}" 
                                                   contragent-relation-id="{!! $relation['id'] !!}" 
                                                   data-toggle="modal" 
                                                   data-target="#delete-contragent-relation-modal"
                                                   class="dropdown-item delete-contragent-relation">
                                                    <i class="fa fa-trash-alt"></i>
                                                    {!! UI::translate('labels.delete') !!}
                                                </a>
                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item" href="#">Separated link</a>
                                            </div>
                                        </div>
                                        <!--/Dropdown primary-->

                                        <!--<div class="clear"></div>-->
                                        <h4 class="card-title">{!! $relation['name'] !!} {!! $relation['organizationtype']['translatable']['name'] !!}</h4>
                                        <h6 class="card-subtitle mb-2 text-muted">{!! $relation['type']['translatable']['name'] !!} </h6>
                                        <p class="card-text">{!! $relation['EIK'] !!} </p>
                                        <p class="card-text"><i>{!! $relation['contact_address'] !!}</i></p>
                                        <p class="card-text">{!! $relation['phone'] !!} </p>
                                        <a href="{!! route('contragent_show', $relation['id']) !!}" class="link-text">
                                            <h5>
                                                {!! UI::translate('labels.show') !!}
                                                <i class="fa fa-chevron-right"></i>
                                            </h5> 
                                        </a>
                                    </div>

                                    <hr>
                                @endforeach
                            </div>
                        </div>
                    @empty
                        <p>{!! UI::translate('labels.no-relations') !!}</p>
                    @endforelse
                </div>
            </div>

            <div role="tabpanel" class="tab-pane fade" id="contragents-persons">
                <div class="row">
                    <div class="panel">
                        <button href="#" class="btn btn-success form-control ml-3" data-toggle="modal" data-target="#contragent-person-modal">
                            <i class="fa fa-plus"></i> {!! UI::translate('contragents.contragent-create-person') !!}
                        </button>
                    </div>
                </div>

                <div class="row">
                    @foreach($persons as $person)
                    <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 blockquote-reverse">
                        <div class="card ml-1 mb-2">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="card-body">
                                        <!--Dropdown primary-->
                                        <div class="dropdown float-right">

                                            <!--Trigger-->
                                            <button class="btn btn-primary btn-sm dropdown-toggle pull-right" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="caret"></i>
                                            </button>

                                            <!--Menu-->
                                            <div class="dropdown-menu dropdown-primary">
                                                <a href="#" 
                                                   data-uri="{!! route('contragent_person_delete') !!}" 
                                                   contragent-id="{!! $contragent['id'] !!}" 
                                                   contragent-person-id="{!! $person['id'] !!}" 
                                                   data-toggle="modal" 
                                                   data-target="#delete-contragent-person-modal"
                                                   class="dropdown-item delete-contragent-person">
                                                    <i class="fa fa-trash-alt"></i>
                                                    {!! UI::translate('labels.delete') !!}
                                                </a>
                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item" href="#">Separated link</a>
                                            </div>
                                        </div>
                                        <!--/Dropdown primary-->

                                        <!--<div class="clear"></div>-->
                                        <h4 class="card-title">{!! $person['first_name'] !!} {!! $person['family_name'] !!}</h4>
                                        <h6 class="card-subtitle mb-2 text-muted"><i>{!! $person['address_idcard'] !!}</i></h6>
                                        <p class="card-text">{!! $person['phone'] !!} </p>
                                        <a href="{!! route('person_show', $person['id']) !!}" class="card-link">{!! UI::translate('labels.show') !!}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
            <div role="tabpanel" class="tab-pane fade" id="contragents-history">
                <div class="row">
                    <!--Panel-->
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div id="contragent-history-container">
                                    <div id="contragent-history-result">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>         
            
            
            


<style>
    #map {
        height: 400px;
        width: 100%;
    }
</style>

<script>
    var geocoder;
    var map;
    var address = $('#address').html();

    $('#modalMap').on('shown.bs.modal', function () {
        google.maps.event.trigger(map, "resize");
    });

    function initMap() {
        var map = new google.maps.Map(document.getElementById('map-container'), {
            zoom: 18,
            center: {lat: -34.397, lng: 150.644}
        });
        geocoder = new google.maps.Geocoder();
        codeAddress(geocoder, map);
    }

    function codeAddress(geocoder, map) {
        geocoder.geocode({'address': address}, function (results, status) {
            if (status === 'OK') {
                map.setCenter(results[0].geometry.location);
                var marker = new google.maps.Marker({
                    map: map,
                    position: results[0].geometry.location
                });
            } else {
                navigator.geolocation.getCurrentPosition(function (loc) {
                    var lat = loc.coords.latitude;
                    var lon = loc.coords.longitude;


                    var map = new google.maps.Map(document.getElementById('map-container'), {
                        zoom: 18,
                        center: {lat: -34.397, lng: 150.644}
                    });
                    geocoder = new google.maps.Geocoder();
                    codeAddress(geocoder, map);

                }, function (error) {
                    switch (error.code) {
                        case error.PERMISSION_DENIED:
                            //		            alert("User denied the request for Geolocation.");
                            break;
                        case error.POSITION_UNAVAILABLE:
                            //		        	alert("Location information is unavailable.");
                            break;
                        case error.TIMEOUT:
                            //		        	alert("The request to get user location timed out.");
                            break;
                        case error.UNKNOWN_ERROR:
                            //		        	alert("An unknown error occurred.");
                            break;
                    }
                }, {timeout: 10000});

                //            alert('Geocode was not successful for the following reason: ' + status);
            }
        });

        $(document).ready(function () {
            //CONTRAGENTS RELATION MODAL
            $(document).on("click", "#save-contragent-relation", function () {
                $('form#form-contragent-relation').submit();
            });

            $(document).on("click", "#button-delete-contragent-relation", function () {
                $('form#form-delete-contragent-relation').submit();
            });

            $(document).on("click", "a.delete-contragent-relation", function () {
                var contragentid = $(this).attr('contragent-id');
                var relationid = $(this).attr('contragent-relation-id');

                $("#delete-contragent-relation-modal .modal-body #contragentid").val(contragentid);
                $("#delete-contragent-relation-modal .modal-body #relationid").val(relationid);
            });

            //CONTRAGENT PERSON MODAL
            $(document).on("click", "#save-contragent-person", function () {
                $('form#form-contragent-person').submit();
            });

            $(document).on("click", "#button-delete-contragent-person", function () {
                $('form#form-delete-contragent-person').submit();
            });

            $(document).on("click", "a.delete-contragent-person", function () {
                var contragentid = $(this).attr('contragent-id');
                var personid = $(this).attr('contragent-person-id');

                $("#delete-contragent-person-modal .modal-body #contragentid").val(contragentid);
                $("#delete-contragent-person-modal .modal-body #personid").val(personid);
            });

            $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
                var target = $(e.target).attr("href");
                if ((target == '#contragents-history')) {
                    var url = '{!! route('contragent_history', [$id]) !!}';
                    $.ajax({
                        url: url
                    }).done(function (data) {
                        $('div#contragent-history-result').html(data);
                    }).fail(function () {
                        alert('Activities could not be loaded.');
                    });
                }
            });

        });
    }

</script>

<script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCxxs6J0lPCKJol3zGwDFH_QLkr-l51h9c&callback=initMap">
</script>

@stop