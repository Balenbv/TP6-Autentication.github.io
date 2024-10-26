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

        if( array_key_exists('idusuario',$param)  and array_key_exists('usnombre',$param) and array_key_exists('uspass',$param)
            and array_key_exists('usmail',$param) and array_key_exists('usdeshabilitado',$param)){
            $obj = new Usuario();
            $obj->setear($param['idusuario'],$param['usnombre'],$param['uspass'],$param['usmail'],$param['usdeshabilitado']);
        }
        
        return $obj;
    }

    private function cargarObjetosConClave($param){
        $obj = null;
        if( isset($param['idusuario']) ){
            $obj = new Usuario();
            $obj->setear($param['idusuario'], null,null,null,null);
        }
        return $obj;
    }

    private function seteadosCamposClaves($param){
        $resp = false;

        if( isset($param['idUsuario'])){
            $resp = true;
        }

        return $resp;
    }

    public function alta($param) {
        $resp = false;
        $param['idusuario'] = null;
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
        
        $obj = new usuario();
        
        $arreglo = $obj->listar($where);
        $result = [];
        if (!empty($arreglo)) {
            foreach ($arreglo as $usuario) {
            $result[] = ['idUsuario' => $usuario->getIdUsuario(),
            'usNombre' => $usuario->getUsNombre(),
            'usPass' => $usuario->getUsPass(),
            'usPass' => $usuario->getUsPass(),
            'usMail' => $usuario->getUsMail(),
            'usDeshabilitado' => $usuario->getUsDeshabilitado()];
            }
        }
        return $result;
    }
    
}