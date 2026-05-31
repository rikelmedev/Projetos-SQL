<html>
   <title> Pesquisa de Cursos </title>
<body>

<center>
<h3>Pesquisa de Cursos por Nome</h3>
</center>


<?php
	include_once('conexao.php');
	$nome = $_POST['inicial'];	

// EXECUÇÃO DA CONSULTA SQL
$query = mysqli_query($conexao,"select * from curso where nome like '%$nome%'   order by nome");
	
if (!$query)
	{
		die('Erro ao realizar a pesquisa. Tente novamente.');
	}

//VERIFICAÇÃO E EXIBIÇÃO DOS RESULTADOS
if (mysqli_num_rows($query) == 0) {
	echo"<center><p>Nenhum curso encontrado com o nome
	     <strong>$nome</strong>.</p></center>";

	} else {

	echo"<center>";
	echo "<table border='1'>";
	echo "<tr>
	      <th width='200px'>Nome</th>
	      <th width='100px'>Cod.Curso</th>
	      <th width='100px'>Disciplina01</th>
	      <th width='100px'>Disciplina02</th>
	      <th width='100px'>Disciplina03</th>
	      <tr>";


	while($dados=mysqli_fetch_array($query)) {
	   echo "<tr>";
	   echo "<td>". $dados['nome']           ."</td>";
	   echo "<td>". $dados['codcurso']       ."</td>";
	   echo "<td>". $dados['coddisciplina01']."</td>";
	   echo "<td>". $dados['coddisciplina02']."</td>";
	   echo "<td>". $dados['coddisciplina03']."</td>";		
	   echo "</tr>";
	}
	
	echo "</table>";
	echo "</center>";

}
	
mysqli_close($conexao);

?>

<br>
<center>
	<input type="button" onclick="window.location='index.php';" value="Voltar ao Menu">
</center>

</body>
</html>
