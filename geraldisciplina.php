<html>
   <title> Listagem Geral de Disciplina </title>
<body>
<center>
<h3>Listagem Geral de Disciplina</h3>
</center>

<?php
	include_once('conexao.php');

// AJUSTANDO A INSTRUÇÃO DE CONSULTA SQL
$query = mysqli_query($conexao,"select * from disciplina order by nome_disciplina");
	
if (!$query)
	{
		die('	Erro ao consulta disciplinas. Tente Novamente.');  
	}

	//VERIFICAÇÃO E EXIBIÇÃO DE DADOS
	if (mysqli_num_rows($query) == 0) {
	    
	  echo"<center><p>Nenhuma dicisplina cadastrada.</p></center>";

	} else {	

	  echo"<center>";
	  echo "<table border='1px'>";
	  echo "<tr>
	        <th width='100px'>Código</th>
			<th width='200px'>Nome Da Disciplina</th>
			</tr>";

	while($dados=mysqli_fetch_array($query)) {
		echo "<tr>";
		echo "<td>". $dados['coddisciplina']   ."</td>";
		echo "<td>". $dados['nome_disciplina'] ."</td>";
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
