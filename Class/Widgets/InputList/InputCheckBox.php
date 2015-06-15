<?php

namespace ItechSup\Widgets\InputList;

use ItechSup\Widgets\InputList; // Nom de la classe qu'il utilise sans le .php

/**
 * 
 */
class InputCheckBox extends InputList
{

    /**
     *
     * @var type 
     */
    protected $type = 'checkbox';
    private $selectOptions;

    /**
     * 
     * @param type $name_widget
     * @param type $label_widget
     * @param type $options_widget
     * @param type $options
     */
    public function __construct($name_widget, $label_widget = NULL, $options_widget = NULL, $options = NULL)
    {
        parent::__construct($name_widget, $label_widget, $options);
        $this->selectOptions = $options_widget;
    }

    /**
     * 
     * @param type $valeur
     * @param type $affichage
     * @return string
     */
    public function create_input($valeur, $affichage)
    {
        $return = '<div class="champs_checkbox"><input type="' . $this->type . '" name="' . $this->getNom() . '[' . $valeur . ']" value="true" ' . (($array[$valeur] == true) ? 'checked' : '') . ' />' . $affichage . '</div>';
        return $return;
    }

    /**
     * 
     * @return string
     */
    public function render()
    {
        $return = '<div class="champs"><label>' . $this->getLabel() . ' : ' . $this->getLabelRequis() . '</label><div class="bloc_checkbox">';
        $array = $this->getValue();
        foreach ($this->selectOptions as $key => $value) {
            if (is_array($value)) {
                $return .= '<fieldset><legend>' . $key . '</legend>';
                foreach ($value as $key2 => $value2) {
                    $return .= $this->create_input($key2, $value2);
                }
                $return .= '</fieldset>';
            } else {
                $return .= $this->create_input($key, $value);
            }
        }
        $return .= '</div>'
                . $this->getMessageErreur()
                . '</div>';
        return $return;
    }

}
