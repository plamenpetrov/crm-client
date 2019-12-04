<div class="row">
    <div class="card col-lg-12 col-md-12">
        <div class="card-body card-cascade narrower">
            <form method="GET" class="grid-data">
                <div class="row">
                    <input type="hidden" name="page" id="page" value="{!! $paginator->current_page !!}">

                    <input type="hidden" name="sort" id="sort" value="{!! $paginator->sort !!}">
                    <input type="hidden" name="sortby" id="sortby" value="{!! $paginator->sortby !!}">

                    <input type="hidden" name="exportType" id="exportType" value="">

                    <!--Grid column-->
                    <div class="col-lg-6 col-md-6">
                        <select name="per_page" id="per_page" class="mdb-select colorful-select dropdown-primary mx-2">
                            @foreach($paginator->per_page_options as $option)
                            <option value="{!! $option !!}" {!! $option == $pagination_config['per_page'] ? 'selected' : '' !!} >{!! $option !!} {!! UI::translate('labels.rows') !!}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-lg-6 col-md-6">
                        <select class="search-all-contragent dropdown-primary" placeholder="{!! UI::translate('contragents.search-all-columns') !!}" style="width:100%"></select>
                    </div>
                </div>

                <table class="table table-condensed table-striped table-responsive-md">
                    <thead class="">
                        <tr>
                            <th>#</th>
                            <th>
                                @include('filters.links.link', [
                                'routename' => 'contragents',
                                'paginator' => $paginator,
                                'columnname' => 'name',
                                'columnlabel' => \UI::translate('contragents.name')
                                ])
                            </th>
                            <th>
                                @include('filters.links.link', [
                                'routename' => 'contragents',
                                'paginator' => $paginator,
                                'columnname' => 'company_types_id',
                                'columnlabel' => \UI::translate('contragents.contragent-type')
                                ])
                            </th>
                            <th>
                                @include('filters.links.link', [
                                'routename' => 'contragents',
                                'paginator' => $paginator,
                                'columnname' => 'EIK',
                                'columnlabel' => \UI::translate('contragents.bulstat')
                                ])
                            </th>
                            <th class="hidden-xs hidden-sm">
                                @include('filters.links.link', [
                                'routename' => 'contragents',
                                'paginator' => $paginator,
                                'columnname' => 'contact_address',
                                'columnlabel' => \UI::translate('contragents.contragent-contact-address')
                                ])
                            </th>
                            <th class="text-right">
                                <button type="button" class="btn btn-primary filters btn-sm">
                                    <i class="fa fa-filter"></i>
                                </button>
                            </th>
                        </tr>
                    </thead>
                    <thead>
                        <tr class="filters-container">
                            <th>#</th>
                            <th>
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
                            </th>
                            <th>
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
                            </th>
                            <th>
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
                            </th>
                            <th class="hidden-xs hidden-sm">
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
                            </th>
                            <th class="text-right">
                                <input type="submit" class="btn btn-primary btn-xs" />
                            </th>
                        </tr>

                    </thead>

                    <tbody>
                        @forelse ($contragents as $contragent)
                        <tr>
                            <td>{!! $contragent['id'] !!}</td>
                            <td><strong>{!! $contragent['contragentname'] . ' ' .$contragent['contragentorganizationtype']['type'] !!}</strong></td>
                            <td><span class="label label-primary label-lg btn " style="background-color: {!! $contragent['contragenttype']['color'] !!};">{!! $contragent['contragenttype']['type'] !!}</span></td>
                            <td><p class="card-text">{!! $contragent['contragentEIK'] !!}</p></td>
                            <td class="hidden-xs hidden-sm">{!! $contragent['contragentcontactaddress'] !!}</td>
                            <td class="text-right">
                                <a class="btn btn-warning btn-sm" href="{!! route('contragent_edit', $contragent['id']) !!}" />
                                <i class="fa fa-edit"></i>
                                </a>
                                <a class="btn btn-info btn-sm" href="{!! route('contragent_show', $contragent['id']) !!}" />
                                <i class="fa fa-eye"></i>
                                </a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4">{!! UI::translate('contragents.no-contragents') !!}</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </form>

            @include('partials.paginator', ['paginator' => $paginator])
        </div>
        <!-- END CARD -->
    </div>
</div>