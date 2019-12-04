@foreach(config('ui.displaytype') as $displayType)
    @if(\Session::get('displaytype', 'list') == $displayType['type'])
        <a class="btn btn-default btn-sm active" href="{!! route('changedisplaytype', $displayType['type']) !!}">
            <i class="{!! $displayType['icon'] !!}"></i> 
        </a>
    @else 
        <a class="btn btn-default btn-sm " href="{!! route('changedisplaytype', $displayType['type']) !!}">
            <i class="{!! $displayType['icon'] !!}"></i> 
        </a>
    @endif 
@endforeach