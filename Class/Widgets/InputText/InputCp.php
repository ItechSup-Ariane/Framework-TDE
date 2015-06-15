<?php

namespace ItechSup\Widgets\InputText;

use ItechSup\Widgets\InputText; // Nom de la classe qu'il utilise sans le .php

class InputCp extends InputText
{

    /**
     * 
     * @param type $name_widget
     * @param type $label_widget
     * @param type $options_widget
     */
    public function __construct($name_widget, $label_widget = NULL, $options_widget = NULL)
    {
        parent::__construct($name_widget, $label_widget, $options_widget);
    }

    /**
     * 
     * @return boolean
     */
    public function validate()
    {
        if ($this->getValue() != '' && !preg_match("/^[0-9]{5}$/", $this->getValue())) {
            $this->setLibelle('<br /><b style="color: red;">Le champ est mal formaté.</b>');
            return false;
        } else {
            return parent::validate();
        }
    }

}
