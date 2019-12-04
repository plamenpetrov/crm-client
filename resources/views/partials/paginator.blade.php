<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6">
        <nav aria-label="pagination ">
            {!! UI::translate('contragents.showing') !!} 
            {!! $pagination_config['from'] !!} {!! UI::translate('contragents.from') !!} 
            {!! $pagination_config['to'] !!} {!! UI::translate('contragents.to') !!} 
            {!! $pagination_config['total'] !!} {!! UI::translate('contragents.contragents') !!}
        </nav>
    </div>

    <div class="col-lg-6 col-md-6 col-sm-6">
        <nav aria-label="pagination">
            <?php
            $linksConfig = array(
                'sort' => $paginator->sort,
                'sortby' => $paginator->sortby,
                'per_page' => $pagination_config['per_page'],
                'filters' => $paginator->filters
            );

            echo $paginator->appends($linksConfig)->links();
            ?>
        </nav>
    </div>
</div>