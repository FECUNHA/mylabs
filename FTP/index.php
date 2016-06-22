<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

print "<h1>Enviando fotos via FTP</h1>";

//set_time_limit(300);
ini_set('max_execution_time', 720);

// try to upload $file
// open some file for reading

startExec();


$conn_id = getConnection();

$path1 = "C:\\wamp\\www\\crispolettifotografia\\eventos\\DiasDasMaes\\grande\\";

$dir = new DirectoryIterator($path1);

$msg = "enviando fotos....";
print $msg;

$totalSend = 0;
foreach ($dir as $item) {
    if (!$item->isDot() && $item->getFilename() !== null) {
        $totalSend++;
        
        $count = 0;
        
        if($count == 100){
             ftp_close($conn_id);
            $conn_id = getConnection();
        }
        
        $file= $item->getFilename();

        $ext = substr($file, strlen($file) - 3, 10);
          
        $path ="C:\\wamp\\www\\crispolettifotografia\\eventos\\DiasDasMaes\\grande\\";
        
           $fp = fopen($path.$file, 'r');
                
            if ($ext === "jpg") {
                if (ftp_fput($conn_id,$file, $fp, FTP_BINARY)) {
                   // echo "Successfully uploaded $file\n";
                } else {
                    echo "There was a problem while uploading $file\n";
                }
            }
            
            fclose($fp);
            $count++;
        }
    }

 ftp_close($conn_id);

 $msg = "finalizado o upload!";
 
 
echo endExec();

print $msg;

function getConnection(){
    print "nova conexão";
    $ftp_server = "ftp.crispolettifotografia.com.br";
    $ftp_user_name = "crispolettifotografi";
    $ftp_user_pass = "Arqtec@230910";

    // set up basic connection
    $conn_id = ftp_connect($ftp_server);

    // login with username and password
    $login_result = ftp_login($conn_id, $ftp_user_name, $ftp_user_pass);

    ftp_pasv($conn_id, true);

    //muda o diretorio de destino
    $rempath = '/public_html/eventos/tmp_ftp/grande';
    ftp_chdir($conn_id, $rempath);
    
    return $conn_id;
}



   global $time;
    
   /* Get current time */
   function getTime(){
      return microtime(TRUE);
   }
    
   /* Calculate start time */
   function startExec(){
      global $time;
      $time = getTime();
   }
    
   /*
    * Calculate end time of the script,
    * execution time and returns results
    */
   function endExec(){
      global $time;      
      $finalTime = getTime();
      $execTime = $finalTime - $time;
      return number_format($execTime, 6) . ' s';
   }

