<?php
// Função para verificar se é um palíndromo
function ehPalindromo($texto) {
    // Remove espaços, pontuação e converte para minúsculas
    $texto = strtolower(preg_replace("/[^a-z0-9]/", "", $texto));
    
    // Inverte o texto
    $textoInvertido = strrev($texto);
    
    // Verifica se o texto original (sem espaços e pontuação) é igual ao texto invertido
    return $texto === $textoInvertido;
}

// Verifica se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Pega o texto fornecido pelo usuário
    $texto = $_POST['texto'];

    // Chama a função e verifica se é um palíndromo
    if (ehPalindromo($texto)) {
        echo "A frase ou palavra '$texto' é um palíndromo.";
    } else {
        echo "A frase ou palavra '$texto' não é um palíndromo.";
    }
} else {
    // Formulário HTML para o usuário inserir o texto
    echo '<form method="post">
            Digite uma palavra ou frase: <input type="text" name="texto" required>
            <input type="submit" value="Verificar Palíndromo">
          </form>';
}
?>
