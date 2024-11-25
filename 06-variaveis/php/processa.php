<?php
// Usando variável do tipo Boolean(verdadeiro ou falso):
$logado = true;

if ($logado) {
    echo "Bem vindo ao Painel de controle";
}else{
    echo "Você não está logado. Faça o Login!";
}
//===========================
echo "<hr>";
// Ponto Flutuante:
$altura = 1.84;
echo "altura: $altura m"; // Saída: altura 1.85m

//===========================
echo "<hr>";
// Integer
$idade = 17.5;
echo "Idade: $idade";

//===========================
echo "<hr>";
// Array:
$filhos =[ "JoãO", "Maria","Pedro", "Ana"];
echo $filhos[1];

//===========================
echo "<hr>";
// Objeto
class Pessoa{
    public $nome;
    public $idades;

    public function __construct($nome, $idade){
        $this ->nome = $nome;
        $this -> idade =$idade;

    }

public function apresentar(){
    return "Olá, meu nome é $this->nome e tenho $this->idade anos.";
    
}
}
$pessoa = new Pessoa("Wener" ,39);
echo $pessoa->apresentar();


?>