<h4 id="" class="">
    <strong>{!! $label !!}</strong>
</h4>
<div class="btn-group mb-3" data-toggle="buttons">
    @foreach($option as $opt)
    
        @if($value == $opt['id'])
            <label class="btn btn-default active form-check-label">
            {!! 
                Form::radio($name, $opt['id'], true);
            !!}
        @else
            <label class="btn btn-default form-check-label">
            {!! 
                Form::radio($name, $opt['id'], false);
            !!}
        @endif

        {!! $opt['name'] !!}
    </label>
    @endforeach
</div>