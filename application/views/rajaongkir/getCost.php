<?php

$curl = curl_init();
curl_setopt_array($curl, array(
	CURLOPT_URL => "http://api.rajaongkir.com/starter/cost",
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_ENCODING => "",
	CURLOPT_MAXREDIRS => 10,
	CURLOPT_TIMEOUT => 30,
	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	CURLOPT_CUSTOMREQUEST => "POST",
	CURLOPT_POSTFIELDS => "origin=$origin&destination=$destination&weight=$berat&courier=$courier",
	CURLOPT_HTTPHEADER => array(
		"content-type: application/x-www-form-urlencoded",
		"key:de165a5fee5c57bdf60f76faefc710c6"
	),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);
if ($err) {
	echo "cURL Error #:" . $err;
} else {
	$data = json_decode($response, true);
}
?>

<?= "&nbsp;&nbsp;&nbsp;From " . $data['rajaongkir']['origin_details']['city_name']; ?> To <?= $data['rajaongkir']['destination_details']['city_name']; ?> @<?= $berat; ?> gram Courier : <?= strtoupper($courier); ?>
<?php for ($k = 0; $k < count($data['rajaongkir']['results']); $k++) : ?>
	<div title="<?= strtoupper($data['rajaongkir']['results'][$k]['name']); ?>" style="padding:10px">
		<table class="table table-striped table-border table-hover">
			<tr class="table-primary">
				<th>No.</th>
				<th>Tipe Layanan</th>
				<th>Estimasi</th>
				<th>Harga</th>
			</tr>
			<?php for ($l = 0; $l < count($data['rajaongkir']['results'][$k]['costs']); $l++) : ?>
				<tr>
					<td><?= $l + 1; ?></td>
					<td>
						<div style="font:bold 16px Arial"><?= $data['rajaongkir']['results'][$k]['costs'][$l]['service']; ?></div>
						<div style="font:normal 11px Arial"><?= $data['rajaongkir']['results'][$k]['costs'][$l]['description']; ?></div>
					</td>
					<td align="left">&nbsp;<?= $data['rajaongkir']['results'][$k]['costs'][$l]['cost'][0]['etd']; ?> days</td>
					<td align="left"><?= number_format($data['rajaongkir']['results'][$k]['costs'][$l]['cost'][0]['value']); ?></td>
				</tr>
			<?php endfor; ?>
		</table>
	</div>
<?php endfor; ?>
