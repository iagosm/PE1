<?php
  class Evento {
 
  function __construct() {
    $host = "localhost";
    $dbname = "pe1";
    $user = "root";
    $password = "";

    try {
        $this->connection = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
        $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo "Erro de conexão: " . $e->getMessage();
        die();
    }
  }
  
  function verificaAction() {
    if(!empty($_POST)) {
      $data = filter_input_array(INPUT_POST, FILTER_DEFAULT);
      $action = !empty($data['action']) ? $data['action'] : false;
      switch ($action) {
        case 'cadEvento':
          $mensagem = $this->cadEvento($data);
          $_SESSION['mensagem'] = $mensagem;
          header("Location: action_evento.php");
          break;
        case 'editEvento':
          $mensagem = $this->editEvento($data);
          $_SESSION['mensagem'] = $mensagem;
          header("Location: tabela.php");
          break;
        default:
        $_SESSION['mensagem'] = '';
      }
    }
  }

  function verificaActionGet() {
    if(!empty($_GET)) {
      $_SESSION['mensagem'] = '';
      $id_evento = $_GET['id_evento'];
      $mensagem = $this->delEvento($id_evento);
      $_SESSION['mensagem'] = $mensagem;
    }
  }

  function img() {
    $data['imagem'] = 'error';
    if (!empty($_FILES['imagem']['name'])) {
        $targetDirectory = 'C:/wamp64/www/PE1/images/';
        $originalFileName = $_FILES['imagem']['name'];

        $extension = pathinfo($originalFileName, PATHINFO_EXTENSION);
        $newFileName = basename($originalFileName, "." . $extension) . date("dmY_His") . "." . $extension;
        $targetFile = $targetDirectory . $newFileName;

        if (move_uploaded_file($_FILES['imagem']['tmp_name'], $targetFile)) {
            $data['imagem'] = $targetFile;
        }
    }
    return $data['imagem'];
  }

  function cadEvento($data) {
    $data['imagem'] = $this->img();
    $sql = "INSERT INTO evento(titulo, subtitulo, descricao, onde, quando, atracoes, classificacao, realizacao, contato, imagem) 
    VALUES (:titulo, :subtitulo, :descricao, :onde, :quando, :atracoes, :classificacao, :realizacao, :contato, :imagem)";
    $sql = $this->connection->prepare($sql);
    $sql->bindValue(':titulo', $data['titulo']);
    $sql->bindValue(':subtitulo', $data['subtitulo']);
    $sql->bindValue(':descricao', $data['descricao']);
    $sql->bindValue(':onde', $data['onde']);
    $sql->bindValue(':quando', $data['quando']);
    $sql->bindValue(':atracoes', $data['atracoes']);
    $sql->bindValue(':classificacao', $data['classificacao']);
    $sql->bindValue(':realizacao', $data['realizacao']);
    $sql->bindValue(':contato', $data['contato']);
    $sql->bindValue(':imagem', $data['imagem']);
    $sql->execute();
    if($sql->rowCount() > 0) {
      return 'Cadastro Realizado com sucesso';
    }
    return 'Não foi possivel realizar o cadastro';
  }

  function editEvento($data) {

    $sql = "UPDATE evento SET titulo = :titulo, subtitulo = :subtitulo, descricao = :descricao, onde= :onde,
    quando = :quando, atracoes = :atracoes, classificacao = :classificacao, realizacao = :realizacao, contato = :contato 
    WHERE id_evento = :id_evento";
    $sql = $this->connection->prepare($sql);
    $sql->bindValue(':titulo', $data['titulo']);
    $sql->bindValue(':subtitulo', $data['subtitulo']);
    $sql->bindValue(':descricao', $data['descricao']);
    $sql->bindValue(':onde', $data['onde']);
    $sql->bindValue(':quando', $data['quando']);
    $sql->bindValue(':atracoes', $data['atracoes']);
    $sql->bindValue(':classificacao', $data['classificacao']);
    $sql->bindValue(':realizacao', $data['realizacao']);
    $sql->bindValue(':contato', $data['contato']);
    $sql->bindValue(':id_evento', $data['id_evento']);
    $sql->execute();
    if($sql->rowCount() > 0) {
      return 'Evento alterado com sucesso';
    }
    return 'Erro ao alterar evento';
  }

  function delEvento($idevento) {

    try {
			$idevento = intval($idevento);
			$sql = "DELETE FROM evento WHERE id_evento = '$idevento'";
			$sql = $this->connection->query($sql);
			
			if($sql->rowCount() > 0){ return 'Evento excluido com sucesso';}
		} catch (\Throwable $th) {}
    return 'Erro ao deletar evento';
  }

  function getEvento() {

    if(!empty($_GET)) {
      $id_evento = $_GET['id_evento'];
      $sql = "SELECT * FROM `evento` WHERE id_evento = '$id_evento'";
      $sql = $this->connection->query($sql);
      if($sql->rowCount() > 0) {
        return $sql->fetch(\PDO::FETCH_ASSOC);
      }
      return array();
    } else {
      header("Location: index.php");
    }
  }

  function getAllEventos() {

    $sql = "SELECT * FROM `evento`";
    $sql = $this->connection->query($sql);
    if($sql->rowCount() > 0) {
      return $sql->fetchAll(\PDO::FETCH_ASSOC);
    }
    return array();
  }
}