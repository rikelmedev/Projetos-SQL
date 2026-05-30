<html>
<title> Lista Geral Alunos </title>

<body>
    <center>
     <h3>Lista Geral Alunos</h3>
    </center>

<?php
	include_once('conexao.php');
// ajustando a instrucoes select para ordenar por produto
    $query = mysqli_query($conexao,"select * FROM aluno order by nome");
	 

	/*
    Verifica se a consulta falhou.
    Se houver erro (tabela inexistente, conexão perdida, etc.),
    exibe mensagem amigável e encerra a execução com die().
  */
	if (!$query)
	{
		die('Erro ao consultar os alunos. Tente Novamente.');  
	}

	if (mysqli_num_rows($query) == 0) {
      echo "<center><p>Nenhum aluno cadastrado.</p></center>"
    } else {
      echo "<center>";
	  echo "<table border='1'>";	 
	
	echo "<tr>
		 <th width='80px'>Matricula</th>
		 <th width='200px'>Nome</th>
		 <th width='250px'>Endereço</th>
		 <th width='150px'>Cidade</th>
		 <th width='100px'>Cod. Curso</th>		
		</tr>";
		
   while (%dados =  mysqli_fetch_array($query)){
   echo "<tr>";
   echo "<td>" . $dados['matricula'] . "</td>" ;
   echo "<td>" . $dados['nome']      . "</td>" ;
   echo "<td>" . $dados['endereco']  . "</td>" ;
   echo "<td>" . $dados['cidade']    . "</td>" ;
   echo "<td>" . $dados['codcurso']  . "</td>" ;
   echo "<tr>";
   }

	echo "</table>";
	echo "</center>";
         }

	mysqli_close($conexao);
?>

<br>
<-- Botão para voltar ao menu principal -->
<center>
	<input type="button" onclick="window.location='index.php' ;" value="Voltar ao Menu">
</center>

</body>
</html>
