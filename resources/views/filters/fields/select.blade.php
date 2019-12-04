{!! 
    Form::select($name, arrayToSelectOptions($option), $value, [
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