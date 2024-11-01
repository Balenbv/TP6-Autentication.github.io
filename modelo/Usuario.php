<?php

class Usuario extends BaseDatos{
    private $idUsuario;
    private $usNombre;
    private $usPass;
    private $usMail;
    private $usDeshabilitado;
    
	public function getIdUsuario() {
		return $this->idUsuario;
	}

	public function setIdUsuario($value) {
		$this->idUsuario = $value;
	}

	public function getUsNombre() {
		return $this->usNombre;
	}

	public function setUsNombre($value) {
		$this->usNombre = $value;
	}

	public function getUsPass() {
		return $this->usPass;
	}

	public function setUsPass($value) {
		$this->usPass = $value;
	}

	public function getUsMail() {
		return $this->usMail;
	}

	public function setUsMail($value) {
		$this->usMail = $value;
	}

	public function getUsDeshabilitado() {
		return $this->usDeshabilitado;
	}
    
    public function setUsDeshabilitado($usDeshabilitado) {
        $this->usDeshabilitado = $usDeshabilitado;
    }
    
    public function cargar($datosUsuario){
        isset($datosUsuario['idUsuario']) ? $this->setIdUsuario($datosUsuario['idUsuario']) : $this->setIdUsuario(null);
        isset($datosUsuario['usNombre']) ? $this->setUsNombre($datosUsuario['usNombre']) : $this->setUsNombre(null);
        isset($datosUsuario['usPass']) ? $this->setUsPass($datosUsuario['usPass']) : $this->setUsPass(null);
        isset($datosUsuario['usMail']) ? $this->setUsMail($datosUsuario['usMail']) : $this->setUsMail(null);
        isset($datosUsuario['usDeshabilitado']) ? $this->setUsDeshabilitado($datosUsuario['usDeshabilitado']) : $this->setUsDeshabilitado('0000-00-00 00:00:00');
    }

    public function insertar(){
        $base=new BaseDatos();
        $consultaInsertar="INSERT INTO usuario(usNombre, usPass, usMail, usDeshabilitado) VALUES 
        ('".$this->getUsNombre()."','".$this->getUsPass()."','".$this->getUsMail()."','".$this->getUsDeshabilitado()."')";
        $resp= false;
        if($base->Iniciar()){
            if($id = $base->Ejecutar($consultaInsertar)){
                $this->setIdUsuario($id);
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
        $base=new BaseDatos();
        $resp = false;
        if($base->Iniciar()){
            $consultaModifica="UPDATE usuario SET usNombre= '".$this->getUsNombre()."',usPass='".$this->getUsPass()."',usMail='".$this->getUsMail()."',usDeshabilitado='".$this->getUsDeshabilitado()."' WHERE idUsuario=".$this->getIdUsuario();
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
        $base=new BaseDatos();

        $sql="UPDATE usuario SET usDeshabilitado = '".$this->getUsDeshabilitado()."' WHERE idUsuario=".$this->getIdUsuario();
        verEstructura($sql);
        if ($base->Iniciar()) {
            if ($base->Ejecutar($sql)) {
                $resp = true;
            } else {
                $this->setMensajeOperacion("usuario->borrado logico: ".$base->getError());
            }
        } else {
            $this->setMensajeOperacion("usuario->borrado logico: ".$base->getError());
        }

        return $resp;
    }


    public function listar($param=''){
        $arreglo = null;
        $base = new BaseDatos();
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