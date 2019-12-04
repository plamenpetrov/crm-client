<button class="btn btn-default btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <span class='fa fa-file-excel'></span>
    {!! UI::translate('contragents.export') !!}
</button>
<div class="dropdown-menu">
    @foreach(config('export.exportTypes') as $exportType)
        <a class="dropdown-item btn-sm exportTo" href="#" data-export="{!! $exportType !!}"><i class="fa fa-file-excel"></i> {!! UI::translate('contragents.export-'.$exportType) !!}</a>
    @endforeach
</div>