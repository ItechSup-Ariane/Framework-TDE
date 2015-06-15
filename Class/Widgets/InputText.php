<?php

namespace ItechSup\Widgets;

use ItechSup\Widget; // Nom de la classe qu'il utilise sans le .php

class InputText extends Widget
{

    /**
     *
     * @var type 
     */
    protected $type = 'text';

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

}
