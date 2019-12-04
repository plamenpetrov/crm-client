{!! Form::open(['method' => 'PATCH', 'url' => URL::route('event_update', $id), 'data-toggle' => 'validator', 'role' => 'form', 'id' => 'form-event']) !!}
    @include ('event.partials._form', 
        [
            'event' => $event,
            'legend' => \UI::translate('events.edit-event'),
            'btnText' => \UI::translate('events.update-event'),
        ]
    )
{!! Form::close() !!}
