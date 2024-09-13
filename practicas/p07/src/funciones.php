<?php
// Ejercicio 1
function multiplo5y7($numero) {
    return $numero % 5 === 0 && $numero % 7 === 0;
}


// Ejercicio 2
function secuencia($i) {
    $matriz= [];
    $count = 0;
    while (true) {
        $num1 = rand(1, 999);
        $num2 = rand(1, 999);
        $num3 = rand(1, 999);
        $count++;
        if ($num1 % 2 != 0 && $num2 % 2 == 0 && $num3 % 2 != 0) {
            $matriz[] = [$num1, $num2, $num3];
            break;
        }
    }
    return ['matriz' => $matriz, 'i' => $count];
}

// Ejercicio 3
function random($multiple) {
    do {
        $random = rand(1, 999);
    } while ($random % $multiple !== 0);
    return $random;
}
?>

