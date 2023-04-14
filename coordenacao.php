<?php

class Coordenacao {
  private $professores = [];

  public function adicionarProfessor($prof){
    $this->professores[] = $prof;
  }

  public function verProfessores(){
    echo "Professores: \n";
    for($i = 0; $i < count($this->professores); $i++){
      echo $this->professores[$i]->getNome() . "\n";
    }
    if(count($this->professores) == 0){
      echo "Ainda não foi adicionado nenhum professor!\n";
    }
  }

  public function getProfessor($prof){
    $find = 0;
    for($i = 0; $i < count($this->professores); $i++){
      if($prof == $this->professores[$i]->getNome()){
        $find = 1;
        return $this->professores[$i];
      }
    }
    if($find == 0){
      return 0;
    }
  }
}

?>