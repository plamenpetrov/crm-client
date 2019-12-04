@extends('layout.md')

@section('content')

<div class="box box-primary">
    <h1>{!! UI::translate('persons.persons') !!}</h1>


    <a class="btn btn-primary" href="{!! route('person_create') !!}" >
        <span class='fa fa-plus'></span>
    {!! UI::translate('persons.create-new-person') !!}
    </a>
    <form method="GET">
        <div class="col-sm-12 pagination">
            <input type="hidden" name="page" id="page" value="{!! $paginator->current_page !!}">
                
            <input type="hidden" name="sort" id="sort" value="{!! $paginator->sort !!}">
                <input type="hidden" name="sortby" id="sortby" value="{!! $paginator->sortby !!}">
                
                <div class="col-sm-6">
                    {!! UI::translate('persons.show-per-page') !!}

                    <select name="per_page" id="per_page" class="form-control input-sm">
                        @foreach($paginator->per_page_options as $option)
                        <option value="{!! $option !!}" {!! $option == $pagination_config['per_page'] ? 'selected' : '' !!} >{!! $option !!}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-sm-6">
                    {!! UI::translate('persons.search-all-columns') !!}
                    <select class="search-all-person" class="form-control input-lg" style="width: 100%"></select>
                </div>
        </div>

        <table class="table table-condensed table-striped grid">
            <thead>
                <tr>
                    <th></th>
                    <th>
                        @include('filters.links.link', [
                            'routename' => 'persons',
                            'paginator' => $paginator,
                            'columnname' => 'first_name',
                            'columnlabel' => UI::translate('persons.person-firstname')
                        ])
                    </th>
                    <th>
                        @include('filters.links.link', [
                            'routename' => 'persons',
                            'paginator' => $paginator,
                            'columnname' => 'family_name',
                            'columnlabel' => UI::translate('persons.person-familyname')
                        ])
                    <th class="hidden-xs hidden-sm">
                        @include('filters.links.link', [
                            'routename' => 'persons',
                            'paginator' => $paginator,
                            'columnname' => 'phone',
                            'columnlabel' => UI::translate('persons.person-phone')
                        ])
                    <th>
                        @include('filters.links.link', [
                            'routename' => 'persons',
                            'paginator' => $paginator,
                            'columnname' => 'email',
                            'columnlabel' => UI::translate('persons.person-email')
                        ])
                    <th></th>
                    <th>
                        <button type="button" class="btn btn-primary filters">
                            <span class="glyphicon glyphicon-filter"></span>
                        </button>
                    </th>
                </tr>

                <tr class="filters-container">
                    <th>

                    </th>
                    <th>
                        @include('filters.fields.text', [
                            'id' => 'personname',
                            'class' => null,
                            'name' => 'filters[first_name]',
                            'value' => '',
                            'title' => '',
                            'style' => null,
                            'placeholder' => UI::translate('persons.enter-person-firstname'),
                            'onchange' => null,
                            'onclick' => null,
                            'onselect' => null,
                            'onblur' => null
                        ])
                    </th>
                    <th>
                        @include('filters.fields.text', [
                            'id' => 'personfamilyname',
                            'class' => null,
                            'name' => 'filters[family_name]',
                            'value' => '',
                            'title' => '',
                            'style' => null,
                            'placeholder' => UI::translate('persons.enter-person-familyname'),
                            'onchange' => null,
                            'onclick' => null,
                            'onselect' => null,
                            'onblur' => null
                        ])
                    </th>
                    <th class="hidden-xs hidden-sm">
                        @include('filters.fields.text', [
                            'id' => 'personphone',
                            'class' => null,
                            'name' => 'filters[phone]',
                            'value' => '',
                            'title' => '',
                            'style' => null,
                            'placeholder' => UI::translate('persons.enter-person-phone'),
                            'onchange' => null,
                            'onclick' => null,
                            'onselect' => null,
                            'onblur' => null
                        ])
                    </th>
                    <th>
                        @include('filters.fields.text', [
                            'id' => 'personemail',
                            'class' => null,
                            'name' => 'filters[email]',
                            'value' => '',
                            'title' => '',
                            'style' => null,
                            'placeholder' => UI::translate('persons.enter-person-email'),
                            'onchange' => null,
                            'onclick' => null,
                            'onselect' => null,
                            'onblur' => null
                        ])
                    </th>
                    <th></th>
                    <th>
                        <input type="submit" class="btn btn-primary" name="search"/>
                    </th>
                </tr>

            </thead>

            <tbody>
                @forelse ($persons['data'] as $person)
                <tr>
                    <td>{!! $person['id'] !!}</td>
                    <td>{!! $person['first_name'] !!}</td>
                    <td>{!! $person['family_name'] !!}</td>
                    <td class="hidden-xs hidden-sm">{!! $person['phone'] !!}</td>
                    <td>{!! $person['email'] !!}</td>
                    <td>
                        <a class="btn btn-warning" href="{!! route('person_edit', $person['id']) !!}" />
                            <span class="glyphicon glyphicon-edit"></span>
                        </a>
                    </td>
                    <td>
                        <a class="btn btn-info" href="{!! route('person_show', $person['id']) !!}" />
                            <span class="glyphicon glyphicon-eye-open"></span>
                        </a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4">{!! UI::translate('persons.no-persons') !!}</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </form>

    <div class="col-sm-6">
        <div class="pagination" id="">
            {!! UI::translate('persons.showing') !!} 
            {!! $pagination_config['from'] !!} {!! UI::translate('persons.from') !!} 
            {!! $pagination_config['to'] !!} {!! UI::translate('persons.to') !!} 
            {!! $pagination_config['total'] !!} {!! UI::translate('persons.persons') !!}
        </div>
    </div>

    <div class="col-sm-6">
        <?php
        $linksConfig = array(
                'sort' => $paginator->sort,
                'sortby' => $paginator->sortby,
                'per_page' => $pagination_config['per_page'],
                'filters' => $paginator->filters
            );
        
            echo $paginator->appends($linksConfig)->links();
        ?>
    </div>
</div>

@stop