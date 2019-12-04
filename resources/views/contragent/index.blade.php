@extends('layout.md')

@section('content')

<!-- Small button group -->
<div class="col mb-3">
    <div class="btn-group mt-1">
        <a class="btn btn-success btn-sm" href="{!! route('contragent_create') !!}" >
            <span class='fa fa-plus'></span>
            {!! UI::translate('contragents.create-new-contragent') !!}
        </a>
    </div>

    <div class="btn-group mt-1">
        @include('partials.exportdropdown')
    </div>

    <div class="btn-group mt-1">
        @include('partials.displaygrid')
    </div>
</div>

@include('contragent.partials.' . \Session::get('displaytype', 'list'))

@stop