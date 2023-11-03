<?php 
session_start();
include 'header.php';
include_once 'includes/evento.php';
$eventos = new Evento();
$array = $eventos->getAllEventos();
// print_r($array);exit;
// $classificacao = $array['classificacao'] . '+';
// $posicao_images = strstr($array['imagem'], "images");
// $caminho_relativo = substr($posicao_images, strpos($posicao_images, "images"));
// $contato = $formatted_telefone = '(' . substr($array['contato'], 0, 2) . ') ' . substr($array['contato'], 2, 1) . ' ' . substr($array['contato'], 3, 4) . '-' . substr($array['contato'], 7, 4);
?>
<body>
  <div class="container">
    <div class="box-inicial">
      <h1>Eventos Bahia</h1>
      <p>Segue abaixo todos os eventos na Bahia</p>
    </div>
    <div class="row">
      <?php foreach($array as $evento):
        $posicao_images = strstr($evento['imagem'], "images");
        $caminho_relativo = substr($posicao_images, strpos($posicao_images, "images"));
      ?>
      <div class="col-lg-4 col-sm-6">
        <div class="thumbnail">
          <div class="img-container">
            <img src="<?php echo $caminho_relativo?>" alt="Imagem Evento" class="image">
            <div class="overlay">
             <p class="caption"><a href="evento.php?id_evento=<?php echo $evento['id_evento'];?>"> Saiba mais <i class="fa fa-search" aria-hidden="true"></i></a>
            </p>
            </div>
          </div>
        </div>
      </div>
      <?php endforeach;?>
    </div>
  </div>
  <script src="script/bootstrap.js"></script>
</body>
</html>