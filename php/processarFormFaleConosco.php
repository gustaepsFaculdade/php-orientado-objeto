<?php
	include("../models/connections/mysql.php");
  
  if ($_SERVER["REQUEST_METHOD"] != "POST")
    return;

  $nome = $_POST['txtnome'];
  $email = $_POST['txtemail'];
  $telefone = removerCaracteresEspeciais($_POST['txtfone']);
  $documentoFederal = removerCaracteresEspeciais($_POST['txtdocumento']);
  $idMotivo = formatarMotivo($_POST['selmotivo'] ?? '');
  $comentario = formatarMotivo($_POST['txacomentario'] ?? '');

  $stmt = $conn->prepare("
    INSERT INTO FaleConosco
      (Nome, DocumentoFederal, Telefone, Email, MotivoContatoID, Comentario)
    VALUES (?, ?, ?, ?, ?, ?)
  ");

  $stmt->bind_param("ssssss", $nome, $documentoFederal, $telefone, $email, $idMotivo, $comentario);
  $stmt->execute();

  header("Location: ../html/faleConosco.php");
  exit;

  function removerCaracteresEspeciais($texto) {
    if ($texto == '')
      return '';

      return preg_replace('/[^a-zA-Z0-9]/', '', $texto);
  }

  function formatarMotivo($motivo) {
    return $motivo != '' ? $motivo : null;
  }
?>