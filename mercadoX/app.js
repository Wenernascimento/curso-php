// Armazenamento simples para os dados de estoque e vendas
let estoque = [];
let vendas = [];

// Função para atualizar a tabela de estoque
function atualizarTabelaEstoque() {
    const tabela = document.querySelector("#tabela-estoque tbody");
    tabela.innerHTML = ""; // Limpa a tabela

    estoque.forEach((produto, index) => {
        const row = document.createElement("tr");
        row.innerHTML = `
            <td>${produto.nome}</td>
            <td>R$ ${produto.preco.toFixed(2)}</td>
            <td>${produto.quantidade}</td>
            <td>${produto.validade}</td>
            <td>
                <button onclick="editarProduto(${index})">Editar</button>
                <button onclick="excluirProduto(${index})">Excluir</button>
            </td>
        `;
        tabela.appendChild(row);
    });

    // Atualiza o select de produtos para vendas
    const selectVenda = document.querySelector("#produto-venda");
    selectVenda.innerHTML = `<option value="">Escolha um produto</option>`;
    estoque.forEach((produto, index) => {
        const option = document.createElement("option");
        option.value = index;
        option.textContent = `${produto.nome} (Estoque: ${produto.quantidade})`;
        selectVenda.appendChild(option);
    });
}

// Função para adicionar um novo produto ao estoque
document.querySelector("#form-estoque").addEventListener("submit", function(event) {
    event.preventDefault();
    const nome = document.querySelector("#nome").value;
    const preco = parseFloat(document.querySelector("#preco").value);
    const quantidade = parseInt(document.querySelector("#quantidade").value);
    const validade = document.querySelector("#validade").value;

    const novoProduto = { nome, preco, quantidade, validade };
    estoque.push(novoProduto);
    atualizarTabelaEstoque();
    
    // Limpa o formulário
    event.target.reset();
});

// Função para editar um produto
function editarProduto(index) {
    const produto = estoque[index];
    document.querySelector("#nome").value = produto.nome;
    document.querySelector("#preco").value = produto.preco;
    document.querySelector("#quantidade").value = produto.quantidade;
    document.querySelector("#validade").value = produto.validade;

    // Remove o produto antigo
    excluirProduto(index);
}

// Função para excluir um produto
function excluirProduto(index) {
    estoque.splice(index, 1);
    atualizarTabelaEstoque();
}

// Função para registrar uma venda
document.querySelector("#form-venda").addEventListener("submit", function(event) {
    event.preventDefault();
    const produtoIndex = parseInt(document.querySelector("#produto-venda").value);
    const quantidadeVenda = parseInt(document.querySelector("#quantidade-venda").value);
    
    if (produtoIndex !== -1 && estoque[produtoIndex].quantidade >= quantidadeVenda) {
        const produto = estoque[produtoIndex];
        const total = produto.preco * quantidadeVenda;

        // Atualiza o estoque
        produto.quantidade -= quantidadeVenda;

        // Registra a venda
        vendas.push({ produto: produto.nome, quantidade: quantidadeVenda, total, data: new Date().toLocaleString() });

        // Atualiza as tabelas
        atualizarTabelaEstoque();
        atualizarTabelaVendas();
        
        // Limpa o formulário de venda
        event.target.reset();
    } else {
        alert("Quantidade insuficiente em estoque");
    }
});

// Função para atualizar a tabela de vendas
function atualizarTabelaVendas() {
    const tabela = document.querySelector("#tabela-vendas tbody");
    tabela.innerHTML = ""; // Limpa a tabela

    vendas.forEach(venda => {
        const row = document.createElement("tr");
        row.innerHTML = `
            <td>${venda.produto}</td>
            <td>${venda.quantidade}</td>
            <td>R$ ${venda.total.toFixed(2)}</td>
            <td>${venda.data}</td>
        `;
        tabela.appendChild(row);
    });
}
