<?php
// Função para contar palavras únicas
function contarPalavrasUnicas($texto) {
    // Converte o texto para minúsculas para ignorar maiúsculas e minúsculas
    $texto = strtolower($texto);
    
    // Remove pontuação e caracteres especiais
    $texto = preg_replace('/[^\w\s]/', '', $texto);
    
    // Divide o texto em um array de palavras
    $palavras = explode(" ", $texto);
    
    // Remove palavras vazias
    $palavras = array_filter($palavras, function($palavra) {
        return !empty($palavra);
    });

    // Cria um array associativo para contar palavras únicas
    $palavrasUnicas = array_count_values($palavras);

    // Retorna o número de palavras únicas
    return count($palavrasUnicas);
}

// Verifica se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Pega o texto fornecido pelo usuário
    $texto = $_POST['texto'];
    
    // Chama a função e exibe o número de palavras únicas
    $resultado = contarPalavrasUnicas($texto);
    echo "Número de palavras únicas: $resultado";
} else {
    // Formulário HTML para o usuário inserir o texto
    echo '<form method="post">
            Digite uma frase: <input type="text" name="texto" required>
            <input type="submit" value="Contar Palavras Únicas">
          </form>';
}
?>
