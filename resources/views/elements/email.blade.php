<div class="form-lg mb-2">
    @include ('elements.label', ['placeholder' => $placeholder])
    <div class="input-group">
        <div class="input-group-prepend">
            <div class="input-group-text"><i class="fa fa-envelope prefix"></i></div>
        </div>
        {!! 
            Form::email($name, $value, [
            'class' => 'form-control validate ' . $class,
            'id' => $id,
            'name' => $name,
            'style' => $style,
            'onchange' => $onchange,
            'onclick' => $onclick,
            'onselect' => $onselect,
            'onblur' => $onblur,
            'autocomplete' => 'off'
            ]);
        !!}
    </div>
    <div class="help-block with-errors"></div>
    @include ('errors.type', ['name' => $name])
</div>
