<?php
// Iniciar sessão para utilizar o controle de erro e garantir que o código sempre esteja seguro
session_start();

// Inclui o arquivo de configuração do banco de dados
require_once 'db.php';

// Função para obter todos os produtos do banco de dados de maneira segura
function obterProdutos($conn) {
    $stmt = $conn->prepare("SELECT * FROM produtos");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Obter os produtos
$produtos = obterProdutos($conn);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Controle de Estoque</title>
    <style>
        /* Estilo básico da página */
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f9f9f9;
            color: #333;
        }

        h1 {
            color: #4CAF50;
            text-align: center;
        }

        a {
            text-decoration: none;
            color: white;
            background-color: #4CAF50;
            padding: 10px 20px;
            border-radius: 5px;
            display: inline-block;
            margin-bottom: 20px;
        }

        a:hover {
            background-color: #45a049;
        }

        /* Estilo da tabela */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        th, td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #eafaf1;
        }

        .status {
            font-weight: bold;
        }

        .status.red {
            color: red;
        }

        .status.orange {
            color: orange;
        }

        .status.green {
            color: green;
        }

        .actions a {
            color: #4CAF50;
            text-decoration: none;
            margin-right: 10px;
        }

        .actions a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <h1>Controle de Estoque</h1>
    <a href="cadastrar.php">Cadastrar Produto</a>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Validade</th>
                <th>Preço</th>
                <th>Quantidade</th>
                <th>Status</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($produtos as $produto): ?>
                <tr>
                    <td><?= htmlspecialchars($produto['id']) ?></td>
                    <td><?= htmlspecialchars($produto['nome']) ?></td>
                    <td><?= htmlspecialchars($produto['validade']) ?></td>
                    <td>€<?= number_format($produto['preco'], 2, ',', '.') ?></td>
                    <td><?= htmlspecialchars($produto['quantidade']) ?></td>
                    <td>
                        <?php
                        // Comparar validade do produto com a data de hoje
                        $hoje = date('Y-m-d');
                        $dataValidade = $produto['validade'];
                        $diferenca = (strtotime($dataValidade) - strtotime($hoje)) / (60 * 60 * 24);

                        if ($dataValidade < $hoje): ?>
                            <span class="status red">Vencido</span>
                        <?php elseif ((int)$diferenca === 15): ?>
                            <span class="status orange">Falta 15 dias</span>
                        <?php elseif ($diferenca < 15 && $diferenca > 0): ?>
                            <span class="status orange">Falta <?= (int)$diferenca ?> dias</span>
                        <?php else: ?>
                            <span class="status green">Dentro da validade</span>
                        <?php endif; ?>
                    </td>
                    <td class="actions">
                        <a href="editar.php?id=<?= htmlspecialchars($produto['id']) ?>">Editar</a>
                        <a href="deletar.php?id=<?= htmlspecialchars($produto['id']) ?>" onclick="return confirm('Tem certeza que deseja excluir?')">Deletar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
