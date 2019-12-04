<strong>
    <a href="{!! route($routename, 
        array(
             'page' => $paginator->current_page,
             'per_page' => $paginator->per_page,
             'sort' => $paginator->sortReverse, 
             'sortby' => $columnname,
             'filters' => $paginator->filters
        )) !!}" class="dropdown-item">
         {!! $columnlabel !!}
         <span class="glyphicon glyphicon-sort"></span>
    </a>
</strong>