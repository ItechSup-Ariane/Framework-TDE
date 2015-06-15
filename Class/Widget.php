<?php

namespace ItechSup;

use ItechSup\Validator; // Nom de la classe qu'il utilise sans le .php

/**
 * 
 * 
 */
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

    /**
     * 
     * @param type $nom
     * @param type $label
     * @param type $options
     */
    public function __construct($nom, $label = NULL, $options = NULL)
    {
        $this->nom = $nom;
        $this->label = (($label != NULL) ? $label : $nom );
        $this->options = $options;
    }

    /**
     * 
     * @return type
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * 
     * @return type
     */
    public function getLabel()
    {
        return $this->label;
    }

    /**
     * 
     * @return type
     */
    public function getValue()
    {
        if (isset($this->options['default']) && empty($this->value)) {
            $this->setValue($this->options['default']);
        }
        return $this->value;
    }

    /**
     * 
     * @return type
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * 
     * @return type
     */
    public function getRequis()
    {
        return $this->requis;
    }

    /**
     * 
     * @return type
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * 
     * @return type
     */
    public function getLibelle()
    {
        return $this->libelle;
    }

    /**
     * 
     * @param type $option
     * @return type
     */
    public function getOptions($option)
    {
        return $this->options[$option];
    }

    /**
     * 
     * @return type
     */
    public function getLabelRequis()
    {
        if ($this->options['required'] == 1) {
            $this->setLabelRequis();
        }
        return $this->labelRequis;
    }

    /**
     * 
     * @return type
     */
    public function getPlaceholder()
    {
        if (isset($this->options['placeholder'])) {
            $this->setPlaceholder($this->options['placeholder']);
        }
        return $this->placeholder;
    }

    /**
     * 
     * @return type
     */
    public function getMessageErreur()
    {
        return $this->getLibelle();
    }

    /**
     * 
     * @return string
     */
    public function getId()
    {
        if ($this->options['id'] != '') {
            $return = $this->options['id'];
        } else {
            $return = 'id_' . $this->getNom();
        }
        return $return;
    }

    /**
     * 
     * @param type $type
     */
    protected function setType($type)
    {
        $this->type = $type;
    }

    /**
     * 
     * @param type $nom
     */
    protected function setNom($nom)
    {
        $this->nom = $nom;
    }

    /**
     * 
     * @param type $label
     */
    protected function setLabel($label)
    {
        $this->label = $label;
    }

    /**
     * 
     * @param type $value
     */
    protected function setValue($value)
    {
        $this->value = $value;
    }

    /**
     * 
     * @param type $requis
     */
    protected function setRequis($requis)
    {
        $this->requis = $requis;
    }

    /**
     * 
     * @param type $code
     */
    protected function setCode($code)
    {
        $this->code = $code;
    }

    /**
     * 
     * @param type $libelle
     */
    protected function setLibelle($libelle)
    {
        $this->libelle = $libelle;
    }

    /**
     * 
     */
    protected function setLabelRequis()
    {
        $this->labelRequis = '<b class="asterix">*</b>';
    }

    /**
     * 
     * @param type $placeholder
     */
    protected function setPlaceholder($placeholder)
    {
        $this->placeholder = 'placeholder="' . $placeholder . '"';
    }

    /**
     * 
     * @return string
     */
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
