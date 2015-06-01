<?php

namespace ItechSup\Widgets\InputText;
use ItechSup\Widgets\InputText; // Nom de la classe qu'il utilise sans le .php

class InputPassword extends InputText{
    
	protected $type = 'password';
    function __construct($name_widget, $label_widget = NULL, $options_widget=NULL) {
        parent::__construct($name_widget, $label_widget, $options_widget);
    }
}