@extends('layout.md')

@section('content')

@include('calendar.partials._calendar')

<meta name="csrf_token" content="{{ csrf_token() }}" />

<!-- START MODAL -->
<!-- Modal events -->
<div class="modal fade" id="event-modal" role="dialog" aria-labelledby="event-modalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="event-modalLabel">{!! UI::translate('events.event-create') !!}</h4>
            </div>
            <div class="modal-body">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">{!! UI::translate('labels.discard') !!}</button>
                <button type="button" id="save-event" class="btn btn-primary">{!! UI::translate('labels.save') !!}</button>
            </div>
        </div>
    </div>
</div>
<!-- END MODAL -->

<div class="row">
    <div class="col-md-9">
        <div id="calendar"></div>
    </div>

    <div class="col-md-3">
        <div id="calendar-filters">
            @include('calendar.partials._filters', $users)
        </div>
    </div>
</div>


<script>
    $(document).ready(function () {
        var calendar = $('#calendar').fullCalendar({
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,agendaWeek,agendaDay'
            },
            firstDay: 1,
            selectable: true,
            selectHelper: true,
            editable: true,
            dragOpacity: {
                month: .4,
                '': .7
            },
            minTime: "07:00:00",
            maxTime: "21:00:00",
            defaultView: 'agendaWeek',
            editable: true,
                    googleCalendarApiKey: 'AIzaSyCgLAe1YdZOUQfl3-XlfH6LJbyRgzRoaBM',
//            events: {
//                googleCalendarId: 'pacorabanpaco.petrov@gmail.com'
//            },
            events: '{!! route('calendar_events') !!}',
            weekends: true,
//            resources: '{!! route('calendar_events_users') !!}',
            themeSystem: 'bootstrap3',
            bootstrapGlyphicons: {
                close: 'glyphicon-remove',
                prev: 'glyphicon-chevron-left',
                next: 'glyphicon-chevron-right',
                prevYear: 'glyphicon-backward',
                nextYear: 'glyphicon-forward'
            },
            eventRender: function (event, element) {

//                var sadarjanie = '<div><h6>' + event.title + '</h6></div>';

//                sadarjanie += '<div><h6>Info:</h6><p>' + event.description + '</p></div>';
//
//                if (event.location) {
//                    sadarjanie += '<div><h6>Location</h6>' + event.location + '</div>';
//                }
//
//                sadarjanie += '<div><h6>Start at</h6>' + event.start + '</div>';
//                sadarjanie += '<div><h6>End at</h6>' + event.end + '</div>';

//                startTime = $.fullCalendar.formatDate(event.start, 'HH:mm');

//                element.find('.fc-event-time').remove();
//                element.find('.fc-event-title').before('<span class="fc-event-time">' + startTime + '</span>');


                element.find(".fc-title")
//                        .prepend(sadarjanie)
                        .prepend("<i class='" + event.icon + "'></i>");
            },
            //Create event by select start end 
            select: function (start, end, allDay) {
//                    start = $.fullCalendar.formatDate(event.start,'Y-MM-D HH:mm:ss');
//                    end = $.fullCalendar.formatDate(event.end,'Y-MM-D HH:mm:ss');

                $('.modal-body').load('{!! route("event_create") !!}', function (result) {

                    $('#event-modal').modal({show: true});

                    $('.datepicker').pickadate({
                        format: 'yyyy-mm-dd',
                        formatSubmit: 'yyyy-mm-dd',
                    });

                    var startdate = moment($.fullCalendar.formatDate(start, 'Y-MM-DD'));
                    var enddate = moment($.fullCalendar.formatDate(end, 'Y-MM-DD'));

                    var starttime = moment($.fullCalendar.formatDate(start, 'HH:mm'));
                    var endtime = moment($.fullCalendar.formatDate(end, 'HH:mm'));

                    $("#event-modal .modal-body #eventstartdate").val(startdate._i);
                    $("#event-modal .modal-body #eventenddate").val(enddate._i);

                    $("#event-modal .modal-body #eventstarttime").val(starttime._i);
                    $("#event-modal .modal-body #eventendtime").val(endtime._i);
                });

            },
            eventClick: function (event, jsEvent, view) {
                //otvarq popup prozorec za redakciq na tekushtata zada4a.
                var url = '{!! route("event_edit", ":id") !!}';
                url = url.replace(':id', event.id);

                $('.modal-body').load(url, function (result) {

                    $('#event-modal').modal({show: true});

                    $('.datepicker').pickadate({
                        format: 'yyyy-mm-dd',
                        formatSubmit: 'yyyy-mm-dd',
                    });
                });

                return false;
            },
            //Get and move event
            eventDrop: function (event, dayDelta, minuteDelta, allDay, revertFunc) {
                var data = new Object();
                data.id = event.id;
                data.start_date = $.fullCalendar.formatDate(event.start, 'Y-MM-DD HH:mm');
                data.end_date = $.fullCalendar.formatDate(event.end, 'Y-MM-DD HH:mm');

                $.ajax({
                    url: '{!! route("event_change_duration") !!}',
                    method: "PATCH",
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')},
                    dataType: 'json',
                    data: data,
                }).done(function (response) {
                    if (response.data == data.id) {
                        $.bootstrapGrowl(response.message, {
                            ele: 'body', // which element to append to
                            type: 'success', // (null, 'info', 'danger', 'success')
                            offset: {from: 'top', amount: 40}, // 'top', or 'bottom'
                            align: 'right', // ('left', 'right', or 'center')
                            width: 'auto', // (integer, or 'auto')
                            delay: 8000, // Time while the message will be displayed. It's not equivalent to the *demo* timeOut!
                            stackup_spacing: 10 // spacing between consecutively stacked growls.
                        });
                    }
                }).fail(function () {
                    alert('Activities could not be loaded.');
                });

                $('#calendar').fullCalendar('renderEvent', event, true);
            },
            //Change event duration by resize
            eventResize: function (event) {
                var data = new Object();
                data.id = event.id;
                data.start_date = $.fullCalendar.formatDate(event.start, 'Y-MM-DD HH:mm');
                data.end_date = $.fullCalendar.formatDate(event.end, 'Y-MM-DD HH:mm');

                $.ajax({
                    url: '{!! route("event_change_duration") !!}',
                    method: "PATCH",
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')},
                    dataType: 'json',
                    data: data,
                }).done(function (response) {
                    console.dir(response);
                }).fail(function () {
                    alert('Activities could not be loaded.');
                });
            }
        });

        $(document).on("click", "#save-event", function (e) {
//            e.preventDefault();
//            
//            console.dir($('form#form-event').attr('action'));
//            console.dir($('form#form-event').find('input[name=_method]').val());
//            
//            $.ajax({
//                    url: $('form#form-event').attr('action'),
//                    method: "POST",
//                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')},
////                    dataType: 'json',
//                    data: $('form#form-event').serializeArray(),
//                }).done(function (event) {
//                    $('#calendar').fullCalendar( 'refreshEvents');
//                }).fail(function () {
//                    alert('Activities could not be loaded.');
//                });
            $('form#form-event').submit();
        });

        $(document).on("click", "input.form-check-input-user", function () {
            var selected = new Array();
            var data = new Object();
            
            $("input:checkbox[name=user]:checked").each(function () {
                selected.push($(this).val());
            });
            
            data.start = calendar.fullCalendar('getView').start.format('Y-MM-DD');
            data.end = calendar.fullCalendar('getView').end.format('Y-MM-DD');
            data.executors = selected;
            
            $.ajax({
                    url: '{!! route('calendar_events') !!}',
                    method: "GET",
                    dataType: 'json',
                    data: data,
                }).done(function (events) {
                    $('#calendar').fullCalendar( 'removeEvents');
                    $('#calendar').fullCalendar( 'addEventSource', events);         
    
                }).fail(function () {
                    alert('Activities could not be loaded.');
                });
            
        });
    });
</script>

<style> 
    @media (min-width: 992px) {
        .modal-lg {
            max-width: 70% !important;
        }
    }
</style>

@stop


