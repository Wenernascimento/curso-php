<?php
include 'config.php';

$result = $conn->query("SELECT * FROM clientes");
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clientes da Padaria</title>
    <style>
        /* Resetando algumas propriedades básicas para um design mais limpo */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f9;
            color: #333;
            line-height: 1.6;
            padding: 20px;
        }

        .container {
            max-width: 1100px;
            margin: 0 auto;
            background-color: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        }

        header {
            text-align: center;
            margin-bottom: 20px;
        }

        h1 {
            font-size: 2em;
            color: #333;
            margin-bottom: 10px;
        }

        a {
            text-decoration: none;
            color: #fff;
        }

        a:hover {
            color: #f39c12;
        }

        .btn {
            display: inline-block;
            background-color: #3498db;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            font-weight: bold;
            text-align: center;
            transition: background-color 0.3s;
        }

        .btn:hover {
            background-color: #2980b9;
        }

        .btn-add {
            background-color: #2ecc71;
            margin-top: 20px;
        }

        .btn-add:hover {
            background-color: #27ae60;
        }

        .client-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .client-table th, .client-table td {
            padding: 12px 20px;
            text-align: left;
            border: 1px solid #ddd;
        }

        .client-table th {
            background-color: #3498db;
            color: #fff;
        }

        .client-table td {
            background-color: #f9f9f9;
        }

        .client-table tr:hover {
            background-color: #f1f1f1;
        }

        .client-table .btn {
            padding: 5px 10px;
            margin-right: 5px;
        }

        .client-table .btn-edit {
            background-color: #f39c12;
        }

        .client-table .btn-edit:hover {
            background-color: #e67e22;
        }

        .client-table .btn-delete {
            background-color: #e74c3c;
        }

        .client-table .btn-delete:hover {
            background-color: #c0392b;
        }
    </style>
</head>
<body>
    <div class="container">
        <header>
            <h1>❤️ Lista de Clientes Mercearia Rapadura 👌</h1>
            <a href="add.php" class="btn btn-add">Adicionar Novo Cliente</a>
        </header>
        
        <table class="client-table">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Sexo</th>
                    <th>Bairro</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?= htmlspecialchars($row['nome']); ?></td>
                        <td><?= htmlspecialchars($row['email']); ?></td>
                        <td><?= htmlspecialchars($row['sexo']); ?></td>
                        <td><?= htmlspecialchars($row['bairro']); ?></td>
                        <td>
                            <a href="edit.php?id=<?= $row['id']; ?>" class="btn btn-edit">Editar</a> |
                            <a href="delete.php?id=<?= $row['id']; ?>" class="btn btn-delete" onclick="return confirm('Tem certeza?')">Deletar</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
