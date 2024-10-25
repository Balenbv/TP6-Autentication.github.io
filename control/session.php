<?php 
 class Session {
    private $idUsuario;
    private $rol;
 
    public function __construct() {
        session_start();
    }

    //getidUsuario().Devuelve el idUsuario logeado.
    public function getIdUsuario(){
        return $this->idUsuario;
    }

    // getRol(). Devuelve el rol del idUsuario  logeado.
    public function getRol(){
        return $this->rol;
    }
    

    public function iniciar($nombreidUsuario ,$psw){
        session_start();
        $bolean = false;
        $objUsuario = new abmUsuario();
        $arrayLlaves = [];

        $arrayLlaves['usNombre']= $nombreUsuario;
        $arrayLlaves['usPass']= $psw;
        $arrayLlaves['usDeshabilitado']= 'null';

        $cantUsuarios = $objUsuario->buscar($arrayLlaves);

        if($cantUsuarios > 0){
            if($this->validar()){
                getIdUsuario()->getUsNombre() == $usuario->getUsNombre();
                getIdUsuario()->getUsPass() == $usuario->getUsPass();
            }

        }else{
            $this->cerrar();
        }

        return $bolean;
    }

    // validar(). Valida si la sesion actual tiene idUsuario y password  validos. Devuelve true o false.
    public function validar(){
        $boolean = false;

        if($this->activa() && isset($_SESSION['idusuario'])){
            $boolean = true;
        }
        return $boolean;
    }

    //activa(). Devuelve true o false si la sesion esta activa o no. 
    public function activa(){
        return session_status() == PHP_SESSION_ACTIVE;
    }

    //cerrar(). Cierra la sesion actual.
    public function cerrar(){
        session_destroy();
    }

}

