<?php
require_once ('conex.php');
header('Content-Type: application/json');


$sqlQuery = "SELECT
eficiencia.calculoderelevancia AS CalculoEficiencia, 
eficacia.calculoderelevancia AS CalculoEficacia, 
memorabilidad.calculoderelevancia AS CalculoMemorbilidad, 
productividad.calculoderelevancia AS CalculoProductividad, 
satisfaccion.calculoderelevancia AS CalculoSatisfaccion, 
seguridad.calculoderelevancia AS CalculoSeguridad, 
universabilidad.calculoderelevancia AS CalculoUniversabilidad, 
cargacognitiva.calculoderelevancia AS CalculoCognitia
FROM
usabilidad
INNER JOIN
eficiencia
ON 
	usabilidad.eficiencia = eficiencia.id
INNER JOIN
eficacia
ON 
	usabilidad.eficacia = eficacia.id
INNER JOIN
memorabilidad
ON 
	usabilidad.memorabilidad = memorabilidad.id
INNER JOIN
productividad
ON 
	usabilidad.productividad = productividad.id
INNER JOIN
satisfaccion
ON 
	usabilidad.satisfaccion = satisfaccion.id
INNER JOIN
seguridad
ON 
	usabilidad.seguridad = seguridad.id
INNER JOIN
universabilidad
ON 
	usabilidad.universabilidad = universabilidad.id
INNER JOIN
cargacognitiva
ON 
	usabilidad.cargacognitiva = cargacognitiva.id
WHERE
usabilidad.aplicativo = ".$_GET["id"]." AND
usabilidad.eficiencia = eficiencia.id AND
usabilidad.eficacia = eficacia.id AND
usabilidad.memorabilidad = memorabilidad.id AND
usabilidad.productividad = productividad.id AND
usabilidad.satisfaccion = satisfaccion.id AND
usabilidad.seguridad = seguridad.id AND
usabilidad.universabilidad = universabilidad.id AND
usabilidad.cargacognitiva = cargacognitiva.id";

$result = mysqli_query($conn,$sqlQuery);

$data = array();
foreach ($result as $row) {
	$data[] = $row;
}

// array_sum($data[0], $data[1]);

$id = 1;
$label = ['Eficiencia', 'Eficacia', 'Memorbilidad', 'Productividad', 'Satisfacción', 'Seguridad', 'Universabilidad', 'Cognitiva'];
$ident = ['CalculoEficiencia', 'CalculoEficacia', 'CalculoMemorbilidad', 'CalculoProductividad', 'CalculoSatisfaccion', 'CalculoSeguridad', 'CalculoUniversabilidad', 'CalculoCognitia'];

$Eficiencia = 0;
$Eficacia = 0;
$Memorbilidad = 0;
$Productividad = 0;
$Satisfacción = 0;
$Seguridad = 0;
$Universabilidad = 0;
$Cognitiva = 0;


for ($i=0; $i < count($data); $i++) { 
	$Eficiencia = $Eficiencia + $data[$i]['CalculoEficiencia'];
}
for ($i=0; $i < count($data); $i++) { 
	$Eficacia = $Eficacia + $data[$i]['CalculoEficacia'];
}
for ($i=0; $i < count($data); $i++) { 
	$Memorbilidad = $Memorbilidad + $data[$i]['CalculoMemorbilidad'];
}
for ($i=0; $i < count($data); $i++) { 
	$Productividad = $Productividad + $data[$i]['CalculoProductividad'];
}
for ($i=0; $i < count($data); $i++) { 
	$Satisfacción = $Satisfacción + $data[$i]['CalculoSatisfaccion'];
}
for ($i=0; $i < count($data); $i++) { 
	$Seguridad = $Seguridad + $data[$i]['CalculoSeguridad'];
}
for ($i=0; $i < count($data); $i++) { 
	$Universabilidad = $Universabilidad + $data[$i]['CalculoUniversabilidad'];
}
for ($i=0; $i < count($data); $i++) { 
	$Cognitiva = $Cognitiva + $data[$i]['CalculoCognitia'];
}


// var_dump(count($data));

$datos = [
	[
		'student_id' => 1,
		'student_name' => 'Eficiencia',
		'marks' => round($Eficiencia/count($data), 3)
	],
	[
		'student_id' => 2,
		'student_name' => 'Eficacia',
		'marks' => round($Eficacia/count($data), 3)
	],
	[
		'student_id' => 3,
		'student_name' => 'Memorbilidad',
		'marks' => round($Memorbilidad/count($data), 3)
	],
	[
		'student_id' => 4,
		'student_name' => 'Productividad',
		'marks' => round($Productividad/count($data), 3)
	],
	[
		'student_id' => 5,
		'student_name' => 'Satisfacción',
		'marks' => round($Satisfacción/count($data), 3)
	],
	[
		'student_id' => 6,
		'student_name' => 'Seguridad',
		'marks' => round($Seguridad/count($data), 3)
	],
	[
		'student_id' => 7,
		'student_name' => 'Universabilidad',
		'marks' => round($Universabilidad/count($data), 3)
	],
	[
		'student_id' => 8,
		'student_name' => 'Cognitiva',
		'marks' => round($Cognitiva/count($data), 3)
	]
];

echo json_encode($datos);

mysqli_close($conn);

// echo json_encode($data);
