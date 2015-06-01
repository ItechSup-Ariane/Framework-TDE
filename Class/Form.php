<?php 

namespace ItechSup;

class Form {
    
    private $method;
    private $inputs = array();
    private $action;
    private $name;
    
    function __construct($name, $method = 'POST', $action = '') {
        $this->method = $method;
        $this->action = $action;
        $this->name = $name;
    }
	function render(){
		$return = '<form method="'.$this->method.'" action="'.$this->action.'" name="'.$this->name.'">';
		foreach($this->getWidget() as $key => $value){
			$return .= $value->render();
		}
		$return .= '</form>';
		return $return;
	}
	
	function getWidget(){
		return $this->inputs;
	}
	function addWidget($widget){
		$this->inputs[$widget->getNom()] = $widget;
	}	
	
	function bind($data){
		$inputs = $this->getWidget();
		foreach($data as $key => $value){
			$inputs[$key]->setValue($value);
		}
	}
	
	function validate(){
		$error = true;
		$inputs = $this->getWidget();
		foreach($inputs as $key => $value){
			if ($inputs[$key]->validate() == false) $error = false;
		}
		return $error;
	}
}