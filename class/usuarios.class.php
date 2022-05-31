<?php 
    //Se llama la conexion
    require_once('conexion.class.php');

    class Usuarios extends Conexion{
        //Funciones asimilando los CRUD

        //Funcion para leer a los usuarios
        public function read(){
            $consulta = $this -> db -> prepare("SELECT * FROM usuario 
            LEFT JOIN persona 
            USING (id_persona) 
            LEFT JOIN rol
            USING (id_rol)
            ORDER BY nombre");   
             
            $consulta -> execute();
            $resultado = $consulta -> fetchAll(PDO::FETCH_ASSOC);
            return $resultado;
        }

        public function read_pedido($id_usuario){
            $consulta = $this -> db -> prepare("SELECT * FROM pedido 
            WHERE id_usuario=:id_usuario
            ORDER BY fecha");     

            $consulta->bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT);
             
            $consulta -> execute();
            $resultado = $consulta -> fetchAll(PDO::FETCH_ASSOC);
            return $resultado;
        }

        public function read_one_pedido($id_pedido_detalle){
            $consulta = $this -> db -> prepare("SELECT * FROM pedido 
            WHERE id_pedido_detalle=:id_pedido_detalle");     

            $consulta->bindParam(':id_pedido_detalle', $id_pedido_detalle, PDO::PARAM_INT);
             
            $consulta -> execute();
            $resultado = $consulta -> fetchAll(PDO::FETCH_ASSOC);
            return $resultado;
        }

        public function info_pedido($id_pedido_detalle){
            $consulta = $this -> db -> prepare("SELECT * FROM pedido_detalle 
            WHERE id_pedido_detalle=:id_pedido_detalle");     

            $consulta->bindParam(':id_pedido_detalle', $id_pedido_detalle, PDO::PARAM_INT);
             
            $consulta -> execute();
            $resultado = $consulta -> fetchAll(PDO::FETCH_ASSOC);
            return $resultado;
        }
        
        //Funcion para registrar un nuevo usuario
        public function registrar($data){
            
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
                $id_rol = 1;
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

        public function delete($id, $id_persona){
            
            //Se borra a la persona asociada
            $consulta = $this -> db -> prepare("DELETE from persona WHERE id_persona=:id_persona");
            $consulta -> bindParam(':id_persona', $id_persona, PDO::PARAM_INT);
            $consulta -> execute();

            //Se borra al usuario
            $consulta2 = $this -> db -> prepare("DELETE from usuario WHERE id_usuario=:id_usuario");
            $consulta2 -> bindParam(':id_usuario', $id, PDO::PARAM_INT);
            $consulta2 -> execute();

            $resultado = $consulta2 -> rowCount();
            return $resultado;
        } 
        
        //Funcion para editar perfil
        public function updatePerfil($id_persona,$data){
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

        //Para agregar un pedido
        public function crear_pedido($data,$mi_carro,$id_usuario){
            $resultado = null;

            //Se creara un id_pedido_detalle
            $id_pedido_detalle = rand(1,1000000000);

            //Se obtiene la fecha
            date_default_timezone_set('America/Mexico_City');
            $fecha = date("Y")."-".date("m")."-".date("d");

            //Se obtiene el total a pagar
            $cantidad_total = 0;
            foreach ($mi_carro as $carro) {
                $cantidad = $carro['cantidad'];
                $precio = $carro['precio'];
                $total = $cantidad * $precio;
                $cantidad_total += $total;
            }
           
            //Estado del pedido de momento en 'espera'
            $estado = "En espera";
            
            //Se inserta primero en pedido
            $consulta = $this -> db -> prepare("INSERT INTO pedido(id_usuario,id_pedido_detalle,estado,metodo_pago,total,direccion,fecha) 
            VALUES (:id_usuario,:id_pedido_detalle,:estado ,:metodo_pago,:total,:direccion,:fecha)");

            $consulta -> bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT);
            $consulta -> bindParam(':id_pedido_detalle', $id_pedido_detalle, PDO::PARAM_INT);
            $consulta -> bindParam(':estado', $estado, PDO::PARAM_STR);
            $consulta -> bindParam(':metodo_pago', $data['metodo_pago'], PDO::PARAM_STR);
            $consulta -> bindParam(':total', $cantidad_total, PDO::PARAM_INT);
            $consulta -> bindParam(':direccion', $data['direccion'], PDO::PARAM_STR);
            $consulta -> bindParam(':fecha', $fecha, PDO::PARAM_STR);

            $consulta -> execute();

            //Se insertan los productos en la tabla pediddo_detalle con la referencia indicada
            for ($i = 0; $i < count($mi_carro); $i++) { 
                $articulo = $mi_carro[$i]["plato"]; 
                $precio = $mi_carro[$i]["precio"];
                $cantidad = $mi_carro[$i]["cantidad"];
                $total = $precio * $cantidad;

                $consulta = $this -> db -> prepare("INSERT INTO pedido_detalle(id_pedido_detalle, articulo, cantidad, precio, total) 
                VALUES (:id_pedido_detalle,:articulo,:cantidad,:precio,:total)");

                $consulta -> bindParam(':id_pedido_detalle', $id_pedido_detalle, PDO::PARAM_INT);
                $consulta -> bindParam(':articulo', $articulo, PDO::PARAM_STR);
                $consulta -> bindParam(':cantidad', $cantidad, PDO::PARAM_INT);
                $consulta -> bindParam(':precio', $precio, PDO::PARAM_INT);
                $consulta -> bindParam(':total', $total, PDO::PARAM_INT);

                $consulta -> execute();
            }

            $resultado = $consulta -> rowCount();
            return $resultado;
        }
    }

    //Se crea el objeto de la clase y se llama a la conexion
    $usuario = new Usuarios;
    $usuario -> conexion();
?>