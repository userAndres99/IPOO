<?php

class Pasajero{
    
    /*ATRIBUTOS
        nombre del pasajero $pasajero
        apellido del pasajero $apellido;
        documento del pasajero $documento;
        telefono del pasajero $telefono;
    */
    private $nombre;
    private $apellido;
    private $documento;
    private $telefono;

    //CONSTRUCTOR DE LA CLASE PASAJERO
    public function __construct($nombre,$apellido,$documento,$telefono)
    {
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->documento = $documento;
        $this->telefono = $telefono;
    }

    //----- METODO GET -----
    /**
     * para obtener el nombre del pasajero
     * @return string
     */
    public function get_nombre(){
        return $this->nombre;
    }
    /**
     * para obtener el apellido del pasajero
     * @return string
     */
    public function get_apellido(){
        return $this->apellido;
    }
    /**
     * para obtener el documento
     * @return int
     */
    public function get_documento(){
        return $this->documento;
    }
    /**
     * para obtener el telefono
     * @return int
     */
    public function get_telefono(){
        return $this->telefono;
    }

    //----- METODO SET -----
    /**
     * para enviar el nombre
     * @param string $nombre
     */
    public function set_nombre($nombre){
        $this->nombre = $nombre;
    }
    /**
     * para enviar el apellido
     * @param string $apellido
     */
    public function set_apellido($apellido){
        $this->apellido = $apellido;
    }
    /**
     * para enviar el documento
     * @param int $documento
     */
    public function set_documento($documento){
        $this->documento = $documento;
    }
    /**
     * para enviar el telefono
     * @param int $telefono
     */
    public function set_telefono($telefono){
        $this->telefono = $telefono;
    }

    //----- TOSTRING -----
    public function __toString()
    {
        return "NOMBRE: ".$this->get_nombre()."\n".
                "APELLIDO: ".$this->get_apellido()."\n". 
                "DOCUMENTO: ".$this->get_documento()."\n". 
                "TELEFONO: ".$this->get_telefono(); 
    }
}