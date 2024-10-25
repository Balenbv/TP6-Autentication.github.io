<?php

class UsuarioRol extends BaseDatos{
    private $idUsuario;
    private $idRol;

    public function getIdUsuario($idUsuario){
        return $this->getIdUsuario;
    }

    public function setIdUsuario($idUsuario){
        $this->idUsuario = $idUsuario;
    }

    public function getIdRol($idRol){
        return $this->idRol;
    }

    public function setIdRol($idRol){
        $this->idRol = $idRol;
    }

    public function cargar($datosUsuario){
        $this->setIdUsuario($datosUsuario['idUsuario']);
        $this->setUsNombre($datosUsuario['idRol']);
    }

    public function alta(){
        $base=new BaseDatos();
        $consultaInsertar="INSERT INTO rol(idUsuario, idRol) VALUES ('".$this->getIdUsuario()."','".$this->getIdRol()."')";
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

    
    public function baja($param) {
        $resp = false;
        if ($this->seteadosCamposClaves($param)) {
            $elObjtTabla = $this->cargarObjetoConClave($param);
            if ($elObjtTabla != null && $elObjtTabla->eliminar()) {
                $resp = true;
            }
        }

        return $resp;
    }

    //hay que consultar el tema de que es una doble foranea , no sabes si hay que actualizarlo
    public function modificacion(){
        $resp = false;
        $base=new BaseDatos();
        if($base->Iniciar()){
            $consultaInsertar="INSERT INTO usuariorol(idusuario, idrol) VALUES ('".$this->getIdUsuario()."','".$this->getIdRol()."')";
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



}