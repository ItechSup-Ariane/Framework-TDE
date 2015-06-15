<?php

namespace ItechSup\Widgets;

use ItechSup\Widget; // Nom de la classe qu'il utilise sans le .php

class InputButton extends Widget
{

    /**
     * 
     * @param type $name
     * @param type $value
     * @param type $type
     */
    public function __construct($name, $value, $type)
    {
        parent::__construct($name);
        $this->value = $value;
        $this->type = $type;
    }

    /**
     * 
     * @return string
     */
    public function render()
    {
        $return = '<div class="champs"><input type="' . $this->getType() . '" value="' . $this->getValue() . '" name="' . $this->getNom() . '" /></div>';
        return $return;
    }

}
