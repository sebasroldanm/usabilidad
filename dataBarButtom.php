<?php
require_once('conex.php');
header('Content-Type: application/json');


$sqlQuery = "SELECT
registrardatosaplicativo.id, 
registrardatosaplicativo.nombre, 
usabilidad.calcularusabilidad
FROM
usabilidad
INNER JOIN
registrardatosaplicativo
ON 
	usabilidad.aplicativo = registrardatosaplicativo.id
WHERE
usabilidad.aplicativo = registrardatosaplicativo.id
ORDER BY
registrardatosaplicativo.id";

$result = mysqli_query($conn, $sqlQuery);

$cambio = 'cambio';

$data = array();
foreach ($result as $row) {
	$data[] = $row;
}

$id = [];
$apps = [];
$calculos = [];
$json = [];
$jsonId = 1;
$last;

$id = $data[0]['id'];
$jsonInterno['nombre'] = $data[0]['nombre'];
$suma = $data[0]['calcularusabilidad'];
$contador = 1;

for ($i = 1; $i < count($data); $i++) {
	if ($data[$i]['id'] != $data[$i - 1]['id']) {
		$jsonInterno['id'] = $jsonId;
		$jsonInterno['calculo'] = round($suma / $contador, 3);
		$json[] = $jsonInterno;
		$jsonInterno['nombre'] = $data[$i]['nombre'];
		$jsonId++;
		$last = $i;
		$suma = 0;
		$contador = 0;
	} else {
		$suma = $suma + $data[$i]['calcularusabilidad'];
		$contador++;
	}
}

$jsonInterno['id'] = $jsonId;
// $jsonInterno['nombre'] = $data[$last]['nombre'];
$jsonInterno['calculo'] = round($suma / $contador, 3);
$json[] = $jsonInterno;


echo json_encode($json);

mysqli_close($conn);
