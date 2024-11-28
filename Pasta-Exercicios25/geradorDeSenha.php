<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerador de Senha Forte</title>
    <style>
        /* Reset de estilo */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Estilo geral da página */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #3a7bd5, #6a1b9a); /* Gradiente de azul para roxo */
            color: #333;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            padding: 20px;
            background-size: cover;
            background-attachment: fixed; /* Mantém o fundo fixo */
        }

        /* Título principal */
        h1 {
            font-size: 2rem;
            color: white;
            text-align: center;
            margin-bottom: 20px;
        }

        /* Formulário de entrada */
        form {
            background: rgba(255, 255, 255, 0.9); /* Fundo semitransparente para o formulário */
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 420px;
        }

        label {
            font-size: 1.2rem;
            margin-bottom: 10px;
            color: #555;
            display: block;
        }

        input[type="number"] {
            width: 100%;
            padding: 12px;
            font-size: 1rem;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-bottom: 15px;
            transition: border 0.3s ease;
        }

        input[type="number"]:focus {
            border-color: #4CAF50;
            outline: none;
        }

        input[type="submit"] {
            width: 100%;
            padding: 12px;
            font-size: 1.1rem;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        /* Área da senha gerada */
        .senha-gerada {
            margin-top: 30px;
            padding: 15px;
            background: #f9f9f9;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 1.4rem;
            font-weight: bold;
            color: #333;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .copiar-btn {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1.1rem;
            transition: background-color 0.3s ease;
        }

        .copiar-btn:hover {
            background-color: #45a049;
        }

        .copiar-btn:focus {
            outline: none;
        }

        /* Animação de cópia bem-sucedida */
        .copiado {
            display: none;
            color: #4CAF50;
            font-size: 1.1rem;
            margin-top: 10px;
            text-align: center;
            animation: fadeIn 1s ease;
        }

        @keyframes fadeIn {
            0% { opacity: 0; }
            100% { opacity: 1; }
        }

        .erro {
            color: red;
            text-align: center;
            margin-top: 10px;
        }

        /* Responsividade para dispositivos móveis */
        @media (max-width: 480px) {
            form {
                padding: 20px;
            }

            h1 {
                font-size: 1.8rem;
            }

            .senha-gerada {
                font-size: 1.2rem;
            }

            input[type="submit"] {
                font-size: 1rem;
            }
        }
    </style>
</head>
<body>

    <div>
        <h1>Gerador de Senha Forte</h1>
        
        <!-- Formulário para o usuário inserir o comprimento da senha -->
        <form method="POST">
            <label for="comprimento">Comprimento da Senha (mínimo 6 caracteres):</label>
            <input type="number" id="comprimento" name="comprimento" min="6" required>
            <input type="submit" value="Gerar Senha">
        </form>

        <?php
        // Função para gerar a senha forte
        function gerarSenhaForte($comprimento) {
            // Definir os caracteres permitidos
            $minusculas = 'abcdefghijklmnopqrstuvwxyz';
            $maiusculas = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $numeros = '0123456789';
            $caracteresEspeciais = '!@#$%^&*()-_=+[]{}|;:,.<>?';
            
            // Concatenar todos os caracteres permitidos em uma única string
            $todosCaracteres = $minusculas . $maiusculas . $numeros . $caracteresEspeciais;
            
            // Iniciar a variável para a senha
            $senha = '';
            
            // Garantir que a senha contenha pelo menos um de cada tipo de caractere
            $senha .= $minusculas[rand(0, strlen($minusculas) - 1)];
            $senha .= $maiusculas[rand(0, strlen($maiusculas) - 1)];
            $senha .= $numeros[rand(0, strlen($numeros) - 1)];
            $senha .= $caracteresEspeciais[rand(0, strlen($caracteresEspeciais) - 1)];

            // Completar o restante da senha com caracteres aleatórios
            for ($i = strlen($senha); $i < $comprimento; $i++) {
                $senha .= $todosCaracteres[rand(0, strlen($todosCaracteres) - 1)];
            }
            
            // Embaralhar a senha para garantir aleatoriedade
            return str_shuffle($senha);
        }

        // Verifica se o formulário foi enviado
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $comprimento = $_POST['comprimento'];
            
            // Garante que a senha tenha pelo menos 6 caracteres
            if ($comprimento >= 6) {
                $senhaGerada = gerarSenhaForte($comprimento);
                echo "<div class='senha-gerada' id='senhaGerada'>
                        <span>" . $senhaGerada . "</span>
                        <button class='copiar-btn' onclick='copiarSenha()'>Copiar</button>
                      </div>";
                echo "<div id='copiado' class='copiado'>Senha copiada com sucesso!</div>";
            } else {
                echo "<p class='erro'>A senha precisa ter pelo menos 6 caracteres.</p>";
            }
        }
        ?>

        <script>
            // Função para copiar a senha para a área de transferência
            function copiarSenha() {
                // Seleciona a senha gerada
                var senha = document.querySelector('.senha-gerada span').textContent;
                
                // Cria um campo de input temporário para copiar a senha
                var input = document.createElement("input");
                input.setAttribute("value", senha);
                document.body.appendChild(input);
                
                // Seleciona o conteúdo do campo de input
                input.select();
                document.execCommand("copy");
                
                // Remove o campo de input temporário
                document.body.removeChild(input);
                
                // Exibe a mensagem de confirmação
                document.getElementById('copiado').style.display = 'block';
                
                // Esconde a mensagem após 2 segundos
                setTimeout(function() {
                    document.getElementById('copiado').style.display = 'none';
                }, 2000);
            }
        </script>

    </div>

</body>
</html>
