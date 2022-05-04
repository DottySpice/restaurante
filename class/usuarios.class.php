<?php 
    //Se llama la conexion
    require_once('conexion.class.php');

    class Usuarios extends Conexion{
        //Funciones asimilando los CRUD

        public function read(){
            $consulta = $this -> db -> prepare("SELECT * FROM categoria 
            ORDER by categoria ASC");   
             
            $consulta -> execute();
            $resultado = $consulta -> fetchAll(PDO::FETCH_ASSOC);
            return $resultado;
        }
        
        //Funcion para registrar un nuevo usuario
        public function registrar($data){
            $resultado = null;
            
            //Se va a buscar si el correo esta registrado o no
            $consulta = $this -> db -> prepare("SELECT * FROM usuario
            WHERE correo=:correo");
            $consulta -> bindParam(':correo', $data["correo"], PDO::PARAM_STR);
            $consulta -> execute();

            //Si se obtiene un valor el usuario existe y se regresa un false
            if ($consulta -> rowCount() > 0) {
                return false;
            }
            else{
                //Se crea un id de persona aleatorio
                $id_persona = rand(1,1000000000);

                //Se registra en nuevo usuario
                //Se registran los datos de persona en primer lugar
                $consulta = $this -> db -> prepare("INSERT INTO persona(id_persona,nombre,direccion,codigo_postal,sexo) 
                values (:id_persona,:nombre,:direccion,:codigo_postal,:sexo)");

                $consulta -> bindParam(':id_persona', $id_persona, PDO::PARAM_INT);
                $consulta -> bindParam(':nombre', $data["nombre"], PDO::PARAM_STR);
                $consulta -> bindParam(':direccion', $data["direccion"], PDO::PARAM_STR);
                $consulta -> bindParam(':codigo_postal', $data["codigo_postal"], PDO::PARAM_INT);
                $consulta -> bindParam(':sexo', $data["sexo"], PDO::PARAM_STR);
                $consulta -> execute();

                //Se registran los datos de la cuenta con la relacion del id_persona
                //El rol se inicia en 2, debe se modificado en admin para otorgar perimsos de admin
                $id_rol = 2;
                //Se codifica el formato de la contrasena
                $contrasena = md5($data["contrasena"]);

                $consulta = $this -> db -> prepare("INSERT INTO usuario(correo,contrasena,id_rol,id_persona) 
                values (:correo,:contrasena,:id_rol,:id_persona)");

                $consulta -> bindParam(':correo', $data["correo"], PDO::PARAM_STR);
                $consulta -> bindParam(':contrasena', $contrasena, PDO::PARAM_STR);
                $consulta -> bindParam(':id_rol', $id_rol, PDO::PARAM_INT);
                $consulta -> bindParam(':id_persona', $id_persona, PDO::PARAM_INT);
                $consulta -> execute();

                return true;
            }
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
    $usuario = new Usuarios;
    $usuario -> conexion();
?>