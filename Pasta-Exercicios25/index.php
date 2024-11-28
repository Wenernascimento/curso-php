<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Aprovação/Reprovação</title>
    <style>
        body {
            background-color: lightblue;
            font-family: Arial, sans-serif;
        }

        h1 {
            color: black;
            text-align: center;
            background-color: #4CAF50;
            padding: 20px;
            margin: 0;
        }

        .container {
            text-align: center;
            margin-top: 30px;
        }

        .result {
            font-size: 24px;
            font-weight: bold;
            margin-top: 20px;
        }

        input {
            padding: 10px;
            font-size: 16px;
            width: 50%;
            margin: 10px;
            border-radius: 5px;
            border: 2px solid #4CAF50;
        }

        button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <h1>Sistema de Aprovação/Reprovação</h1>
    <div class="container">
        <p>Digite a nota do aluno:</p>
        <input type="number" id="nota" placeholder="Informe a nota do aluno" required>
        <button onclick="verificarAprovacao()">Verificar</button>

        <div class="result" id="resultado"></div>
    </div>

    <script>
        function verificarAprovacao() {
            const nota = parseFloat(document.getElementById("nota").value);
            const resultado = document.getElementById("resultado");

            if (isNaN(nota) || nota < 0 || nota > 10) {
                resultado.textContent = "Por favor, insira uma nota válida entre 0 e 10!";
                resultado.style.color = "red";
            } else {
                if (nota >= 7) {
                    resultado.textContent = "Parabéns! Você foi aprovado!";
                    resultado.style.color = "green";
                } else {
                    resultado.textContent = "Infelizmente, você foi reprovado.";
                    resultado.style.color = "red";
                }
            }
        }
    </script>
</body>
</html>
