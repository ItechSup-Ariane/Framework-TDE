<?php

namespace ItechSup;

/**
 * Fichier contenant les différentes méthodes et fonctions de la classe Form.
 * <ul>
 * <li>__construct()</li>
 * <li>render()</li>
 * <li>getGroup()</li>
 * <li>getWidget()</li>
 * <li>addWidget()</li>
 * <li>bind()</li>
 * <li>validate()</li>
 * </ul>
 */
class Form
{

    private $method;
    private $inputs = array();
    private $groups = array();
    private $action;
    private $name;

    /**
     * Permet de construire l'objet Form
     * Il prend en compte 3 paramètres
     * <ul>
     * <li>$name : le nom du formulaire</li>
     * <li>$method : méthode de soumission du formulaire, par défaut POST</li>
     * <li>$action : chemin de destination après soumission, par défaut à vide</li>
     * </ul>
     */
    function __construct($name, $method = 'POST', $action = '')
    {
        $this->method = $method;
        $this->action = $action;
        $this->name = $name;
    }

    function render()
    {
        $return = '<form method="' . $this->method . '" action="' . $this->action . '" name="' . $this->name . '">';
        foreach ($this->getGroup() as $key => $value) {
            if (!empty($key)) {
                $return .= '<fieldset><legend>' . $key . '</legend>';
            }
            foreach ($value as $key2 => $value2) {
                $return .= $value2->render();
            }
            if (!empty($key)) {
                $return .= '</fieldset>';
            }
        }
        $return .= '</form>';
        return $return;
    }

    function getGroup()
    {
        return $this->groups;
    }

    function getWidget()
    {
        return $this->inputs;
    }

    function addWidget($widget, $groups = NULL)
    {
        $this->inputs[$widget->getNom()] = $widget;
        $this->groups[$groups][] = $this->inputs[$widget->getNom()];
    }

    function bind($data)
    {
        $inputs = $this->getWidget();
        foreach ($data as $key => $value) {
            $inputs[$key]->setValue($value);
        }
    }

    function validate()
    {
        $error = true;
        $inputs = $this->getWidget();
        foreach ($inputs as $key => $value) {
            if ($inputs[$key]->validate() == false) {
                $error = false;
            }
        }
        return $error;
    }

}
