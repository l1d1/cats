<?php
require_once 'cabecalho.php'; 

echo "<h1>Home - Início</h1>";
echo "<p>Hoje é ".date("d/m/Y")."</p>";

require_once 'model/Gato.php';
$consulta=verificarAniversario(date("Y-m-d"));
if(!$consulta){
	echo "<div id='push'>";
	echo "<h2>Dia comum</h2>";
	echo "<p>Nada programado para hoje</p>";
	echo "</div>";
}else{
	while($linha=$consulta->fetch_assoc()){
		echo "<div id='push'>";
		echo "<h2>Aniversário de ".$linha['nome_gat']."</h2>";
		echo "<p>Dê os parabéns a ele!</p>";
		echo "</div>";
	}
}
?>