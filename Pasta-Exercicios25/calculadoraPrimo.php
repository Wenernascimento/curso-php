<?php
// Função para verificar se o número é primo
function ehPrimo($numero) {
    if ($numero < 2) {
        return false;
    }

    // Verifica se o número é divisível por qualquer número entre 2 e a raiz quadrada do número
    for ($i = 2; $i <= sqrt($numero); $i++) {
        if ($numero % $i == 0) {
            return false; // Não é primo
        }
    }
    return true; // É primo
}

// Verifica se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Pega os números fornecidos pelo usuário
    $entrada = $_POST['numeros'];
    
    // Converte a string em um array de números
    $numeros = explode(" ", $entrada);
    
    // Verifica se cada número é primo
    foreach ($numeros as $numero) {
        $numero = (int)$numero; // Convertendo para inteiro
        if (ehPrimo($numero)) {
            echo "$numero é primo.<br>";
        } else {
            echo "$numero não é primo.<br>";
        }
    }
} else {
    // Formulário HTML para o usuário inserir números
    echo '<form method="post">
            Digite uma lista de números separados por espaço: <input type="text" name="numeros" required>
            <input type="submit" value="Verificar">
          </form>';
}
?>
