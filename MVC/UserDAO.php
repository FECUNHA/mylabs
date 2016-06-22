<?php

class UserDAO {

    const TABLE_NAME = 'tb_user';
    const TABLE_KEY = 'id_user';

    private $conn = null;

    public function __construct() {

        try {
            $this->conn = ConnectionFactory::getInstance();
        } catch (PDOException $ex) {
            throw $ex;
        }
    }

    public function save($userModel) {
        if ($userModel->getId() == 0) {
            return $this->add($userModel);
        }
    }

    public function add($obj) {

        try {

            $sql = "INSERT INTO " . self::TABLE_NAME . " 
							(name_user,login_user,pwd_user)
							VALUES (? ,? ,?)";

            $params = array($obj->getNmContato(),
                $obj->getEmail(),
                $obj->getAssunto(),
                $obj->getDsAssunto(),
                $obj->getNmCidade(),
                $obj->getNmUf(),
                $obj->getTelefone(),
                $obj->getDtCadastro()
            );

            return $this->conn->dbInsertSql($sql, $params);
        } catch (PDOException $ex) {
            throw $ex;
        }
    }

    public function delete($id) {
        
    }

    public function update($obj) {
        
    }

    public function load() {
        
    }

}

//fim da classe
?>
