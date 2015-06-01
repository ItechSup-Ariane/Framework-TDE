<?php

namespace ItechSup;

abstract class Widget{
    
    private $nom;
    private $label;
    protected $value;
    private $requis;
    private $code = 0;
    private $libelle;
    private $options;
	private $labelRequis;
    
    function __construct($nom, $label = NULL, $options = NULL) {
        $this->nom = $nom;
        $this->label = (($label != NULL) ? $label : $nom );
        $this->options = $options;
    }
    
	function getNom() {
        return $this->nom;
    }
    function getLabel() {
        return $this->label;
    }
    function getValue() {
		if (isset($this->options['default'])) {
			$this->setValue($this->options['default']);
		}
        return $this->value;
    }
    function getType() {
        return $this->type;
    }
    function getRequis() {
        return $this->requis;
    }
    function getCode() {
        return $this->code;
    }
    function getLibelle() {
        return $this->libelle;
    }
    function getOptions($option) {
        return $this->options[$option];
    }
	function getLabelRequis() {
		if ($this->options['required']==1) {
			$this->setLabelRequis();
		}			
		return $this->labelRequis;
	}
	function getPlaceholder() {
		if (isset($this->options['placeholder'])) {
			$this->setPlaceholder($this->options['placeholder']);
		}			
		return $this->placeholder;
	}
	function getMessageErreur() {
		return $this->getLibelle();
	}
	function getId() {
		if ($this->options['id']!='') {
			$return = $this->options['id'];
		}
		else {
			$return = 'id_'.$this->getNom();
		}
		return $return;
	}
        
    function setType($type) {
        $this->type = $type;
    }
    function setNom($nom) {
        $this->nom = $nom;
    }
    function setLabel($label) {
        $this->label = $label;
    }
    function setValue($value) {
        $this->value = $value;
    }
    function setRequis($requis) {
        $this->requis = $requis;
    }
    function setCode($code) {
        $this->code = $code;
    }
    function setLibelle($libelle) {
        $this->libelle = $libelle;
    }
    function setLabelRequis() {
		$this->labelRequis = '<b style="color: red;">*</b>';
	}
    function setPlaceholder($placeholder) {
		$this->placeholder = 'placeholder="'.$placeholder.'"';
	}
	
    function render() {
		$return = '<div class="champs"><label>'.$this->getLabel().' : '.$this->getLabelRequis().'</label>
			<input id="'.$this->getId().'" type="'.$this->getType().'" name="'.$this->getNom().'" value="'.$this->getValue().'" '.$this->getPlaceholder().' />'
			.$this->getMessageErreur()
			.'</div>';
		
		return $return; 
    }
    
    function validate(){
        if ($this->getOptions('required')==1 && $this->getValue()=='') {
            $this->setLibelle('<div class="error_message">Le champ est requis et ne doit pas être vide.</div>');
			return false;
        } 
        else {
			return true;
        }
    }
}
