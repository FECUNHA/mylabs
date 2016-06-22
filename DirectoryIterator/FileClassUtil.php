<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
   @author Fernando Cunha
 * @email fecunhainfo@gmail.com
 * @since 06/2016
 *  */

class FileClassUtil{
    

public function __construct($path) {
        
print "<h1>Load files</h1>";

$this->startExec(); //init time

$dir = new DirectoryIterator($path);

$count = 0;
foreach ($dir as $item) {
    if (!$item->isDot() && $item->getFilename() !== null) {
                     
        $file= $item->getFilename();

        $ext = substr($file, strlen($file) - 3, 10);
          
           $fp = fopen($path.$file, 'r');
                
            if ($ext === "jpg") {
                print "<h2 >a extension is JPG:".$item->getFilename()."</h2><br/>";
            }else{
                print "a extension dont JPG:".$item->getFilename()."<br/>";
            }
            
            fclose($fp); //close file
            $count++;
        }
    }
 
 echo "Time exec: ".$this->endExec()."<br>";
 echo "Total: ".$count;

   global $time;
    
}
   
   /* Calculate start time */
   private function startExec(){
      global $time;
      $time = microtime(TRUE);
   }
    
   /*
    * Calculate end time of the script,
    * execution time and returns results
    */
   private function endExec(){
      global $time;      
      $finalTime = microtime(TRUE);
      $execTime = $finalTime - $time;
      return number_format($execTime, 6) . ' s';
   }
 }




