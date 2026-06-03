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

//criando linha de insert
    $sqlinsert = "insert into aluno(matricula, nome, endereco, cidade, codcurso)
       VALUES ('$matricula', '$nome', '$endereco', '$cidade', '$curso')";

//executando instrução SQL
$resultado = mysqli_query($conexao, $sql);

  if (!$resultado) {
  if (mysqli_errno($conexao) == 1062) {
    echo "<p>Matrícula $matricula já cadastrada. Use outra.</p>";
  } else {
    echo "<p>Erro ao cadastrar. Tente novamente.</p>";
  }
} else {
  echo "<p>Aluno $nome cadastrado com sucesso!</p>";
}

mysqli_close($conexao);
?>
 
<br>
<input type="button" onclick="window.location='index.php';" value="Voltar ao Menu">

</body>
</html>
