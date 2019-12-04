<div class="feed-item">
    <div class="date">{{ diffForHumman($activity['created_at']) }}</div>
    <div class="text">
        {{ $activity['user']['name'] }} 
        <span class="label label-primary">{{ $activity['action'] }} </span>
        <a href="{!! route('event_update', $activity['content_id']) !!}">
            {{ $activity['content']['name'] }} 
        </a>
    </div>
</div>