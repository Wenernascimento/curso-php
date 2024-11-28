<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora de PA e PG</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #4CAF50;
            color: white;
            padding: 15px 0;
            text-align: center;
        }

        h1 {
            margin: 0;
        }

        .container {
            width: 80%;
            max-width: 600px;
            margin: 30px auto;
            padding: 20px;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            font-size: 1.1rem;
            margin-bottom: 8px;
        }

        input[type="number"] {
            padding: 10px;
            font-size: 1rem;
            border: 1px solid #ccc;
            border-radius: 4px;
            margin-bottom: 15px;
            width: 100%;
        }

        button {
            padding: 12px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            font-size: 1rem;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #45a049;
        }

        h2 {
            color: #4CAF50;
            font-size: 1.5rem;
        }

        .result {
            background-color: #f9f9f9;
            padding: 15px;
            border-radius: 4px;
            border: 1px solid #ddd;
            font-size: 1.1rem;
            margin-bottom: 20px;
        }

        .result strong {
            font-weight: bold;
            color: #333;
        }
    </style>
</head>
<body>

    <header>
        <h1>Calculadora de Progressões Aritmética e Geométrica</h1>
    </header>

    <div class="container">
        <form method="POST">
            <label for="primeiroTermo">Primeiro termo:</label>
            <input type="number" name="primeiroTermo" id="primeiroTermo" required>

            <label for="razao">Razão:</label>
            <input type="number" name="razao" id="razao" required>

            <label for="numTermos">Número de termos:</label>
            <input type="number" name="numTermos" id="numTermos" min="1" required>

            <button type="submit">Calcular</button>
        </form>

        <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Obtém os valores do formulário
            $primeiroTermo = (int)$_POST['primeiroTermo'];
            $razao = (int)$_POST['razao'];
            $numTermos = (int)$_POST['numTermos'];

            // Função para calcular PA
            function calcularPA($primeiroTermo, $razao, $numTermos) {
                $pa = [];
                for ($i = 0; $i < $numTermos; $i++) {
                    $pa[] = $primeiroTermo + ($i * $razao); // Fórmula da PA
                }
                return $pa;
            }

            // Função para calcular PG
            function calcularPG($primeiroTermo, $razao, $numTermos) {
                $pg = [];
                for ($i = 0; $i < $numTermos; $i++) {
                    $pg[] = $primeiroTermo * pow($razao, $i); // Fórmula da PG
                }
                return $pg;
            }

            // Calcula PA e PG
            $pa = calcularPA($primeiroTermo, $razao, $numTermos);
            $pg = calcularPG($primeiroTermo, $razao, $numTermos);

            // Exibe os resultados
            echo "<div class='result'>";
            echo "<h2>Resultados:</h2>";
            echo "<p><strong>Progressão Aritmética (PA):</strong> " . implode(", ", $pa) . "</p>";
            echo "<p><strong>Progressão Geométrica (PG):</strong> " . implode(", ", $pg) . "</p>";
            echo "</div>";
        }
        ?>
    </div>

</body>
</html>
