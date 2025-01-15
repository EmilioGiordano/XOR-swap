<?php
function swap(&$x, &$y) {
    if ($x === $y) return; // Evitar problemas si x e y tienen el mismo valor
    $x = $x ^ $y; // Paso 1: x = x XOR y
    $y = $x ^ $y; // Paso 2: y = x XOR y
    $x = $x ^ $y; // Paso 3: x = x XOR y
}
function bubbleSort(&$arr) {
    $n = count($arr);

    for ($i = 0; $i < $n - 1; $i++) {
        // Recorrer el arreglo desde el inicio hasta el final no ordenado
        for ($j = 0; $j < $n - 1 - $i; $j++) {
            // Comparar el elemento actual con el siguiente
            if ($arr[$j] > $arr[$j + 1]) {
                // Intercambiar si están en el orden incorrecto
                swap($arr[$j], $arr[$j + 1]);
             
            }
        }
    }
}

function formatArray($arr) {
    return "[" . implode(", ", $arr) . "]";
}
$array = [64, 34, 25, 12, 22, 11, 90];
echo "Arreglo original: " . formatArray($array) . "<br>";
bubbleSort($array);
echo "Arreglo ordenado: " . formatArray($array);
?>