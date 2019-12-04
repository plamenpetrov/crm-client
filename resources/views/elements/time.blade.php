<div class="">
    @include ('elements.label', ['placeholder' => $placeholder])
    <div class="input-group">
        <div class="input-group-prepend">
            <div class="input-group-text"><i class="fas fa-clock"></i></div>
        </div>
        {!! 
            Form::text($name, $value, [
                    'class' => 'form-control validate timepicker ' . $class,
                    'id' => $id,
                    'name' => $name,
                    'title' => $title,
                    'style' => $style,
                    'onchange' => $onchange,
                    'onclick' => $onclick,
                    'onselect' => $onselect,
                    'onblur' => $onblur
            ]);
        !!}
    </div>
    <div class="help-block with-errors"></div>
    @include ('errors.type', ['name' => $name])
</div>
