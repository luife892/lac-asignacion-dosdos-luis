<?php

$file = json_decode(file_get_contents('persona.json'));
function telFormat($tel)
{
    $code = substr($tel->numero, 0, 4);
    $first = substr($tel->numero, 4, 3);
    $sec = substr($tel->numero, 7, 2);
    $third = substr($tel->numero, 9, 2);
    $tipo = $tel->tipo == 'M' ? 'Movil' : 'Fijo';
    return "$tipo $code-$first.$sec.$third";
}

function genero($genero)
{
    $genero = [
        'm' => 'masculino',
        'f' => 'femenino',
        'n' => 'nobi',
        'p' => 'node'
    ];
    return $genero[$genero];
}

function edad($nacimiento){
    $date = $nacimiento;
    $date = date('d-M', strtotime($date));
    date_default_timezone_set('America/Caracas');
    $today =  date_create('now');
    $nacc =  date_create($nacimiento);
    $interval = date_diff($today, $nacc);
    return [$interval->format('%y'),$date];
}
?>
<!DOCTYPE html>
<head> registros data </head>
<body>
<h2>Data</h2> 
<a href="curriculum.php"><input type="submit" value="curriculum"> </a>
<a href="index.html"><input type="submit" value="registro"> </a>
</html>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nombre</th>
                        <th>DNI</th>
                        <th>Fecha de Nacimiento</th>
                        <th>Edad</th>
                        <th>Telefono</th>
                        <th>Genero</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($file as $key => $reg) : ?>
                        <tr>
                            <td><?= $key + 1 ?></td>
                            <td><?= $reg->nombre ?></td>
                            <td><?= $reg->dni ?></td>
                            <td><?= edad($reg->fecha_nacimiento)[1] ?></td>
                            <td><?= edad($reg->fecha_nacimiento)[0] ?></td></td>
                            <td><?= telFormat($reg->telefono) ?></td>
                        </tr>
                            <td><i class="fas fa-<?= genero($reg->genero) ?>"></i>
                    </tr> 
                    <?php endforeach; ?>
                </tbody>
            </table>
</body>
</html>
