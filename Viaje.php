<?php
// Importante: Deben enviar el link a la resolución en su repositorio en GitHub del ejercicio.

// La empresa de Transporte de Pasajeros “Viaje Feliz” quiere registrar la información referente a sus viajes. De cada viaje se precisa almacenar el código del mismo, destino, cantidad máxima de pasajeros y los pasajeros del viaje.

// Realice la implementación de la clase Viaje e implemente los métodos necesarios para modificar los atributos de dicha clase (incluso los datos de los pasajeros). Utilice clases y arreglos  para   almacenar la información correspondiente a los pasajeros. Cada pasajero guarda  su “nombre”, “apellido” y “numero de documento”.

// Implementar un script testViaje.php que cree una instancia de la clase Viaje y presente un menú que permita cargar la información del viaje, modificar y ver sus datos.

// Modificar la clase Viaje para que ahora los pasajeros sean un objeto que tenga los atributos nombre, apellido, numero de documento y teléfono. El viaje ahora contiene una referencia a una colección de objetos de la clase Pasajero. También se desea guardar la información de la persona responsable de realizar el viaje, para ello cree una clase ResponsableV que registre el número de empleado, número de licencia, nombre y apellido. La clase Viaje debe hacer referencia al responsable de realizar el viaje.

// Implementar las operaciones que permiten modificar el nombre, apellido y teléfono de un pasajero. Luego implementar la operación que agrega los pasajeros al viaje, solicitando por consola la información de los mismos. Se debe verificar que el pasajero no este cargado mas de una vez en el viaje. De la misma forma cargue la información del responsable del viaje.


class Viaje
{
    private $codigo;
    private $destino;
    private $cantMax;
    private $arrayPasajeros;
    private $objResponsable;

    public function __construct($codigo, $destino, $cantMax, $arrayPasajeros, Responsable $objResponsable)
    {
        $this->codigo = $codigo;
        $this->destino = $destino;
        $this->cantMax = $cantMax;
        $this->arrayPasajeros = $arrayPasajeros; //array
        $this->objResponsable = $objResponsable;
    }

    public function getCodigo()
    {
        return $this->codigo;
    }

    public function setCodigo($codigo)
    {
        $this->codigo = $codigo;
    }

    public function getDestino()
    {
        return $this->destino;
    }

    public function setDestino($destino)
    {
        $this->destino = $destino;
    }

    public function getCantMax()
    {
        return  $this->cantMax;
    }

    public function setCantmax($cantMax)
    {
        $this->cantMax = $cantMax;
    }
    public function setArrayPasajeros($arrayPasajeros)
    {
        $this->arrayPasajeros = $arrayPasajeros;
    }
    public function getArrayPasajeros()
    {
        return $this->arrayPasajeros;
    }

    public function setObjResponsable($objResponsable)
    {
        $this->objResponsable = $objResponsable;
    }
    public function getObjResponsable()
    {
        return $this->objResponsable;
    }

    public function cambiarDatosPasajero($documento)
    {
        $pasajeros = $this->getArrayPasajeros();
        $encontrado = false;
        foreach ($pasajeros as $pasajero) {
            if ($pasajero->getDni() == $documento) {
                $encontrado =  TRUE;
                echo "Ingrese los nuevos datos para el pasajero con DNI $documento: \nNombre: ";
                $nombre = trim(fgets(STDIN));
                $pasajero->setNombre($nombre);
                echo "\nApellido: ";
                $apellido = trim(fgets(STDIN));
                $pasajero->setApellido($apellido);
                echo "\n Telefono:";
                $telefono = trim(fgets(STDIN));
                $pasajero->setTelefono($telefono);
                break;
            }
        }

        if ($encontrado) {
            $respuesta = "Han sido cambiados los datos. Sus nuevos datos son: $pasajero";
        } else {
            $respuesta = "No existe DOCUMENTO";
        }
        return $respuesta;
    }

    /** Metodo Agregar Pasajero
     * Recibe como parametro un objeto de un nuevo pasajero.
     * Se verifican si los datos no se repita con otra persona (Dni)
     * y retorna un nuevo objeto Pasajero
     * @param objet $nuevoPasajero
     * @return objet */

    public function agregarPasajero($nuevoPasajero)
    {
        // ARRAY $personas
        // INT $i, $countPasajeros
        // BOOLEAN $encontrado

        $pasajeros = $this->getArrayPasajeros();
        $totalPasajeros = count($pasajeros);
        $encontrado = false;
        $i = 0;
        while ($i < $totalPasajeros && !$encontrado) {

            // Si los DNI son iguales, no se guarda el nuevo pasajero (true). Se guarda caso contrario (false).
            if ($pasajeros[$i]->getDni() == $nuevoPasajero->getDni()) {

                $encontrado = true; // se verifica que exista el pasajero en la lista

            }
            $i++;
        }
        //Se verifica si $encontrado es diferente a true para asegurarnos de no repetir pasajero a bordo
        if ($encontrado <> true) {
            $pasajeros[$totalPasajeros] = $nuevoPasajero;
            $this->setArrayPasajeros($pasajeros);
            $mensaje = "Nuevo pasajero añadido";
        } else
            $mensaje = "Este pasajero ya esta disponible en el viaje";

        return $mensaje;
    }

    public function modificarResponsable($nuevoResponsable)
    {
        $this->setObjResponsable($nuevoResponsable); // objeto de persona responsable
        return $this->getObjResponsable();
    }
    public function __toString()
    {
        $respuesta = "\n**************************\n";
        $respuesta .= "Codigo: " . $this->getCodigo() . "\n";
        $respuesta .= "Destino: " . $this->getDestino() . "\n";
        $respuesta .= "Cantidad Max Pasajeros: " . $this->getCantMax() . "\n";

        $respuesta .= "La lista de pasajeros son: \n";
        foreach ($this->arrayPasajeros as $pasajero) {
            $respuesta .= "**************************\\n ";
            $respuesta .= "Nombre: " . $pasajero->getNombre() . "\n";
            $respuesta .= "Apellido: " . $pasajero->getApellido() . "\n";
            $respuesta .= "DNI: " . $pasajero->getDni() . "\n";
            $respuesta .= "Telefono: " . $pasajero->getTelefono() . "\n";
        }

        $respuesta .= "\n**************************\n";
        $respuesta .= "Responsable del viaje:\n" . $this->getObjResponsable() . "\n";

        return $respuesta;
    }
}
