<html>
<title> Pesquisa de Disciplina </title>
<body>

<center>
<h3>Pesquisa de Disciplina por Nome</h3>
</center>

<?php
	
	include_once('conexao.php');
	$nome_disciplina = $_POST['inicial'];	

//AJUSTANDO A INSTRUÇÃO SELECT PARA ORDENAR POR PRODUTO
$query = mysqli_query($conexao,"select * from disciplina where nome_disciplina like '%$busca%' ORDER BY nome_disciplina");
	
    if (!$query){
		die('Erro ao realizar a pesquisa. Tente novamente.');  
	}

	//VERIFICAÇÃO E EXIBIÇÃO DOS RESULTADOS
	if(mysqli_num_rows($query) == 0){
	echo"<center><p>Nenhuma disciplina encontrada com o nome
	    <strong>$busca</strong>.</p></center>";
		
    } else {
		
	echo"<center>";
	echo "<table border='1px'>";
	echo "<tr>
	       <th width='200px'>Nome da Disciplina</th>	
		   <th width='100px'>Codigo</th>
	<tr>";


	while($dados=mysqli_fetch_array($query)) {
		echo "<tr>";
		echo "<td>". $dados['nome_disciplina'] ."</td>";
		echo "<td>". $dados['coddisciplina']   ."</td>";	
		echo "</tr>";
	}

	echo "</table>";
	echo "</center>";
   }

	mysqli_close($conexao);
?>

<center>
	<input type="button" onclick="window.location='index.php';" value="Voltar ao Menu">
</center>

</body>
</html>
