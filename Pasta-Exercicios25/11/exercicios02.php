<?php
// Loop infinito
while (true) {
    // Solicita ao usuário para inserir os dois números
    echo "Digite o primeiro número: ";
    $num1 = 1; // Lê o primeiro número

    echo "Digite o segundo número: ";
    $num2 = 2  ; // Lê o segundo número

    // Solicita ao usuário para escolher a operação
    echo "Escolha a operação (soma, subtração, multiplicação, divisão) ou digite 'sair' para encerrar: ";
    $operacao = 1; // Lê a operação escolhida

    // Verifica se o usuário quer sair
    if ($operacao == 'sair') {
        echo "Saindo da calculadora... Até logo!\n";
        break; // Encerra o loop se o usuário digitar 'sair'
    }

    // Verifica qual operação foi escolhida e realiza o cálculo
    if ($operacao == 'soma') {
        $resultado = $num1 + $num2;
        echo "Resultado: $num1 + $num2 = $resultado\n";
    } elseif ($operacao == 'subtração') {
        $resultado = $num1 - $num2;
        echo "Resultado: $num1 - $num2 = $resultado\n";
    } elseif ($operacao == 'multiplicação') {
        $resultado = $num1 * $num2;
        echo "Resultado: $num1 * $num2 = $resultado\n";
    } elseif ($operacao == 'divisão') {
        if ($num2 == 0) {
            echo "Erro: Divisão por zero não permitida.\n";
        } else {
            $resultado = $num1 / $num2;
            echo "Resultado: $num1 / $num2 = $resultado\n";
        }
    } else {
        echo "Operação inválida! Tente novamente.\n";
    }
}
?>
