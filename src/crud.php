<?php


require_once('con.php');

/* class crud */


class CRUD {
	

	function __construct(Array $properties=array()){

		foreach ($properties as $key => $value) {
			# code...
			$this->{$key} = $value;

		}
		$this->database     	 = Conexao::getInstance(); //conexao pdo oviyam
	}


	public function logar(){

		//ativo = 1
		//ativo = 0
		$sql  = "SELECT nome,senha,email,ativo FROM usuarios WHERE email = ? and senha = ?";
		$stmt = $this->database->prepare($sql);
		$stmt->bindValue(1, $this->email);
		$stmt->bindValue(2, $this->senha);
		$stmt->execute();



		$result = $stmt->fetch(PDO::FETCH_OBJ);

		// echo $result->ativo;
		if($result->ativo == '1'){
			// while ($row = $stmt->fetch(PDO::FETCH_OBJ)) {
			# code...

			echo json_encode(array("return" => $result->nome,"status_code" => "success"));

			// }
		}else{

			echo json_encode(array("status_code" => "error"));
		}
		
	}

}