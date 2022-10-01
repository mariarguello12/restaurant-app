<?php  

 require_once 'Model/conexion.php';

 class CategoriasModel{
         

        #-----------------------------------------------------------
       #INGRESAR NUEVAS CATEGORIAS
        public function agregarCategoriasModel($datosModel ,$tabla){
      $conexion = new Conexion;
      $sql = $conexion->conectar()->prepare("INSERT INTO  $tabla (nombrecategoria) VALUES(:nombrecategoria)");

       $sql->bindParam(':nombrecategoria',$datosModel['nombrecategoria'], PDO::PARAM_STR);

       if ($sql->execute()) {
               return 'success';
            }else{
                return 'error';
            }
     }

          #-----------------------------------------------------------
       #OBTENER TODAS LAS CATEGORIAS
       public function getCategoriasModel($tabla){
        $conexion = new Conexion;
         $sql = $conexion->conectar()->prepare("SELECT * FROM $tabla");
         $sql->execute();
         return $sql->fetchAll();

       }

       public function editarCategoriasModel($datosModel,$tabla){
        $conexion = new Conexion;
        $sql = $conexion->conectar()->prepare("SELECT * FROM  $tabla WHERE idcategoria = :idcategoria");

        $sql->bindParam(':idcategoria',$datosModel,PDO::PARAM_INT);

        $sql->execute();
        return $sql->fetch();
       }

     function actualizarCategoriaModel($datosModel,$tabla){
      $conexion = new Conexion;
        $sql= $conexion->conectar()->prepare("UPDATE $tabla SET nombrecategoria = :nombrecategoria WHERE idcategoria = :idcategoria");

      $sql->bindParam(':nombrecategoria',$datosModel['nombrecategoria'], PDO::PARAM_STR);
      $sql->bindParam(':idcategoria',$datosModel['idcategoria'], PDO::PARAM_INT);
           
      if($sql->execute()){

             return "success";
      }else{
    
       return  "error";
      }
    }

     public function deleteCategoriasModel($datosModel,$tabla){
      $conexion = new Conexion;
      $sql = $conexion->conectar()->prepare("DELETE FROM $tabla WHERE idcategoria = :idcategoria");

      $sql->bindParam(':idcategoria', $datosModel, PDO::PARAM_INT);

      if ($sql->execute()) {
         return 'success';
      }else{
        return 'Error';
      }
    }


 }