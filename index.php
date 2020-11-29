<?php

    //Dando espansão para a pagina config.php
    require_once("config.php");

    /*
    //instanciando a classe sql
    $sql = new Sql();

    //colocando dentro do sql o comando (selecionar todos os usuarios) 
    $sql->select("SELECT * FROM tb_usuarios");

    echo json_encode($usuarios);
    */
    $usuario = new Usuario();

    $usuario->loadById(2);

    echo $usuario ;
    

    
?>