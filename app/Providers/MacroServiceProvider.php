<?php

namespace App\Providers;

use Collective\Html\HtmlServiceProvider;

class MacroServiceProvider extends HtmlServiceProvider {

    public function boot() {
        \Form::macro('selectSpecial', function($name, $options = [], $selected = null, $attributes = [], $disabled = []) {
            //TO DO:: optimization with array, not string concatenation
            $html = '<select name="' . $name . '"';
            foreach ($attributes as $attribute => $value) {
                $html .= ' ' . $attribute . '="' . $value . '"';
            }
            $html .= '>';

            foreach ($options as $value => $text) {
                $html .= '<option value="' . $value . '"' .
                        (in_array($value, $selected) ? ' selected="selected"' : '') .
                        (in_array($value, $disabled) ? ' disabled="disabled"' : '') . '>' .
                        $text . '</option>';
            }

            $html .= '</select>';
            
            return $html;
        });
    }

}
