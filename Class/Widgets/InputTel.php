<?php

namespace ItechSup\Widgets;
use ItechSup\Widget; // Nom de la classe qu'il utilise sans le .php

class InputTel extends Widget{
    
    public $type = 'tel';
    function __construct($name_widget, $label_widget = NULL, $options_widget=NULL) {
        parent::__construct($name_widget, $label_widget, $options_widget);
    }
    function validate(){
		/*
			(0[1-9]|\+?33[1-9]|\+?33\([1-9]\))? => 02 OU +332 OU 332 OU +33(2) OU 33(2) MAIS PAS OBLIGATOIRE
			([-. ]?[0-9]{2}){4} => 4 groupes de 2 chiffres avec ou sans (-. )
		*/
		if ($this->getValue()!= '' && !preg_match("/^(0[1-9]|\+?33[1-9]|\+?33\([1-9]\))?([-. ]?[0-9]{2}){4}/",$this->getValue())) {
            $this->setLibelle('<br /><b style="color: red;">Le numéro de téléphone est mal formaté.</b>');
			return false;
        }
        else {
           return parent::validate();
        }
    }
}