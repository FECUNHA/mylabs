<?php

class UserModel {

    private $nmUser;
    private $login;
    private $pwdUser;

    public function getNmUser() {
        return $this->nmUser;
    }

    public function setNmUser($nmUser) {
        $this->nmUser = $nmUser;
    }

    public function getLogin() {
        return $this->login;
    }

    public function setLogin($login) {
        $this->login = $login;
    }

    public function getPwdUser() {
        return $this->senha;
    }

    public function setPwdUser($pwdUser) {
        $this->pwdUser = $pwdUser;
    }

}