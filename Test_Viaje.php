<?php

include_once "Pasajeros.php";
include_once "Viaje.php";
include_once "Responsable.php";





$pasajero1 = new Pasajeros("Leonardo", "Pacheco", "41347641", 2995207111);
$pasajero2 = new Pasajeros("Nico", "Rivera", "13909931", 299803831);
$pasajero3 = new Pasajeros("Facu", "Garcia", "43166841", 2997507666);
$totalPasajeros = [$pasajero1, $pasajero2, $pasajero3];


$responsable1 = new Responsable("20-93-78", "3.890.090", "Andrew", "Morrigan");
$viaje = new Viaje("33-09-22", "Iguazu", 4, $totalPasajeros, $responsable1);
echo $viaje;
echo "¿Desea cambiar los datos de algun pasajero?\n";
$rta = trim(fgets(STDIN));
while ($rta <> "no") {
    echo "Agregue el documeto del pasajero";
    $documento = trim(fgets(STDIN));
    echo $viaje->cambiarDatosPasajero($documento);
}
echo "¿Desea agregar nuevos pasajeros?";
$rta = trim(fgets(STDIN));
while ($rta <> "no") {
    echo "Agregue los datos del nuevo pasajero:";
    echo "Nombre: ";
    $nombre = trim(fgets(STDIN));
    echo "Apellido: ";
    $apellido = trim(fgets(STDIN));
    echo "Telefono:";
    $telefono = trim(fgets(STDIN));
    echo "Documento:";
    $documento = trim(fgets(STDIN));
    $nuevoPasajero = new Pasajeros($nombre, $apellido, $documento, $telefono);
    echo $viaje->agregarPasajero($nuevoPasajero);
    echo "¿Desea agregar otro pasajero?\n";
    $rta = trim(fgets(STDIN));
}

echo "¿Desea modificar informacion del responsable del viaje? \n";
$rta = trim(fgets(STDIN));
while ($rta <> "no") {

    echo "Agregue los datos nuevos del responsable:";
    echo "Nombre: ";
    $nombre = trim(fgets(STDIN));
    echo "Apellido: ";
    $apellido = trim(fgets(STDIN));
    echo "Numero Empleado:";
    $numeroEmpleado = trim(fgets(STDIN));
    echo "Numero Licencia :";
    $numeroLicencia  = trim(fgets(STDIN));
    $nuevoResponsable = new Responsable($numeroEmpleado, $numeroLicencia, $nombre, $apellido);
    echo $viaje->modificarResponsable($nuevoResponsable);
    echo "\n¿Desea volver a modificar Responsable?\n";
    $rta = trim(fgets(STDIN));
}
