<?php

class Usuario{
    
    private $id;
    private $nome;
    private $sexo;
    private $idade;
    private $peso;
    private $altura;
    private $imc;
    private $msg;
    private $erro = [];

	public function getId() {
		return $this-> id;
	}

	public function setId($id) {
		return $this-> id = $id;
	}

	public function getNome() {
		return $this-> nome;
	}

	public function setNome($nome) {
		return $this-> nome = $nome;
	}

	public function getSexo() {
		return $this-> sexo;
	}

	public function setSexo($sexo) {
		return $this-> sexo = $sexo;
	}

	public function getIdade() {
		return $this-> idade;
	}

	public function setIdade($idade) {
		return $this-> idade = $idade;
	}

	public function getPeso() {
		return $this-> peso;
	}

	public function setPeso($peso) {
		return $this-> peso = $peso;
	}

	public function getAltura() {
		return $this-> altura;
	}

	public function setAltura($altura) {
		return $this-> altura = $altura;
	}

	public function getImc() {
		return $this-> imc;
	}

	public function getMsg() {
		return $this-> msg;
	}



    public function __construct($nome, $sexo, $idade, $peso, $altura){
        $this-> nome = $nome;
        $this-> sexo = $sexo;
        $this-> idade = $idade;
        $this-> peso = $peso;
        $this-> altura = $altura;
    }

    public function validarDados(){
        if(empty($this->nome)){
            $this->erro["erro_nome"] = "O campo nome está vazio!";
        }
        if($this->idade < 0 || $this->idade > 120 || !is_numeric($this->idade)){
            $this->erro["erro_idade"] = "Idade Inválida!";
        }
        
        $this->peso = str_replace(",",".",$this->peso);
        if(!is_numeric($this->peso)){
            $this->erro["erro_peso"] = "O peso deve ser número!";
        }

        $this->altura = str_replace(",",".",$this->altura);
        if(!is_numeric($this->altura)){
            $this->erro["erro_altura"] = "O altura deve ser número!";
        }

        if(empty($this->erro)){
            $this->imc = $this->peso/ pow($this->altura,2);

            if ($this->imc < 18.5) {
                $this->msg = "Abaixo do peso";
            } elseif ($this->imc >= 18.5 && $this->imc <= 24.9) {
                $this->msg = "Peso Normal";
            } elseif ($this->imc >= 25 && $this->imc <= 29.9) {
                $this->msg = "Sobrepeso";
            } elseif ($this->imc >= 30 && $this->imc <= 34.9) {
                $this->msg = "Obesidade grau I";
            } elseif ($this->imc >= 35 && $this->imc <= 39.9) {
                $this->msg = "Obesidade grau II (Severa)";
            } else {
                $this->msg = "Obesidade grau III (Mórbida)";
            }
        }

        

    }

    
    
}



?>