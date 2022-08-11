<style>
    th {
        width: 8rem;
        text-align: left;
        border-bottom: 1px solid black;
    }

    td {
        width: 8rem;
    }
</style>

<h1>Listado de Coches</h1>
<table>
    <tr>
        <th>Id</th>
        <th>Marca</th>
        <th>Modelo</th>
        <th>Color</th>
        <th>Matrícula</th>
    </tr>

    <form action="/modifyCoche/<?php echo $row->getId() ?>" method="POST">
        <tr>
        <td><?php echo  $row->getId() ?></td>
            <td> <input name="marca" type="text" value="<?php echo  $row->getMarca() ?>"></td>
            <td> <input name="modelo" type="text" value="<?php echo  $row->getModelo() ?>"></td>
            <td> <input name="color" type="text" value="<?php echo  $row->getColor() ?>"></td>
            <td> <input name="matricula" type="text" value="<?php echo  $row->getMatricula() ?>"></td>
        </tr>
        <input type="submit" value="Modificar">
    </form>


</table>

<a href="/" style="background-color:green;color:white;cursor:pointer">Volver</a>