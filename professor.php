<?php

class Professor extends Aluno{
  private $materias = [];
  private $nome;

  public function __construct($nome){
    $this->nome = $nome;
  }

  public function adicionarMateriaProfessor($materia){
    $this->materias[] = $materia;
  }

  public function getNome(){
    return $this->nome;
  }
  
  public function verMateriasProfessor(){
    echo "\n\nMatérias a serem ministradas:\n";
    for($i = 0; $i < count($this->materias); $i++){
      echo ($i+1) ."-" . $this->materias[$i] . "\n";
    }
    if(count($this->materias) == 0){
      echo "Ainda não foram adicionadas matérias a esse professor!";
    }
    echo "\n";
  }

  public function darNota($nome_aluno, $cursos, $notas){
    
    for($n=0 ; $n<count($nome_aluno) ; $n++){
      
      for($i = 0; $i < count($this->materias); $i++){
        
        if($cursos[$n] == $this->materias[$i]){
          echo "\nAluno: ".$nome_aluno[$n]."\nCurso: ".$cursos[$n]."\n";
          $notas[$n] = (int)(readline("Nota: "));
          $this->nota[$n] = $notas[$n];
        }
      }
    }
    return $this->nota;
  }
}

?>