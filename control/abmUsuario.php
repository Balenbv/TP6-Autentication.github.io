<?php

class abmUsuario{

    public function abm($datos) {
        $resp = false;

        if ($datos['accion'] == 'editar') {
            if ($this->modificacion($datos)) {
                $resp = true;
            }
        }

        if ($datos['accion'] == 'borrar') {
            if ($this->baja($datos)) {
                $resp = true;
            }           
        }

        if ($datos['accion'] == 'nuevo') {
            if ($this->alta($datos)) {
                $resp = true;
            }
        }

        return $resp;
    }
      
    public function cargarObjeto($parametro){
        $obj = null;

        if( array_key_exists('idUsuario', $parametro) 
            and array_key_exists('usNombre', $parametro)){
            $obj = new Usuario();
            $obj->cargar($parametro);
        }
    }

    private function cargarObjetosConClave($param){
        $obj = null;

        if( isset($param['idUsuario']) ){
            $obj = new Usuario();
            $obj->setIdUsuario($param['idUsuario']);
            $obj->cargar();
        }
    }

    private function setadosCamposClaves($param){
        $resp = false;

        if( isset($param['idUsuario']) ){
            $resp = true;
        }

        return $resp;
    }

    public function alta($param) {
        $resp = false;
        $elObjtTabla = $this->cargarObjeto($param);
        if ($elObjtTabla != null && $elObjtTabla->insertar()) {
            $resp = true;
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

    /**
     * Permite modificar un objeto
     * @param array $param
     * @return boolean
     */
    public function modificacion($param) {
        $resp = false;
        if ($this->seteadosCamposClaves($param)) {
            $elObjtTabla = $this->cargarObjeto($param);
            if ($elObjtTabla != null && $elObjtTabla->modificar()) {
                $resp = true;
            }
        }
        return $resp;
    }


    public function buscar($param) {
        $where = " true ";
        if ($param <> NULL) {
            if (isset($param['idUsuario']))
                $where .= " and idUsuario =" . $param['idUsuario'];
            if (isset($param['usNombre']))
                $where .= " and usNombre ='" . $param['usNombre'] . "'";
            if (isset($param['usPass']))
                $where .= " and usPass ='" . $param['usPass'] . "'";
            if (isset($param['usMail']))
                $where .= " and usMail ='" . $param['usMail'] . "'";
            if (isset($param['usDeshabilitado']))
                $where .= " and usDeshabilitado ='" . $param['usDeshabilitado'] . "'";
        }
        $obj = new Usuario();
        $arreglo = $obj->listar($where);
        return $arreglo;
    }

    public function obtenerDatos($param){
        $where = " true ";
        if ($param <> NULL) {
            if (isset($param['idUsuario']))
                $where .= " and idUsuario = " . $param['idUsuario'];
            if (isset($param['usNombre']))
                $where .= " and usNombre = '" . $param['usNombre'] . "'";
            if (isset($param['usPass']))
                $where .= " and usPass = '" . $param['usPass'] . "'";
            if (isset($param['usMail']))
                $where .= " and usMail = '" . $param['usMail'] . "'";
            if (isset($param['usDeshabilitado']))
                $where .= " and usDeshabilitado = '" . $param['usDeshabilitado'] . "'";
        }
        
        $obj = new Persona();
        
        $arreglo = $obj->listar($where);
        $result = [];
        if (!empty($arreglo)) {
            foreach ($arreglo as $persona) {
            $result[] = ['idUsuario' => $persona->getIdUsuario(),
            'usNombre' => $persona->getUsNombre(),
            'usPass' => $persona->getUsPass(),
            'usPass' => $persona->getUsPass(),
            'usMail' => $persona->getUsMail(),
            'usDeshabilitado' => $persona->getUsDeshabilitado()];
            }
        }
        return $result;
    }

}