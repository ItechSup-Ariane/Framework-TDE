<?php

namespace ItechSup;

class Validator
{

    /**
     * Validate function<br />
     * return TRUE if no error
     * else return FALSE and a message
     * @return boolean
     */
    public function validate()
    {
        if ($this->getOptions('required') == 1 && $this->getValue() == '') {
            $this->setLibelle('<div class="error_message">Le champ est requis et ne doit pas être vide.</div>');
            return false;
        } else {
            return true;
        }
    }

}
