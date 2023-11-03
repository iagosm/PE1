<?php 
session_start();
include 'header.php';
include_once 'includes/evento.php';
$eventos = new Evento();
$eventos->verificaActionGet();
$dados = $eventos->getAllEventos();
?>
<div class="container">
  <a href="action_evento.php" id="add-event">Adicionar</a>
  <div class="row mt-5">
    <table>
      <tr>
        <th>Imagem</th>
        <th>Nome Evento</th>
        <th>Contato</th>
        <th>Ações</th>
      </tr>
      <?php foreach ($dados as $linha): 
        $posicao_images = strstr($linha['imagem'], "images");
        $caminho_relativo = substr($posicao_images, strpos($posicao_images, "images")); ?>
        <tr class="border">
          <td><img src="<?php echo $caminho_relativo; ?>" alt="" width="100"></td>
          <td><?php echo $linha['titulo']; ?></td>
          <td><?php echo $linha['contato']; ?></td>
          <td>
            <div class="tabela-actions">
              <a href="edit_evento.php?id_evento=<?php echo $linha['id_evento'];?>">Editar</a>
              <a href="tabela.php?id_evento=<?php echo $linha['id_evento'];?>">Excluir</a>
            </div>
          </td>
        </tr>
      <?php endforeach; ?>
    </table>
  </div>
</div>


