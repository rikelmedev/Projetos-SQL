<html>
     <title> Lista Geral de Cursos </title>
<body>

<center>
 <h3>Lista Geral de Cursos</h3>
</center>


<?php
	include_once('conexao.php');


$query = mysqli_query($conexao,"select * from curso order by nome");
	
    if (!$query){
		die('Erro ao consultar os cursos. Tente novamente.');  
	            }

// VERIFICAÇÃO E EXIBIÇÃO DOS RESULTADOS
    if (mysqli_rum_rows($query) == 0) {
	
	echo"<center><p>Nenhum curso cadastrado.</p></center>";

	} else {

	echo"<center>";
	echo "<table border='1px'>";
	echo "<tr>
	       <th width='100px'>Cod. Curso</th>	
	       <th width='200px'>Nome</th>
	       <th width='120px'>Disciplina01</th>
	       <th width='120px'>Disciplina02</th>
		   <th width='120px'>Disciplina03</th>
	      <tr>";


	while($dados=mysqli_fetch_array($query)) {
	    echo "<tr>";
		echo "<td>". $dados['codcurso']       ."</td>";
		echo "<td>". $dados['nome']           ."</td>";
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
	<input type="button" onclick="window.location='index.php';" value="Voltar ao Menus">
</center>

</body>
</html>
