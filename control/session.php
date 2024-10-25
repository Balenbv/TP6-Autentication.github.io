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
    
    //niciar($nombreidUsuario,$password). Actualiza las variables de sesion con los valores ingresados.
    public function iniciar($nombreidUsuario ,$psw){
        $bool = false;
        if (validar()) {
            session_start();
            $_SESSION['psw'] = $psw;
            $_SESSION['nombre'] = $nombreidUsuario;
            $bool = true;
        }
        return $bool;
    }

    // validar(). Valida si la sesion actual tiene idUsuario y password  validos. Devuelve true o false.
    public function validar(){
        $bool = false;
        session_start();

        if (isset($_SESSION['nombre']) && isset($_SESSION['psw'])) {
            if(getIdUsuario()->getUsNombre() == $_SESSION['nombre'] && getIdUsuario()->getUsPass() == $_SESSION['psw']){
                $bool = true;
            }
        }
        
        return $bool;
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

