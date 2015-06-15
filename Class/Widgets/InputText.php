<?php

namespace ItechSup\Widgets;

use ItechSup\Widget; // Nom de la classe qu'il utilise sans le .php

class InputText extends Widget
{

    protected $type = 'text';

    function __construct($name_widget, $label_widget = NULL, $options_widget = NULL)
    {
        parent::__construct($name_widget, $label_widget, $options_widget);
    }

}
