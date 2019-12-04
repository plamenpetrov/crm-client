
<div class="row">
    <!--Card-->
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        @include('elements.legend', ['legend' => $legend, 'class' => 'caption'])
        
        @include('elements.hidden', [
            'id' => 'id',
            'name' => 'id',
            'class' => null,
            'value' => $event['form-values']['id']
        ])
        
        @include('elements.text', [
            'label' => \UI::translate('events.event-name'),
            'id' => 'eventname',
            'class' => null,
            'name' => 'eventname',
            'value' => $event['form-values']['name'],
            'title' => \UI::translate('events.enter-event-name'),
            'style' => null,
            'placeholder' => \UI::translate('events.enter-event-name'),
            'onchange' => null,
            'onclick' => null,
            'onselect' => null,
            'onblur' => null
        ])
        
        @include('elements.multiselect', [
            'label' => \UI::translate('events.event-executors'),
            'option' => $event['form-data']['users'],
            'value' => array_pluck($event['form-values']['executor'], 'executorid'),
            'class' => 'select2',
            'id' => 'eventexecutors',
            'name' => 'eventexecutors[]',
            'title' => \UI::translate('events.event-executors'),
            'style' => null,
            'placeholder' => \UI::translate('events.event-executors'),
            'onchange' => null,
            'onclick' => null,
            'onselect' => null,
            'onblur' => null
        ])
        
        <div class="row">
            <div class="card-body col-lg-6 col-md-6 col-sm-12 col-xs-12">
                @include('elements.date', [
                    'label' => \UI::translate('events.event-startdate'),
                    'id' => 'eventstartdate',
                    'class' => null,
                    'name' => 'eventstartdate',
                    'value' => dateFromDatetime($event['form-values']['startdate']),
                    'title' => \UI::translate('events.event-startdate'),
                    'style' => null,
                    'placeholder' => \UI::translate('events.event-startdate'),
                    'onchange' => null,
                    'onclick' => null,
                    'onselect' => null,
                    'onblur' => null
                ])
            </div>
            <div class="card-body col-lg-6 col-md-6 col-sm-12 col-xs-12">
                @include('elements.time', [
                    'label' => \UI::translate('events.event-starttime'),
                    'id' => 'eventstarttime',
                    'class' => null,
                    'name' => 'eventstarttime',
                    'value' => timeWithoutSeccondsFromDatetime($event['form-values']['startdate']),
                    'title' => \UI::translate('events.event-starttime'),
                    'style' => null,
                    'placeholder' => \UI::translate('events.event-starttime'),
                    'onchange' => null,
                    'onclick' => null,
                    'onselect' => null,
                    'onblur' => null
                ])
            </div>
            <div class="card-body col-lg-6 col-md-6 col-sm-12 col-xs-12">
                @include('elements.date', [
                    'label' => \UI::translate('events.event-enddate'),
                    'id' => 'eventenddate',
                    'class' => null,
                    'name' => 'eventenddate',
                    'value' => dateFromDatetime($event['form-values']['enddate']),
                    'title' => \UI::translate('events.event-enddate'),
                    'style' => null,
                    'placeholder' => \UI::translate('events.event-enddate'),
                    'onchange' => null,
                    'onclick' => null,
                    'onselect' => null,
                    'onblur' => null
                ])
            </div>
            <div class="card-body col-lg-6 col-md-6 col-sm-12 col-xs-12">
                @include('elements.time', [
                    'label' => \UI::translate('events.event-endtime'),
                    'id' => 'eventendtime',
                    'class' => null,
                    'name' => 'eventendtime',
                    'value' => timeWithoutSeccondsFromDatetime($event['form-values']['enddate']),
                    'title' => \UI::translate('events.event-endtime'),
                    'style' => null,
                    'placeholder' => \UI::translate('events.event-endtime'),
                    'onchange' => null,
                    'onclick' => null,
                    'onselect' => null,
                    'onblur' => null
                ])
            </div>
        </div>
            @include('elements.selectEvent', [
                'labelEventType' => \UI::translate('events.event-type'),
                'labelEventSubType' => \UI::translate('events.event-subtype'),
                'nameEvent' => 'eventtype',
                'nameSubEvent' => 'eventsubtype',
                'eventTypeOption' => $event['form-values']['eventtypeid'],
                'eventSubTypeOption' => $event['form-values']['eventsubtypeid'],
                'eventtype' => $event['form-data']['eventtype'],
                'eventsubtype' => $event['form-data']['eventsubtype'],
                'class' => '',
                'placeholder' => \UI::translate('events.event-type'),
            ])
    
        @include('elements.textarea-description', [
            'label' => \UI::translate('events.event-description'),
            'id' => 'eventdescription',
            'class' => null,
            'name' => 'eventdescription',
            'value' => $event['form-values']['description'],
            'title' => \UI::translate('events.event-description'),
            'style' => null,
            'placeholder' => \UI::translate('events.event-description'),
            'onchange' => null,
            'onclick' => null,
            'onselect' => null,
            'onblur' => null
        ])

        @include('elements.text', [
            'label' => \UI::translate('events.event-location'),
            'id' => 'eventlocation',
            'class' => null,
            'name' => 'eventlocation',
            'value' => $event['form-values']['location'],
            'title' => \UI::translate('events.enter-location'),
            'style' => null,
            'placeholder' => \UI::translate('events.enter-location'),
            'onchange' => null,
            'onclick' => null,
            'onselect' => null,
            'onblur' => null
        ])

    </div>
</div>