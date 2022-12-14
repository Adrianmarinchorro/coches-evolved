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
<head>
    <tittle>Filtrar por marca:</tittle>
</head>
<body>
    <form action="/coches/filter" method="POST">
        <input name="marca" placeholder="Marca" type="text">
        <input type="submit" value="Filtrar">
    </form>
</body>
<table>
    <tr>
        <th>Id</th>
        <th>Marca</th>
        <th>Modelo</th>
        <th>Color</th>
        <th>Matrícula</th>
        <th>Acciones</th>
    </tr>

    <?php
    foreach ($rowset as $row) :
    ?>
        <tr>
            <td><?php echo  $row->getId() ?></td>
            <td><?php echo  $row->getMarca() ?></td>
            <td><?php echo  $row->getModelo() ?></td>
            <td><?php echo  $row->getColor() ?></td>
            <td><?php echo  $row->getMatricula() ?></td>
            <td>
                <a href="/coches/<?php echo  $row->getId() ?>" style="background-color:green;color:white;cursor:pointer">Ver Coche</a>
                <a href="/coches/delete/<?php echo  $row->getId() ?>" style="background-color:red;color:white;cursor:pointer">Eliminar</a>
            </td>
        </tr>
    <?php
    endforeach;
    ?>
</table>
<hr>
<a href="/coches/create" style="background-color:orange;color:white;cursor:pointer">Crear nuevo coche</a>