<html>
<head>
      <title>Cadastro de Disciplinas</title>
</head>
<body>

<?php

include_once ('conexao.php');

//RECUPERAÇÃO DOS DADOS DO FORMULÁRIO
$codigo         = $_POST['coddisciplina'];
$nomedisciplina = $_POST['nomedisciplina'];

//CRIANDO LINAH DO INSERT
$sqlinsert = "insert into disciplina(coddisciplina, nome_disciplina) 
          VALUES ('$codigo','$nome')";

//EXECUÇÃO DO COMANDO E VERIFICAÇÃO DO RESULTADO
$resultado = mysqli_query($conexao, $sqlinsert);

if (!$resultado){

if(mysqli_error($conexao) == 1062){
    echo "<p>Codigo <strong>$codigo</strong> já esta cadastrado.
         Use um codigo de disciplina diferente.</p>";
  } else {
    echo "<p>Erro ao realizar o cadastro. Tente novamente.</p>";
  }

 } else {
 echo "<p>Disciplina <strong>$nomedisciplina</strong> cadastrada com sucesso!</p>".   
 }

mysqli_close($conexao);

?>

<br>
<br>
<input type='button' onclick="window.location='index.php';" VALUE ="Voltar ao Menu">
</body>
</html>
