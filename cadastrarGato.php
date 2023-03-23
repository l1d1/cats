<?php
require_once 'cabecalho.php';?>
<form id="push" action="cadastrarGato.php" method="POST" enctype="multipart/form-data">
	<h2>Cadastro de Gatos</h2>
	<p>Nome:
		<input type="text" name="nome" size="40" maxlength="40" required></p>
	<p>Foto:
		<input type="file" name="imagem" required></p>
	<p>Data de nascimento: 
		<input type="date" name="nasci" required></p>
	<p> <input type="submit" name="enviar" value="Cadastre"></p>	
</form>

<?php
if(isset($_POST['enviar'])){
$nome_gat=$_POST['nome'];
$img_gat=$_FILES['imagem']['tmp_name'];
$data_gat=$_POST['nasci'];

$img_gat=addslashes(file_get_contents($img_gat));

require_once 'model/Gato.php';
$cod_gat=retornaUltimoGato();
if($cod_gat>=0){
	$cod_gat++;
	$resp=cadastrar($cod_gat,$nome_gat,$img_gat,$data_gat);
	if(!$resp){
		echo "<h2>Erro na tentativa de cadastro!</h2>";
	}else{
		echo "<h2>Cadastrado com sucesso!</h2>";
	}
}else{
	echo "<h2>Erro na tentativa de extrair código</h2>";
}
}
?>
</body>
</html>