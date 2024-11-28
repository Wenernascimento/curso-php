<?php
class Database {
    private $host = "localhost"; // Ou o host do seu servidor
    private $db_name = "clientes"; // Nome do banco de dados
    private $username = "root"; // Usuário do banco de dados
    private $password = ""; // Senha do banco de dados
    public $conn;

    // Método para conectar ao banco de dados
    public function getConnection() {
        $this->conn = null;

        try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $exception) {
            echo "Erro ao conectar ao banco de dados: " . $exception->getMessage();
        }

        return $this->conn;
    }
}
?>
