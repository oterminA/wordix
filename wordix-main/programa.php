<?php
include_once("wordix.php");

/**
 * Función que ordena un array con una función de comparación definida por el usuario y 
 * mantiene la asociación de índices
 * @param array $array 
 * @param callable $callback 
 */
// function uasort(array &$array, callable $callback){}

/**
 * Función que imprime información legible sobre una variable, en caso de recibir un 
 * arreglo los valores son presentados en un formato que
 * muestra las claves y los elementos.
 * @param mixed $value 
 * @param bool $return [optional] 
 * @return string|bool
 */
// function print_r(mixed $value, bool $return = false){}

/**
 * Función que inicializa y retorna una colección de treina palabras.
 * @return array indexado strings
 */
function cargarColeccionPalabras()
{
    // array $coleccionPalabras

    $coleccionPalabras = [
        "MUJER",
        "QUESO",
        "FUEGO",
        "CASAS",
        "RASGO",
        "GATOS",
        "GOTAS",
        "HUEVO",
        "TINTO",
        "NAVES",
        "VERDE",
        "MELON",
        "YUYOS",
        "PIANO",
        "PISOS",
        "PELON",
        "LIMON",
        "SALIR",
        "VALLE",
        "BARCO",
        "MUNDO",
        "OVEJA",
        "PLAYA",
        "FRUTA",
        "BANCO",
        "GALLO",
        "CAMPO",
        "LIBRO",
        "CARTA",
        "GRANO"
    ];

    return $coleccionPalabras;
}

/**
 * Función que inicializa una estructura de datos con partidas
 * y retorna dicha colección.
 * @return array[] arreglo indexado de arreglos asociativos
 */
function cargarPartidas()
{
    // array $coleccionPartidas

    $coleccionPartidas = [];
    $coleccionPartidas[0] = ["palabraWordix" => "MUJER", "jugador" => "majo", "intentos" => 0, "puntaje" => 0];
    $coleccionPartidas[1] = ["palabraWordix" => "QUESO", "jugador" => "rudolf", "intentos" => 3, "puntaje" => 14];
    $coleccionPartidas[2] = ["palabraWordix" => "FUEGO", "jugador" => "pink2000", "intentos" => 6, "puntaje" => 10];
    $coleccionPartidas[3] = ["palabraWordix" => "CASAS", "jugador" => "caro", "intentos" => 2, "puntaje" => 15];
    $coleccionPartidas[4] = ["palabraWordix" => "RASGO", "jugador" => "fran", "intentos" => 6, "puntaje" => 0];
    $coleccionPartidas[5] = ["palabraWordix" => "GATOS", "jugador" => "gise", "intentos" => 5, "puntaje" => 11];
    $coleccionPartidas[6] = ["palabraWordix" => "GOTAS", "jugador" => "amalia", "intentos" => 1, "puntaje" => 15];
    $coleccionPartidas[7] = ["palabraWordix" => "HUEVO", "jugador" => "rodri", "intentos" => 3, "puntaje" => 12];
    $coleccionPartidas[8] = ["palabraWordix" => "GRANO", "jugador" => "fran", "intentos" => 1, "puntaje" => 15];
    $coleccionPartidas[9] = ["palabraWordix" => "SALIR", "jugador" => "caro", "intentos" => 1, "puntaje" => 16];
    $coleccionPartidas[10] = ["palabraWordix" => "LIMON", "jugador" => "gise", "intentos" => 4, "puntaje" => 10];
    $coleccionPartidas[11] = ["palabraWordix" => "OVEJA", "jugador" => "rodri", "intentos" => 5, "puntaje" => 10];
    $coleccionPartidas[12] = ["palabraWordix" => "YUYOS", "jugador" => "amalia", "intentos" => 4, "puntaje" => 12];
    $coleccionPartidas[13] = ["palabraWordix" => "SALIR", "jugador" => "jose", "intentos" => 3, "puntaje" => 14];
    $coleccionPartidas[14] = ["palabraWordix" => "GOTAS", "jugador" => "luisa", "intentos" => 2, "puntaje" => 15];
    $coleccionPartidas[15] = ["palabraWordix" => "FUEGO", "jugador" => "gonzalo", "intentos" => 1, "puntaje" => 13];
    $coleccionPartidas[16] = ["palabraWordix" => "VALLE", "jugador" => "anto", "intentos" => 2, "puntaje" => 14];
    $coleccionPartidas[17] = ["palabraWordix" => "CARTA", "jugador" => "caro", "intentos" => 3, "puntaje" => 14];
    $coleccionPartidas[18] = ["palabraWordix" => "BANCO", "jugador" => "fran", "intentos" => 6, "puntaje" => 9];
    $coleccionPartidas[19] = ["palabraWordix" => "NAVES", "jugador" => "cristian", "intentos" => 5, "puntaje" => 12];
    $coleccionPartidas[20] = ["palabraWordix" => "QUESO", "jugador" => "luis", "intentos" => 4, "puntaje" => 11];

    return $coleccionPartidas;
}

/**
 * Funcion que permite al usuario elegir una palabra
 * para iniciar su partida. Le solicita al usuario su nombre
 * y un numero de palabra para jugar. Si el numero de palabra 
 * ya fue utilizada por el jugador, el programa le indica
 * que debe elegir otro numero de palabra. Finalizada la partida,
 * los datos se guardan en una estructura de datos de partidas.
 * @param string[] indexado strings
 * @param array[]
 * @return array[] (actualizado)
 */
function jugarPalabraElegida($coleccionPalabras, $coleccionPartidas)
{
    // int $opcion, $cantidadPartidas, $minimo, $maximo, $i, $j
    // string $palabraElegida, $nombreUsuario
    // array $partida , $coleccionPartidas
    // bool $palabraJugada

    $maximo = count($coleccionPalabras);

    $nombreUsuario = solicitarJugador();
    // Muestra las palabras disponibles y pide al jugador que elija una.
    echo "> Elija una palabra del siguiente listado: \n";
    for ($j = 0; $j < $maximo; $j++) {
        echo $j + 1 . "\n";
    }

    // Inicializa las variables.
    $palabraElegida = "";
    // $coleccionPartidas = cargarPartidas();
    $minimo = 1;

    // Bucle que solicita la palabra mientras cumpla las condiciones.
    do {
        // Solicita la opción de palabra al usuario.
        echo "> Ingrese el número de la palabra que desea jugar: \n";
        echo "\n";
        $opcion = solicitarNumeroEntre($minimo, $maximo) - 1;

        $palabraElegida = $coleccionPalabras[$opcion];

        // Inicializa la variable bandera.          
        $palabraJugada = false;

        $i = 0;
        $cantidadPartidas = count($coleccionPartidas);

        // Bucle que verifica que la palabra no haya sido jugada por el jugador.
        do {

            $partida = $coleccionPartidas[$i];

            if ($partida["palabraWordix"] === $palabraElegida && $nombreUsuario === $partida["jugador"]) {
                $palabraJugada = true;
            }
            $i++;
        } while (!$palabraJugada && $i < $cantidadPartidas);

        // Mensaje por pantalla para avisarle al usuario que la palabra ya fue jugada por el.
        if ($palabraJugada) {
            echo "> Palabra ya jugada! Elija otra para jugar! \n ";
            echo "\n";
            $palabraElegida = "";
        }
    } while ($palabraElegida === "");

    //Llama a la función de jugar con la palabra elegida.
    $partida = jugarWordix($palabraElegida, $nombreUsuario);

    // Guarda la partida en la coleccion.
    $coleccionPartidas[] = $partida;

    return $coleccionPartidas;
}


/**
 * Funcion que permite al usuario jugar una partida
 * con una palabra aleatoria. Le solicita al usuario su nombre.
 * El programa elegira una palabra aleatoria de las disponibles 
 * para jugar, asegurandose de que no haya sido jugada previamente
 * por el jugador. Finalizada la partida los datos se guardan en 
 * una estructura de datos de partidas.
 * @param string[] indexado strings
 * @param array[]
 * @return array[] (actualizado)
 */
function jugarPalabraAleatoria($coleccionPalabras, $coleccionPartidas)
{
    // string $palabraAleatoria, $nombreUsuario
    // array $partida , $coleccionPartidas
    // boolean $palabraJugada

    // Inicializa las variables.
    $palabraAleatoria = "";
    $coleccionPartidas = cargarPartidas();
    $i = 0;
    $cantidad = count($coleccionPartidas);
    $palabraJugada = false;
    $nombreUsuario = solicitarJugador();

    do {
        // Seleccionar una palabra aleatoria de la colección
        $palabraAleatoria = $coleccionPalabras[array_rand($coleccionPalabras)];

        // Verifica que la palabra no haya sido jugada por el jugador.              
        while ($i < $cantidad && !$palabraJugada) {
            $partida = $coleccionPartidas[$i];
            if ($partida["palabraWordix"] === $palabraAleatoria && $nombreUsuario === $partida["jugador"]) {
                $palabraJugada = true;
            }
            $i++;
        }
        // Si la palabra ya fue jugada se le avisa al jugador.
        if ($palabraJugada) {
            echo "> Palabra ya jugada! Elija otra para jugar! \n ";
            $palabraAleatoria = "";
        }
    } while ($palabraAleatoria === "");

    echo "> Palabra elegida! A jugar!!!\n";

    // Llamar a la función de jugar con la palabra aleatoria
    $partida = jugarWordix($palabraAleatoria, $nombreUsuario);

    // Guarda la partida en la coleccion.
    $coleccionPartidas[] = $partida;

    return $coleccionPartidas;
}

/**
 * Funcion que le solicita al usuario un numero de partida y se 
 * muestra en pantalla los datos de la partida. Si el numero de
 * partida no existe, el programa le solicita un numero de partida
 * correcto.
 * @param array[] indexado de arreglos asociativos
 * @param int $opcion 
 */
function mostrarUnaPartida($coleccionPartidas, $opcion)
{
    // int $cantidad, $indice, $opcion
    // array $partidaElegida
    // string $nombreJugador
    // boolean $nombreExiste

    $cantidad = count($coleccionPartidas);

    if ($opcion == 3) {
        // Solicita la opción de partida al usuario.
        echo "> Por favor ingrese el número de partida a mostrar (1 a $cantidad):\n";
        $indice = solicitarNumeroEntre(1, $cantidad) - 1;
    }

    if ($opcion == 4) {

        do {

            $nombreJugador = solicitarJugador($coleccionPartidas);
            $nombreExiste = verificarExistenciaJugador($coleccionPartidas, $nombreJugador);

            if ($nombreExiste == false) {
                echo "> ERROR! El jugador no existe!\n";
            }
        } while ($nombreExiste == false);

        $indice = indicePrimeraPartidaGanadora($coleccionPartidas, $nombreJugador);
        if ($indice == -1) {
            echo "> El jugador " . $nombreJugador . " no ganó ninguna partida. \n";
            echo "\n";
        }
    }

    if ($indice >= 0 && $indice < $cantidad) {

        $partidaElegida = $coleccionPartidas[$indice];

        echo "\n";
        echo "*******************************************\n";
        echo "> Partida WORDIX " .  ($indice + 1) . ": palabra " . $partidaElegida["palabraWordix"] . ".\n";
        echo "> Jugador: " . $partidaElegida["jugador"] . ".\n";
        echo "> Puntaje: " . $partidaElegida["puntaje"] . " puntos. \n";
        if ($partidaElegida["intentos"] > 0) {
            echo "> Intento: adivinó la palabra en " . $partidaElegida["intentos"] . " intentos. \n";
        } else {
            echo "> Intento: no adivinó la palabra.\n";
        }
        echo "\n";
        echo "*******************************************\n";
    }
}

/**
 * Funcion que dada una colección de partidas y el nombre de un jugador, 
 * retorna el índice de la primera partida ganada por dicho jugador, o
 * si el jugador no ganó ninguna partida, retorna el valor -1.
 * @param array[] indexado de arreglos asociativos
 * @param string $nombreJugador
 * @return int
 */
function indicePrimeraPartidaGanadora($coleccionPartidas, $nombreJugador)
{
    // boolean $encontrado
    // int $indicePrimeraGanada, $i, $cantidadPartidas

    $indicePrimeraGanada = -1;
    $i = 0;
    $cantidadPartidas = count($coleccionPartidas);
    $encontrado = false;
    $i = 0;

    // Recorrido para encontrar el indice de la primera victoria del jugador elegido.
    do {
        if ($coleccionPartidas[$i]["jugador"] == $nombreJugador && $coleccionPartidas[$i]["puntaje"] > 0) {
            $indicePrimeraGanada = $i;
            $encontrado = true;
        }
        $i++;
    } while (!$encontrado && $i < $cantidadPartidas);

    return $indicePrimeraGanada;
}

/**
 * Funcion que muestra las estadisticas de un jugador. Se le solicita
 * al usuario que ingrese un nombre de jugador y se muestran las 
 * estadisticas.
 * @param array[]
 */
function mostrarResumenJugador($coleccionPartidas)
{
    // array $resumenJugador
    // string $nombreJugador
    // boolean $nombreExiste
    // int $intentoClave, $i
    // float $porcentajeVictorias

    do {

        $nombreJugador = solicitarJugador($coleccionPartidas);
        $nombreExiste = verificarExistenciaJugador($coleccionPartidas, $nombreJugador);

        if ($nombreExiste == false) {
            echo "> ERROR! El jugador no existe!\n";
        }
    } while ($nombreExiste == false);

    //Inicializa el resumen del jugador, funciona como acumulador
    $resumenJugador = [
        "jugador" => $nombreJugador,
        "partidas" => 0,
        "puntaje" => 0,
        "victorias" => 0,
        "intento1" => 0,
        "intento2" => 0,
        "intento3" => 0,
        "intento4" => 0,
        "intento5" => 0,
        "intento6" => 0,
    ];

    // Recorre la colección de partidas
    foreach ($coleccionPartidas as $partida) {
        if ($partida["jugador"] === $nombreJugador) {
            //Incrementa el total de partidas jugadas
            $resumenJugador["partidas"] = $resumenJugador["partidas"] + 1;

            //Suma el puntaje de la partida al puntaje total
            $resumenJugador["puntaje"] += $partida["puntaje"];

            //Si el puntaje es mayor a 0, considera como victoria
            if ($partida["puntaje"] > 0) {
                $resumenJugador["victorias"]++;
            }

            //Cuenta el intento correspondiente si fue una victoria
            if ($partida["puntaje"] > 0 && $partida["intentos"] >= 1 && $partida["intentos"] <= 6) {
                $intentoClave = "intento" . $partida["intentos"];
                $resumenJugador[$intentoClave]++;
            }
        }
    }

    if ($resumenJugador["victorias"] > 0) {
        $porcentajeVictorias = ($resumenJugador["victorias"] / $resumenJugador["partidas"] * 100);
        $porcentajeVictorias = round($porcentajeVictorias, 2);
    } else {
        $porcentajeVictorias = 0; // Si no hay victorias, el porcentaje es 0
    }

    // Muestra el resumen en pantalla
    echo "\n";
    echo "*****************************************\n";
    echo "> Jugador: " . $resumenJugador["jugador"] . "\n";
    echo "> Partidas: " . $resumenJugador["partidas"] . "\n";
    echo "> Puntaje Total: " . $resumenJugador["puntaje"] . "\n";
    echo "> Victorias: " . $resumenJugador["victorias"] . "\n";
    echo "> Porcentaje de Victorias: " . $porcentajeVictorias . "%\n";
    echo "> Adivinadas:\n";
    for ($i = 1; $i <= 6; $i++) {
        echo "      > Intento $i: " . $resumenJugador["intento" . $i] . "\n";
    }
    echo "\n";
    echo "*****************************************\n";
}

/**
 * Funcion que muestra por pantalla la estructura ordenada alfabeticamente
 * por jugador y por palabra, utilizando la funcion predefinida uasort de php
 * y la funcion predefinida print_r.
 * @param array[] indexado de arreglos asociativos
 */
function mostrarListadoOrdenado($coleccionPartidas)
{
    //int $resultado
    // array $a, $b

    // Definimos la funcion de comparacion.
    function comparar($a, $b)
    {
        // Primero comparamos por el nombre de jugador.
        if ($a["jugador"] == $b["jugador"]) {
            // Si los jugadores son iguales comparamos palabra.
            $resultado = ($a["palabraWordix"] < $b["palabraWordix"]) ? -1 : 1;
        } else {
            // Comparamos los jugadores cuando son distintos.
            $resultado = ($a["jugador"] < $b["jugador"]) ? -1 : 1;
        }
        return $resultado;
    }

    uasort($coleccionPartidas, 'comparar');

    print_r($coleccionPartidas);
}

/**
 * Funcion que le solicita al usuario una palabra de 5 letras y la 
 * agrega en mayusculas a la coleccion de palabras Wordix, para que
 * el usuario pueda utilizarla para jugar.
 * @param string[] indexado strings
 * @return string[] indexado strings
 */
function agregarPalabra($coleccionPalabras)
{
    // string $palabraNueva

    $palabraNueva = leerPalabra5Letras(); // Esta función valida que la palabra tenga 5 letras y la pasa a mayúscula.

    while (esPalabraRepetida($coleccionPalabras, $palabraNueva)) { // Se verifica que la palabra no este repetida en el arreglo.
        echo "> ERROR!: palabra repetida. Ingrese una palabra nuevamente: \n";
        $palabraNueva = leerPalabra5Letras(); // Solicita una nueva palabra en caso de que se repita.
    }

    $coleccionPalabras[] = $palabraNueva; // Añade directamente al final del arreglo.

    return $coleccionPalabras;
}

/**
 * Función que verifica si una palabra ya está en el arreglo.
 * @param string[] indexado strings
 * @param string $palabraNueva 
 * @return boolean
 */
function esPalabraRepetida($coleccionPalabras, $palabraNueva)
{
    // boolean $esRepetida
    // int $i, $cantidad

    $cantidad = count($coleccionPalabras);
    $esRepetida = false; //Inicializa la variable bandera como falsa
    $i = 0;

    // Recorre el arreglo mientras no se encuentre la palabra repetida
    while (!$esRepetida && $i < $cantidad) {
        if ($coleccionPalabras[$i] === $palabraNueva) {
            $esRepetida = true; //Cambia la bandera si se encuentra la palabra
        }
        $i++; //Avanza al siguiente elemento
    }

    return $esRepetida;
}

/**
 * Función que que muestra en pantalla las opciones del menú,
 * le solicita al usuario una opción válida (si la opción no es correcta, 
 * se le solicita otra vez un número  al usuario hasta que la opción sea válida),
 * y retorna el número de la opción elegida.
 * @return int
 */
function seleccionarOpcion()
{
    // int $opcion

    do {
        echo ">>>> MENU DE OPCIONES <<<<\n";
        echo "\n";
        echo "> 1 - Jugar al wordix con una palabra elegida.\n";
        echo "> 2 - Jugar al wordix con una palabra aleatoria.\n";
        echo "> 3 - Mostrar una partida.\n";
        echo "> 4 - Mostrar la primer partida ganadora.\n";
        echo "> 5 - Mostrar resumen de Jugador.\n";
        echo "> 6 - Mostrar listado de partidas ordenadas por jugador y por palabra.\n";
        echo "> 7 - Agregar una palabra de 5 letras a Wordix. \n";
        echo "> 8 - Salir.\n";
        echo "\n";
        echo "> ELIJA UNA OPCION < \n";

        $opcion = trim(fgets(STDIN));

        if (!is_numeric($opcion) || $opcion < 1 || $opcion > 8) {
            echo "> ERROR!: por favor, ingrese un número entre 1 y 8.\n";
        }
    } while (!is_numeric($opcion) || $opcion < 1 || $opcion > 8);

    $opcion = (int)$opcion;

    return $opcion;
}

/**
 * Función que usa un modulo para solicitarle el nombre a un jugador 
 * y retorna dicho nombre en minúsculas. 
 * La función verifica que el nombre del jugador comienza con una letra usando ctype_alpha
 * @return string
 */
function solicitarJugador()
{
    // boolean $esValido
    // string $nombre
    // int $cantidad

    $esValido = false;
    do {
        echo "> Ingrese el nombre del jugador: \n";
        $nombre = trim(fgets(STDIN));
        $cantidad = strlen($nombre);
        if (($cantidad > 0) && ctype_alpha($nombre[0])) {
            $esValido = true;
        }
    } while (!$esValido);

    return strtolower($nombre);
}

/**
 * Función que verifica si un usuario solicitado existe dentro
 * del arreglo coleccionPartidas, el bucle no se detiene hasta que
 * se ingrese un usuario válido y verificado
 * @param array[] 
 * @param string $nombreJugador
 * @return bool
 */
function verificarExistenciaJugador($coleccionPartidas, $nombreJugador)
{
    // boolean $nombreValido,
    // int  $i, $cantidad
    // string $nombreJugador

    $nombreValido = false;
    $cantidad = count($coleccionPartidas);
    $i = 0;

    // Recorrido parcial para encontrar un nombre que coincida
    while ($i < $cantidad && !$nombreValido) {
        if ($nombreJugador == $coleccionPartidas[$i]['jugador']) {
            $nombreValido = true;
        }
        $i++;
    }

    return $nombreValido;
}


//PROGRAMA PRINCIPAL

/**
 * Wordix es un juego en el que tendras que adivinar palabras. El desarrollo
 * del juego consiste en resolver una palabra de 5 letras en 6 intentos. Si
 * adivinas una letra y esta se encuentra en el lugar correcto, se pinta de
 * verde. Si adivinas un letra pero esta en el lugar incorrecto, se pinta de
 * amarillo. Si no existe la letra, se pinta de rojo y ya se sabe que no 
 * deberia volver a usarse.
 */

//Declaración de variables:

// int $opcion, $indiceGanadora
// array $coleccionPalabras, $coleccionPartidas

//Inicialización de variables:

//Precargar las estructuras de datos.
$coleccionPalabras = cargarColeccionPalabras();
$coleccionPartidas = cargarPartidas();



//Menu de opciones.
do {
    $opcion = seleccionarOpcion();
    switch ($opcion) {
        case 1:
            $coleccionPartidas = jugarPalabraElegida($coleccionPalabras, $coleccionPartidas);
            break;
        case 2:
            $coleccionPartidas = jugarPalabraAleatoria($coleccionPalabras, $coleccionPartidas);
            break;
        case 3:
            mostrarUnaPartida($coleccionPartidas, $opcion);
            break;
        case 4:
            mostrarUnaPartida($coleccionPartidas, $opcion);
            break;
        case 5:
            mostrarResumenJugador($coleccionPartidas);
            break;
        case 6:
            $listadoOrdenado = mostrarListadoOrdenado($coleccionPartidas);
            break;
        case 7:
            $coleccionPalabras = agregarPalabra($coleccionPalabras);
            echo "> Tu palabra fue agregada a la lista de palabras:\n";
            foreach ($coleccionPalabras as $indice => $palabra) {
                echo ($indice + 1) . ". $palabra\n";
            }
            break;
        case 8:
            echo ">>> Saliste de Wordix! <<<\n";
            break;
    }
} while ($opcion != 8);
