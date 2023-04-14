<?php

require_once "aluno.php";
require_once "coordenacao.php";
require_once "cursos.php";
require_once "professor.php";

$cursos = [];
echo "Bem-vindo!\n";

$aluno = new Aluno();
$coordenacao = new Coordenacao();
while (true){

  echo "\nOlá, seja bem vindo, quem é você? \n\n";
  echo "1- Coordenação\n";
  echo "2- Aluno\n";
  echo "3- Professor\n";
  echo "4- Finalizar a sessão\n\n";

  echo "Sua escolha: ";
  $input = readline();

  if ($input == 1) {

    echo "\n\nO que você deseja fazer: \n1 - Adicionar Professor\n2 - Consultar Professores\n3 - Adicionar Matéria a Professor\n";
    
    $option = readline("O que você deseja fazer: ");
    echo "\n";

    if($option == 1){
      $prof = new Professor(strtoupper(readline("Digite o nome do professor que deseja adicionar: ")));
      $coordenacao->adicionarProfessor($prof);
    }
    else if($option == 2){
      $coordenacao->verProfessores();
    }
    else if($option == 3){
      $prof = strtoupper(readline("Digite o nome do professor: "));
    if($coordenacao->getProfessor($prof) == 0){
      echo "\nProfessor não encontrado!\n";
      continue;
    }
    else{
      $prof = $coordenacao->getProfessor($prof);
    }
      $materia = readline("Matéria a ser adicionada: ");
      $prof->adicionarMateriaProfessor($materia);
      $nome = $prof->getNome();
      $cursos[] = new Curso($materia);
    }
    
    
  }else if ($input == 2) {

    echo "\n\nO que você deseja consultar?\n";
    echo "1 - Matricular-se\n";
    echo "2 - Ver notas\n\n";
    $escolha = readline("Digite sua escolha: ");
    echo "\n";

    if($escolha == 1){
      echo"\n\nCursos disponíveis:\n";
      for($i = 0; $i < count($cursos); $i++){
        echo ($i + 1) ." - " . $cursos[$i]->getNome() . "\n";
      }
      echo "\n";
      

      $nome = strtoupper(readline("Seu Nome: "));
      $option = $cursos[((int)(readline("Digite o número do curso que você quer entrar: ")))-1]->getNome();
      $nota = "não definida";
      $aluno->addAluno($nome, $option, $nota);
      echo"\n";

      
      
      for($i = 0; $i < count($cursos); $i++){
        if($option == $i){
          $cursos[$i]->adicionarAluno($nome);
        }
      }
    }

    
    else if ($escolha == 2) {
      $nome = strtoupper(readline("Qual o seu nome: "));
      $aluno->verNota($nome);
    } 
    
  }

  else if ($input == 3) {
    
    echo "\n\nO que você deseja fazer?\n";
    echo "1 - Ver minhas cadeiras;\n";
    echo "2 - Avaliar alunos\n\n";
    $escolha = readline("Digite sua escolha: ");
    echo "\n";

    if($escolha == 1){
      $prof = strtoupper(readline("Digite seu nome: "));
      if($coordenacao->getProfessor($prof) == 0){
        echo "\nProfessor não encontrado!\n";
        continue;
      }
      else{
        $prof = $coordenacao->getProfessor($prof);
      }
      echo "\nBem-Vindo professor " . $prof->getNome() . "!";
      $prof->verMateriasProfessor();
    }
      
    else if($escolha == 2){
      $prof = strtoupper(readline("Digite seu nome: "));
      if($coordenacao->getProfessor($prof) == 0){
        echo "\nProfessor não encontrado!\n";
        continue;
      }
      else{
        $prof = $coordenacao->getProfessor($prof);
      }
      echo "\nBem-Vindo professor " . $prof->getNome() . ".\nDê as notas aos alunos:";

      $aluno->setNota($prof->darNota($aluno->getAlunos(), $aluno->getCurso(), $aluno->getNota()));
    }
    
  
      
  }
  else if($input <= 0){
    echo "\nNão identificamos o número, poderia tentar novamente?\n\n";
  }
}
