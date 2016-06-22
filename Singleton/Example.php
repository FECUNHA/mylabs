<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Example
 *
 * @author FERNANDO
 */
require_once './SingletonClass.php';

$instanceClass1 = SingletonClass::getInstance();
print "Valor da variavel ID: instanceClass1:" . $instanceClass1->getId() . "<br>";

$instanceClass2 = SingletonClass::getInstance();
print "Valor da variavel ID: instanceClass2:" . $instanceClass2->getId();

//$e = new SingletonClass(); // essa linha mostrará um erro, pois o construtor deverá estar ser tipo privado, para ser chamado somente dentro da class

print "<br>Nos casos acima, o construtor e chamado somente um vez, e isso economiza memoria";
