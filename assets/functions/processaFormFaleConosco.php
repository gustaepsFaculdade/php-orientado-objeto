<?php
  require_once __DIR__.'/../extensions/StringFormats.php';
  require_once __DIR__.'/../../controllers/FaleConoscoController.php';

  if ($_SERVER["REQUEST_METHOD"] != "POST")
    return;

  $stringFormats = new StringFormats();
  $faleConoscoController = new FaleConoscoController();

  $nome = $_POST['txtnome']; 
  $email = $_POST['txtemail'];
  $telefone = $stringFormats->RemoverCaracteresEspeciais($_POST['txtfone']);
  $documentoFederal = $stringFormats->RemoverCaracteresEspeciais($_POST['txtdocumento']);
  $motivoContatoID = formatarMotivo($_POST['selmotivo'] ?? '');
  $comentario = formatarMotivo($_POST['txacomentario'] ?? '');

  $faleConoscoController->Inserir(
    $nome,
    $email,
    $telefone,
    $documentoFederal,
    $motivoContatoID,
    $comentario
  );

  header("Location: ../../html/faleConosco.php");
  exit;

  function formatarMotivo($motivo) {
    return $motivo != '' ? $motivo : null;
  }
?>