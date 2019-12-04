<div class="form-lg mb-2">
    @include ('elements.label', ['placeholder' => $placeholder])
    {!! 
    Form::selectSpecial($name, arrayToSelectOptionsWithEmptyOption($label, $option), $value, [
        'class' => 'mdb-select colorful-select dropdown-primary validate ' . $class,
        'multiple' => true,
        'id' => $id,
        'name' => $name,
        'searchable' => $label,
        'style' => $style,
        'onchange' => $onchange,
        'onclick' => $onclick,
        'onselect' => $onselect,
        'onblur' => $onblur
    ], [0]);
    !!}
    <div class="help-block with-errors"></div>
    @include ('errors.type', ['name' => $name])
</div>