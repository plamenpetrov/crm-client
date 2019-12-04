<div class="md-form">
    {!! 
    Form::text($name, $value, [
        'class' => 'form-control ' . $class,
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
    <label for="form1" class="">{!! $placeholder !!}</label>
</div>