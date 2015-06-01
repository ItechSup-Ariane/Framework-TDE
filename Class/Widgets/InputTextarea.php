<?php

namespace ItechSup\Widgets;
use ItechSup\Widget; // Nom de la classe qu'il utilise sans le .php

class InputTextarea extends Widget{
    
    public $type = 'textarea';
    function __construct($name_widget, $label_widget = NULL, $options_widget=NULL) {
        parent::__construct($name_widget, $label_widget, $options_widget);
    }
    function render() {
        $return = '<div class="champs"><label>'.$this->getLabel().' : </label>
		<textarea name="'.$this->getNom().'">'.$this->getValue().'</textarea>
		</div>';
		return $return;
    }
}