<?php

class Controller extends ControllerSharedFunction
{
    
    protected function _setDatas()
    {
        switch ( $this->_action )
        {
            case 'detail' : 
                    return $this->_article();
                break;
            
            case 'form' : 
                    return $this->_article();
                break;
            
            case 'insert' : 
                    return $this->_insert();
                break;
            
            case 'update' : 
                    return $this->_update();
                break;
            
            case 'delete' : 
                    return $this->_delete();
                break;

            default : 
                    return $this->_articles();
                break;
        }
    }

    private function _articles()
    {
        $datas = array();

        $db = Db::connect();

        $results = $db->query( 'SELECT * FROM articles' );

        if( !$db->errno && $results->num_rows > 0 )
        {
            while ( $row = $results->fetch_array() ){
                $datas[ 'item' ][] = $row;
            }
        }

        $datas[ 'view' ] = 'articles';

        return $datas;
    }


    private function _article( $_id = null )
    {
        
        $datas = $_POST;
        
        if ( isset( $_id ) )
        {
            $id = $_id;
        }
        else if ( isset( $_GET['id'] ) )
        {
            $id = $_GET['id'];
        }
        else
        {
            $id = null;
        }

        if ( $id ){
            $db = Db::connect();

            $results = $db->query( 'SELECT * FROM articles WHERE IdArticle = \''.$db->real_escape_string($id).'\'' );

            if( !$db->errno && $results->num_rows > 0 )
            {
                $datas[ 'item' ] = $results->fetch_array();
            }
        }
        
        if ( $this->_action == 'form' ){
            $datas[ 'view' ] = 'article_form';
        }else{
            $datas[ 'view' ] = 'article_detail';
        }

        return $datas;
    }

    
    private function _insert()
    {
        
        $values = array(/* DB field:string, [form field:$_POST, option:string]:array */
            'TitleArticle' => [$_POST['TitleArticle'], '*s'], 
            'IntroArticle' => [$_POST['IntroArticle'], '*s'], 
            'ContentArticle' => [$_POST['ContentArticle'], '*s']
        );
        
        $query = new Query();
        $datas = $query->insert( 'articles', $values );
        
        if ( $datas['error'] )
        {
            $datas['view'] = 'article_form';
            $datas['displayMessage'] = 'Une erreur est survenue.<br>' . $datas['displayMessage'];
        }
        else
        {
            header( 'location:index.php?page=articles' );
            $datas['view'] = 'articles';
            $datas['displayMessage'] = 'Enregistrement effectué avec succès.<br>' . $datas['displayMessage'];
        }
        
        return $datas;
    }
    
    /**
    * Mise à jour de donnees
    * @param string $table la table d'insertion
    * @param array $values les champs et valeurs respectivement key=>value
    * @param string $id l'identifiant pour l'insertion
    */    
    private function _update()
    {
        
        if ( isset($_POST['TitleArticle']) && 
             isset($_POST['IntroArticle']) && 
             isset($_POST['ContentArticle']))
        {
            $values = array(
                'TitleArticle' => [$_POST['TitleArticle'], '*s'], 
                'IntroArticle' => [$_POST['IntroArticle'], '*s'], 
                'ContentArticle' => [$_POST['ContentArticle'], '*s']
            );

            $condition = 'IdArticle = ' . $_GET['id'];

            $query = new Query();
            $datas = $query->update( 'articles', $values, $condition );
            
            if ( $datas['error'] )
            {
                $datas['displayMessage'] = 'Une erreur est survenue.<br>' . $datas['displayMessage'];
            }
            else
            {
                $datas['item'] = $this->_article( $_GET['id'] );
                $datas['displayMessage'] = 'Enregistrement effectué avec succès.<br>' . $datas['displayMessage'];
            }
        }
        else
        {
            $datas['error'] = 'no_form_send';
        }
        
        $datas['view'] = 'article_form';
        
        return $datas;
    }

    
}
