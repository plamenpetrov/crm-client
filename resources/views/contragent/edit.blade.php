@extends('layout.md')

@section('content')

{!! Form::open(['method' => 'PATCH', 'url' => URL::route('contragent_update', $id)]) !!}
    @include ('contragent.partials._form', 
        [
            'contragent' => $contragent,
            'legend' => \UI::translate('contragents.edit-contragent'),
            'btnText' => \UI::translate('contragents.update-contragent'),
        ]
    )
{!! Form::close() !!}

@stop