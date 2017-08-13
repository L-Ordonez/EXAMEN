<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <title>Ventana inicial</title>
        <style type="text/css">
            table {
                border-collapse: collapse;
            }
            table, th, td {
                border: 1px solid grey;
            }
            td {
                padding: 5px;
            }
        </style>
    </head>
    <body>
        <table>
            <tr>
                <td colspan="5">
                    <?php
                    echo form_open();
                    echo form_input($email);
                    echo form_submit($submit_query);
                    echo form_close();
                    ?></td>
            </tr>
            <tr>
                <td>Nombre</td>
                <td>Correo</td>
                <td>Posición</td>
                <td>Salario</td>
                <td>&nbsp;</td>
            </tr>
            <?php
            if (count($employees)) {
                foreach ($employees as $employee) {
                    echo '<tr>';
                    echo '<td>' . $employee['name'] . '</td>';
                    echo '<td>' . $employee['email'] . '</td>';
                    echo '<td>' . $employee['position'] . '</td>';
                    echo '<td>' . $employee['salary'] . '</td>';
                    echo '<td>' . anchor('main/detalle/' . $employee['id'], 'Ver detalles', 'title="Ver detalles"') . '</td>';
                    echo '</tr>';
                }
            } else {
                echo '<tr><td colspan="4">Busqueda sin resultados</td></tr>';
            }
            ?>
        </table>
        <br><hr><br>
        <?php echo form_open('main/xml'); ?>
        <table>
            <tr>
                <td colspan="2">Consulta por XML</td>
            </tr>
            <tr>
                <td>Salario mínimo:</td>
                <td><?php echo form_input($min_salary); ?></td>
            </tr>
            <tr>
                <td>Salario máximo:</td>
                <td><?php echo form_input($max_salary); ?></td>
            </tr>
            <tr>
                <td colspan="2"> <?php echo form_submit($submit_xml); ?></td>
            </tr>
        </table>
        <?php echo form_close(); ?>
    </body>
</html>