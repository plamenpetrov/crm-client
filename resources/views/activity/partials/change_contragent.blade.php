<div class="feed-item">
    <div class="date">{{ diffForHumman($activity['created_at']) }}</div>
    <div class="text">
        {{ $activity['user']['name'] }} 
        <span class="label label-warning">{{ $activity['action'] }} </span>
        <a href="{!! route('contragent_show', $activity['content_id']) !!}">
            {{ $activity['content']['name'] }} 
        </a>
    </div>
</div>