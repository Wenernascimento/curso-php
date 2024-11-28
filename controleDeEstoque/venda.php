<?php
// Conexão com o banco de dados
$pdo = new PDO('mysql:host=localhost;dbname=estoque', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Verifica se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $idProduto = $_POST['produto_id'];
    $quantidade = $_POST['quantidade'];
    
    // Consulta o produto para pegar o preço
    $stmt = $pdo->prepare("SELECT * FROM produtos WHERE id = :id");
    $stmt->bindParam(':id', $idProduto, PDO::PARAM_INT);
    $stmt->execute();
    $produto = $stmt->fetch(PDO::FETCH_ASSOC);
    
    // Verifica se o produto existe e se há estoque suficiente
    if ($produto && $produto['quantidade'] >= $quantidade) {
        // Calcula o total da venda
        $total = $produto['preco'] * $quantidade;
        
        // Registra a venda
        $stmt = $pdo->prepare("INSERT INTO vendas (id_produto, quantidade, total) VALUES (:id_produto, :quantidade, :total)");
        $stmt->bindParam(':id_produto', $idProduto, PDO::PARAM_INT);
        $stmt->bindParam(':quantidade', $quantidade, PDO::PARAM_INT);
        $stmt->bindParam(':total', $total, PDO::PARAM_STR);
        $stmt->execute();
        
        // Atualiza o estoque
        $novoEstoque = $produto['quantidade'] - $quantidade;
        $stmt = $pdo->prepare("UPDATE produtos SET quantidade = :quantidade WHERE id = :id");
        $stmt->bindParam(':quantidade', $novoEstoque, PDO::PARAM_INT);
        $stmt->bindParam(':id', $idProduto, PDO::PARAM_INT);
        $stmt->execute();
        
        echo "Venda registrada com sucesso!";
    } else {
        echo "Erro: Produto não encontrado ou estoque insuficiente.";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Venda</title>
</head>
<body>
    <h1>Registrar Venda</h1>
    <form method="POST">
        <label for="produto_id">Produto:</label>
        <select name="produto_id" required>
            <option value="">Selecione um produto</option>
            <?php
            // Busca todos os produtos para exibir no formulário
            $stmt = $pdo->query("SELECT * FROM produtos");
            while ($produto = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo "<option value='{$produto['id']}'>{$produto['nome']}</option>";
            }
            ?>
        </select><br><br>

        <label for="quantidade">Quantidade:</label>
        <input type="number" name="quantidade" min="1" required><br><br>

        <button type="submit">Registrar Venda</button>
    </form>
</body>
</html>
