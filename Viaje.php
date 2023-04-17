<?php
include_once("Pasajero.php");
include_once("Responsablev.php");

class Viaje{
    //REPRESENTACION DE UN VIAJE

    /*ATRIBUTOS:
        codigo del viaje $codigoV
        destino del viaje $destinoV
        cantidad maxide pasajeros del viaje $cantMaxPasajeros
        listado de pasajeros del viaje $arrayPasajeros
        responsable del viaje $responsableV
    */
    private $codigoV;
    private $destinoV;
    private $cantMaxPasajeros;
    //ahora se van a ir guardando una coleccion de objetos de la clase Pasajero y agregamos responsableV que hace referencia a la clase Responsable
    private $arrayPasajeros;
    private $responsableV;
    

    //CONSTRUCTOR DE LA CLASE VIAJE
    public function __construct($codigoV,$destinoV,$cantMaxPasajeros,$arrayPasajeros,$responsableV){

        $this->codigoV=$codigoV;
        $this->destinoV=$destinoV;
        $this->cantMaxPasajeros=$cantMaxPasajeros;
        $this->arrayPasajeros=$arrayPasajeros;
        $this->responsableV = $responsableV;

    }

    //----- METODO GET -----
    /**
     * para obtener el codigo del viaje
     * @return int
     */
    public function get_codigo(){
        return $this->codigoV;
    }
    /**
     * para obtener el destino del viaje
     * @return string
     */
    public function get_destino(){
        return $this->destinoV;
    }
    /**
     * para obtener la cantidad maxima de pasajeros
     * @return int
     */
    public function get_cantMaximaPasajeros(){
        return $this->cantMaxPasajeros;
    }
    /**
     * para obtener la lista de pasajeros
     * @return array
     */
    public function get_arrayPasajeros(){
        return $this->arrayPasajeros;
    }
    /**
     * para obtener los datos del responsable
     * @return object
     */
    public function get_responsable(){
        return $this->responsableV;
    }
    //----- METODO SET -----
    /**
     * para enviar el codigo del viaje
     * @param int $codigoV
     */
    public function set_codigo($codigoV){
        $this->codigoV = $codigoV;
    }
    /**
     * para enviar el destino del viaje
     * @param string $destinoV
     */
    public function set_destino($destinoV){
        $this->destinoV = $destinoV;
    }
    /**
     * para enviar la cantidad maxima de pasajeros del viaje
     * @param int $cantMaxPasajeros
     */
    public function set_cantMaximaPasajeros($cantMaxPasajeros){
        $this->cantMaxPasajeros=$cantMaxPasajeros;
    }
    /**
     * para enviar la lista de pasajeros del viaje
     * @param array $arrayPasajeros
     */
    public function set_arrayPasajeros($arrayPasajeros){
        $this->arrayPasajeros=$arrayPasajeros;
    }
    /**
     * para enviar los datos del responsable
     * @param object $responsableV
     */
    public function set_responsable($responsableV){
        $this->responsableV = $responsableV;
    }

    //----- METODOS EXTRA -----
   
    /**
     * muestra la lista de pasajeros
     * @return string
     */
    public function mostrarPasajeros(){

        $colPasajero= $this->get_arrayPasajeros();

       $cadena = "";
        for($i=0;$i < count($this->get_arrayPasajeros()); $i++){
        
            $cadena=$cadena."--- PASAJERO ". $i+1 ."---\n"."-NOMBRE: ".$colPasajero[$i]->get_nombre()."\n".
                                                                        " APELLIDO: ".$colPasajero[$i]->get_apellido()."\n".
                                                                        " DNI: ".$colPasajero[$i]->get_documento()."\n".
                                                                        "TELEFONO: ".$colPasajero[$i]->get_telefono()."\n \n";
            
        }
        return $cadena; 
    }
    /**
     * busca un pasajero en la lista por dni
     * @param int
     * @return int
     */
    public function buscarPasajero($dni){

        $colPasajero=$this->get_arrayPasajeros();
        $i=0;

        $encontro=false;

        while($i<count($colPasajero) && !$encontro){

            if($colPasajero[$i]->get_documento()==$dni){

                $encontro = true;
                $i=$i-1;
            }
            $i=$i+1;
        }
        
        return $i;
    }

    // ----- PRUEBA -----

    public function modificarPasajero($pdni, $pnombre, $papellido,$ptelefono,$dnibuscar){

        $indice = $this->buscarPasajero($dnibuscar);

        if ($indice >= 0){ //Si lo encuentra
            $colP = $this->get_arrayPasajeros();
            $colP[$indice]->set_nombre($pnombre);
            $colP[$indice]->set_apellido($papellido);
            $colP[$indice]->set_documento($pdni);
            $colP[$indice]->set_telefono($ptelefono);

            $this->set_arrayPasajeros($colP);
        }

        return $indice;

    }
    /**
     * para ir agregando a los pasajeros
     * @param int $pdni,$ptelefono
     * @param string $pnombre,$papellido 
     */
    Public function agregarPasajero($pnombre,$papellido,$pdni,$ptelefono){
        //array $losPasajeros
        //int $cantidadPasajeros

        $losPasajeros = $this->get_arrayPasajeros();
        $cantidadPasajeros= count($losPasajeros);
        
        $losPasajeros[$cantidadPasajeros]= new Pasajero($pnombre,$papellido,$pdni,$ptelefono);
            
        $this->set_arrayPasajeros($losPasajeros);
             
    }

    //----- METODO TOSTRING -----
    public function __toString(){

        return  "El Codigo es: ".$this->get_codigo()."\n".
                "El Destino es: ".$this->get_destino()."\n".
                "La Cantidad Maxima de Pasajeros es: ".$this->get_cantMaximaPasajeros()."\n".
                "--- Datos del Responsable del Viaje: --- \n".$this->get_responsable()."\n".
                $this->mostrarPasajeros();
                          
    }
}
