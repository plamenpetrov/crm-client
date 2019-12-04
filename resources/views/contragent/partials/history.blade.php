<div class="col-md-12">
    <h1>{!! UI::translate('contragents.contragent-changes') !!}</h1>

    @forelse ($history as $field => $changes)
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">{!! UI::translate('contragents.'.$field) !!}</h3>
        </div>
        <div class="panel-body">
            <table class="table table-striped table-hover large-header">
                <thead>
                    <tr>
                        <th class="font-weight-bold dark-grey-text"><strong>{!! UI::translate('contragents.chenged-by') !!}</strong></th>
                        <th class="font-weight-bold dark-grey-text"><strong>{!! UI::translate('contragents.created-at') !!}</strong></th>
                        <th class="font-weight-bold dark-grey-text"><strong>{!! UI::translate('contragents.contragent-new-value') !!}</strong></th>
                        <th class="font-weight-bold dark-grey-text"><strong>{!! UI::translate('contragents.contragent-old-value') !!}</strong></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($changes as $key => $row)
                    <tr>
                        <td>{!! $row['author']['name'] !!}</td>
                        <td>{!! Carbon\Carbon::parse($row['created_at'])->format('h:m d.m.Y') !!}
                        </td>
                        <td>
                            <span class="badge badge-success">{!! $row['new_value'] !!}</span>
                        </td>
                        <td>
                            <span class="badge badge-danger"><del>{!! $row['old_value'] !!}</del></span>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @empty
    <div class="panel panel-danger">
        <div class="panel-heading">
            <h3 class="panel-title">{!! UI::translate('contragents.no-changes') !!}</h3>
        </div>
    </div>
    @endforelse
</div>