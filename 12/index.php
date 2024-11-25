<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora Simples</title>
    <style>
        body {
            background-color: blue;
            font-family: Arial, sans-serif;
        }

        h1 {
            color: black;
            text-align: center;
            background-color: #ADFF2F;
            padding: 20px;
            margin: 0;
        }

        .container {
            text-align: center;
            margin-top: 30px;
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
            color: yellow;
            padding: 10px 20px;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin: 15px;
        }

        button:hover {
            background-color: #45a049;
        }

        .result {
            font-size: 24px;
            font-weight: bold;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <h1>Calculadora Simples</h1>
    <div class="container">
        <input type="number" id="num1" placeholder="Primeiro número" required>
        <input type="number" id="num2" placeholder="Segundo número" required>
        <br>
        <button onclick="calcular('+')">Somar</button>
        <button onclick="calcular('-')">Subtrair</button>
        <button onclick="calcular('*')">Multiplicar</button>
        <button onclick="calcular('/')">Dividir</button>

        <div class="result" id="resultado"></div>
    </div>

    <script>
        function calcular(operacao) {
            const num1 = parseFloat(document.getElementById("num1").value);
            const num2 = parseFloat(document.getElementById("num2").value);
            const resultado = document.getElementById("resultado");

            if (isNaN(num1) || isNaN(num2)) {
                resultado.textContent = "Por favor, insira números válidos!";
                resultado.style.color = "red";
                return;
            }

            let resultadoCalculado;

            switch(operacao) {
                case '+':
                    resultadoCalculado = num1 + num2;
                    break;
                case '-':
                    resultadoCalculado = num1 - num2;
                    break;
                case '*':
                    resultadoCalculado = num1 * num2;
                    break;
                case '/':
                    if (num2 === 0) {
                        resultado.textContent = "Não é possível dividir por zero!";
                        resultado.style.color = "red";
                        return;
                    }
                    resultadoCalculado = num1 / num2;
                    break;
                default:
                    resultado.textContent = "Operação inválida!";
                    resultado.style.color = "red";
                    return;
            }

            resultado.textContent = "Resultado: " + resultadoCalculado;
            resultado.style.color = "red";
        }
    </script>
</body>
</html>
