<?php

namespace ItechSup\Widgets\InputList;
use ItechSup\Widgets\InputList; // Nom de la classe qu'il utilise sans le .php

class InputSelect extends InputList{
    
    protected $type = 'select';
	private $selectOptions;
	
    function __construct($name_widget, $label_widget = NULL, $options_widget=NULL, $options = NULL) {
        parent::__construct($name_widget, $label_widget, $options);
		$this->selectOptions = $options_widget;
    }
	function create_input($valeur,$affichage) {
		if ($this->getOptions('multiple')) $return = '<option value="'.$valeur.'" '.((is_array($this->getValue()))?(in_array($valeur,$this->getValue())?'selected':''):'').'>'.$affichage.'</option>';
		else $return = '<option value="'.$valeur.'" '.(($this->getValue() == $valeur)?'selected':'').'>'.$affichage.'</option>';
		return $return;
	}
    function render() {
        $return = '<div class="champs"><label>'.$this->getLabel().' : '.$this->getLabelRequis().'</label>
		<select name="'.$this->getNom().($this->getOptions('multiple')?'[]':'').'" '.($this->getOptions('multiple')?'multiple':'').'>';
		foreach($this->selectOptions as $key => $value) {
			if (is_array($value)){
				$return .= '<optgroup label="'.$key.'">';
				foreach($value as $key2 => $value2) {
					$return .= $this->create_input($key2,$value2);
				}
				$return .= '</optgroup>';
			}
			else {
				$return .= $this->create_input($key,$value);
			}
		}
		$return .= '</select>'
		.$this->getMessageErreur()
		.'</div>';
		return $return;
    }
}