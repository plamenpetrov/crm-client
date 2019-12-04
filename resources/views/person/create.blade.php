@extends('layout.md')

@section('content')

{!! Form::open(['url' => URL::route('person_store'), 'data-toggle' => 'validator', 'role' => 'form']) !!}
    @include ('person.partials._form', 
        [
            'person' => $person,
            'legend' => \UI::translate('persons.create-new-person'),
            'btnText' => \UI::translate('persons.save-person'),
        ]
    )
{!! Form::close() !!}

@stop