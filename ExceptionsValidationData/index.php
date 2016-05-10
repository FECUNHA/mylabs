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
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    <body>
        <?php
        
         if( !isset($_POST['submit']) ):
        ?>
        <form action="index.php" method="post">
            <h1>Login de acesso</h1>
             <div class="form-group">
                 <input id="loginEmail" name="email" type="text" class="form-control" placeholder="Email" tabindex="1" style="width:40%">
                </div>
                <div class="form-group">
                    <input id="pwd" name="pwd" type="password" class="form-control" placeholder="password" tabindex="2" style="width:40%">
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
