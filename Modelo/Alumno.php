<?php
class Alumno
{
 private $pdo;

public $Id_alumno;
public $Codigo;
public $Nombre;
public $Apellido;
public $Edad;
public $Fecha_na;
public $Genero_a;
public $Direccion_a;
public $Email_a;
public $Telefono_a;
public $Tipo_documento;
public $Id_pais;
public $Id_ciudad;
public $Id_curso;

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

        $stm = $this->pdo->prepare("SELECT * FROM alumno");
        $stm->execute();

        return $stm->fetchAll(PDO:: FETCH_OBJ);
    }
    catch (Exception $e){
        die($e->getMessage());
    }
}
public function getting ($Id_alumno){
    try{
        $stm = $this->pdo
        ->prepare("SELECT * FROM alumno WHERE $Id_alumno = ?");

        $stm->execute(array($Id_alumno));
        return $stm->fetch(PDO::FETCH_OBJ);
    }catch (Exception $e){
        die($e->getMessage());
    }
}
public function Eliminar  ($Id_alumno){
    try{
        $stm= $this->pdo
        ->prepare("DELETE FROM alumno WHERE $Id_alumno = ?");

        $stm->execute(array($Id_alumno));
    }catch (Exception $e){
        die($e->getMessage());
    }
}
public function Actualizar ($data){
    try{
        $sql= "UPDATE alumno SET 
        Codigo = ?,
        Nombre  = ?,
        Apellido = ?,
        Edad = ?,
        Fecha_na = ?,
        Genero_a = ?,
        Direccion_a = ?,
        Email_a = ?;
        Telefono_a = ?,
        Tipo_documento = ?,
        Id_pais = ?,
        Id_cuidad = ?,
        Id_curso = ?,
        WHERE Id_alumno = ?"

        $this->pdo->prepare($sql)
        ->execute(array
        ($data->Codigo,
        $data->Nombre,
        $data->Apellido,
        $data->Edad,
        $data->Fecha_na,
        $data->Genero_a,
        $data->Direccion_a,
        $data->Email_a,
        $data->Telefono_a,
        $data->Tipo_documento,
        $data->Id_pais,
        $data->Id_ciudad,
        $data->Id_curso,
        $data->Id_alumno));
    } catch (Exception $e){
        die($e->getMessage());
    }
}
public function Registrar($data){
    try{
        $sql = "INSERT INTO 'alumno'(Codigo,Nombre,Apellido,Edad,Fecha_na,Genero_a,Direccion_a,Email_a,Telefono_a,Tipo_documento,Id_pais,Id_ciudad,Id_cuso,Id_alumno)
        VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?)";

        $this->pdo->prepare($sql)
        ->execute(array(
            $data->Codigo,
            $data->Nombre,
            $data->Apellido,
            $data->Edad,
            $data->Fecha_na,
            $data->Genero_a,
            $data->Direccion_a,
            $data->Email_a,
            $data->Telefono_a,
            $data->Tipo_documento,
            $data->Id_pais,
            $data->Id_ciudad,
            $data->Id_curso,
            $data->Id_alumno));
    }catch (Exception $e){
        die($e->getMessage());
    }
}
}
?>