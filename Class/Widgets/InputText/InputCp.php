<?php

namespace ItechSup\Widgets\InputText;
use ItechSup\Widgets\InputText; // Nom de la classe qu'il utilise sans le .php

class InputCp extends InputText{
    
    function __construct($name_widget, $label_widget = NULL, $options_widget=NULL) {
        parent::__construct($name_widget, $label_widget, $options_widget);
    }
    function validate(){
		if ( $this->getValue() != '' && !preg_match("/^[0-9]{5}$/",$this->getValue())){
            $this->setLibelle('<br /><b style="color: red;">Le champ est mal formaté.</b>');
			return false;
        }
        else {
           return parent::validate();
        }
    }
}