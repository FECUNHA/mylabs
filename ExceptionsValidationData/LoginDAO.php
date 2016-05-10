<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of LoginDAO
 *
 * @author FERNANDO CUNHA
 */
class LoginDAO {
      public function __construct() {
         
     }
                
    public function isValidLoginDB($email, $pwd){
        
        $ret = false;
        try{
            // nesse ponto deveria ser adicionado um comando SQL
            //PARA VALIDAR O USUARIO
            
            if($email=="teste@gmail.com" && $pwd=="123456"):
                $ret = true;
            else:
                throw new PDOException("usuario nao existe no cadastro"); 
            endif;
        
        }catch (PDOException $ex) {
                throw $ex;
        }
        return $ret;
    }
}
