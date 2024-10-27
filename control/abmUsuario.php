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
      
    public function cargarObjeto($param){
        $obj = null;

        if( array_key_exists('idUsuario',$param)  and array_key_exists('usNombre',$param) and array_key_exists('usPass',$param)and array_key_exists('usMail',$param)){
            $obj = new Usuario();
            $obj->cargar($param['idUsuario'],$param['usNombre'],$param['usPass'],$param['usMail']);
        }

        ///////////////////////////////////
        $debug = ($obj == null) ? "el objeto no tiene nada" : "el objeto tiene cosas";
        echo $debug;
        ///////////////////////////////////

        return $obj;
    }

    private function cargarObjetosConClave($param){
        $obj = null;
        if(isset($param['idUsuario'])){
            $obj = new Usuario();
            $obj->cargar($param['idUsuario'], null,null,null,null);
        }
        return $obj;
    }

    private function seteadosCamposClaves($param){
        $resp = false;
        
        if(isset($param['idUsuario'])){
            $resp = true;
        }

        return $resp;
    }

    public function alta($param) {
        $resp = false;
        $param['idUsuario'] = null;
        $elObjtTabla = $this->cargarObjeto($param);
        echo $elObjtTabla;
        if ($elObjtTabla != null && $elObjtTabla->insertar()) {
            $resp = true;
        }

        ///////////////////////////////////
        $debug = ($resp) ? "Di el alta" : "No se dio el alta";
        echo $debug;
        ///////////////////////////////////

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
        
        $obj = new Usuario();
        
        $arreglo = $obj->listar($where);
        $result = [];
        if (!empty($arreglo)) {
            foreach ($arreglo as $usuario) {
                $result[] = [
                'idUsuario' => $usuario->getIdUsuario(),
                'usNombre' => $usuario->getUsNombre(),
                'usPass' => $usuario->getUsPass(),
                'usMail' => $usuario->getUsMail(),
                'usDeshabilitado' => $usuario->getUsDeshabilitado()
                ];
            }
        }
        return $result;
    }


    
}