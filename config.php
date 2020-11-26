<?php

    spl_autoload_register(function($class_name){

        $filename = "class".DIRECTORY_SEPARA.".php"; //filename = dentro dela entrou o caminho da pasta/ DIRECTORY_SE.. é a barra, conforme o sistema operacional 

        //se ( extir o arquivo filename, a variavel do require_once funciona e abri a pagina)
        if(file_exists(($filename))){
            require_once($filename);
        }
    });
?>