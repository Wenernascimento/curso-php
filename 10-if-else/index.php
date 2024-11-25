<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Descobrindo PAR ou ÍMPAR!</title>
    <style>
        /* Reset básico */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Estilos gerais */
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
            color: #333;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            padding: 20px;
        }

        h1 {
            color: #ffcc00;
            text-align: center;
            background-color: #333;
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 30px;
            width: 100%;
            max-width: 600px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
            text-align: center;
        }

        label {
            font-size: 1.2rem;
            color: #555;
            margin-bottom: 10px;
            display: block;
        }

        input[type="number"] {
            width: calc(100% - 20px);
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 1rem;
        }

        button {
            background-color: #4caf50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1rem;
        }

        button:hover {
            background-color: #45a049;
        }

        .resultado {
            margin-top: 20px;
            font-size: 1.5rem;
            color: #555;
        }

        .par {
            color: #4caf50;
        }

        .impar {
            color: #e74c3c;
        }

        hr {
            margin: 20px 0;
            border: none;
            border-top: 1px solid #ddd;
            width: 80%;
        }
    </style>
</head>
<body>
    <h1>Descobrindo se um número é PAR ou ÍMPAR!</h1>

    <form method="POST">
        <label for="numero">Digite um número:</label>
        <input type="number" id="numero" name="numero" min="0" max="1000" required>
        <button type="submit">Verificar</button>
    </form>

    <hr>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $numero = intval($_POST['numero']);
        if ($numero % 2 === 0) {
            echo "<p class='resultado par'>O número <strong>$numero</strong> é <strong>PAR!</strong></p>";
        } else {
            echo "<p class='resultado impar'>O número <strong>$numero</strong> é <strong>ÍMPAR!</strong></p>";
        }
    }
    ?>
</body>
</html>