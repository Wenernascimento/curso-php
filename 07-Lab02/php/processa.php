<?php
// 1. Receber o salário inicial do trabalhador
$salario_inicial = 2000;  // Exemplo de salário inicial

// 2. Aumento de 10%
$salario_com_aumento = $salario_inicial * 1.10;

// 3. Desconto de 15%
$salario_com_desconto = $salario_com_aumento * 0.85;

// 4. Aumento de 40%
$salario_final = $salario_com_desconto * 1.40;

// 5. Exibir o valor final do salário
echo "Salário inicial: R$ " . number_format($salario_inicial, 2, ',', '.') . "<br>";
echo "Salário após aumento de 10%: R$ " . number_format($salario_com_aumento, 2, ',', '.') . "<br>";
echo "Salário após desconto de 15%: R$ " . number_format($salario_com_desconto, 2, ',', '.') . "<br>";
echo "Salário final após aumento de 40%: R$ " . number_format($salario_final, 2, ',', '.');


?>
