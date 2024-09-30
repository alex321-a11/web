<?php

//1
if (isset($_GET['palabra'])) {
    $palabra = $_GET['palabra'];
    $invertida = strrev($palabra);

    if ($palabra == $invertida) {
        echo "la palabra '$palabra' es un palíndromo.";
    } else {
        echo "la palabra '$palabra' no es un palíndromo.";
    }
}
//2

if (isset($_GET['cadena1']) && isset($_GET['cadena2'])) {
    $cadena1 = $_GET['cadena1'];
    $cadena2 = $_GET['cadena2'];

    // a) cual cadena es mayor y cuál es menor
    if ($cadena1 < $cadena2) {
        echo "<p>$cadena1 es menor que $cadena2</p>";
    } elseif ($cadena1 > $cadena2) {
        echo "<p>$cadena1 es mayor que $cadena2</p>";
    } else {
        echo "<p>$cadena1 y $cadena2 son iguales</p>";
    }

    // b) realizar una cadena con vocales en mayúsculas
    $cadena1_mayusculas_vocales = '';
    for ($i = 0; $i < strlen($cadena1); $i++) {
        $letra = $cadena1[$i];
        if ($letra == 'a' || $letra == 'e' || $letra == 'i' || $letra == 'o' || $letra == 'u') {
            $cadena1_mayusculas_vocales .= strtoupper($letra);
        } else {
            $cadena1_mayusculas_vocales .= $letra;
        }
    }
    echo "<p>cadena 1 con vocales en mayúsculas: $cadena1_mayusculas_vocales</p>";

    // c. cadena con consonantes en mayúsculas
    $cadena2_mayusculas_consonantes = '';
    for ($i = 0; $i < strlen($cadena2); $i++) {
        $letra = $cadena2[$i];
        if (ctype_alpha($letra) && !($letra == 'a' || $letra == 'e' || $letra == 'i' || $letra == 'o' || $letra == 'u')) {
            $cadena2_mayusculas_consonantes .= strtoupper($letra);
        } else {
            $cadena2_mayusculas_consonantes .= $letra;
        }
    }
    echo "<p>Cadena 2 con consonantes en mayúsculas: $cadena2_mayusculas_consonantes</p>";

    // d. Concatenar las dos cadenas convertidas
    $cadena_concatenada = $cadena1_mayusculas_vocales. $cadena2_mayusculas_consonantes;
    echo "<p>Cadena concatenada: $cadena_concatenada</p>";

    // e. Cadena concatenada invertida
    $cadena_invertida = '';
    for ($i = strlen($cadena_concatenada) - 1; $i >= 0; $i--) {
        $cadena_invertida .= $cadena_concatenada[$i];
    }
    echo "<p>Cadena concatenada invertida: $cadena_invertida</p>";
}
// 3
if (isset($_GET['frase']) && isset($_GET['letra'])) {
    $frase = $_GET['frase'];
    $letra = $_GET['letra'];
    $contador = 0;

    for ($i = 0; $i < strlen($frase); $i++) {
        if ($frase[$i] == $letra) {
            $contador++;
        }
    }

    echo "<p>La letra '$letra' se repite $contador veces en la frase.</p>";
}
//4
if (isset($_GET['nombre']) && isset($_GET['apellidoP']) && isset($_GET['apellidoM']) && isset($_GET['fecha']) && isset($_GET['carnet'])) {
    $nombre = $_GET['nombre'];
    $apellidoP = $_GET['apellidoP'];
    $apellidoM = $_GET['apellidoM'];
    $fecha = $_GET['fecha'];
    $carnet = $_GET['carnet'];

    // Extraer la primera letra del nombre y los apellidos
    $letraNombre = strtoupper($nombre[0]);
    $letraApellidoP = strtoupper($apellidoP[0]);
    $letraApellidoM = strtoupper($apellidoM[0]);

    // Extraer los dos primeros dígitos de la fecha y los dos primeros del carnet, substr() para obtener una subcadena de una cadena de texto.
    $parteFecha = substr($fecha, 0, 2);
    $parteCarnet = substr($carnet, 0, 2);

    // Concatenar todo para generar el código
    $codigo = $letraNombre . $letraApellidoP . $letraApellidoM . $parteFecha . $parteCarnet;

    echo "<p> código generado es: $codigo</p>";
}

//7
if (isset($_GET['frase']) && isset($_GET['palabra'])) {
    $frase = $_GET['frase'];
    $palabra = $_GET['palabra'];

    // Contar cuántas veces se repite la palabra en la frase
    $repeticiones = substr_count($frase, $palabra);

    echo "<p>La palabra '$palabra' se repite $repeticiones veces en la frase.</p>";
}
?>