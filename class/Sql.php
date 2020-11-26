<?php

    class Sql extends PDO {

        //ATRIBUTOS
        private $conn;  //conecção 

        
        //METODOS

        //metodo contrutor( metodo padrão )
        public function __construct(){ //conectar diretamente no banco de dados ( sera um padrão de toda vez que você chama essa classe)

            $this->conn = new PDO("mysql:host=localhost;dbname=dbphp7", "root",""); //Toda vez que for conectar no banco é só chama o atributo conn

        }
 
        //
        private function setParams($statment, $parameters = array()){

            foreach ($parameters as $key => $value){//vai pegar o :ID e o :valor 

                $this->setParam($key, $value);
            }

        }

        //
        private function setParam($statment, $key,$value){

            $statment->bindParam($key, $value);
        }

        //
        public function query($rawQuery, $aparams = array()){//Metodo query( dentro dela, rawQuery:dados brutos / $aparams: parametros )

            $stmt = $this->conn->prepare($rawQuery);//stmt = dentro da variavel do banco de dados temos as querys, a gente tem acesso por causa da classe extendida 

            $this->setParams($stmt, $parameters);

            $stmt->execute();

            return stmt;
        }

        //
        public function select($rawQuery, $params= array()):array{

            $stmt = $this->query($rawQuery, $params);

            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
    }

?>