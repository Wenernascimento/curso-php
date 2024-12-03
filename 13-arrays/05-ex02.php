<?php
// Cadastro de clientes
$clientes = [
    ["id" => 1, "nome" => "Carlos Silva", "email" => "carlos@example.com", "telefone" => "(11) 99999-1234"],
    ["id" => 2, "nome" => "Maria Oliveira", "email" => "maria@example.com", "telefone" => "(11) 99999-2345"],
    ["id" => 3, "nome" => "José Pereira", "email" => "jose@example.com", "telefone" => "(11) 99999-3456"],
    ["id" => 4, "nome" => "Ana Souza", "email" => "ana@example.com", "telefone" => "(11) 99999-4567"],
    ["id" => 5, "nome" => "Lucas Santos", "email" => "lucas@example.com", "telefone" => "(11) 99999-5678"],
    ["id" => 6, "nome" => "Fernanda Costa", "email" => "fernanda@example.com", "telefone" => "(11) 99999-6789"],
    ["id" => 7, "nome" => "Paulo Lima", "email" => "paulo@example.com", "telefone" => "(11) 99999-7890"],
    ["id" => 8, "nome" => "Juliana Almeida", "email" => "juliana@example.com", "telefone" => "(11) 99999-8901"],
    ["id" => 9, "nome" => "Rafael Mendes", "email" => "rafael@example.com", "telefone" => "(11) 99999-9012"],
    ["id" => 10, "nome" => "Carla Oliveira", "email" => "carla@example.com", "telefone" => "(11) 99999-0123"]
];

// Cadastro de funcionários
$funcionarios = [
    ["id" => 1, "nome" => "Roberto Silva", "cargo" => "Gerente", "salario" => 5000],
    ["id" => 2, "nome" => "Gabriela Costa", "cargo" => "Analista", "salario" => 3500],
    ["id" => 3, "nome" => "Felipe Martins", "cargo" => "Desenvolvedor", "salario" => 4000],
    ["id" => 4, "nome" => "Luciana Pereira", "cargo" => "Assistente", "salario" => 2500],
    ["id" => 5, "nome" => "Marcelo Lima", "cargo" => "Coordenador", "salario" => 4500],
    ["id" => 6, "nome" => "Simone Almeida", "cargo" => "Supervisor", "salario" => 4300],
    ["id" => 7, "nome" => "Tais Rocha", "cargo" => "Auxiliar", "salario" => 2200],
    ["id" => 8, "nome" => "Carlos Barbosa", "cargo" => "Consultor", "salario" => 4800],
    ["id" => 9, "nome" => "Roberta Silva", "cargo" => "Gerente", "salario" => 5100],
    ["id" => 10, "nome" => "Eduardo Souza", "cargo" => "Diretor", "salario" => 7000]
];

// Cadastro de vendedores
$vendedores = [
    ["id" => 1, "nome" => "Fernando Costa", "meta" => 100000, "vendas" => 120000],
    ["id" => 2, "nome" => "Cláudia Lima", "meta" => 80000, "vendas" => 95000],
    ["id" => 3, "nome" => "Renato Souza", "meta" => 70000, "vendas" => 60000],
    ["id" => 4, "nome" => "Paula Martins", "meta" => 50000, "vendas" => 45000],
    ["id" => 5, "nome" => "Ricardo Almeida", "meta" => 90000, "vendas" => 110000],
    ["id" => 6, "nome" => "Verônica Pereira", "meta" => 110000, "vendas" => 115000],
    ["id" => 7, "nome" => "Marcelo Oliveira", "meta" => 85000, "vendas" => 80000],
    ["id" => 8, "nome" => "Luciana Barbosa", "meta" => 95000, "vendas" => 100000],
    ["id" => 9, "nome" => "Júlia Souza", "meta" => 120000, "vendas" => 130000],
    ["id" => 10, "nome" => "Thiago Lima", "meta" => 105000, "vendas" => 90000]
];

// Cadastro de sócios
$socios = [
    ["id" => 1, "nome" => "Roberto Santos", "participacao" => 25],
    ["id" => 2, "nome" => "Fernanda Oliveira", "participacao" => 20],
    ["id" => 3, "nome" => "Carla Costa", "participacao" => 30],
    ["id" => 4, "nome" => "Thiago Souza", "participacao" => 15],
    ["id" => 5, "nome" => "Eduardo Lima", "participacao" => 10],
    ["id" => 6, "nome" => "Marcos Rocha", "participacao" => 5],
    ["id" => 7, "nome" => "Luciana Almeida", "participacao" => 7],
    ["id" => 8, "nome" => "Carlos Pereira", "participacao" => 12],
    ["id" => 9, "nome" => "Paula Silva", "participacao" => 18],
    ["id" => 10, "nome" => "Jorge Lima", "participacao" => 23]
];

// Cadastro de patrocinadores
$patrocinadores = [
    ["id" => 1, "nome" => "Patrocinador A", "valor" => 50000],
    ["id" => 2, "nome" => "Patrocinador B", "valor" => 40000],
    ["id" => 3, "nome" => "Patrocinador C", "valor" => 30000],
    ["id" => 4, "nome" => "Patrocinador D", "valor" => 60000],
    ["id" => 5, "nome" => "Patrocinador E", "valor" => 70000],
    ["id" => 6, "nome" => "Patrocinador F", "valor" => 80000],
    ["id" => 7, "nome" => "Patrocinador G", "valor" => 75000],
    ["id" => 8, "nome" => "Patrocinador H", "valor" => 50000],
    ["id" => 9, "nome" => "Patrocinador I", "valor" => 45000],
    ["id" => 10, "nome" => "Patrocinador J", "valor" => 55000]
];

// Função para exibir os dados com fundo degradê
function exibirTabela($titulo, $dados, $colunas, $corGradiente) {
    echo "<h3 style='color: #000; font-size: 24px;'>$titulo</h3>"; // Título maior
    echo "<table border='1' style='border-collapse: collapse; width: 100%; background: $corGradiente;'>";
    echo "<thead><tr>";

    foreach ($colunas as $coluna) {
        echo "<th style='padding: 10px; color: black; font-size: 18px;'>$coluna</th>"; // Cabeçalho com texto preto e tamanho maior
    }
    
    echo "</tr></thead><tbody>";
    
    foreach ($dados as $registro) {
        echo "<tr>";
        foreach ($registro as $valor) {
            echo "<td style='padding: 10px; color: white; font-size: 25px;'>$valor</td>"; // Texto das células maior
        }
        echo "</tr>";
    }

    echo "</tbody></table><br>";
}

// Exibindo os dados com fundo degradê
exibirTabela("Cadastro de Clientes", $clientes, ["ID", "Nome", "Email", "Telefone"], "linear-gradient(to right, #4CAF50, #81C784)");
exibirTabela("Cadastro de Funcionários", $funcionarios, ["ID", "Nome", "Cargo", "Salário"], "linear-gradient(to right, #2196F3, #64B5F6)");
exibirTabela("Cadastro de Vendedores", $vendedores, ["ID", "Nome", "Meta", "Vendas"], "linear-gradient(to right, #FF9800, #FFB74D)");
exibirTabela("Cadastro de Sócios", $socios, ["ID", "Nome", "Participação"], "linear-gradient(to right, #9C27B0, #BA68C8)");
exibirTabela("Cadastro de Patrocinadores", $patrocinadores, ["ID", "Nome", "Valor"], "linear-gradient(to right, #FFC107, #FFEB3B)");

?>
