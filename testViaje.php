<?php

include_once("Viaje.php");
include_once("Pasajero.php");
include_once("ResponsableV.php");



/**
 * (Dado dos numero uno el minimo y el otro el maximo le solicita al usuario que ingrese un numero dentro de ese rango)
 * @param int $min
 * @param int $max
 * @return int
 */

function solicitarNumeroEntre($min, $max){
    //int $numero
    $numero = trim(fgets(STDIN));
    while (!is_int($numero) && !($numero >= $min && $numero <= $max)) {
        echo "Debe ingresar un número entre " . $min . " y " . $max . ": ";
        $numero = trim(fgets(STDIN));
    }
    return $numero;
}
//-------------------------------------------------------------------------------- 

/**
 * (Menu Principal del Viaje)
 * @return int
 */
function menuPrincipal(){
    //int $opcionPrincipal

    echo "\n----- MENU PRINCIPAL ----- \n \n";
    
    echo "1-)Ver los Datos del Viaje \n";
    echo "2-)Ver los Datos de los Pasajeros: \n";
    echo "3-)Modificar la Informacion del Viaje:  \n";
    echo "4-)Modificar la Informacion de Pasajeros: \n";
    echo "5-)Ingresar los Datos del Responsable \n";
    echo "6-)Salir \n \n";

    
    $opcionPrincipal=solicitarNumeroEntre(1,6);
    return $opcionPrincipal;
}
//--------------------------------------------------------------------------------
/**
 * (Menu Para Modificar los Datos del Viaje)
 * @return int
 */
function menuViaje(){
    // int $opcionViaje

    echo "----- QUE DESEA MODIFICAR DEL VIAJE? ----- \n \n";

    echo "1) El Codigo del Viaje \n";
    echo "2) El Destino del Viaje \n";
    echo "3) La Cantidad Maxima de Pasajeros \n";
    echo "4) Volver al Menu \n \n";


    $opcionViaje=solicitarNumeroEntre(1,4);
    return $opcionViaje;
}
//--------------------------------------------------------------------------------
/**
 * (Menu Para Modificar los Datos de los Pasajeros)
 * @return int
 */
function menuPasajeros(){
    //int $opcionPasajero

    echo "----- QUE DESEA MODIFICAR DEL PASAJERO? ----- \n \n";

    echo "1) El Nombre\n";
    echo "2) El Apellido\n";
    echo "3) Numero de Documento\n";
    echo "4) Numero de Telefono \n";
    echo "5) Volver al menu \n \n";

    
    $opcionPasajero=solicitarNumeroEntre(1,4);
    return $opcionPasajero;

}

//--------------------- INICIO DEL PROGRAMA -----------------------------------------------------------

//TEST ViajeFeliz

//int $codigoViaje,$cantidadMaxPasajeros,$i,$documentoPasajero,$opcion,$nuevoCodigo,$nuevaCantMaxPasajeros,$nuevoDocumento,$pasajerosNuevos,$cantidadMaxPasajerosAntigua,$contador,$numEmpleadoResponsable,$numLicenciaResponsable,$nuevoTelefono,$indiceDelPasajero, $telefonoPasajero
//string $destinoViaje,$nombrePasajero,$apellidoPasajero,$nuevoDestino,$nuevoNombre,$nuevoApellido,$nombreResponsable,$apellidoResponsable
//array $arrayPasajerosViaje
//objeto $viaje1

$telefonoPasajero=0;
$indiceDelPasajero=0;
$nuevoTelefono=0;        
$numEmpleadoResponsable=0;
$numLicenciaResponsable=0;
$nombreResponsable="";
$apellidoResponsable="";
$contador=0;
$codigoViaje = 0;
$cantidadMaxPasajeros = 0;
$i = 0;
$documentoPasajero = 0;
$opcion = 0;
$nuevoCodigo = 0;
$nuevaCantMaxPasajeros = 0;
$nuevoDocumento = 0;
$pasajerosNuevos = 0;
$cantidadMaxPasajerosAntigua = 0;
$destinoViaje = "";
$nombrePasajero = "";
$apellidoPasajero = "";
$nuevoDestino = "";
$nuevoNombre = "";
$nuevoApellido = "";
$arrayPasajerosViaje = [];

//CREO UN OBJETO DE LA CLASE VIAJE (sin valores pero despues envio los datos)
$viaje1= new Viaje(0,"",0,[],null);       

//----- DATOS YA CARGADOS PARA PROBAR EL TEST -----
$codigoViaje=33;
$destinoViaje="mi casa";
$cantidadMaxPasajeros=3;

//----- CONSULTAR CUAL ES LA MEJOR OPCION -----
$arrayPasajerosViaje=[  new Pasajero ("paco","mendoza","76543210","2998765432"), 
                        new Pasajero ("leleco","menard","77777777","2991234567"), 
                        new Pasajero ("pipoca","vidal","12345678","2993333333")];

/*                        
$arrayPasajerosViaje[0]=[new pasajero ("paco","mendoza",76543210,2998765432)];
$arrayPasajerosViaje[1]=[new pasajero ("leleco","menard",77777777,2991234567)];
$arrayPasajerosViaje[2]=[new pasajero ("pipoca","vidal",12345678,2993333333)];
*/
$resposable= new ResponsableV(53,251,"ricardo","juarez");

//----- PARA QUE EL USUARIO INGRESE LOS DATOS DEL VIAJE Y LOS PASAJEROS -----
/*echo "\n----- BIENVENIDO A VIAJE FELIZ----- \n \n";

echo "Ingrese el Codigo del Viaje \n ";
$codigoViaje = trim(fgets(STDIN));

echo "Ingrese el Destino del Viaje \n";
$destinoViaje = trim(fgets(STDIN));

echo "Ingrese la Cantidad Maxima de Pasajeros \n";
$cantidadMaxPasajeros=trim(fgets(STDIN));

//POR SI SE INGRESA UN NUMERO MENOR O IGUAL A 0
while ($cantidadMaxPasajeros <= 0){
    echo "Debe Ingresar un Numero Mayor a 0: \n ";
    $cantidadMaxPasajeros=trim(fgets(STDIN));
}
//PARA IR CARGANDO EL ARRAY DE PASAJEROS
for ($i=1;$i <= $cantidadMaxPasajeros;$i++){
    echo "\n --- Pasajero ". $i ." de ".$cantidadMaxPasajeros." ---\n \n";

    echo "Ingrese el Nombre: \n";
    $nombrePasajero = trim(fgets(STDIN)); 
    echo "Ingrese el Apellido: \n";
    $apellidoPasajero = trim(fgets(STDIN));
    echo "Ingrese el DNI: \n";
    $documentoPasajero = trim(fgets(STDIN));

    $arrayPasajerosViaje[$i-1]=["nombre"=>$nombrePasajero , "apellido" =>$apellidoPasajero , "documento"=> $documentoPasajero];

}
*/
//ENVIO DE LOS DATOS INGRESADOS POR EL USUARIO
$viaje1->set_codigo($codigoViaje);
$viaje1->set_destino($destinoViaje);
$viaje1->set_cantMaximaPasajeros($cantidadMaxPasajeros);
$viaje1->set_arrayPasajeros($arrayPasajerosViaje);
$viaje1->set_responsable($resposable);

do{
    //MENU PRINCIPAL PARA QUE EL USUARIO DECIDA QUE HACER
    $opcionPrincipal = menuPrincipal();

    // SWITCH PARA EL MENU PRINCIPAL 
    switch($opcionPrincipal){

        //MUESTRA LOS DATOS DEL VIAJE
        case 1:
            
            echo "\n----- DATOS DEL VIAJE ----- \n \n";

            echo "el destino es ".$viaje1->get_destino()."\n";
            echo "el codigo es ".$viaje1->get_codigo()."\n";
            echo "la cantidad maxima de pasajeros es ".$viaje1->get_cantMaximaPasajeros()."\n";
            
        break;

        //MUESTRA LOS DATOS DE LOS PASAJEROS
        case 2:
            
            echo "\n----- DATOS DE LOS PASAJEROS ----- \n \n";

            $arrayPasajerosViaje=$viaje1->get_arrayPasajeros();           
            echo $viaje1->mostrarPasajeros();

        break;
        
        //LAS OPCIONES DE MODIFICACION DEL VIAJE
        case 3:
            
            do{
                
                //MENU PARA MODIFICAR LOS DATOS DEL VIAJE
                $opcionViaje = menuViaje();

                //SWITCH PARA EL MENU DE VIAJE
                switch($opcionViaje){
                    
                    //PARA MODIFICAR EL CODIGO
                    case 1:
                        
                        echo "--- El Codigo es ".$viaje1->get_codigo()." ---\n \n";
                        echo "Ingrese el Nuevo Codigo \n";
                        $nuevoCodigo=trim(fgets(STDIN));
                        $viaje1->set_codigo($nuevoCodigo);

                        //----- PARA VER SI SE CAMBIA EL CODIGO -----
                        echo $viaje1;

                    break;

                    //PARA MODIFICAR EL DESTINO
                    case 2:
                        
                        echo "--- El Destino es ".$viaje1->get_destino()." ---\n \n";
                        echo "Ingrese el Nuevo Destino \n";
                        $nuevoDestino=trim(fgets(STDIN));
                        $viaje1->set_destino($nuevoDestino);

                        //----- PARA VER SI SE CAMBIA EL DESTINO -----
                        echo $viaje1;

                    break;
                    
                    //PARA MODIFICAR LA CANTIDAD MAXIMA DE PASAJEROS
                    //(ACA TAMBIEN AGREGO A LOS NUEVOS PASAJEROS CON LA NUEVA CANTIDAD MAX)
                    case 3:
                        
                        echo "--- La Cantidad Maxima de Pasajeros es ".$viaje1->get_cantMaximaPasajeros()." ---\n \n";
                        
                        //GUARDO LA CANTIDAD MAXIMA DE PASAJEROS QUE HAY ACTUALMENTE
                        $cantidadMaxPasajerosAntigua=$viaje1->get_cantMaximaPasajeros();
                        
                        //UN DO WHILE POR SI EL USUARIO ELIGE UNA CANTIDAD MENOR A LA QUE YA ESTABA (NO SE COMO QUITAR PASAJEROS POR ESO)
                        do{
                            echo "Ingrese la Nueva Cantidad Maxima de Pasajeros Mayor a la Actual\n";
                            $nuevaCantMaxPasajeros = trim(fgets(STDIN));
                        
                        }while ( $cantidadMaxPasajerosAntigua >= $nuevaCantMaxPasajeros );

                        //MANDO LA NUEVA CANTIDAD MAXIMA DE PASAJEROS
                        $viaje1->set_cantMaximaPasajeros($nuevaCantMaxPasajeros);

                        //----- CREO QUE ESTA AL PEDO -----
                        //LLAMO A LA LISTA DE PASAJEROS PARA IR AGREGANDO A LOS NUEVOS POR LA NUEVA CANTIDAD MAXIMA
                        $arrayPasajerosViaje=$viaje1->get_arrayPasajeros();

                        //RESTO EL NUMERO DE LA NUEVA CANTIDAD MAX CON LA CANTIDAD MAX ANTIGUA PARA SABER CUANTOS PASAJEROS NUEVOS INGRESO
                        $pasajerosNuevos = $nuevaCantMaxPasajeros - $cantidadMaxPasajerosAntigua;

                        $contador=1;

                        //PARA AGREGAR A LOS NUEVOS PASAJEROS
                        do{
                            echo "--- Pasajero Nuevo ".$contador." de ".$pasajerosNuevos."---\n \n";
                            
                            echo "Ingrese el Nombre: \n";
                            $nombrePasajero=trim(fgets(STDIN));

                            echo "Ingrese el Apellido: \n";
                            $apellidoPasajero=trim(fgets(STDIN));

                            echo "Ingrese el Documento: \n";
                            $documentoPasajero=trim(fgets(STDIN));

                            echo "ingrese el Telefono: \n";
                            $telefonoPasajero=trim(fgets(STDIN));

                            //PARA BUSCAR QUE NO ESTE EL PASAJERO (LO BUSCA POR EL DOCUMENTO)
                            $indiceDelPasajero=$viaje1->buscarPasajero($documentoPasajero);

                            //SI RECORRIO TODO EL ARREGLO QUIERE DECIR QUE NO ENCONTRO AL PASAJERO Y LO AGREGO
                            if($indiceDelPasajero == count($viaje1->get_arrayPasajeros())){

                                $viaje1->agregarPasajero($nombrePasajero,$apellidoPasajero,$documentoPasajero,$telefonoPasajero);
                                $contador++;

                            //SINO LE DIGO QUE VUELVA A INGRESAR LOS DATOS PORQUE EL PASAJERO YA ESTA
                            }else{
                                echo "\n --- El pasajero ya esta Registrado porfavor ingrese de nuevo los datos ---\n";
                            }
                            

                        }while($contador <= $pasajerosNuevos);
                        
                        //----- PARA VER SI SE CAMBIA LA CANTIDAD MAXIMA Y SE AGREGAN LOS NUEVOS PASAJEROS -----
                        echo $viaje1;
                        
                    break;
                    
                }

            }while($opcionViaje!=4);

        break;
        
        //PARA MODIFICAR LA INFORMACION DE LOS PASAJEROS
        case 4:
            
            //UN DO WHILE POR SI NO SE ENCUENTRA EL DOCUMENTO INGRESADO
            do{

                echo "Ingrese el Documento del Pasajero que Quiere Modificar\n";
                $documentoPasajero=trim(fgets(STDIN));
                $indiceDelPasajero=$viaje1->buscarPasajero($documentoPasajero);

                //UN IF PARA QUE LE AVISE AL USUARIO QUE EL DOCUMENTO NO FUE ENCONTRADO SI SE RECORRE TODO EL ARREGLO
                if((count($viaje1->get_arrayPasajeros())==$indiceDelPasajero)){
                    echo "\n--- EL DOCUMENTO INGRESADO NO FUE ENCONTRADO EN LA LISTA DE PASAJEROS ---  \n \n ";
                }

            }while(count($viaje1->get_arrayPasajeros())==$indiceDelPasajero);

            do{

                //MENU PARA MODIFICAR A LOS PSAJEROS
                $opcionPasajero=menuPasajeros();

                //SWITCH PARA EL MENU DE MODIFICACION DE LOS PASAJEROS
                switch ($opcionPasajero){

                    //PARA MODIFICAR EL NOMBRE
                    case 1:
                        
                        echo "--- (EL NOMBRE ES: ".$arrayPasajerosViaje[$indiceDelPasajero]->get_nombre().") ---\n\n";
                        echo "Ingrese el Nuevo Nombre\n";
                        $nuevoNombre=trim(fgets(STDIN));

                        //ENVIO DE DATOS                      
                        //$viaje1->get_arrayPasajeros()[$indiceDelPasajero]->set_nombre($nuevoNombre);

                        $viaje1->modificarPasajero($arrayPasajerosViaje[$indiceDelPasajero],$opcionPasajero,$nuevoNombre);

                        //-----PARA VER SI SE GUARDO EL NOMBRE-----
                       echo $viaje1;

                    break;
                    
                    //PARA MODIFICAR EL APELLIDO
                    case 2:
                        
                        echo "--- (EL APELLIDO ES: ".$arrayPasajerosViaje[$indiceDelPasajero]->get_apellido().") ---\n\n";
                        echo "Ingrese el Nuevo Apellido\n";
                        $nuevoApellido=trim(fgets(STDIN));

                        //ENVIO DE DATOS
                        //$viaje1->get_arrayPasajeros()[$indiceDelPasajero]->set_apellido($nuevoApellido);

                        $viaje1->modificarPasajero($arrayPasajerosViaje[$indiceDelPasajero],$opcionPasajero,$nuevoApellido);

                        //-----PARA VER SI SE GUARDO EL APELLIDO-----
                        echo $viaje1;

                    break;
                    
                    //PARA MODIFICAR EL DOCUMENTO
                    case 3:
                        
                        echo "--- (EL DOCUMENTO ES: ".$arrayPasajerosViaje[$indiceDelPasajero]->get_documento().") ---\n\n";
                        echo "Ingrese el Nuevo Documento\n";
                        $nuevoDocumento=trim(fgets(STDIN));

                        //ENVIO DE DATOS
                        //$viaje1->get_arrayPasajeros()[$indiceDelPasajero]->set_documento($nuevoDocumento);

                        $viaje1->modificarPasajero($arrayPasajerosViaje[$indiceDelPasajero],$opcionPasajero,$nuevoDocumento);

                        //-----PARA VER SI SE GUARDO EL DOCUMENTO-----
                        echo $viaje1;

                    break;
                    
                    //PARA MODIFICAR EL TELEFONO
                    case 4:
                        
                        echo "--- (EL TELEFONO ES: ".$arrayPasajerosViaje[$indiceDelPasajero]->get_telefono().") ---\n \n";
                        echo "Ingrese el Nuevo Telefono \n";
                        $nuevoTelefono=trim(fgets(STDIN));

                        //ENVIO DE DATOS
                        //$viaje1->get_arrayPasajeros()[$indiceDelPasajero]->set_telefono($nuevoTelefono);

                        $viaje1->modificarPasajero($arrayPasajerosViaje[$indiceDelPasajero],$opcionPasajero,$nuevoTelefono);

                        //----- PARA VER SI SE GUARDO EL TELEFONO -----
                        echo $viaje1;
                    break;
                }
                
            }while($opcionPasajero!=4);

        break;
        
        //PARA INGRESAR LOS DATOS DEL RESPONSABLE
        case 5:
            
            echo "Ingrese el Numero de Empleado del Responsable: \n";
            $numEmpleadoResponsable=trim(fgets(STDIN));

            echo "Ingrese el Numero de Licencia del Responsable: \n";
            $numLicenciaResponsable=trim(fgets(STDIN));

            echo "Ingrese el Nombre del Responsable: \n";
            $nombreResponsable=trim(fgets(STDIN));

            echo "Ingrese el Apellido del Responsable: \n";
            $apellidoResponsable=trim(fgets(STDIN));

            $viaje1->get_responsable()->set_numeroEmpleado($numEmpleadoResponsable);
            $viaje1->get_responsable()->set_numeroLicencia($numLicenciaResponsable);
            $viaje1->get_responsable()->set_nombre($nombreResponsable);
            $viaje1->get_responsable()->set_apellido($apellidoResponsable);

            //----- PARA VER SI SE GUARDARON LOS DATOS -----
            echo $viaje1;

        break;
      
    }

}while ($opcion!=6);