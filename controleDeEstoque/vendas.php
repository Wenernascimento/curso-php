<?php
// Conexão com o banco de dados
$pdo = new PDO('mysql:host=localhost;dbname=estoque', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Consulta todas as vendas
$stmt = $pdo->query("SELECT v.*, p.nome AS produto_nome FROM vendas v JOIN produtos p ON v.id_produto = p.id ORDER BY v.data_venda DESC");
$vendas = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Histórico de Vendas</title>
</head>
<body>
    <h1>Histórico de Vendas</h1>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Produto</th>
                <th>Quantidade</th>
                <th>Total</th>
                <th>Data</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($vendas as $venda): ?>
                <tr>
                    <td><?= htmlspecialchars($venda['id']) ?></td>
                    <td><?= htmlspecialchars($venda['produto_nome']) ?></td>
                    <td><?= htmlspecialchars($venda['quantidade']) ?></td>
                    <td>€<?= number_format($venda['total'], 2, ',', '.') ?></td>
                    <td><?= htmlspecialchars($venda['data_venda']) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
