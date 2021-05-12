<?php
require_once 'Modelo/Alumno.php'

class AlumnoControlador{
    private $Modelo;

    public function _CONSTRUC(){
        $this->Modelo = new Alumno();
    }
    public function Index(){
        require_once 'Vista/header.php';
        require_once 'Vista/alumno/alumno.php';
        require_once 'Vista/footers.php'
    }
    public function Crud(){

        $alm = new Alumno();

        if(isset($_REQUEST['Id_alumno'])){
            $alm = $this->Modelo->Obtener($_REQUEST['Id_alumno']);
        }
        require_once 'Vista/header.php';
        require_once 'Vista/alumno/alumno.php';
        require_once 'Vista/footers.php';
    }
    public function Guardar(){
        $alm = new Alumno();

        $alm->Id_alumno = $_REQUEST['Id_alumno'];
        $alm->Codigo = $_REQUEST['Codigo'];
        $alm->Nombre = $_REQUEST['Nombre'];
        $alm->Apellido = $_REQUEST['Apellido'];
        $alm->Edad = $_REQUEST['Edad'];
        $alm->Fecha_na = $_REQUEST['Fecha_na'];
        $alm->Genero_a = $_REQUEST['Genero_a'];
        $alm->Direccion_a = $_REQUEST['Direccion_a'];
        $alm->Email_a= $_REQUEST['Email_a'];
        $alm->Telefono_a = $_REQUEST['Telefono_a'];
        $alm->Tipo_documento = $_REQUEST['Tipo_documento'];
        $alm->Id_pais = $_REQUEST['Id_pais'];
        $alm->Id_ciudad = $_REQUEST['Id_ciudad'];
        $alm->Id_curso = $_REQUEST['Id_curso'];

        $alm->Id_alumno > 0;
        
        ?$this->Modelo ->Actualizar($alm);
        :$this->Modelo ->Registrar($alm);
    header ('Location: Frontcontrll.php');
    }

    public function Eliminar(){
        $this->Modelo->Eliminar($_REQUEST['Id_alumno']);
        header ('Location: Frontcontrll.php');
    }
}
?>