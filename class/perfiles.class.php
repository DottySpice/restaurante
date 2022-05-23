<?php 
    //Se llama la conexion
    require_once('conexion.class.php');

    class Usuarios extends Conexion{
        //Funciones asimilando los CRUD

        //Funcion para actulizar a un usuario
        public function update($id,$id_persona,$data){

            //Se actualiza la tabla usuario en primer lugar
            
            $consulta = $this -> db -> prepare("UPDATE usuario 
            SET id_rol=:id_rol
            WHERE id_usuario=:id_usuario");

            $consulta -> bindParam(':id_usuario', $id, PDO::PARAM_INT);
            $consulta -> bindParam(':id_rol', $data['id_rol'], PDO::PARAM_INT);
            $consulta -> execute();
        

            //Se actualiza la tabla persona asociada al id_Persona
            $consulta = $this -> db -> prepare("UPDATE persona 
            SET nombre=:nombre,direccion=:direccion,codigo_postal=:codigo_postal,sexo=:sexo
            WHERE id_persona=:id_persona");

            $consulta -> bindParam(':id_persona', $id_persona, PDO::PARAM_INT);
            $consulta -> bindParam(':nombre', $data["nombre"], PDO::PARAM_STR);
            $consulta -> bindParam(':direccion', $data["direccion"], PDO::PARAM_STR);
            $consulta -> bindParam(':codigo_postal', $data["codigo_postal"], PDO::PARAM_INT);
            $consulta -> bindParam(':sexo', $data["sexo"], PDO::PARAM_STR);
            $consulta -> execute();

            $resultado = $consulta -> rowCount();
            return $resultado;
        }

        public function readOne($id){

            $consulta = $this -> db -> prepare("SELECT * FROM usuario 
            LEFT JOIN persona 
            USING (id_persona) 
            LEFT JOIN rol
            USING (id_rol)
            WHERE id_usuario=:id_usuario");   
             
            $consulta->bindParam(':id_usuario', $id, PDO::PARAM_INT);

            $consulta -> execute();
            $resultado = $consulta -> fetchAll(PDO::FETCH_ASSOC);
            return $resultado;
        } 
    }

    //Se crea el objeto de la clase y se llama a la conexion
    $usuario = new Usuarios;
    $usuario -> conexion();
?>