<?php
include_once "connection.php";

//consultar no banco de dados
$sql_veiculo = "SELECT veiculos.id_veiculo,veiculos.modelo,veiculos.cor,veiculos.ano,veiculos.placa,status.descricao FROM `veiculos`,status WHERE veiculos.id_status = status.id_status ORDER BY id_veiculo";
$resultado_veiculo = mysqli_query($conn, $sql_veiculo);

if (($resultado_veiculo) and ($resultado_veiculo->num_rows != 0)) {

?>
	<table class="table table-striped table-bordered table-hover ">
		<thead class="thead-dark">
			<tr>
				<th>ID</th>
				<th>Modelo</th>
				<th>Cor</th>
				<th>Ano</th>
				<th>Placa</th>
				<th>Status</th>
				<th style="width: 15%;">Editar/Excluir</th>

			</tr>
		</thead>
		<tbody>
			<?php
			while ($row_veiculo = mysqli_fetch_assoc($resultado_veiculo)) {
			?>
				<td><?php echo $row_veiculo['id_veiculo']; ?></td>
				<td><?php echo $row_veiculo['modelo']; ?></td>
				<td><?php echo $row_veiculo['cor']; ?></td>
				<td><?php echo $row_veiculo['ano']; ?></td>
				<td><?php echo $row_veiculo['placa']; ?></td>
				<td><?php echo $row_veiculo['descricao']; ?></td>
				<td style="width: 15%;"><button style="margin-right: 4%;" class="btn btn-secondary btn-sm" onClick="open_win_editar(<?php echo $row_veiculo['id_veiculo']; ?>,1)">Alterar</button><button class="btn btn-danger btn-sm" onClick="open_win_editar(<?php echo $row_veiculo['id_veiculo']; ?>,2)">excluir</button></td>
				</tr>
			<?php
			} ?>
			<script>
				function open_win_editar(targetID, operationID) {
					if (operationID == 1) {
						window.open("alterarVeiculo.php?id_veiculo=" + targetID + "&id_operacao=" + operationID, "Editar veiculo", "location=1, status=1, scrollbars=1, width=1000, height=600");
					}
					if (operationID == 2) {

						if (confirm("Certeza que deseja deletar o véiculo de ID "+targetID+"?" )) {
							window.open("alterarVeiculo.php?id_veiculo=" + targetID + "&id_operacao=" + operationID);
						}

					}

				}
			</script>
		</tbody>
	</table>
<?php
} else {
	echo "<div class='alert alert-danger' role='alert'>Nenhum veiculo encontrado!</div>";
}
?>