<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$ftp_server = "ftp.crispolettifotografia.com.br";
$ftp_user = "crispolettifotografi";
$ftp_pass = "Arqtec@230910";

$arquivoLocal = 'C:\\wamp\\www\\mylabs\\FTP\\foto.jpg';
$diretorioRemoto = '/public_html/';
$arquivoRemoto = 'foto.jpg';

/* Faz conexão com o servidor */
if (!$ftp = @ftp_connect($ftp_server)) {
    echo "Erro ao se conectar com o servidor FTP...\n";
    exit();
}

/* Efetua autenticação no servidor */
if (!@ftp_login($ftp, $ftp_user, $ftp_pass)) {
    echo "Erro ao efetuar autenticação no servidor FTP...\n";
    exit();
}

/* Definindo o modo passivo ligado */
ftp_pasv($ftp, true);
/* Acessando o diretório onde está o arquivo */
//if (!@ftp_chdir($diretorioRemoto)) {
 //   echo "Erro! Diretório não existe...\n";
 //   exit();
//}

/* Copiar o arquivos do servidor local para o servidor remoto */
try{
    $filepath = "foto.jpg";
    print  basename($filepath);
     $fp = fopen($filepath, 'r'); 
        $z = ftp_fput($ftp, basename($filepath), $fp, FTP_BINARY); 
        print $z;
        fclose($fp); 
    
    
} catch (Exception $ex) {
    print $ex->getMessage();
}
