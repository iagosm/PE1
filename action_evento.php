<?php 
session_start();
include 'header.php';
include_once 'includes/evento.php';
$eventos = new Evento();
$eventos->verificaAction();
$mensagem = (isset($_SESSION['mensagem'])) ? $_SESSION['mensagem'] : '';
?>
<div class="container">
  <div class="row">
    <p><?php if(isset($mensagem) && $mensagem !== '') { echo $mensagem; };?></p>
    <?php unset($_SESSION['mensagem']); ?>
    <form method="post" enctype="multipart/form-data">
      <div class="form-group">
        <label for="titulo">Título</label>
        <input class="form-control" type="text" id="titulo" name="titulo">
      </div>
      <div class="form-group">
        <label for="subtitulo">Subtítulo</label>
        <input class="form-control" type="text" id="subtitulo" name="subtitulo">
      </div>
      <div class="form-group">
        <label for="descricao">Descrição</label>
        <textarea class="form-control" id="descricao" name="descricao" cols="50" rows="4"></textarea>
      </div>
      <div class="form-group">
        <label for="onde">Onde</label>
        <input class="form-control" type="text" id="onde" name="onde">
      </div>
      <div class="form-group">
        <label for="quando">Quando</label>
        <input class="form-control" type="date" id="quando" name="quando">
      </div>
      <div class="form-group">
        <label for="atracoes">Atrações</label>
        <input class="form-control" type="text" id="atracoes" name="atracoes">
      </div>
      <div class="form-group">
        <label for="classificacao">Classificação</label>
        <input class="form-control" type="number" id="classificacao" name="classificacao">
      </div>
      <div class="form-group">
        <label for="realizacao">Realização</label>
        <input class="form-control" type="text" id="realizacao" name="realizacao">
      </div>
      <div class="form-group">
        <label for="contato">Contato</label>
        <input class="form-control" type="text" id="contato" name="contato">
      </div>
      <div class="form-group">
        <label for="imagem">Imagem</label>
        <input class="form-control" type="file" id="imagem" name="imagem">
      </div>
      <input type="hidden" name="action" value="cadEvento">
      <button class="btn btn-primary" type="submit">Enviar</button>
    </form>
  </div>
</div>


