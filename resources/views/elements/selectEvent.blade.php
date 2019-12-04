<div class="row" id="eventTypeContainer">
    <div class="card-body col-lg-6 col-md-6 col-sm-12 col-xs-12">
        @include ('elements.label', ['placeholder' => $labelEventType])
        <select v-model="eventTypeOption" name='{!! $nameEvent !!}' class="mdb-select {!! $class !!}">
            <option v-for="(item, index) in eventtype" :value="item.id">@{{ item.name }}</option>
        </select>

        <div class="help-block with-errors"></div>
        @include ('errors.type', ['name' => $nameEvent])
    </div>
    
    <div class="card-body col-lg-6 col-md-6 col-sm-12 col-xs-12">
        @include ('elements.label', ['placeholder' => $labelEventSubType])
        <select v-model="eventSubTypeOption" name='{!! $nameSubEvent !!}' v-if="eventTypeOption" class="mdb-select {!! $class !!}">
            <option v-for="option in eventsubtype" v-if="option.eventtypeid == eventTypeOption" :value="option.id">@{{option.name}}</option>
        </select>
        
        <div class="help-block with-errors"></div>
        @include ('errors.type', ['name' => $nameSubEvent])
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
<script type="text/javascript">
    new Vue({
        el: "#eventTypeContainer",
        data: {
            eventTypeOption: {!! $eventTypeOption !!},
            eventSubTypeOption: {!! $eventSubTypeOption !!},
            eventtype: {!! json_encode($eventtype) !!},
            eventsubtype: {!! json_encode($eventsubtype) !!}
        }
    })
</script>