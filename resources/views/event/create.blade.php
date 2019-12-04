{!! Form::open(['url' => URL::route('event_store'), 'data-toggle' => 'validator', 'role' => 'form', 'id' => 'form-event']) !!}
@include ('event.partials._form', 
[
'event' => $event,
'legend' => \UI::translate('events.create-new-event'),
'btnText' => \UI::translate('events.save-event'),
]
)
{!! Form::close() !!}