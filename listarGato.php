<?php
require_once 'cabecalho.php';
require_once 'model/Gato.php';

if(isset($_GET['ordem'])){
	$ordem=$_GET['ordem'];
}else{
	$ordem="";
}

	$consulta=retornaUltimoGato();
	if($consulta>=0){

	echo "<table>";
	echo "<tr>";
	echo "<th>Código <form id='classifique' action='listarGato.php' method='GET'><input type='hidden' name='ordem' value='codigo'><input type='submit' value='&darr;'></form></th>";
	echo "<th>Nome <form id='classifique' action='listarGato.php' method='GET'><input type='hidden' name='ordem' value='nome'><input type='submit' value='&darr;'></form></th>";
	echo "<th>Imagem</th>";
	echo "<th>Nascimento <form id='classifique' action='listarGato.php' method='GET'> <input type='hidden' name='ordem' value='data'><input type='submit' value='&darr;'></form></th>";
	echo "</tr>";

	$consulta=listarGato($ordem);

	while($linha=$consulta->fetch_assoc()){
	echo "<tr>";
	echo "<td>".$linha['cod_gat']."</td>";
	echo "<td>".$linha['nome_gat']."</td>";
	echo "<td><a href='data:image/jpeg;base64,".base64_encode($linha['img_gat'])."'><img src='data:image/jpeg;base64,".base64_encode($linha['img_gat'])."'/></a></td>"; /*echo "<td><img src='data:image/jpeg;base64,".base64_encode($linha['img_gat'])."'/><form action='mostraGrande.php' method='GET'><input type='hidden' name='codigo' value'".$linha['cod_gat']."'><input type='submit' value='Aumentar'></form></td>*/
	echo "<td>".$linha['data_gat']."</td>";
	echo "</tr>";

	}
	echo "</table>";
	}else{
	echo "<h2>Não há gatos cadastrados!</h2>";
}
?>
</body>
</html>