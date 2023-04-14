<?php

class Aluno{
  private $nome = [];
  private $curso = [];
  private $nota = [];

  public function addAluno($nome, $curso,$nota){
    $this->nome[] = $nome;
    $this->curso[] = $curso;
    $this->nota[] = $nota;
  }

  public function getAlunos(){
    return $this->nome;
  }

  public function getCurso(){
    return $this->curso;
  }

  public function setNota($nota){
    $this->nota = $nota;
  }

  public function getNota(){
    return $this->nora;
  }
  
  public function verNota($nome){
    $contador = count($this->nome);
    for($n=0 ; $n<$contador ; $n++){
      if($nome == $this->nome[$n]){
        $nota_al = $this->nota[$n];
        $curso_al = $this->curso[$n];

        $nota_final = $nota_al;
        $resultado = null;

        if($nota_al == "não definida"){
          $resultado = "Ainda não avaliado!";
        }
        else if($nota_final >= 7){
          $resultado = "Você foi aprovado!";
        }
        else if($nota_final >= 4 && $nota_final < 7){
          $resultado = "Você está na AVF!";
        }
        else{
          $resultado = "Você foi reprovado!";
        }
        
        echo "\nMatéria: ".$curso_al."\nNota: ".$nota_al."\nResultado: " . $resultado . "\n";
      }
    }
  }
}

?>