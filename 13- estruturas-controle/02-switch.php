<?php
$dia = "terca";

switch ($dia) {
    case "segunda":
        echo "Hoje é o primeiro dia útil da semana.";
        break;
    case "terca":
            echo "Hoje é o segundo dia útil da semana.";
            break;
    case "quarta":
                echo "Hoje é o segundo dia útil da semana.";
                break;
    case "quinta":
                    echo "Hoje é o segundo dia útil da semana.";
                    break;
    case "sexta":
         echo "Hoje é o segundo dia útil da semana.";
          break;
              
    case "sábado":
    case "domingo":
        echo "É fim de semana!";
        break;
    default:
        echo "É um dia útil qualquer.";
}
?>