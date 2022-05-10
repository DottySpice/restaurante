<?php 
    //Se llama la conexion
    require_once('conexion.class.php');

    class Roles extends Conexion{
        //Funciones asimilando los CRUD

        public function read(){
            $consulta = $this -> db -> prepare("SELECT * FROM rol 
            ORDER by rol ASC");   
             
            $consulta -> execute();
            $resultado = $consulta -> fetchAll(PDO::FETCH_ASSOC);
            return $resultado;
        }
        
        public function create($data){
            $resultado = null;

            $consulta = $this -> db -> prepare("INSERT INTO rol(rol) 
            values (:rol)");

            $consulta -> bindParam(':rol', $data['rol'], PDO::PARAM_STR);

            $consulta -> execute();
            $resultado = $consulta -> rowCount();
            
            return $resultado;
        }

        public function delete($id){

            $consulta = $this -> db -> prepare("DELETE from rol WHERE id_rol=:id_rol");
            $consulta -> bindParam(':id_rol', $id, PDO::PARAM_INT);
            
            $consulta -> execute();
            $resultado = $consulta -> rowCount();
            return $resultado;
        }  

        public function update($id,$data){

            $consulta = $this -> db -> prepare("UPDATE rol 
            SET rol=:rol
            WHERE id_rol=:id_rol");
        

            $consulta -> bindParam(':rol', $data['rol'], PDO::PARAM_STR);
            $consulta -> bindParam(':id_rol', $id, PDO::PARAM_INT);

            $consulta -> execute();
            $resultado = $consulta -> rowCount();
            return $resultado;
        }

        public function readOne($id){

            $consulta = $this -> db -> prepare("SELECT * FROM rol WHERE id_rol=:id_rol");    
            $consulta->bindParam(':id_rol', $id, PDO::PARAM_INT);

            $consulta -> execute();
            $resultado = $consulta -> fetchAll(PDO::FETCH_ASSOC);
            return $resultado;
        }
        
    }

    //Se crea el objeto de la clase y se llama a la conexion
    $rol = new Roles;
    $rol -> conexion();
?>