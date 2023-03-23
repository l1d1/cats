<?php

class Banco
{
	private $banco;
	private $url;
	private $usuario;
	private $senha;
	private $conexao;


function __construct()
{
	$this->banco="SistemaGatos";
	$this->url="localhost";
	$this->usuario="root";
	$this->senha="";
	$this->conexao=new mysqli($this->url,$this->usuario,$this->senha,$this->banco);
}

function executar($sql){
	$resp=$this->conexao->query($sql);
	if(!$resp){
		return false;
	}else{
		return true;
	}
}

function consultar($sql){
	$consulta=$this->conexao->query($sql);
	if(!$consulta){
		return false;
	}else{
		return $consulta;
	}
}
}

?>