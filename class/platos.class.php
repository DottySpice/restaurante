<?php 
    //Se llama la conexion
    require_once('conexion.class.php');

    class Platos extends Conexion{
        //Funciones asimilando los CRUD

        public function read(){
            $consulta = $this -> db -> prepare("SELECT id_categoria, categoria, id_plato, p.plato, p.precio, p.descripcion, p.foto FROM plato p 
            left join categoria USING (id_categoria)  
            ORDER by p.plato ASC");    

            $consulta -> execute();
            $resultado = $consulta -> fetchAll(PDO::FETCH_ASSOC);
            return $resultado;
        }
        
        public function create($data){
            $resultado = null;
            $foto = $this -> cargarImagen("plato");

            if ($foto) {
                $consulta = $this -> db -> prepare("INSERT INTO plato(plato, descripcion, foto ,precio, id_categoria) 
                VALUES (:plato, :descripcion, :foto, :precio, :id_categoria)");

                $consulta -> bindParam(':plato', $data['plato'], PDO::PARAM_STR);
                $consulta -> bindParam(':descripcion', $data['descripcion'], PDO::PARAM_STR);
                $consulta -> bindParam(':foto', $foto, PDO::PARAM_STR);
                $consulta -> bindParam(':precio', $data['precio'], PDO::PARAM_INT);
                $consulta -> bindParam(':id_categoria', $data['id_categoria'], PDO::PARAM_STR);

                $consulta -> execute();
                $resultado = $consulta -> rowCount();
            }
            return $resultado;
        }

        public function delete($id){

            $consulta = $this -> db -> prepare("DELETE from plato WHERE id_plato=:id_plato");
            $consulta -> bindParam(':id_plato', $id, PDO::PARAM_INT);
            
            $consulta -> execute();
            $resultado = $consulta -> rowCount();
            return $resultado;
        }  

        public function update($id,$data){

            $foto = $this -> cargarImagen("plato");

            if ($foto) {
                $consulta = $this -> db -> prepare("UPDATE plato 
                SET plato=:plato,descripcion=:descripcion,precio=:precio,id_categoria=:id_categoria,foto=:foto
                WHERE id_plato=:id_plato");
            }
            else {
                $consulta = $this -> db -> prepare("UPDATE plato 
                SET plato=:plato,descripcion=:descripcion,precio=:precio,id_categoria=:id_categoria
                WHERE id_plato=:id_plato");
            }
        
            $consulta -> bindParam(':plato', $data['plato'], PDO::PARAM_STR);
            $consulta -> bindParam(':descripcion', $data['descripcion'], PDO::PARAM_STR);
            $consulta -> bindParam(':precio', $data['precio'], PDO::PARAM_INT);
            $consulta -> bindParam(':id_categoria', $data['id_categoria'], PDO::PARAM_INT);
            $consulta -> bindParam(':id_plato', $id, PDO::PARAM_INT);

            if ($foto) {
                $consulta -> bindParam(':foto', $foto, PDO::PARAM_STR);
            }

            $consulta -> execute();
            $resultado = $consulta -> rowCount();
            return $resultado;
        }

        public function filtroCategoria($id_categoria) {
            $consulta = $this -> db -> prepare("SELECT id_categoria, categoria, id_plato, p.plato, p.precio, p.descripcion, p.foto FROM plato p 
            left join categoria USING (id_categoria) 
            WHERE id_categoria=:id_categoria 
            ORDER by p.plato ASC");
            $consulta -> bindParam(":id_categoria", $id_categoria, PDO::PARAM_INT);

            $consulta -> execute();
            return $consulta -> fetchAll(PDO::FETCH_ASSOC);
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
    $plato = new Platos;
    $plato -> conexion();
?>