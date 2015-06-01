<?php

namespace ItechSup\Widgets;
use ItechSup\Widget; // Nom de la classe qu'il utilise sans le .php

class InputCheckBox extends Widget{
    
    protected $type = 'checkbox';
	private $selectOptions;
	
    function __construct($name_widget, $label_widget = NULL, $options_widget=NULL, $options = NULL) {
        parent::__construct($name_widget, $label_widget, $options);
		$this->selectOptions = $options_widget;
    }
    function render() {
        $return = '<div class="champs"><label>'.$this->getLabel().' : '.$this->getLabelRequis().'</label><div class="bloc_checkbox">';
		$array = $this->getValue();
		foreach($this->selectOptions as $key => $value) {
			$return .= '<div class="champs_checkbox"><input type="'.$this->type.'" name="'.$this->getNom().'['.$key.']" value="true" '.(($array[$key] == true)?'checked':'').' />'.$value.'</div>';
		}
		$return .= '</div>'
		.$this->getMessageErreur()
		.'</div>';
		return $return;
    }
}