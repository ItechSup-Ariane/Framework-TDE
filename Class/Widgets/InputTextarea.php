<?php

namespace ItechSup\Widgets;

use ItechSup\Widget; // Nom de la classe qu'il utilise sans le .php

class InputTextarea extends Widget
{

    /**
     *
     * @var type 
     */
    public $type = 'textarea';

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
     * @return string
     */
    public function render()
    {
        $return = '<div class="champs"><label>' . $this->getLabel() . ' : </label>'
                . '<textarea name="' . $this->getNom() . '">' . $this->getValue() . '</textarea>'
                . '</div>';
        return $return;
    }

}
