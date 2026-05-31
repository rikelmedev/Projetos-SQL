<html>
<title> Pesquisa de Alunos </title>
<body>

<center>
<h3>Pesquisa de Alunos</h3>
</center>

<?php
  include_once('conexao.php');

// RECUPERAÇÃO DO TERMO DE BUSCA
$nome = $_POST['inicial'];
$query = mysqli_query($conexao,"select * from aluno where nome like '%$nome%'   order by nome");
	
if (!$query)
	{
		die('Erro ao realizar a pesquisa. Tente novamente.');  
	}

//VERIFICAÇÃO E EXIBIÇÃO DOS RESULTADOS
	if(mysqli_num_rows($query) == 0){
	echo "<center><p>Nenhum aluno encontrado com o nome
	      <strong>$nome</strong>.</p></center>";
	
		  } else {
	
    echo"<center>";
	echo "<table border='1px'>";
	echo "<tr>
	        <th width='200px'>Nome</th>	
			<th width='100px'>Matricula</th>
	        <th width='250px'>Endereco</th>
	        <th width='150px'>Cidade</th>
	        <th width='100px'>cod.Curso</th>
	     </tr>";

	while($dados=mysqli_fetch_array($query)) {
	
		echo "<tr>";
		echo "<td>". $dados['nome']      ."</td>";
		echo "<td>". $dados['matricula'] ."</td>";
		echo "<td>". $dados['endereco']  ."</td>";
		echo "<td>". $dados['cidade']    ."</td>";
		echo "<td>". $dados['codcurso']  ."</td>";		
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
