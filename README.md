# Intercambio de Variables Usando XOR

¿Sabías que es posible intercambiar el valor de dos variables **sin utilizar una variable temporal**?  
Esto es posible gracias a la operación **XOR**, la cual compara los bits de dos números. Si los bits son iguales, el resultado es `0`; si son diferentes, el resultado es `1`. Esto permite realizar el intercambio de valores entre dos variables de manera eficiente.

## Ejemplo de Intercambio con XOR
Supongamos que tenemos dos números en binario:
A = 10 (__1010__ en binario)
B = 14 (__1110__ en binario)

Para realizar el cambio de valores en las variables se debe realizar la operación XOR tres veces.

1. **A = A ⊕ B**  
   Operación: `1010 ⊕ 1110 = 0100`  
   Resultado: `A = 0100` (4 en decimal)

2. **B = A ⊕ B**  
   Operación: `0100 ⊕ 1110 = 1010`  
   Resultado: `B = 1010` (10 en decimal)

3. **A = A ⊕ B**  
   Operación: `0100 ⊕ 1010 = 1110`  
   Resultado: `A = 1110` (14 en decimal)

### Tabla Resumen de Operaciones:
| Operación         | A      | B      | Resultado |
|-------------------|--------|--------|-----------|
| **1. A = A ⊕ B**  | 1010   | 1110   | 0100      |
| **2. B = A ⊕ B**  | 0100   | 1110   | 1010      |
| **3. A = A ⊕ B**  | 0100   | 1010   | 1110      |


### Resultado Final:
- **A** ahora contiene el valor de **B**: `A = 1110` (14 en decimal).
- **B** ahora contiene el valor de **A**: `B = 1010` (10 en decimal).


---
Este truco es especialmente útil en programación de bajo nivel, como en sistemas embebidos o cuando el uso de memoria es limitado. Además, muestra la potencia de las operaciones bit a bit en la manipulación de datos.

## Implementación en diferentes lenguajes
### C: Implementación básica

```c
#include <stdio.h>

void swap(int *x, int *y) {
    if (x == y) return;  // Evita problemas si ambas variables apuntan al mismo lugar
    *x ^= *y;  // Paso 1: x = x XOR y
    *y ^= *x;  // Paso 2: y = y XOR x
    *x ^= *y;  // Paso 3: x = x XOR y
}

int main() {
    int a = 10, b = 20;
    printf("Antes del intercambio: a = %d, b = %d\n", a, b);
    swap(&a, &b);
    printf("Después del intercambio: a = %d, b = %d\n", a, b);
}
```
#### Salida
```text
Antes del intercambio: a = 10, b = 20
Después del intercambio: a = 20 b = 10
```

### PHP: Aplicado para el algoritmo de ordenamiento Bubble Sort
```php
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
```
#### Salida
```text
Arreglo original: [64, 34, 25, 12, 22, 11, 90]
Arreglo ordenado: [11, 12, 22, 25, 34, 64, 90]
```
