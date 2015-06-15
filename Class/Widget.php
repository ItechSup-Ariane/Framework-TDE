<?php

namespace ItechSup;

use ItechSup\Validator; // Nom de la classe qu'il utilise sans le .php

abstract class Widget extends Validator
{

    private $nom;
    private $label;
    protected $value;
    private $requis;
    private $code = 0;
    private $libelle;
    private $options;
    private $labelRequis;

    public function __construct($nom, $label = NULL, $options = NULL)
    {
        $this->nom = $nom;
        $this->label = (($label != NULL) ? $label : $nom );
        $this->options = $options;
    }

    public function getNom()
    {
        return $this->nom;
    }

    public function getLabel()
    {
        return $this->label;
    }

    public function getValue()
    {
        if (isset($this->options['default']) && empty($this->value)) {
            $this->setValue($this->options['default']);
        }
        return $this->value;
    }

    public function getType()
    {
        return $this->type;
    }

    public function getRequis()
    {
        return $this->requis;
    }

    public function getCode()
    {
        return $this->code;
    }

    public function getLibelle()
    {
        return $this->libelle;
    }

    public function getOptions($option)
    {
        return $this->options[$option];
    }

    public function getLabelRequis()
    {
        if ($this->options['required'] == 1) {
            $this->setLabelRequis();
        }
        return $this->labelRequis;
    }

    public function getPlaceholder()
    {
        if (isset($this->options['placeholder'])) {
            $this->setPlaceholder($this->options['placeholder']);
        }
        return $this->placeholder;
    }

    public function getMessageErreur()
    {
        return $this->getLibelle();
    }

    public function getId()
    {
        if ($this->options['id'] != '') {
            $return = $this->options['id'];
        } else {
            $return = 'id_' . $this->getNom();
        }
        return $return;
    }

    protected function setType($type)
    {
        $this->type = $type;
    }

    protected function setNom($nom)
    {
        $this->nom = $nom;
    }

    protected function setLabel($label)
    {
        $this->label = $label;
    }

    protected function setValue($value)
    {
        $this->value = $value;
    }

    protected function setRequis($requis)
    {
        $this->requis = $requis;
    }

    protected function setCode($code)
    {
        $this->code = $code;
    }

    protected function setLibelle($libelle)
    {
        $this->libelle = $libelle;
    }

    protected function setLabelRequis()
    {
        $this->labelRequis = '<b class="asterix">*</b>';
    }

    protected function setPlaceholder($placeholder)
    {
        $this->placeholder = 'placeholder="' . $placeholder . '"';
    }

    public function render()
    {
        $return = '<div class="champs"><label>' . $this->getLabel() . ' : ' . $this->getLabelRequis() . '</label>
			<input id="' . $this->getId() . '" type="' . $this->getType() . '" name="' . $this->getNom() . '" value="' . $this->getValue() . '" ' . $this->getPlaceholder() . ' />'
                . $this->getMessageErreur()
                . '</div>';

        return $return;
    }

    /*
      function validate()
      {
      if ($this->getOptions('required')==1 && $this->getValue()=='') {
      $this->setLibelle('<div class="error_message">Le champ est requis et ne doit pas être vide.</div>');
      return false;
      } else {
      return true;
      }
      }
     */
}
