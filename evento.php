<?php 
session_start();
include 'header.php';
include_once 'includes/evento.php';
$eventos = new Evento();
$array = $eventos->getEvento();
$classificacao = $array['classificacao'] . '+';
$posicao_images = strstr($array['imagem'], "images");
$caminho_relativo = substr($posicao_images, strpos($posicao_images, "images"));
$contato = $formatted_telefone = '(' . substr($array['contato'], 0, 2) . ') ' . substr($array['contato'], 2, 1) . ' ' . substr($array['contato'], 3, 4) . '-' . substr($array['contato'], 7, 4);
$data = date('d/m/Y', strtotime($array['quando']));
?>
<body>
  <div class="container">
    <a href="index.php" id="getAllEventos">Voltar</a>
    <div class="row mt-4">
      <div class="col-lg-12 col-sm-12">
        <div class="box-inicial-evento">
          <img src="<?php echo $caminho_relativo?>" alt="Capa Evento" class="capa-evento">
          <h1><?php echo $array['titulo'];?></h1>
          <p><?php echo $array['subtitulo'];?></p>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-12 container-evento-info">
        <div class="evento-descricao mt-5">
          <h3>Descrição:</h3>
          <p><?php echo $array['descricao']; ?></p>
        </div>
        <div class="evento-servico mt-5">
          <h3>Serviço:</h3>
          <div class="servico-info">
            <span class="servico-pergunta">Onde:</span>
            <span class="servico-resposta"><?php echo $array['onde']?></span>
          </div>
          <div class="servico-info">
            <span class="servico-pergunta">Quando:</span>
            <span class="servico-resposta"><?php echo $data?></span>
          </div>
          <div class="servico-info">
            <span class="servico-pergunta">Atrações:</span>
            <span class="servico-resposta"><?php echo $array['atracoes']?></span>
          </div>
          <div class="servico-info">
            <span class="servico-pergunta">Classificação:</span>
            <span class="servico-resposta"><?php echo $classificacao?></span>
          </div>
          <div class="servico-info">
            <span class="servico-pergunta">Realização:</span>
            <span class="servico-resposta"><?php echo $array['realizacao']?></span>
          </div>
          <div class="servico-info">
            <span class="servico-pergunta">Contato:</span>
            <span class="servico-resposta"><?php echo $contato?></span>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="script/bootstrap.js"></script>
</body>
</html>