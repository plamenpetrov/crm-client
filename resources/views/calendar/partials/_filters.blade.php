<div class="form-check">
    <ul class="list-group">
        @forelse ($users as $user)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <span class="label label-primary label-lg btn " style="background-color: {!! $user['color'] !!};">
                <input class="form-check-input-user" type="checkbox" name="user" value="{!! $user['id'] !!}" id="user{!! $user['id'] !!}"/>
                <label class="form-check-label" for="user{!! $user['id'] !!}">{!! $user['name'] !!}</label>
                </span>
            </li>
        @empty
            {!! \UI::translate('labels.no-users') !!}
        @endforelse
    </ul>
</div>