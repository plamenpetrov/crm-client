@extends('layout.md')

@section('content')


<h1><i class="fa fas fa-male fa-lg"></i> &nbsp; {!! $person['first_name'] !!} {!! $person['family_name'] !!}</h1>
<div class="col-md-6">
    <ul class="list-group">

        <li class="list-group-item">
            <h4>
                <i class="fa fa-envelope fa-lg"></i> 
                <strong>{!! UI::translate('persons.person-email') !!}</strong>
                <a href="mailto:{!! $person['email'] !!}">{!! $person['email'] !!}</a>
            </h4>
        </li>

        <li class="list-group-item">
            <h4>
                <i class="fa fa-phone fa-lg"></i> 
                <strong>{!! UI::translate('persons.person-phone') !!}</strong>
                {!! $person['phone'] !!}
            </h4>
        </li>

        <li class="list-group-item">
            <h4>
                <i class="fa fa-map fa-fw fa-lg"></i> 
                <strong>{!! UI::translate('persons.person-address-idcard') !!}</strong>
                <span class="label label-primary">{!! $person['address_idcard'] !!}</span>
            </h4>
        </li>

        <li class="list-group-item">
            <h4>
                <i class="fa fa-map fa-fw fa-lg"></i> 
                <strong>{!! UI::translate('persons.person-mailing-address') !!}</strong>
                {!! $person['mailing_address'] !!}
            </h4>
        </li>

        <li class="list-group-item">
            <h4>
                <i class="fa fa-id-card fa-lg"></i> 
                <strong>{!! UI::translate('persons.person-identificationnumber') !!}</strong>
                {!! $person['identification_number'] !!}
            </h4>
        </li>

        <li class="list-group-item">
            <h4>
                <i class="fa fa-id-card fa-lg"></i> 
                <strong>{!! UI::translate('persons.person-idcard') !!}</strong>
                <div id="address">{!! $person['idcard'] !!}</div>
            </h4>
        </li>

        <li class="list-group-item">
            <h4>
                <i class="far fa-calendar-alt"></i>
                <strong>{!! UI::translate('persons.person-idcard-date-of-issue') !!}</strong>
                {!! $person['idcard_date_of_issue'] !!}
            </h4>
        </li>

        <li class="list-group-item">
            <h4>
                <i class="far fa-calendar-alt"></i>
                <strong>{!! UI::translate('persons.person-idcard-date-of-expiry') !!}</strong>
                {!! $person['idcard_date_of_expiry'] !!}
            </h4>
        </li>

    </ul>

</div>

<div class="col-md-6">
    <div id="map"></div>
</div>

@stop