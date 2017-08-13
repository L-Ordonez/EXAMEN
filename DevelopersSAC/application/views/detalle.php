<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <title>Ventana de detalle</title>
        <style type="text/css">
            table {
                border-collapse: collapse;
            }
            table, th, td {
                border: 1px solid grey;
            }
        </style>
    </head>
    <body>
        <table>
            <tr>
                <td>Nombre:</td>
                <td><?php echo $employee['name']; ?></td>
            </tr>
            <tr>
                <td>Correo:</td>
                <td><?php echo $employee['email']; ?></td>
            </tr>
            <tr>
                <td>Teléfono:</td>
                <td><?php echo $employee['phone']; ?></td>
            </tr>
            <tr>
                <td>Dirección:</td>
                <td><?php echo $employee['address']; ?></td>
            </tr>
            <tr>
                <td>Posición:</td>
                <td><?php echo $employee['position']; ?></td>
            </tr>
            <tr>
                <td>Salario:</td>
                <td><?php echo $employee['salary']; ?></td>
            </tr>
            <tr>
                <td>Habilidades:</td>
                <td><?php echo implode(', ', $employee['skills']); ?></td>
            </tr>
            <tr>
                <td colspan="2"><?php echo anchor('main/', 'Inicio', 'title="Inicio"') ?></td>
            </tr>
        </table>

    </body>
</html>