<?php

namespace ItechSup\Widgets;
use ItechSup\Widget; // Nom de la classe qu'il utilise sans le .php

class InputSelect extends Widget{
    
    protected $type = 'select';
	private $selectOptions;
	
    function __construct($name_widget, $label_widget = NULL, $options_widget=NULL, $options = NULL) {
        parent::__construct($name_widget, $label_widget, $options);
		$this->selectOptions = $options_widget;
    }
    function render() {
        $return = '<div class="champs"><label>'.$this->getLabel().' : '.$this->getLabelRequis().'</label>
		<select name="'.$this->getNom().($this->getOptions('multiple')?'[]':'').'" '.($this->getOptions('multiple')?'multiple':'').'>';
		foreach($this->selectOptions as $key => $value) {
			if ($this->getOptions('multiple')) $return .= '<option value="'.$key.'" '.(in_array($key,$this->selectOptions)?'selected':'').'>'.$value.'</option>';
			else $return .= '<option value="'.$key.'" '.(($this->getValue() == $key)?'selected':'').'>'.$value.'</option>';
		}
		$return .= '</select>'
		.$this->getMessageErreur()
		.'</div>';
		return $return;
    }
}