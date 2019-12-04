@if($errors->any())
    <ul class="allert alert-danger">
        @foreach($errors->all() as $error)
        <li>
            {!! $error !!}
        </li>
        @endforeach
    </ul>
@endif