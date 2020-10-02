<?php
require_once('conex.php');

if (isset($_GET["keyword"])) {
    $sqlQuery = "SELECT DISTINCT
                registrardatosaplicativo.id,
                registrardatosaplicativo.nombre,
                tipodeaplicacion.tipoaplicativo 
            FROM
                usabilidad
                INNER JOIN registrardatosaplicativo ON usabilidad.aplicativo = registrardatosaplicativo.id
                INNER JOIN tipodeaplicacion ON registrardatosaplicativo.tipoaplicativo = tipodeaplicacion.id 
            WHERE
                usabilidad.aplicativo = registrardatosaplicativo.id 
                AND registrardatosaplicativo.tipoaplicativo = tipodeaplicacion.id 
                AND registrardatosaplicativo.nombre LIKE '% " . $_GET["keyword"] . " %'";
} else {
    $sqlQuery = "SELECT DISTINCT
                    registrardatosaplicativo.id,
                    registrardatosaplicativo.nombre,
                    tipodeaplicacion.tipoaplicativo 
                FROM
                    usabilidad
                    INNER JOIN registrardatosaplicativo ON usabilidad.aplicativo = registrardatosaplicativo.id
                    INNER JOIN tipodeaplicacion ON registrardatosaplicativo.tipoaplicativo = tipodeaplicacion.id 
                WHERE
                    usabilidad.aplicativo = registrardatosaplicativo.id 
                    AND registrardatosaplicativo.tipoaplicativo = tipodeaplicacion.id";
}

$result = mysqli_query($conn, $sqlQuery);

foreach ($result as $row) {
?>
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <a href="app.php?id=<?= $row['id'] ?>" style="text-decoration:none">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">

                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1"><?= $row['tipoaplicativo'] ?></div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $row['nombre'] ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
<?php

}
