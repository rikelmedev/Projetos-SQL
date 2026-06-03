<html>
     <title> Lista Geral de Cursos </title>
<body>

<center>
 <h3>Lista Geral de Cursos</h3>
</center>


<?php
	include_once('conexao.php');


$query = mysqli_query($conexao,"select * from curso order by nome");
	
    if (!$query) {
  die("Erro ao buscar cursos.");
}
 
$total = mysqli_num_rows($query);
?>
 
<html>
<head>
  <title>Lista Geral de Cursos</title>
  <link rel="stylesheet" href="estilo.css">
</head>
<body>
<div class="container">
 
  <div class="sys-header">
    <div class="sys-logo">SE</div>
    <div>
      <div class="sys-title">Sistema Escolar</div>
      <div class="sys-subtitle">Gestão de alunos, cursos e disciplinas</div>
    </div>
  </div>
 
  <div class="card">
    <div class="page-header">
      <h1>Lista Geral de Cursos <span class="badge"><?php echo $total; ?> registros</span></h1>
      <p>Todos os cursos cadastrados, ordenados por nome.</p>
    </div>
 
    <?php if ($total == 0): ?>
      <div class="msg msg-empty">Nenhum curso cadastrado.</div>
    <?php else: ?>
      <table class="result-table">
        <thead>
          <tr>
            <th>Cód. Curso</th>
            <th>Nome</th>
            <th>Disciplina 01</th>
            <th>Disciplina 02</th>
            <th>Disciplina 03</th>
          </tr>
        </thead>
        <tbody>
          <?php while ($dados = mysqli_fetch_array($query)): ?>
          <tr>
            <td class="col-code"><?php echo $dados['codcurso']; ?></td>
            <td><?php echo $dados['nome']; ?></td>
            <td class="col-code"><?php echo $dados['coddisciplina01']; ?></td>
            <td class="col-code"><?php echo $dados['coddisciplina02']; ?></td>
            <td class="col-code"><?php echo $dados['coddisciplina03']; ?></td>
          </tr>
          <?php endwhile; ?>
        </tbody>
      </table>
    <?php endif; ?>
 
    <?php mysqli_close($conexao); ?>
 
    <div class="divider"></div>
    <div class="btn-group">
      <a href="index.php" class="btn btn-ghost">Voltar ao Menu</a>
    </div>
  </div>
 
</div>
</body>
</html>