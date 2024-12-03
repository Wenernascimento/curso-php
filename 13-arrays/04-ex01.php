<?php
$cities = [
    "São paulo", "Rio de Janeiro", "Belo Horizonte","Brasilia","Curitiba",
    "Salvador","Fortaleza","Porto Alegre","Manaus","Recife","Belém","Florianópolis","Goiânia","Campo Gramde","Natal",
    "João Pessoa","Maceió", "Aracaju","Vitória","Cuibá"
];

// percorrendo o array e exibindo o ídice e o valor de cada elemento
foreach ($cities as $index => $city){
    if(strpos($city, "V") === 0){

    
    echo "Índice $index: $city <br>";
    }
}