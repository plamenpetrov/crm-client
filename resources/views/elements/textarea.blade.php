<div class="">
    <div class="input-group">
        @include ('elements.label', ['placeholder' => $placeholder])
    </div>
    <i class="fa fa-map prefix"></i>
    {!! 
            Form::textarea($name, $value, [
                    'class' => 'md-textarea form-control validate ' . $class,
                    'id' => $id,
                    'name' => $name,
                    'style' => $style,
                    'onchange' => $onchange,
                    'onclick' => $onclick,
                    'onselect' => $onselect,
                    'onblur' => $onblur,
                    'rows' => 5,
                    'autocomplete' => 'off'
            ]);
        !!}
    <div class="help-block with-errors"></div>
    @include ('errors.type', ['name' => $name])
</div>
       
