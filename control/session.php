<?php 

 class Session {
    private $usuario;
    private $rol;
 
    public function __construct() {
        session_start();
    }

    //getUsuario().Devuelve el usuario logeado.
    public function getUsuario(){
        return $this->usuario;
    }

    // getRol(). Devuelve el rol del usuario  logeado.
    public function getRol(){
        return $this->rol;
    }
    
    //niciar($nombreUsuario,$password). Actualiza las variables de sesion con los valores ingresados.
    public function iniciar($nombreUsuario ,$psw){
        session_start();
        $bool = false;
        if ($nombreUsuario != null && $psw != null) {
            $_SESSION['psw'] = $psw;
            $_SESSION['nombre'] = $nombreUsuario;
            $bool = true;
        }
        return $bool;
    }

    // validar(). Valida si la sesion actual tiene usuario y password  validos. Devuelve true o false.
    public function validar(){
        $bool = false;
        session_start();

        if (isset($_SESSION['nombre']) && isset($_SESSION['psw'])) {
            if(getUsuario()->getUsNombre() == $_SESSION['nombre'] && getUsuario()->getUsPass() == $_SESSION['psw']){
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

