<?php
class Tutor
{
 private $pdo;

public $Id_tutor;
public $Nombre;
public $Apellido;
public $Direccion_t;
public $Telefono_t;
public $Id_pais;
public $Id_ciudad;
public $Id_alumno;
public $Tipo_documento;
public $parentesco;


public function _CONSTRUC()
{
    try{
        $this->pdo = Conexion :: StartUp();
    }
    catch (Exception $e){
        die($e-> getMessage());
    }
  }
public function Listar(){
    try{
        $result = array();

        $stm = $this->pdo->prepare("SELECT * FROM Tutor");
        $stm->execute();

        return $stm->fetchAll(PDO:: FETCH_OBJ);
    }
    catch (Exception $e){
        die($e->getMessage());
    }
}
public function getting ($Id_tutor){
    try{
        $stm = $this->pdo
        ->prepare("SELECT * FROM Tutor WHERE $Id_tutor = ?");

        $stm->execute(array($Id_tutor));
        return $stm->fetch(PDO::FETCH_OBJ);
    }catch (Exception $e){
        die($e->getMessage());
    }
}
public function Eliminar  ($Id_tutor){
    try{
        $stm= $this->pdo
        ->prepare("DELETE FROM Tutor WHERE $Id_tutor = ?");

        $stm->execute(array($Id_tutor));
    }catch (Exception $e){
        die($e->getMessage());
    }
}
public function Actualizar ($data){
    try{
        $sql= "UPDATE Tutor SET 
        Nombre  = ?,
        Apellido = ?,
        Direccion_t = ?,
        Telefono_t = ?,
        Id_pais = ?,
        Id_cuidad = ?,
        Id_alumno = ?,
        Tipo_documento = ?,
        Parentesco = ?,
        WHERE Id_tutor = ?"

        $this->pdo->prepare($sql)
        ->execute(array
        $data->Nombre,
        $data->Apellido,
        $data->Direccion_t,
        $data->Telefono_t,
        $data->Id_pais,
        $data->Id_ciudad,
        $data->Id_alumno,
        $data->Tipo_documento,
        $data->parentesco
        $data->Id_tutor));
    } catch (Exception $e){
        die($e->getMessage());
    }
}
public function Registrar($data){
    try{
        $sql = "INSERT INTO 'Tutor'(Nombre,Apellido,Direccion,Telefono_t,Id_pais,Id_ciudad,Id_alumno,Tipo_documento,Parentesco,Id_tutor)
        VALUES(?,?,?,?,?,?,?,?,?,?,?)";

        $this->pdo->prepare($sql)
        ->execute(array(
            $data->Nombre,
            $data->Apellido,
            $data->Direccion_t,
            $data->Email_t,
            $data->Telefono_t,
            $data->Id_pais,
            $data->Id_ciudad,
            $data->Id_alumno,
            $data->Tipo_documento,
            $data->parentesco,
            $data->Id_tutor));
    }catch (Exception $e){
        die($e->getMessage());
    }
}
}
?>