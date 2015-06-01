<?php

namespace ItechSup\Widgets;
use ItechSup\Widget; // Nom de la classe qu'il utilise sans le .php

class InputRadio extends Widget{
    
    protected $type = 'radio';
	private $selectOptions;
	
    function __construct($name_widget, $label_widget = NULL, $options_widget=NULL, $options = NULL) {
        parent::__construct($name_widget, $label_widget, $options);
		$this->selectOptions = $options_widget;
    }
    function render() {
        $return = '<div class="champs"><label>'.$this->getLabel().' : '.$this->getLabelRequis().'</label><div class="bloc_radio">';
		foreach($this->selectOptions as $key => $value) {
			$return .= '<div class="champs_radio"><input type="radio" name="'.$this->getNom().'" value="'.$key.'" '.(($this->getValue() == $key)?'checked':'').' />'.$value.'</div>';
		}
		$return .= '</div>'
		.$this->getMessageErreur()
		.'</div>';
		return $return;
    }
}