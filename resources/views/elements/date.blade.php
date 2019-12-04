<div class="form-lg mb-2">
    @include ('elements.label', ['placeholder' => $placeholder])
    <div class="input-group">
        <div class="input-group-prepend">
            <div class="input-group-text"><i class="fa fa-calendar-check"></i></div>
        </div>
        {!! 
            Form::date($name, $value, [
                    'class' => 'form-control validate datepicker ' . $class,
                    'id' => $id,
                    'name' => $name,
                    'title' => $title,
                    'style' => $style,
                    'placeholder' => $placeholder,
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
