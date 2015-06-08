<?php

namespace ItechSup\Widgets\InputList;
use ItechSup\Widgets\InputList; // Nom de la classe qu'il utilise sans le .php

class InputRadio extends InputList{
    
    protected $type = 'radio';
	private $selectOptions;
	
    function __construct($name_widget, $label_widget = NULL, $options_widget=NULL, $options = NULL) {
        parent::__construct($name_widget, $label_widget, $options);
		$this->selectOptions = $options_widget;
    }
	function create_input($valeur,$affichage) {
		$return = '<div class="champs_radio"><input type="'.$this->type.'" name="'.$this->getNom().'" value="'.$valeur.'" '.(($this->getValue() == $valeur)?'checked':'').' />'.$affichage.'</div>';
		return $return;
	}
    function render() {
        $return = '<div class="champs"><label>'.$this->getLabel().' : '.$this->getLabelRequis().'</label><div class="bloc_radio">';
		foreach($this->selectOptions as $key => $value) {
			if (is_array($value)){
				$return .= '<fieldset><legend>'.$key.'</legend>';
				foreach($value as $key2 => $value2) {
					$return .= $this->create_input($key2,$value2);
				}
				$return .= '</fieldset>';
			}
			else {
				$return .= $this->create_input($key,$value);
			}
		}
		$return .= '</div>'
		.$this->getMessageErreur()
		.'</div>';
		return $return;
    }
}