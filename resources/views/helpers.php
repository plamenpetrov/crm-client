<?php

/**
 * Creates multidimensional array of children and parents
 * @param type $array
 * @param type $parent_id
 * @return type
 */
function recurse($array, $parent_id = 0) {
    $result = [];
    foreach ($array as $k => &$data) {
        if ($data['pid'] == $parent_id) {
            $children = recurse($array, $data['id']);
            if ($children) {
                $data['children'] = $children;
            }

            array_set($result, $data['navigation_type'] . '.' . $k, $data);

//            array_merge($result[$data['navigation_type']], $data);
//            $result[] = $data;
        }
    }
    return $result;
}

/**
 * Recursively create HTML UL tree based on array tree
 * @param type $tree
 * @return string
 */
function treeToUL($tree, $type, $isDropDown = '') {

    if($isDropDown <> '') {
        $html = '<ul class="' . $isDropDown . '">' . PHP_EOL;
    } else {
        $html = '<ul class="navbar-nav mr-auto">' . PHP_EOL;
    }
    
    foreach ($tree as $v) {
        if (array_key_exists('children', $v)) {
            $html.= '<li class="nav-item dropdown">';
                $html .= '<a class="nav-link waves-light" data-toggle="dropdown" role="button" aria-expanded="true" href=' . $v['uri'] . '><i class="glyphicon ' . $v['icon'] . '"></i>' . $v['label'] . '<span class="caret"></span></a>';
                $html.= treeToUL($v['children'][$type], $type, 'dropdown-menu');
            $html.='</li>';
        } else {
            $html.= '<li class="nav-item">';
                $html .= '<a href=' . $v['uri'] . ' class="nav-link waves-light"><i class="glyphicon ' . $v['icon'] . '"></i>' . $v['label'] . '</a>';
            $html.='</li>';
        }
    }
    $html.= '</ul>' . PHP_EOL;
    return $html;
}

/**
 * Generates a HTML form returned from the server
 * @param type $forms
 * @param type $values
 * @param type $create
 * @return type
 */
function generateHTMLform($form, $values = null, $create, $printForms = null) {
//    start_measure('Test', 'start create form');
    $html = array();
    $object_data = $form['object_data'];
    unset($form['object_data']);
    $formId = array_keys($form)[0];
    $formConfig = $form[$formId]['form'];
    $formSections = $form[$formId]['sections'];
    //crate cancelButton form
    $html[] = Form::open([
                'method' => 'POST',
                'url' => route('discard_form_changes'),
                'class' => 'cancelButton'
    ]);
    $html[] = Form::hidden('internal_number', $object_data['internal_number']);
    $html[] = Form::hidden('objectType', $object_data['objectType']);
    $html[] = Form::hidden('id_object', $object_data['id_object']);
    $html[] = HTML::submitCancel(array('class' => 'cancelButton btn btn-danger pull-right', 'name' => 'submit'), '<i class="glyphicon glyphicon-remove"></i>');
    $html[] = Form::close();

    if ($create == 0)
        $html[] = '<div class="panel btn-toolbar"><button class="btn btn-primary" id="document-search">Search</button></div>'
                . '<div class="btn-toolbar" role="toolbar" aria-label="..." id="search-btns"></div>'
                . '<div class="search-result" id="search-rows"></div>';

//    if ($create == 1 && $printForms)
//        $html[] = generatePrintFormsDropDown($printForms);
    //Building the FORM
    $html[] = Form::formWrap($object_data['internal_number'], $formId);
    $html[] = Form::formTitle($formConfig['form_name']);
    $html[] = Form::open([
                'url' => $formConfig['form_action'],
                'method' => $formConfig['form_method'],
                'class' => $formConfig['form_class'],
                'id' => $formConfig['form_id'],
                'internal_number' => $object_data['internal_number'],
                'files' => true
    ]);
    $html[] = Form::hidden('internal_number', $object_data['internal_number'], []);
    //Building the ELEMENTS
    foreach ($formSections as $section => $sections) {
        switch ($sections['section_type']) {
            case '0':
                //create fieldset
                $section_type = 'fieldset';
                $html[] = createFieldsetSection($sections, $section_type, $sections['section_label'], $create, $values);
                break;
            case '1':
                //create grid
                $section_type = 'grid';
                $html[] = createGridSection($sections, $section_type, $sections['section_label'], $sections['section_id'], $create, $values);
                break;
            case '3':
                //create grid
                $section_type = 'sub-grid';
                $html[] = createGridSection($sections, $section_type, $sections['section_label'], $sections['section_id'], $create, $values);
                break;
            default:
                break;
        }
    }
    $html[] = Form::close();
    $html[] = Form::formGroupClose();

    return join('', $html);
}

/**
 * 
 * @param type $sections
 * @param type $section_type
 * @param type $section_label
 * @param type $create
 * @param type $values
 * @return type
 */
function createFieldsetSection($sections, $section_type, $section_label, $create, $values) {
    $html[] = HTML::fieldsetStart($section_type, $section_label, $sections['section_id']);
    foreach ($sections['elements'] as $key => $el) {
        switch ($el['element_type']) {
            case 'select':
                $options = [];
                //Add empty option
                $options[] = '';
                //$html[] = '<div class="input-group input-group-sm">';
                foreach ($el['element_options'] as $option) {
                    $options[$option['id']] = $option['name'];
                }

                $sections['elements'][$key]['element_options'] = $options;
                break;
            case 'autocomplete':
                $options = [];
                //Add empty option
                //$options[] = '';
                //$html[] = '<div class="input-group input-group-sm">';
                foreach ($el['element_options'] as $option) {
                    $options[$option['id']] = array('value' => $option['id'], 'label' => $option['name']);
                }

                $sections['elements'][$key]['element_options'] = $options;
                break;
            default :
                break;
        }
    }
    foreach ($sections['elements'] as $element) {
        if (isset($element['element_disabled']))
            $element['element_class'] .= ' disable';
        if (isset($element['element_hidden']))
            $element['element_type'] = 'hidden';
        if (isset($element['element_create_only']) && $create != 0)
            $element['element_class'] .= ' disable';
//        if ($values && array_key_exists($element['element_name'], $values))
//            $element['element_default'] = $values[$element['element_name']];
        if (isset($element['element_value']))
            $element['element_default'] = $element['element_value'];
        if (!in_array($element['element_type'], HTML::getFieldsNoHead()))
            $html[] = Form::label('label', $element['element_label']);

        $html[] = createElementsInSection($element);
    }
    $html[] = HTML::fieldsetEnd();
    return join('', $html);
}

/**
 * 
 * @param type $sections
 * @param type $section_type
 * @param type $section_label
 * @param type $section_id
 * @param type $create
 * @param type $values
 * @return string
 */
function createGridSection($sections, $section_type, $section_label, $section_id, $create, $values) {
    $html[] = HTML::gridStart($section_type, $section_label, $sections['dependencies']);
    if (!isset(array_keys($sections['elements'])[0]))
        return '';
    $first_element_name = array_keys($sections['elements'])[0];
    $html[] = HTML::gridTableStart($section_id);
    $html[] = HTML::gridTableHeadStart();
    $html[] = HTML::gridTableTdStart();
    $html[] = HTML::gridTableTdEnd();

    foreach ($sections['elements'] as $element) {
        if (!in_array($element['element_type'], HTML::getFieldsNoHead())) {
            $html[] = HTML::gridTableHeadTdStart($element['element_label']);
        } else {
            $html[] = '<td></td>';
        }
    }

    $html[] = HTML::gridTableTdStart();
    $html[] = HTML::gridTableTdEnd();
    $html[] = HTML::gridTableHeadEnd();
    $html[] = HTML::gridTableBodyStart();
    foreach ($sections['elements'] as $key => $el) {
        switch ($el['element_type']) {
            case 'select':
                $options = [];
                //Add empty option
                $options[] = '';
                foreach ($el['element_options'] as $option)
                    $options[$option['id']] = $option['name'];
                $sections['elements'][$key]['element_options'] = $options;
                break;
            case 'autocomplete':
                $options = [];
                //Add empty option
                foreach ($el['element_options'] as $option)
                    $options[$option['id']] = array('value' => $option['id'], 'label' => $option['name']);
                $sections['elements'][$key]['element_options'] = $options;
                break;
            default :
                break;
        }
    }
    foreach ($sections['elements'][$first_element_name]['element_value'] as $id_grid_row => $element_value) {
        $html[] = HTML::gridTableTrStart($id_grid_row, $element_value['rows_group']);
        $html[] = HTML::gridTableTdStart();
        $html[] = HTML::gridАddRow();
        $html[] = HTML::gridTableTdEnd();
        $html[] = generateGridRow($sections['elements'], $section_id, $element_value, $id_grid_row, $create);
        $html[] = HTML::gridTableTdStart();
        $html[] = HTML::gridRemoveRow($sections['elements']);
        $html[] = HTML::gridTableTdEnd();
        $html[] = HTML::gridTableTrEnd();
    }
    $html[] = HTML::gridTableBodyEnd();
    $html[] = HTML::gridTableEnd();
    $html[] = HTML::gridEnd();
    return join('', $html);
}

/**
 * 
 * @param type $sections
 * @param type $section_type
 * @param type $section_label
 * @param type $create
 * @param type $values
 * @return type
 */
function createFiltersSection($sections, $section_type, $section_label, $create, $values) {
    $html[] = HTML::filtersStart($section_type, $section_label);
    foreach ($sections['elements'] as $key => $el) {
        switch ($el['element_type']) {
            case 'select':
                $options = [];
                //Add empty option
                $options[] = '';
                //$html[] = '<div class="input-group input-group-sm">';
                foreach ($el['element_options'] as $option) {
                    $options[$option['id']] = $option['name'];
                }

                $sections['elements'][$key]['element_options'] = $options;
                break;
            case 'autocomplete':
                $options = [];
                //Add empty option
                //$options[] = '';
                //$html[] = '<div class="input-group input-group-sm">';
                foreach ($el['element_options'] as $option) {
                    $options[$option['id']] = array('value' => $option['id'], 'label' => $option['name']);
                }

                $sections['elements'][$key]['element_options'] = $options;
                break;
            default :
                break;
        }
    }
    foreach ($sections['elements'] as $element) {
        if (isset($element['element_disabled']))
            $element['element_class'] .= ' disable';
        if (isset($element['element_hidden']))
            $element['element_type'] = 'hidden';
        if (isset($element['element_create_only']) && $create != 0)
            $element['element_class'] .= ' disable';
//        if ($values && array_key_exists($element['element_name'], $values))
//            $element['element_default'] = $values[$element['element_name']];
        if (isset($element['element_value']))
            $element['element_default'] = $element['element_value'];
        if (!in_array($element['element_type'], array('hidden', 'submit')))
            $html[] = Form::label('label', $element['element_label']);

        $html[] = createElementsInSection($element);
    }
    $html[] = HTML::filtersEnd();
    return join('', $html);
}

/**
 * 
 * @param type $sections_elements
 * @param type $section_id
 * @param type $element_value
 * @param type $id_grid_row
 * @param type $create
 * @return type
 */
function generateGridRow($sections_elements, $section_id, $element_value, $id_grid_row, $create) {
    $html = '';
    foreach ($sections_elements as $element) {
        $html[] = HTML::gridTableTdStart();
        if (isset($element['element_disabled']))
            $element['element_class'] .= ' disable';
        if (isset($element['element_hidden']))
            $element['element_type'] = 'hidden';
        if (isset($element['element_create_only']) && $create != 0)
            $element['element_class'] .= ' disable';
//        if (isset($element['element_value']))
//            $element['element_default'] = $element['element_value'][$id_grid_row];
        $element['element_name'] = str_replace("[", '[' . $section_id . '][' . $id_grid_row . '][', $element['element_name']);
        $html[] = createElementsInGridSection($element, $id_grid_row);
        $html[] = HTML::gridTableTdEnd();
    }
    return join('', $html);
}

/**
 * 
 * @param type $element
 * @param type $id_grid_row
 * @return type
 */
function createElementsInSection($element, $id_grid_row = null) {
    $html = '';
    switch ($element['element_type']) {
        case 'text':
            $html = Form::createTextElement($element);
            break;
        case 'file':
            $html = Form::createFileElement($element);
            break;
        case 'number':
            $html = Form::createNumberElement($element);
            break;
        case 'date':
            $html = Form::createDateElement($element);
            break;
        case 'datetime':
            $html = Form::createDateTimeElement($element);
            break;
        case 'select':
            if (isset($element['element_is_creatable'])) {
                $html = Form::createSelectElementWithCreatableOption($element);
            } else {
                $html = Form::createSelectElement($element);
            }
            break;
        case 'autocomplete':
            $html = Form::createAutocompleteElement($element);
            break;
        case 'textarea':
            $html = Form::createTextAreaElement($element);
            break;
        case 'hidden':
            $html = Form::createHiddenElement($element);
            break;
        case 'submit':
            $html = Form::createSubmitElement($element);
            break;
    }
    return $html;
}

/**
 * 
 * @param type $element
 * @param type $id_grid_row
 * @return type
 */
function createElementsInGridSection($element, $id_grid_row = null) {
    $html = '';
    switch ($element['element_type']) {
        case 'text':
            $html = Form::createTextElementInGrid($element, $id_grid_row);
            break;
        case 'file':
            $html = Form::createFileElementInGrid($element, $id_grid_row);
            break;
        case 'number':
            $html = Form::createNumberElementInGrid($element, $id_grid_row);
            break;
        case 'date':
            $html = Form::createTextElementInGrid($element, $id_grid_row);
            break;
        case 'datetime':
            $html = Form::createTextElementInGrid($element, $id_grid_row);
            break;
        case 'select':
            if (isset($element['element_is_creatable'])) {
                $html = Form::createSelectElementWithCreatableOptionInGrid($element, $id_grid_row);
            } else {
                $html = Form::createSelectElementInGrid($element, $id_grid_row);
            }
            break;
        case 'autocomplete':
            $html = Form::createAutocompleteElementInGrid($element, $id_grid_row);
            break;
        case 'textarea':
            $html = Form::createTextAreaElementInGrid($element, $id_grid_row);
            break;
        case 'hidden':
            $html = Form::createHiddenElementInGrid($element, $id_grid_row);
            break;
        case 'submit':
            $html = Form::createSubmitElementInGrid($element, $id_grid_row);
            break;
    }
    return $html;
}

/**
 * 
 * @param type $elementConfig
 * @param type $inserted_id
 * @return type
 */
function generateHTMLelement($elementConfig, $inserted_id) {
    $html = '';
    switch ($elementConfig['element_type']) {
        case 'select':
            $options = [];
            //Add empty option
            $options[] = '';
            foreach ($elementConfig['element_options'] as $option) {
                $options[$option['id']] = $option['name'];
            }
            $html = Form::select($elementConfig['element_name'], $options, $inserted_id, [
                        'class' => $elementConfig['element_class'],
                        'id' => $elementConfig['element_id'],
                        'name' => $elementConfig['element_name'],
                        'title' => $elementConfig['element_title'],
                        'style' => $elementConfig['element_style'],
                        'order' => $elementConfig['element_order'],
                        'rmID' => $elementConfig['refMapID'],
                        'placeholder' => $elementConfig['element_placeholder'],
                        'onchange' => $elementConfig['element_onchange'],
                        'onclick' => $elementConfig['element_onclick'],
                        'onselect' => $elementConfig['element_onselect'],
                        'onblur' => $elementConfig['element_onblur']
            ]);
            break;
    }
    return $html;
}

/**
 * 
 * @param type $header
 * @param type $sortOptions
 * @param type $sort
 * @param type $per_page
 * @param type $current_page
 * @param type $id
 * @param type $searchCriteria
 * @param type $allsearch
 * @param type $route_name
 * @return type
 */
function generateFilters($header, $sortOptions, $sort, $per_page, $current_page, $id, $searchCriteria, $allsearch, $route_name) {
    $tableFilters = array();
    $tableFilters[] = '<tr>';
    $countFilters = 0;
    $sortConfig = array_chunk($sortOptions, 2, false);
    $headerModified = array();
    $searchStrUrl = '';
    foreach ($searchCriteria as $s => $searchValue) {
        $searchStrUrl .= '&search-' . $s . '=' . $searchValue;
    }
    $searchStrUrl .= '&allsearch=' . $allsearch;
    foreach ($header as $key => $value) {
        $headerModified[] = $value;
    }
    $sortTmpKey = (int) ($sort / 2);
    foreach ($headerModified as $key => $value) {
        $sortConfigChunk = $sortConfig[$countFilters];
        if ($key == $sortTmpKey) {
            if ($sort % 2 == 0) {
                //$value = $sortConfigChunk[1];
                $value = '<strong><a href="' . URL::route($route_name, array($id)) . '?page=1&per_page=' . $per_page . '&sort=' . (($key * 2) + 1) . $searchStrUrl . '"> ' . $value . '<span class="glyphicon glyphicon-arrow-down"></span></a></strong>';
            } else {
                //$value = $sortConfigChunk[0];
                $value = '<strong><a href="' . URL::route($route_name, array($id)) . '?page=1&per_page=' . $per_page . '&sort=' . ($key * 2) . $searchStrUrl . '"> ' . $value . ' <span class="glyphicon glyphicon-arrow-up"></span></a></strong>';
            }
            $tableFilters[] = '<td>' . $value . '</td>';
        } else {
            $tableFilters[] = '<td><strong><a href="' . URL::route($route_name, array($id)) . '?page=1&per_page=' . $per_page . '&sort=' . $key * 2 . $searchStrUrl . '">' . $value . '</a></strong></td>';
        }
        $countFilters++;
    }
    $tableFilters[] = '
                        <td></td>
                        <td></td>
                        <td>
                            <a href="#" onclick="javascript: toggleFilters();">
                                <i class="icon-white glyphicon glyphicon-filter"></i> 
                            </a>
                        </td>';

    return join('', $tableFilters);
}

/**
 * Generates UL of opened objects of different types
 * @param type $openedObjects
 * @return string
 */
function openedObjectsTree($openedObjects) {
    $html = '<ul class="dropdown-menu" aria-expanded="true">';
    //FIRST LEVEL
    foreach ($openedObjects as $objectType => $data) {
        $html.=' <li class="menu-item dropdown dropdown-submenu">';
        $html.='<a href="#" class="dropdown-toggle" data-toggle="dropdown">' . $objectType . '</a>';
        //SECOND LEVEL
        $html.=' <ul class="dropdown-menu">';
        foreach ($data as $objectName => $openedObjects) {
            $html.=' <li class="menu-item dropdown dropdown-submenu">';
            $html.='<a href="#" class="dropdown-toggle" data-toggle="dropdown">' . $objectName . '</a>';
            //THIRD LEVEL
            $html.=' <ul class="dropdown-menu">';
            foreach ($openedObjects as $internal_number => $objectData) {
                if ($objectData['new'] == 1) {
                    $html.='<li class="menu-item "><a href="' . $objectData['url'] . '"><span class="glyphicon glyphicon-folder-open"></span>' . $internal_number . ', Opened:' . $objectData['created_at'] . '</a></li>';
                } else {
                    $html.='<li class="menu-item "><a href="' . $objectData['url'] . '"><span class="glyphicon glyphicon-edit"></span>' . $internal_number . ', Opened:' . $objectData['created_at'] . '</a></li>';
                }
            }
            $html.='</ul>';
            $html.='</li>';
        }
        $html.='</ul>';
        $html.='</li>';
    }

    $html.='<li role="separator" class="divider"></li>
          <li><a href="#" id="closeAllForms">
          <span class="glyphicon glyphicon-remove-circle"></span>' . Translation::get('labels_close-all') . '</a></li>';

    $html.='</ul>';
    return $html;
}

/**
 * Function that generates given widget's content
 */
function generateWidgetContent($widget) {
    $html = '';
    switch ($widget['widget_type']) {
        case 'grid':
            //Creating the table header
            $html.='<table class="table"><thead><tr>';
            foreach ($widget['widget_data'][0] as $cell_name => $cell_value)
                $html.='<th>' . $cell_name . '</th>';
            $html.='</tr></thead><tbody>';
            foreach ($widget['widget_data'] as $row) {
                $html.='<tr>';
                foreach ($row as $value)
                    $html.='<td>' . $value . '</td>';
                $html.='</tr>';
            }
            $html.='</tbody></table>';
            break;
        case 'calculator':
            $html.= file_get_contents(
                    asset('calculator.html')
            );
            break;
        default:
            break;
    }
    $widget['widget_data'] = $html;
    return $widget;
}

/*
 * Simple generateSimpleHTMLform
 */

function generateSimpleHTMLform($form, $create, $withCache = 0) {
    $html = array();
    $formId = array_keys($form)[0];
    $formConfig = $form[$formId]['form'];
    $formSections = $form[$formId]['sections'];
//    //crate cancelButton form
//    $html[] = Form::open([
//                'method' => 'POST',
//                'url' => route('discard_form_changes'),
//                'class' => 'cancelButton'
//    ]);
//    $html[] = HTML::submitCancel(array('class' => 'cancelButton btn btn-danger pull-right', 'name' => 'submit'), '<i class="glyphicon glyphicon-remove"></i>');
//    $html[] = Form::close();
    //Building the FORM
    $html[] = Form::formTitle($formConfig['form_name']);
    $html[] = Form::open([
                'url' => $formConfig['form_action'],
                'method' => $formConfig['form_method'],
                'class' => $formConfig['form_class'],
                'id' => $formConfig['form_id'],
                'files' => true
    ]);
    //Building the ELEMENTS
    $submit = '';
    $values = array();
    foreach ($formSections as $section => $sections) {
        switch ($sections['section_type']) {
            case '0':
                //create fieldset
                $section_type = 'fieldset';
                $html[] = createFieldsetSection($sections, $section_type, $sections['section_label'], $create, $values);
                break;
            case '1':
                //create grid
                $section_type = 'grid';
                $html[] = createGridSection($sections, $section_type, $sections['section_label'], $sections['section_id'], $create, $values);
                break;
            case '2':
                //create sub-grid
                $section_type = 'filters';
                $html[] = createFiltersSection($sections, $section_type, $sections['section_label'], $create, $values);
                break;
            case '3':
                //create sub-grid
                $section_type = 'sub-grid';
                $html[] = createGridSection($sections, $section_type, $sections['section_label'], $sections['section_id'], $create, $values);
                break;
            default:
                $section_type = 'fieldset';
                $html[] = createFieldsetSection($sections, $section_type, $sections['section_label'], $create, $values);
                break;
        }
    }
    $html[] = '<div class="col-md-12">' . $submit . '</div>';
    $html[] = Form::close();
//    $html[] = Form::formGroupClose();

    return join('', $html);
}

function generateDocumentPrintFormsDropDown($printForms, $id, $id_title) {
    $html = array();

    if (!$printForms)
        return false;

    $html[] = '<div class="btn-group">
        <button type="button" class="btn btn-info">
            <span style="padding: 0px 10px;" class="glyphicon glyphicon-print"></span>
        </button>
        <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <span class="caret"></span>
          <span class="sr-only">Toggle Dropdown</span>
        </button>
        <ul class="dropdown-menu">';

    foreach ($printForms as $key => $printForm) {
        $html[] = '<li><a href="' . route('show_document_print', array($id, $printForm['id'], $id_title)) . '" class="print-document" data-toggle="modal" data-target="#printFormModal" data-remote="false" id="print-' . $printForm['id'] . '" print-form-id="' . $printForm['id'] . '">' . $printForm['label'] . '</a></li>';
    }

    $html[] = '</ul></div>';

    return join('', $html);
}

function generateRerortPrintFormButtons($params) {
    if (!$params)
        return false;

    return http_build_query($params);
}

function arrayLanguagesToSelectOptions($data) {
    $options = [];

    foreach ($data as $key => $option) {
        $options[$option['language']] = $option['language'];
    }

    return $options;
}

function arrayCurrenciesToSelectOptions($data) {
    $options = [];

    foreach ($data as $key => $option) {
        $options[$option['id']] = $option['currency'];
    }

    return $options;
}

function arrayTimeZonesToSelectOptions($data) {
    $options = [];

    foreach ($data as $key => $option) {
        $options[$option['id']] = $option['time_zone'];
    }

    return $options;
}

function arrayToSelectOptions($data) {
    $options = [];

    foreach ($data as $option) {
        $options[$option['id']] = $option['name'];
    }

    return $options;
}

function arrayToSelectOptionsWithGroup($data, $groupBy) {
    $options = [];
        
    foreach($data as $option) {
        $options[$option[$groupBy]][$option['id']] = $option['name'];
    }
    
    return $options;
}

function arrayToSelectOptionsWithEmptyOption($label, $data) {
    $options = ['0' => UI::translate($label)];
    
    foreach ($data as $option) {
        $options[$option['id']] = $option['name'];
    }

    return $options;
}

function diffForHumman($datetime) {
    $date = \Carbon\Carbon::parse($datetime);

    return $date->diffForHumans();
}

function dateFromDatetime($datetime) {
    $date = \Carbon\Carbon::parse($datetime);

    return $date->toDateString();
}

function timeWithoutSeccondsFromDatetime($datetime) {
    $date = \Carbon\Carbon::parse($datetime);
    
    return $date->format('H:m');
}