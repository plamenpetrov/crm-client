<div class="row">
    <div class="card col-12">
        <form method="GET" class="grid-data">
            <div class="card-body card-cascade narrower">
                <div class="row">
                    <input type="hidden" name="page" id="page" value="{!! $paginator->current_page !!}">

                    <input type="hidden" name="sort" id="sort" value="{!! $paginator->sort !!}">
                    <input type="hidden" name="sortby" id="sortby" value="{!! $paginator->sortby !!}">

                    <input type="hidden" name="exportType" id="exportType" value="">

                    <!--Grid column-->
                    <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                        <select name="per_page" id="per_page" class="mdb-select colorful-select dropdown-primary mx-2">
                            @foreach($paginator->per_page_options as $option)
                            <option value="{!! $option !!}" {!! $option == $pagination_config['per_page'] ? 'selected' : '' !!} >{!! $option !!} {!! UI::translate('labels.rows') !!}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                        <select class="search-all-contragent dropdown-primary" placeholder="{!! UI::translate('contragents.search-all-columns') !!}" style="width:100%"></select>
                    </div>
                    
                    <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
                        <div class="btn-group w-100">
                            <button class="btn btn-primary dropdown-toggle w-100" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-sort-alpha-down"></i>
                                {!! \UI::translate('labels.sort') !!}
                            </button>

                            <div class="dropdown-menu">
                                @include('filters.links.link', [
                                'routename' => 'contragents',
                                'paginator' => $paginator,
                                'columnname' => 'name',
                                'columnlabel' => \UI::translate('contragents.name')
                                ])

                                @include('filters.links.link', [
                                'routename' => 'contragents',
                                'paginator' => $paginator,
                                'columnname' => 'company_types_id',
                                'columnlabel' => \UI::translate('contragents.contragent-type')
                                ])

                                @include('filters.links.link', [
                                'routename' => 'contragents',
                                'paginator' => $paginator,
                                'columnname' => 'EIK',
                                'columnlabel' => \UI::translate('contragents.bulstat')
                                ])

                                @include('filters.links.link', [
                                'routename' => 'contragents',
                                'paginator' => $paginator,
                                'columnname' => 'contact_address',
                                'columnlabel' => \UI::translate('contragents.contragent-contact-address')
                                ])
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-2">
                    @include('filters.fields.text', [
                    'id' => 'contragentname',
                    'class' => null,
                    'name' => 'filters[name]',
                    'value' => '',
                    'title' => '',
                    'style' => null,
                    'placeholder' => \UI::translate('contragents.enter-contragent-name'),
                    'onchange' => null,
                    'onclick' => null,
                    'onselect' => null,
                    'onblur' => null
                    ])
                </div>
                <div class="col-lg-2">
                    @include('filters.fields.text', [
                    'id' => 'contragenttype',
                    'class' => null,
                    'name' => 'filters[contragent_type]',
                    'value' => '',
                    'title' => '',
                    'style' => null,
                    'placeholder' => \UI::translate('contragents.contragent-type'),
                    'onchange' => null,
                    'onclick' => null,
                    'onselect' => null,
                    'onblur' => null
                    ])
                </div>
                <div class="col-lg-2">
                    @include('filters.fields.text', [
                    'id' => 'contragentbulstat',
                    'class' => null,
                    'name' => 'filters[EIK]',
                    'value' => '',
                    'title' => '',
                    'style' => null,
                    'placeholder' => \UI::translate('contragents.enter-contragent-EIK'),
                    'onchange' => null,
                    'onclick' => null,
                    'onselect' => null,
                    'onblur' => null
                    ])
                </div>
                <div class="col-lg-2 hidden-xs hidden-sm">
                    @include('filters.fields.text', [
                    'id' => 'contragentcontactaddress',
                    'class' => null,
                    'name' => 'filters[contact_address]',
                    'value' => '',
                    'title' => '',
                    'style' => null,
                    'placeholder' => \UI::translate('contragents.contragent-contact-address'),
                    'onchange' => null,
                    'onclick' => null,
                    'onselect' => null,
                    'onblur' => null
                    ])
                </div>
                <div class="col-lg-2">
                    <input type="submit" class="btn btn-primary btn-xs" />
                </div>
                
                <div class="col-lg-12 col-md-12 mt-4">
                    @forelse ($contragents as $contragent)
                    <div class="card mb-3">
                        <h3 class="card-header primary-color white-text">
                            {!! $contragent['contragentname'] !!} {!! $contragent['contragentorganizationtype']['type'] !!}
                        </h3>
                        <div class="card-body">
                            <p style="color: {!! $contragent['contragenttype']['color'] !!}; font-weight: bold">
                                {!! $contragent['contragenttype']['type'] !!}
                            </p>
                            <p class="card-text">{!! $contragent['contragentEIK'] !!} </p>
                            <p class="card-text"><i>{!! $contragent['contragentcontactaddress'] !!}</i></p>
                        </div>

                        <div class="card-footer">
                            <a class="btn btn-warning btn-sm link-text" href="{!! route('contragent_edit', $contragent['id']) !!}" />
                            <i class="fa fa-edit"></i>
                            </a>
                            <a class="btn btn-info btn-sm link-text" href="{!! route('contragent_show', $contragent['id']) !!}" />
                            <i class="fa fa-eye"></i>
                            </a>
                        </div>
                    </div>
                    @empty
                    <div class="row">
                        <div class="danger">{!! UI::translate('contragents.no-contragents') !!}</div>
                    </div>
                    @endforelse
                </div>
                
            </div>
        </form>
        @include('partials.paginator', ['paginator' => $paginator])
    </div>
    <!-- END CARD -->
</div>
