<?php

class SingletonClass {

    static $instance = NULL;
    private $id = 0;

    public static function getInstance() {
        try {
            if (is_null(self::$instance)) {
                print "Instancia nova da classe:" . __CLASS__ . "<BR>";
                self::$instance = new SingletonClass();
            } else {
                print "Uso da instancia em memoria.<BR>";
            }
        } catch (Exception $ex) {
            throw $ex;
        }

        return self::$instance;
    }

    private function __construct() {

        //setar variaveis
        $this->id = 10;
        print "Setando variavel ID atraves do construtor.<BR>";
    }

    public function getId() {
        return $this->id;
    }

}
