<?php

namespace ItechSup\Widgets\InputList;

use ItechSup\Widgets\InputList; // Nom de la classe qu'il utilise sans le .php

class InputSelect extends InputList
{

    /**
     *
     * @var type 
     */
    protected $type = 'select';
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
        if ($this->getOptions('multiple')) {
            $return = '<option value="' . $valeur . '" ' . ((is_array($this->getValue())) ? (in_array($valeur, $this->getValue()) ? 'selected' : '') : '') . '>' . $affichage . '</option>';
        } else {
            $return = '<option value="' . $valeur . '" ' . (($this->getValue() == $valeur) ? 'selected' : '') . '>' . $affichage . '</option>';
        }
        return $return;
    }

    /**
     * 
     * @return string
     */
    public function render()
    {
        $return = '<div class="champs"><label>' . $this->getLabel() . ' : ' . $this->getLabelRequis() . '</label>
		<select name="' . $this->getNom() . ($this->getOptions('multiple') ? '[]' : '') . '" ' . ($this->getOptions('multiple') ? 'multiple' : '') . '>';
        foreach ($this->selectOptions as $key => $value) {
            if (is_array($value)) {
                $return .= '<optgroup label="' . $key . '">';
                foreach ($value as $key2 => $value2) {
                    $return .= $this->create_input($key2, $value2);
                }
                $return .= '</optgroup>';
            } else {
                $return .= $this->create_input($key, $value);
            }
        }
        $return .= '</select>'
                . $this->getMessageErreur()
                . '</div>';
        return $return;
    }

}
