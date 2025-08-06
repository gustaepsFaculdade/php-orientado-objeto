<?php
	include("../models/connections/mysql.php");
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Prática 1 HTML e CSS</title>
	<link rel="stylesheet" type="text/css" href="../assets/style/site.css">
	<script type="text/javascript" src="../assets/js/index.js" defer></script>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
	<header>
		<img src="../assets/imgs/logo.png" alt="Logo da página" title="Logo da página">
		<h1>Geladeiras e Freezers</h1>
	</header>
	<nav>
		<a href="index.php"><div class="opcao">Início</div></a>
		<a href="produtos.php"><div class="opcao">Geladeiras e Freezers</div></a>
		<a href="faleConosco.php"><div class="opcao">Fale conosco</div></a>
	</nav> 
	<section>
		<form action="../php/remover.php" id="formListaFaleConosco" name="formListaFaleConosco" method="POST">
			<h2>Conheça nossos produtos!!!</h2>
			<table class="tabelaProdutos">
				<thead>
					<tr>
						<th  colspan="7" class="tituloTabela">Filmes</th>
					</tr>
					<tr>
						<th>Nome</th>
						<th>Documento federal</th>
						<th>Telefone</th>
						<th>E-mail</th>
						<th>Motivo contato</th>
						<th>Comentário</th>
						<th>Remover</th>
					</tr>
				</thead>
					<tbody>

					<?php
					
						$sql = "SELECT
									fc.ID,
									fc.Nome,
									fc.DocumentoFederal,
									fc.Telefone,
									fc.Email,
									mc.Mensagem,
									fc.Comentario
								FROM
									faleconosco fc
								LEFT JOIN motivocontato mc
									ON fc.MotivoContatoID = mc.ID";

						$result = mysqli_query($conn, $sql);

						if (mysqli_num_rows($result) > 0) {
							while ($row = mysqli_fetch_assoc($result)) {
								echo "<tr>";

								echo "<td>".$row["Nome"]."</td>";
								echo "<td>".formatarDocumento($row["DocumentoFederal"])."</td>";
								echo "<td>".formatarTelefone($row["Telefone"])."</td>";
								echo "<td>".$row["Email"]."</td>";
								echo "<td>".$row["Mensagem"]."</td>";
								echo "<td>".$row["Comentario"]."</td>";
								echo '<th><button onclick="RemoverProduto('.$row['ID'].')">Excluir</button></th>';

								echo "</tr>";
							}
						}
						
						mysqli_close($conn);
						
						function formatarDocumento($documento) {
							return preg_replace('/(\d{3})(\d{3})(\d{3})(\d{2})/', '$1.$2.$3-$4', $documento);
						}

						function formatarTelefone($telefone) {
							$telefone = preg_replace('/\D/', '', $telefone);
							return preg_replace('/(\d{2})(\d{1})(\d{4})(\d{4})/', '($1) $2 $3-$4', $telefone);
						}
					
					?>
						
					</tbody>
			</table>
		</form>   
	</section>
	<footer>Copyright &copy; ADS2025</footer>
</body>
</html>