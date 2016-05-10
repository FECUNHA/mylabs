<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.

@author FERNANDO CUNHA
-->
<?php

    require 'LoginDAO.php';
    require 'LoginController.php';
?>


<html>
    <head>
        <meta charset="UTF-8">
        <title>Use exception for data validation</title>
    </head>
    <body>
        <?php
        
         if( !isset($_POST['submit']) ):
        ?>
        <form action="index.php" method="post">
             <div class="form-group">
                    <input id="loginEmail" name="email" type="text" class="form-control" placeholder="Email" tabindex="1">
                </div>
                <div class="form-group">
                    <input id="pwd" name="pwd" type="password" class="form-control" placeholder="password" tabindex="2">
                 </div>
                <div class="form-group">
                    <input class="btn btn-primary" name="submit" type="submit" value="Login" tabindex="3"/>
                </div>
        </form>
        
        <?php
        else:
           
            $email = $_POST['email'];
            $pwd   = $_POST['pwd'];
            
            try{
                 $controller = new LoginController();
                 $controller->isValidLogin($email, $pwd);
            
            }catch (PDOException $ex1) {
                print $ex1->getMessage();
            }
             catch (Exception $ex2) {
                print $ex2->getMessage();
            }
            
            
        endif;
        ?>
    </body>
</html>
