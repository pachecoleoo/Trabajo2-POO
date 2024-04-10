<?php

class pasajeros
{

    private $nombre;
    private $apellido;
    private $dni;
    private $telefono;


    public function __construct($nombre, $apellido, $dni, $telefono)
    {
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->dni = $dni;
        $this->telefono = $telefono;

        //array_column se utiliza para extraer los valores de las claves específicas ('nombre', 'apellido', 'DNI' y 'telefono') de cada elemento del array $pasajeros. Si hay un array asociativo dentro de $pasajeros que tiene la clave 'telefono', se extraerán los valores de esa clave también. Luego, estos valores se asignan a las propiedades correspondientes de la clase.
    }

    public function getNombre()
    {
        return  $this->nombre;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    public function getApellido()
    {
        return $this->apellido;
    }
    public function setApellido($apellido)
    {
        $this->apellido = $apellido;
    }

    public function getDni()
    {
        return  $this->dni;
    }

    public function setDni($dni)
    {
        $this->dni = $dni;
    }

    public function getTelefono()
    {
        return $this->telefono;
    }
    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;
    }

    public function __toString()
    {
        return "Nombre: " . $this->getApellido() . "\nApellido: " . $this->getApellido() . "\nDni: " . $this->getDni() . "\nTelefono: " . $this->getTelefono();
    }
}
