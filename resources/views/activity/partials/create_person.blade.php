<div class="feed-item">
    <div class="date">{{ diffForHumman($activity['created_at']) }}</div>
    <div class="text">
        {{ $activity['user']['name'] }} 
        <span class="label label-primary">{{ $activity['action'] }} </span>
        <a href="{!! route('person_show', $activity['content_id']) !!}">
            {{ $activity['content']['first_name'] }} {{ $activity['content']['family_name'] }}
        </a>
    </div>
</div>