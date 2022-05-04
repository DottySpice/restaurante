<?php 
    //Se llama la conexion
    require_once('conexion.class.php');

    class Categorias extends Conexion{
        //Funciones asimilando los CRUD

        public function read(){
            $consulta = $this -> db -> prepare("SELECT * FROM categoria 
            ORDER by categoria ASC");   
             
            $consulta -> execute();
            $resultado = $consulta -> fetchAll(PDO::FETCH_ASSOC);
            return $resultado;
        }
        
        public function create($data){
            $resultado = null;

            $consulta = $this -> db -> prepare("INSERT INTO categoria(categoria) 
            values (:categoria)");

            $consulta -> bindParam(':categoria', $data['categoria'], PDO::PARAM_STR);

            $consulta -> execute();
            $resultado = $consulta -> rowCount();
            
            return $resultado;
        }

        public function delete($id){

            $consulta = $this -> db -> prepare("DELETE from categoria WHERE id_categoria=:id_categoria");
            $consulta -> bindParam(':id_categoria', $id, PDO::PARAM_INT);
            
            $consulta -> execute();
            $resultado = $consulta -> rowCount();
            return $resultado;
        }  

        public function update($id,$data){

            $consulta = $this -> db -> prepare("UPDATE categoria 
            SET categoria=:categoria
            WHERE id_categoria=:id_categoria");
        

            $consulta -> bindParam(':categoria', $data['categoria'], PDO::PARAM_STR);
            $consulta -> bindParam(':id_categoria', $id, PDO::PARAM_INT);

            $consulta -> execute();
            $resultado = $consulta -> rowCount();
            return $resultado;
        }

        public function readOne($id){

            $consulta = $this -> db -> prepare("SELECT * FROM categoria WHERE id_categoria=:id_categoria");    
            $consulta->bindParam(':id_categoria', $id, PDO::PARAM_INT);

            $consulta -> execute();
            $resultado = $consulta -> fetchAll(PDO::FETCH_ASSOC);
            return $resultado;
        }
    }

    //Se crea el objeto de la clase y se llama a la conexion
    $categoria = new Categorias;
    $categoria -> conexion();
?>