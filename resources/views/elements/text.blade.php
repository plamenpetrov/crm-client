<div class="form-lg mb-2">
    @include ('elements.label', ['placeholder' => $placeholder])
    {!! 
        Form::text($name, $value, [
                'class' => 'form-control validate ' . $class,
                'id' => $id,
                'name' => $name,
                'title' => $title,
                'style' => $style,
                'onchange' => $onchange,
                'onclick' => $onclick,
                'onselect' => $onselect,
                'onblur' => $onblur,
                'autocomplete' => 'off'
        ]);
    !!}
    <div class="help-block with-errors"></div>
    @include ('errors.type', ['name' => $name])
</div>