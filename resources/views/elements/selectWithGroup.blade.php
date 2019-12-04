<div class="form-lg mb-2">
    @include ('elements.label', ['placeholder' => $placeholder])
    {!! 
    Form::select($name, arrayToSelectOptionsWithGroup($option, 'eventtypeid'), $value, [
        'class' => 'mdb-select colorful-select dropdown-primary validate ' . $class,
        'id' => $id,
        'name' => $name,
        'searchable' => $label,
        'style' => $style,
        'onchange' => $onchange,
        'onclick' => $onclick,
        'onselect' => $onselect,
        'onblur' => $onblur
    ]);
    !!}
    <div class="help-block with-errors"></div>
    @include ('errors.type', ['name' => $name])
</div>