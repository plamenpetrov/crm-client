@extends('layout.md')

@section('content')

{!! Form::open(['method' => 'PATCH', 'url' => URL::route('person_update', $id)]) !!}
    @include ('person.partials._form', 
        [
            'person' => $person,
            'legend' => \UI::translate('persons.edit-person'),
            'btnText' => \UI::translate('persons.update-person'),
        ]
    )
{!! Form::close() !!}

@stop