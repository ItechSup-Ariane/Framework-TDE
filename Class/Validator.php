<?php

namespace ItechSup;
use ItechSup\Validator; // Nom de la classe qu'il utilise sans le .php

abstract class Validator{

	function validate(){
        if ($this->getOptions('required')==1 && $this->getValue()=='') {
            $this->setLibelle('<br /><b style="color: red;">Le champ est requis et ne doit pas être vide.</b>');
			return false;
        } 
        else {
			return true;
        }
    }
	
}