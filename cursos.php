<?php

class Curso{
  private $nome;
  private $alunos = [];

  public function __construct($materia){
    $this->nome = $materia;
  }

  public function getNome(){
    return $this->nome;
  }

  public function adicionarAluno($aluno){
    $this->alunos[] = $aluno;
  }
}

?>