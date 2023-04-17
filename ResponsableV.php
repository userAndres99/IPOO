<?php

class ResponsableV{

    /*ATRIBUTOS
        numero de empleado del responsable $numEmpleado
        numero de licencia del responsable $num licencia
        nombre del responsable $nombre
        apellido del responsable $apellido
    */
    private $numEmpleado;
    private $numLicencia;
    private $nombre;
    private $apellido;

    //CONSTRUCTOR DE LA CLASE RESPONSABLE
    public function __construct($numEmpleado,$numLicencia,$nombre,$apellido)
    {
        $this->numEmpleado = $numEmpleado;
        $this->numLicencia = $numLicencia;
        $this->nombre = $nombre;
        $this->apellido = $apellido;
    }

    //----- METODO GET -----
    /**
     * para obtener el numero de empleado
     * @return int
     */
    public function get_numeroEmpleado(){
        return $this->numEmpleado;
    }
    /**
     * para obtener el numero de licencia
     * @return int
     */
    public function get_numerolicencia(){
        return $this->numLicencia;
    }
    /**
     * para obtener el nombre del responsable
     * @return string
     */
    public function get_nombre(){
        return $this->nombre;
    }
    /**
     * para obtener el apellido del responsable
     * @return string
     */
    public function get_apellido(){
        return $this->apellido;
    }

    //----- METODO SET -----
    /**
     * para enviar el numero de empleado
     * @param int $numEmpleado
     */
    public function set_numeroEmpleado($numEmpleado){
        $this->numEmpleado = $numEmpleado;
    }
    /**
     * para enviar el numero de licencia
     * @param int $numLicencia
     */
    public function set_numeroLicencia($numLicencia){
        $this->numLicencia = $numLicencia;
    }
    /**
     * para enviar el nombre del responsable
     * @param string $nombre
     */
    public function set_nombre($nombre){
        $this->nombre = $nombre;
    }
    /**
     * para enviar el apellido del responsable
     * @param string $apellido
     */
    public function set_apellido($apellido){
        $this->apellido = $apellido;
    }

    //----- TOSTRING -----
    public function __toString()
    {
        return "NUMERO DE EMPLEADO: ".$this->get_numeroEmpleado()."\n". 
                "NUMERO DE LICENCIA: ".$this->get_numeroLicencia()."\n". 
                "NOMBRE: ".$this->get_nombre()."\n". 
                "APELLIDO: ".$this->get_apellido();
    }

}