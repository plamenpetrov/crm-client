<div class="form-group">
    <div class="col-lg-10">
        <label class="col-lg-2 control-label">{!! $label !!}</label>
        {!! 
            Form::file($name, [
                    'class' => 'form-control ' . $class,
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
        <div class="help-block with-errors"></div>
        @include ('errors.type', ['name' => $name])
    </div>
</div>