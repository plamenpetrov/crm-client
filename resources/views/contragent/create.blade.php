@extends('layout.md')

@section('content')

{!! Form::open(['url' => URL::route('contragent_store'), 'data-toggle' => 'validator', 'role' => 'form']) !!}
    @include ('contragent.partials._form', 
        [
            'contragent' => $contragent,
            'legend' => \UI::translate('contragents.create-new-contragent'),
            'btnText' => \UI::translate('contragents.save-contragent'),
        ]
    )
{!! Form::close() !!}

@stop