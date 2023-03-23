<?php
require_once 'cabecalho.php';
require_once './persistence/Banco.php';

function cadastrar($cod_gat,$nome_gat,$img_gat,$data_gat){
	$banco=new Banco();
	$sql="insert into gato values($cod_gat,'$nome_gat','$img_gat','$data_gat')";
	$resp=$banco->executar($sql);
	if(!$resp){
		return false;
	}else{
		return true;
	}

}

function retornaUltimoGato(){
	$banco=new Banco();
	$sql="select max(cod_gat) from gato";
	$consulta=$banco->consultar($sql);
	if(!$consulta){
		return false;
	}else{
		while($linha=$consulta->fetch_assoc()){
			$codigo=$linha['max(cod_gat)'];

	}
	if($codigo==NULL){
		$codigo=0;
	}
	return $codigo;
}
}

function listarGato($ordem){
	$banco=new Banco();
	if($ordem==""||$ordem=="codigo"){
		$sql="select * from gato order by cod_gat";
	}else if($ordem=="nome"){
		$sql="select * from gato order by nome_gat";
	}else if($ordem=="data"){
		$sql="select * from gato order by data_gat";
}
	$consulta=$banco->consultar($sql);
	if(!$consulta){
		return false;
	}else{
		return $consulta;
	}
}

function verificarAniversario($data){
	$banco=new Banco();
	$sql="select nome_gat from gato where data_gat='$data'";
	$consulta=$banco->consultar($sql);
	$num_linhas=$consulta->num_rows;
	if($num_linhas>0){
		return $consulta;
	}else{
		return false;
	}
}

?>

