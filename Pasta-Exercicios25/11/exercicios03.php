<?php
// 1. Solicitar ao usuário um número inteiro positivo
echo "Digite um número inteiro positivo: ";
$numero = 5;

// Verificar se o número é positivo
if ($numero <= 0) {
    echo "Por favor, insira um número positivo.\n";
} else {
    // 2. Usar o laço do-while para percorrer os números de 1 até o número fornecido
    $i = 1;
    $soma = 0;

    do {
        // 3. Somar apenas os números pares
        if ($i % 2 == 0) {
            $soma += $i;
        }
        $i++;
    } while ($i <= $numero);

    // 4. Exibir o resultado da soma
    echo "A soma dos números pares de 1 até $numero é: $soma\n";
}
?>
