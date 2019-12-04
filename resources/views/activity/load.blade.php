@foreach($activities['data'] as $activity)
    @include("activity.partials.{$activity['action']}_{$activity['content_type']}", ['activity' => $activity])
@endforeach
