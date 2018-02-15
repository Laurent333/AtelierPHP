<?php

class DataValidation
{
    private $charToReplaceSrc = array('a', '<', '>');
    private $charToReplaceDst = array('a', '' , '' );
    
    /**
    * Valide les données
    * @param array $values les données
    * @return array le resultat
    */
    public function validate($_values)
    {
        $result = array();
        $result['displayMessage'] = '';
        
        foreach ($_values as $field => $values){
            $value = $values[0];
            $option = $values[1];
            
            /**
             * Remplace les caractères selon le pattern + trim
             */
            if ($value != ''){
                $result['item'][$field] = trim(str_replace($this->charToReplaceSrc, $this->charToReplaceDst, $value));
            } else {
                $result['item'][$field] = '';
            }
            
            /**
             * Vérifie si le champ est vide ET si il est requis
             */
            if (empty($result['item'][$field]) && strpos($option, '*') !== false){
                $result['error'][$field] = 'empty';
                $result['displayMessage'].= '- Veuillez remplir le champ: '.$field.'.<br>';
            }
            
            /**
             * Verifie la validité des données
             * s = string
             * i = integer
             * e = email
             */
            if (!empty($result['item'][$field])){
                
                if (strpos($option, 's') !== false && !is_string($result['item'][$field])){
                    $result['error'][$field] = 'invalid';
                    
                }else if (strpos($option, 'i') !== false && !is_numeric($result['item'][$field])){
                    $result['error'][$field] = 'invalid';
                    
                }else if (strpos($option, 'e') !== false && !filter_var($result['item'][$field], FILTER_VALIDATE_EMAIL)){
                    $result['error'][$field] = 'invalid';
                    $result['displayMessage'].= '- L\'E-mail est incorrect.<br>';
                    
                }
            }
            
        }
        return $result;
    }
}
