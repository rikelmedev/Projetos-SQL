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
if(mysqli_num_rows($query);
?>

<html>
<heade>
	<title> Pesquisa de Disciplinas</title>
</heade>
<body>
<div class="container">

    <div class="sys-header">
	  <div class="sys-logo">SE</div>
	  <div>
		<div class="sys-title">Sistema Escolar</div>
		<div class="sys-subtitle">Gestão de Alunos, cursos e disciplinas</div>
      </div>
    </div>

	<div class="card">
    <div class="page-header">
      <h1>Pesquisa de Disciplinas <span class="badge"><?php echo $total; ?> resultado(s)</span></h1>
      <p>Resultado para: <strong><?php echo $busca; ?></strong></p>
    </div>

	<?php if ($total == 0): ?>
      <div class="msg msg-empty">
        Nenhuma disciplina encontrada com o nome <strong><?php echo $busca; ?></strong>.
      </div>
    <?php else: ?>
      <table class="result-table">
        <thead>
          <tr>
            <th>Código</th>
            <th>Nome da Disciplina</th>
          </tr>
        </thead>
        <tbody>
          <?php while ($dados = mysqli_fetch_array($query)): ?>
          <tr>
            <td class="col-code"><?php echo $dados['coddisciplina']; ?></td>
            <td><?php echo $dados['nome_disciplina']; ?></td>
          </tr>
          <?php endwhile; ?>
        </tbody>
      </table>
    <?php endif; ?>
 
    <?php mysqli_close($conexao); ?>
 
    <div class="divider"></div>
    <div class="btn-group">
      <a href="consulta_disciplina.html" class="btn btn-ghost">Nova Pesquisa</a>
      <a href="index.php" class="btn btn-ghost">Voltar ao Menu</a>
    </div>
  </div>
 
</div>
</body>
</html>
