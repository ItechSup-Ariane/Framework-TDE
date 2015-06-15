<?php

namespace ItechSup;

/**
 * File containing the various methods and functions of the Form class.<br />
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
     * Lets build the Form object<br />
     * It considers 3 parameters<br />
     * <br />
     * <li> $ name: the name of the form </li>
     * <li> $ method: the form submission method, by default POST </li>
     * <li> $ action: destination path after submission, by default NULL </li>
     * <br /><br />
     * Permet de construire l'objet Form<br />
     * Il prend en compte 3 paramètres<br />
     * <br />
     * <ul>
     * <li>$name : le nom du formulaire</li>
     * <li>$method : méthode de soumission du formulaire, par défaut POST</li>
     * <li>$action : chemin de destination après soumission, par défaut à vide</li>
     * </ul>
     */
    public function __construct($name, $method = 'POST', $action = '')
    {
        $this->method = $method;
        $this->action = $action;
        $this->name = $name;
    }

    /**
     * Render function
     * Return the form skeleton with fieldset
     * @return string
     */
    public function render()
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

    /**
     * Get Group
     * @return type
     */
    public function getGroup()
    {
        return $this->groups;
    }

    /**
     * Get Widget
     * @return type
     */
    public function getWidget()
    {
        return $this->inputs;
    }

    /**
     * Add Widget into the form
     * @param type $widget
     * @param type $groups
     */
    public function addWidget($widget, $groups = NULL)
    {
        $this->inputs[$widget->getNom()] = $widget;
        $this->groups[$groups][] = $this->inputs[$widget->getNom()];
    }

    /**
     * Bind data to the form
     * @param type $data
     */
    public function bind($data)
    {
        $inputs = $this->getWidget();
        foreach ($data as $key => $value) {
            $inputs[$key]->setValue($value);
        }
    }

    /**
     * Validate function
     * @return boolean
     */
    public function validate()
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
