<?php

class ControllerCommon
{
    
    protected $_page;
    protected $_action;
    protected $_datas;
    protected $_view;

    function __construct( $page, $action ) {
        $this->_page = $page;
        $this->_action = $action;
        
        $this->_setDatas();
    }
    
    /**
     * Format the error to be displayed in the form
     * @param array $datas Array that hold all information (page, action, form, error, ...)
     * @param string $field Field name of the form
     * @param string $type type of value to return (message, class)
     * @return string
     */
    public function formError( $datas, $field, $type )
    {
        if ( isset( $datas['error'][$field] ) )
        {
            if ( $datas['error'][$field] == 'empty' )
            {
                if ( $type == 'message' )
                {
                    return '<span class="alert">Veuillez remplir le champ ' . $field . '</span><br>';
                }
                if ( $type == 'class' )
                {
                    return 'empty';
                }
            }
            if ( $datas['error'][$field] == 'invalid' )
            {
                if ( $type == 'message' )
                {
                    return '<span class="alert">Le format du champ ' . $field . ' n\'est pas valide.</span><br>';
                }
                if ( $type == 'class' )
                {
                    return 'invalid';
                }
            }
        }
    }
    
    
    public function get_datas()
    {
        return $this->_datas;
    }
    
    public function get_view()
    {
        return $this->_view;
    }
    
}
