<?php

try{

	$login=$_POST["login"];

	$password=$_POST["password"];

	$contador=0;


	require_once("conexion.php");
	$base=conectar::conexion();


	$sql="SELECT * FROM usuarios WHERE usuario= :login";

	$resultado=$base->prepare($sql);

	$resultado->execute(array(":login"=>$login));

		while($registro=$resultado->fetch(PDO::FETCH_ASSOC)){

			if(($password==$registro['password'])){
				$contador++;
			}

		}

		if($contador>0){
			$online=1;
			$sqlOnl="UPDATE usuarios SET online=:online WHERE usuario=:login";
			$resultado=$base->prepare($sqlOnl);
			$resultado->execute(array(":online"=>$online, ":login"=>$login));
			header("location:../index.php");
		}else{
			header("location:../login.php?error");
		}




		$resultado->closeCursor();



}catch(Exception $e){

	die("Error: " . $e->getMessage());


}



?>
