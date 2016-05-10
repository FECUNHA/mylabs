<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 * @author FERNANDO CUNHA
 */


class LoginController{
    
     public function __construct() {
         
     }
                
    public function isValidLogin($email, $pwd){
        
        try{
           
             if($email=="" || $pwd==""):
                 throw new Exception ("Login ou senha vazios");
              endif;
            
            $loginDB = new LoginDAO();
            if($loginDB->isValidLoginDB($email, $pwd) === true):
                print "login existe";
            endif;
            
        } catch (Exception $ex2) {
                throw $ex2;
        }
        
    }
    
}