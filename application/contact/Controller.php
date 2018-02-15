<?php

class Controller extends ControllerCommon
{
    
    protected function _setDatas()
    {
        switch ( $this->_action )
        {
            default : 
                    $this->_checkMessageSent();
                break;
        }
    }
    
    private function _checkMessageSent()
    {
        $datas = array();
        $datas[ 'item' ] = array(
            'email' => ( isset($_POST['email']) ? $_POST['email'] : ''),
            'message' => ( isset($_POST['message']) ? $_POST['message'] : '')
        );

        if($this->_action === 'send' )
        {
            //$datas = $_POST;
            
            $values = array(
                'email' => [$_POST['email'], '*e'], 
                'message' => [$_POST['message'], '*s']
            );
            $datas = new DataValidation();
            $datas = $datas->validate($values);

            if ( isset($datas['error']) )
            {
                $datas[ 'displayMessage' ] = 'Une errur est survenue.<br>' . $datas['displayMessage'];
                $this->_view = 'contact';
                $this->_datas = $datas;
                return;
            }
            // send message by mail
            // mail( 'mymail@domain.net', 'Subject', $datas[ 'message' ], 'From:'.$datas[ 'email' ] );

            $datas[ 'displayMessage' ] = 'Envoi effectué avec succès.<br>' . $datas['displayMessage'];
            $this->_view = 'contact_sent';
        }
        else
        {
            $this->_view = 'contact';
        }

        $this->_datas = $datas;
    }
}
