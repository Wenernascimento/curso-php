<?php
class Produto {
    private $conn;
    private $table_name = "produtos";

    public $id;
    public $nome;
    public $descricao;
    public $preco;

    public function __construct($db) {
        $this->conn = $db;
    }

    // Criar um novo produto
    public function criarProduto() {
        $query = "INSERT INTO " . $this->table_name . " (nome, descricao, preco) VALUES (:nome, :descricao, :preco)";

        $stmt = $this->conn->prepare($query);

        // Bind dos valores
        $stmt->bindParam(":nome", $this->nome);
        $stmt->bindParam(":descricao", $this->descricao);
        $stmt->bindParam(":preco", $this->preco);

        // Executar a query
        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

    // Ler as informações de um produto
    public function lerProduto() {
        $query = "SELECT * FROM " . $this->table_name . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $this->id);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row) {
            $this->nome = $row['nome'];
            $this->descricao = $row['descricao'];
            $this->preco = $row['preco'];
            return true;
        }

        return false;
    }

    // Atualizar as informações de um produto
    public function atualizarProduto() {
        $query = "UPDATE " . $this->table_name . " SET nome = :nome, descricao = :descricao, preco = :preco WHERE id = :id";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":nome", $this->nome);
        $stmt->bindParam(":descricao", $this->descricao);
        $stmt->bindParam(":preco", $this->preco);
        $stmt->bindParam(":id", $this->id);

        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

    // Deletar um produto
    public function deletarProduto() {
        $query = "DELETE FROM " . $this->table_name . " WHERE id = :id";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":id", $this->id);

        if ($stmt->execute()) {
            return true;
        }

        return false;
    }
}
?>
