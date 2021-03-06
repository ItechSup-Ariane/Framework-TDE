<?php

namespace ItechSup\Widgets;

use ItechSup\Widget; // Nom de la classe qu'il utilise sans le .php

class InputTel extends Widget
{

    /**
     *
     * @var type 
     */
    public $type = 'tel';

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
        if ($this->getValue() != '' && !preg_match("/^(0[1-9]|\+?33[1-9]|\+?33\([1-9]\))?([-. ]?[0-9]{2}){4}/", $this->getValue())) {
            $this->setLibelle('<br /><b style="color: red;">Le numéro de téléphone est mal formaté.</b>');
            return false;
        } else {
            return parent::validate();
        }
    }

}
