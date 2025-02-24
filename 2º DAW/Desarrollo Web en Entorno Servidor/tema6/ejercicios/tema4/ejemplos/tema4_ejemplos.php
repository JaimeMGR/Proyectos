<<<<<<< Updated upstream
<?php
$ciudades=array("Madrid","Zaragoza","Bilbao","Valencia","Alicante","Granada");
sort($ciudades);
// rsort($ciudades);
foreach($ciudades as $indice=>$ciudad){
    echo"$indice:$ciudad<br>";
}


$frutas=array("platanos"=>12,"peras"=>48,"lechugas"=>22,"tomates"=>34);
asort($frutas);
arsort($frutas);
foreach($frutas as $fruta=>$stock){
    echo "$fruta:$stock<br>";
}

$lista_frutas=array_keys($frutas);
$lista_cantidades=array_values($frutas);

foreach($lista_frutas as $fruta){
    echo "$fruta<br>";
}

foreach($lista_cantidades as $cantidad){
    echo "$cantidad<br>";
}
echo"<tr>";

echo"<table border=1>";
echo "</tr>";
echo"<tr>";
foreach($lista_cantidades as $cantidades){
    echo "<td>$cantidades</td>";
}
echo "</tr>";
echo "</table>";


$clientes=array(array("nombre"=>"Juan","apellidos"=>"López Aro","saldo"=>4500),
                array("nombre"=>"Juan","apellidos"=>"López Aro","saldo"=>4500),
                array("nombre"=>"Juan","apellidos"=>"López Aro","saldo"=>4500));
echo $clientes[2]["apellidos"]."<br>";
=======
<?php
$ciudades=array("Madrid","Zaragoza","Bilbao","Valencia","Alicante","Granada");
sort($ciudades);
// rsort($ciudades);
foreach($ciudades as $indice=>$ciudad){
    echo"$indice:$ciudad<br>";
}


$frutas=array("platanos"=>12,"peras"=>48,"lechugas"=>22,"tomates"=>34);
asort($frutas);
arsort($frutas);
foreach($frutas as $fruta=>$stock){
    echo "$fruta:$stock<br>";
}

$lista_frutas=array_keys($frutas);
$lista_cantidades=array_values($frutas);

foreach($lista_frutas as $fruta){
    echo "$fruta<br>";
}

foreach($lista_cantidades as $cantidad){
    echo "$cantidad<br>";
}
echo"<tr>";

echo"<table border=1>";
echo "</tr>";
echo"<tr>";
foreach($lista_cantidades as $cantidades){
    echo "<td>$cantidades</td>";
}
echo "</tr>";
echo "</table>";


$clientes=array(array("nombre"=>"Juan","apellidos"=>"López Aro","saldo"=>4500),
                array("nombre"=>"Juan","apellidos"=>"López Aro","saldo"=>4500),
                array("nombre"=>"Juan","apellidos"=>"López Aro","saldo"=>4500));
echo $clientes[2]["apellidos"]."<br>";
>>>>>>> Stashed changes
echo $clientes[1]["saldo"]."<br>";