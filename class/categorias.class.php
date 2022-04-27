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
        
        /*
        public function create($data){
            $resultado = null;
            $foto = $this -> cargarImagen("helado");

            if ($foto) {

                $consulta = $this -> db -> prepare("INSERT INTO helado(helado,descripcion,foto,precio,id_sabor,id_marca) 
                values (:helado,:descripcion,:foto,:precio,:id_sabor,:id_marca)");

                $consulta -> bindParam(':helado', $data['helado'], PDO::PARAM_STR);;
                $consulta -> bindParam(':descripcion', $data['descripcion'], PDO::PARAM_STR);
                $consulta -> bindParam(':precio', $data['precio'], PDO::PARAM_INT);
                $consulta -> bindParam(':id_sabor', $data['id_sabor'], PDO::PARAM_STR);
                $consulta -> bindParam(':id_marca', $data['id_marca'], PDO::PARAM_STR);
                $consulta -> bindParam(':foto', $foto, PDO::PARAM_STR);

                $consulta -> execute();
                $resultado = $consulta -> rowCount();
            }
            return $resultado;
        }

        public function delete($id){

            $consulta = $this -> db -> prepare("DELETE from helado WHERE id_helado=:id_helado");
            $consulta -> bindParam(':id_helado', $id, PDO::PARAM_INT);
            
            $consulta -> execute();
            $resultado = $consulta -> rowCount();
            return $resultado;
        }  

        public function update($id,$data){

            $foto = $this -> cargarImagen("helado");

            if ($foto) {
                $consulta = $this -> db -> prepare("UPDATE helado 
                SET helado=:helado,descripcion=:descripcion,precio=:precio,id_sabor=:id_sabor,id_marca=:id_marca,foto=:foto
                WHERE id_helado=:id_helado");
            }
            else {
                $consulta = $this -> db -> prepare("UPDATE helado 
                SET helado=:helado,descripcion=:descripcion,precio=:precio,id_sabor=:id_sabor,id_marca=:id_marca
                WHERE id_helado=:id_helado");
            }

            $consulta -> bindParam(':helado', $data['helado'], PDO::PARAM_STR);
            $consulta -> bindParam(':descripcion', $data['descripcion'], PDO::PARAM_STR);
            $consulta -> bindParam(':precio', $data['precio'], PDO::PARAM_INT);
            $consulta -> bindParam(':id_sabor', $data['id_sabor'], PDO::PARAM_INT);
            $consulta -> bindParam(':id_marca', $data['id_marca'], PDO::PARAM_INT);
            $consulta -> bindParam(':id_helado', $id, PDO::PARAM_INT);

            if ($foto) {
                $consulta -> bindParam(':foto', $foto, PDO::PARAM_STR);
            }

            $consulta -> execute();
            $resultado = $consulta -> rowCount();
            return $resultado;
        }

        public function readOne($id){

            $consulta = $this -> db -> prepare("SELECT * FROM helado WHERE id_helado=:id_helado");    
            $consulta->bindParam(':id_helado', $id, PDO::PARAM_INT);

            $consulta -> execute();
            $resultado = $consulta -> fetchAll(PDO::FETCH_ASSOC);
            return $resultado;
        }
        */
    }

    //Se crea el objeto de la clase y se llama a la conexion
    $categoria = new Categorias;
    $categoria -> conexion();
?>