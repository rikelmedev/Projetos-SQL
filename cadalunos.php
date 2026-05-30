<html>
<head>
     <title>Cadastro de Alunos</title>
</head>
<body>


<?php
include_once ('conexao.php');

//recuperando
$matricula = $_POST['matricula'];
$nome      = $_POST['nome'];
$endereco  = $_POST['endereco'];
$cidade    = $_POST['cidade'];
$curso     = $_POST['codcurso'];

if (empty($matricula) || empty($nome)){

    echo "<p>Preencha todos os campos obrigatórios (Matricula e Nome). </p>"
     }else{

//criando linha de insert
    $sqlinsert = "insert into aluno(matricula, nome, endereco, cidade, codcurso)
       VALUES ('$matricula', '$nome', '$endereco', '$cidade', '$curso')";

//executando instrução SQL
$resultado = @mysqli_query($conexao, $sqlinsert);

  if (!$resultado){
   
  echo "<p>Matricula ja cadastrada. Por favor, use matricula diferente.</p>";
   
      }else{
  
  echo "<p>Aluno cadastrado com sucesso!</p>";
}


   mysqli_close($conexao);
}

?>


<br>
<!-- Botão para voltar ao menu principal -->
<input type='button' onclick="window.location='index.php';" VALUE ="Voltar ao Menu">

</body>
</html>
