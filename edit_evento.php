<?php 
session_start();
include 'header.php';
include_once 'includes/evento.php';
$eventos = new Evento();
$evento = $eventos->getEvento();
$eventos->verificaAction();
?>
<div class="container">
  <a href="tabela.php" id="back-tabela">Tabela</a>
  <div class="row mt-4">
    <p><?php if(isset($mensagem) && $mensagem !== '') { echo $mensagem; };?></p>
    <?php unset($_SESSION['mensagem']); ?>
    <form method="post">
      <div class="form-group">
        <label for="titulo">Título</label>
        <input class="form-control" type="text" id="titulo" name="titulo" value="<?php echo $evento['titulo']?>">
      </div>
      <div class="form-group">
        <label for="subtitulo">Subtítulo</label>
        <input class="form-control" type="text" id="subtitulo" name="subtitulo" value="<?php echo $evento['subtitulo']?>">
      </div>
      <div class="form-group">
        <label for="descricao">Descrição</label>
        <textarea class="form-control" id="descricao" name="descricao" cols="50" rows="15"><?php echo $evento['descricao']?></textarea>
      </div>
      <div class="form-group">
        <label for="onde">Onde</label>
        <input class="form-control" type="text" id="onde" name="onde" value="<?php echo $evento['onde']?>">
      </div>
      <div class="form-group">
        <label for="quando">Quando</label>
        <input class="form-control" type="date" id="quando" name="quando" value="<?php echo $evento['quando']?>">
      </div>
      <div class="form-group">
        <label for="atracoes">Atrações</label>
        <input class="form-control" type="text" id="atracoes" name="atracoes" value="<?php echo $evento['atracoes']?>">
      </div>
      <div class="form-group">
        <label for="classificacao">Classificação</label>
        <input class="form-control" type="number" id="classificacao" name="classificacao" value="<?php echo $evento['classificacao']?>">
      </div>
      <div class="form-group">
        <label for="realizacao">Realização</label>
        <input class="form-control" type="text" id="realizacao" name="realizacao" value="<?php echo $evento['realizacao']?>">
      </div>
      <div class="form-group">
        <label for="contato">Contato</label>
        <input class="form-control" type="text" id="contato" name="contato" value="<?php echo $evento['contato']?>">
      </div>
      <input type="hidden" name="id_evento" value="<?php echo $evento['id_evento']?>">
      <input type="hidden" name="action" value="editEvento">
      <button class="btn btn-primary" type="submit">Enviar</button>
    </form>
  </div>
</div>


