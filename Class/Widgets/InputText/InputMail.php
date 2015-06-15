<?php

namespace ItechSup\Widgets\InputText;

use ItechSup\Widgets\InputText; // Nom de la classe qu'il utilise sans le .php

class InputMail extends InputText
{

    protected $type = 'mail';

    function __construct($name_widget, $label_widget = NULL, $options_widget = NULL)
    {
        parent::__construct($name_widget, $label_widget, $options_widget);
    }

    function validate()
    {
        if ($this->getValue() != '' && !preg_match("/^[-0-9a-zA-Z.+_]+@[-0-9a-zA-Z.+_]+\.[a-zA-Z]{2,4}$/", $this->getValue())) {
            $this->setLibelle('<br /><b style="color: red;">L\'adresse email est mal formatée.</b>');
            return false;
        } else {
            return parent::validate();
        }
    }

}
