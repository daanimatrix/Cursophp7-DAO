<?php

    class Usuario {

        //ATRIBUTOS

        private $idusuario;
        private $deslogin;
        private $dessenha;
        private $dtcadastro;

        
        //METODOS

        //idusuario
        public function getIdusuario(){
            return $this->idusuario;
        }

        public function setIdusuario($value){
            $this->idusuario = $value;
        }

        //login
        public function getDeslogin(){
            return $this->deslogin;
        }

        public function setDeslogin($value){
            $this->deslogin = $value;
        }

        //senha
        public function getDessenha(){
            return $this->dessenha;
        }

        public function setDessenha($value){
            $this->dessenha = $value;
        }

        //cadastro
        public function getDtcadastro(){
            return $this->dtcadastro;
        }

        public function setDtcadastro($value){
            $this->dtcadastro = $value;
        }


        //METODOS

        //metodo carregar por ID
        public function loadById($id){
            $sql = new Sql(); //intanciando a classe PDO para a variavel sql

            //pegando os dados do codigo do banco de dados, e pegando o valor que esta atribuido o metodo (ID)
            $results =$sql->select("SELECT * FROM usuario WHERE idusuario = :ID", array(
                ":ID"=>$id
            ));
 
            //se o results ter mais de uma informação, ele segue o codigo abaixo
            if(count($results) > 0){

                $row = $results[0];//vai pegar o valor 0 do array results

                //ele vai pegar os valores atribuido e jogar na memoria da variavel 
                $this->setIdusuario($row['idusuario']);
                $this->setdeslogin($row['deslogin']);
                $this->setdessenha($row['dessenha']);
                $this->setdtcadastro(new DateTime($row['dtcadastro']));

            }
        }

        //toString() Ele vai pegar o obj e mostrar na tela 
        public function __toString(){

            return json_encode(array(
                "idusuario"=>$this->getIdusuario(),
                "deslogin"=>$this->getdeslogin(),
                "dessenha"=>$this->getdessenha(),
                "dtcadastro"=>$this->getdtcadastro()->format("d/m/Y H:i:s")

            ));
        }
    }


?>