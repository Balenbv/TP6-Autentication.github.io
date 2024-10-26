<?php

class Usuario extends BaseDatos{
    private $idUsuario;
    private $usNombre;
    private $usPass;
    private $usMail;
    private $usDeshabilitado;
    

    public function getIdUsuario(){
        return $this->idUsuario;
    }
    
    public function setIdUsuario($idUsuario){
        $this->idUsuario = $idUsuario;
    }

    public function getUsNombre(){
        return $this->usNombre;
    }

    public function setUsNombre($usNombre){
        $this->usNombre = $usNombre;
    }

    public function getUsPass(){
        return $this->usPass;
    }

    public function setUsPass($usPass){
        $this->usPass = $usPass;
    }

    public function getUsMail(){
        return $this->usMail;
    }

    public function setUsMail($usMail){
        $this->usMail = $usMail;
    }

    public function getUsDeshabilitado(){
        return $this->usDeshabilitado;
    }

    public function setUsDeshabilitado($usDeshabilitado = null) {
        $this->usDeshabilitado = $usDeshabilitado ?? "0.0.0";
    }
    
    public function cargar($datosUsuario){
        $this->setIdUsuario($datosUsuario['idUsuario']);
        $this->setUsNombre($datosUsuario['usNombre']);
        $this->setUsPass($datosUsuario['usPass']);
        $this->setUsMail($datosUsuario['usMail']);
        $this->setUsDeshabilitado($datosUsuario['usDeshabilitado']);
    }

    public function insertar(){
        $base=new BaseDatos();
        $consultaInsertar="INSERT INTO usuario(usNombre, usPass, usMail, usDeshabilitado) VALUES ('".$this->getUsNombre()."','".$this->getUsPass()."','".$this->getUsMail()."','".$this->getUsDeshabilitado()."')";
        $resp= false;
        if($base->Iniciar()){
            if($base->Ejecutar($consultaInsertar)){
                $this->setIdUsuario($base->devuelveIDInsercion());
                $resp=true;
            } else {
                $this->setUsDeshabilitado(1);
            }
        } else {
            $this->setUsDeshabilitado(1);
        }
        return $resp;
    }
    
    public function modificar(){
        $resp = false;
        $base=new BaseDatos();
        if($base->Iniciar()){
            $consultaModifica="UPDATE usuario SET usNombre='".$this->getUsNombre()."',usPass='".$this->getUsPass()."',usMail='".$this->getUsMail()."',usDeshabilitado='".$this->getUsDeshabilitado()."' WHERE idUsuario=".$this->getIdUsuario();
            if($base->Ejecutar($consultaModifica)){
                $resp=true;
            } else {
                $this->setUsDeshabilitado(1);
            }
        } else {
            $this->setUsDeshabilitado(1);
        }
        return $resp;
    }
    
    public function eliminar($param) {
        $resp = false;
        if ($this->seteadosCamposClaves($param)) {
            $elObjtTabla = $this->cargarObjetoConClave($param);
            if ($elObjtTabla != null && $elObjtTabla->eliminar()) {
                $resp = true;
            }
        }

        return $resp;
    }


    public function listar($param=''){
        $arreglo = null;
        $base=new BaseDatos();
        $sql=" SELECT * FROM usuario ";
        
        if ($param != "") {
            $sql .= ' WHERE '.$param;
        }
        $res = $base->Ejecutar($sql);
        if($res>-1){
            if($res>0){
                $arreglo= array();
                while($row = $base->Registro()){
                    $obj = new Usuario();
                    $obj->cargar($row);
                    array_push($arreglo, $obj);
                }
            }
        } else {
            $this->setUsDeshabilitado(1);
        }
        return $arreglo;
    }

    public function __toString(){
        return "IdUsuario: ".$this->getIdUsuario()."\nUsNombre: ".$this->getUsNombre()."\nUsPass: ".$this->getUsPass()."\nUsMail: ".$this->getUsMail()."\nUsDeshabilitado: ".$this->getUsDeshabilitado();
    }
}