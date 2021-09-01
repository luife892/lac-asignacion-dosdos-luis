<?php

$file = json_decode(file_get_contents('experiencia.json'));



?>
<!DOCTYPE html>
<head> Curriculum </head>
<body>
<h2>Curriculum</h2> 
<a href="index.html"><input type="submit" value="registro"> </a>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Empresa</th>
                        <th>Fecha de inicio</th>
                        <th>Fecha de salida</th>
                        <th>cargo</th>
                        <th>descripción</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($file as $key => $reg) : ?>
                        <tr>
                            <td><?= $key + 1 ?></td>
                            <td><?= $reg->nombreempresa ?></td>
                            <td><?= $reg->inicio ?></td>
                            <td><?= $reg->salida ?></td>
                            <td><?= $reg->Puesto ?> </td>
                            <td><?= $reg->descripcion?></td></td>
                            </tr>
                    </tr> 
                    <?php endforeach; ?>
                </tbody>
            </table>
</body>
</html>