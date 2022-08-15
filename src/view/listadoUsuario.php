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

<h1>Listado de Usuarios</h1>
<table>
    <tr>
        <th>Id</th>
        <th>Username</th>
        <th>Nombre completo</th>
        <th>Email</th>
        <th>Estado</th>
    </tr>

    <?php
    foreach ($rowset as $row) :
    ?>

        <tr>
            <td><?php echo  $row->getId() ?></td>
            <td><?php echo  $row->getUsername() ?></td>
            <td><?php echo  $row->getNombreCompleto() ?></td>
            <td><?php echo  $row->getEmail() ?></td>
            <td><?php echo  $row->getEstado() ?></td>
            <td>
                <a href="/usuarios/<?php echo  $row->getId() ?>" style="background-color:green;color:white;cursor:pointer">Ver usuario</a>
                <a href="/usuarios/delete/<?php echo  $row->getId() ?>" style="background-color:red;color:white;cursor:pointer">Eliminar</a>
            </td>
        </tr>
    <?php
    endforeach;
    ?>
</table>
<hr>
<a href="/usuarios/create" style="background-color:orange;color:white;cursor:pointer">Crear nuevo usuario</a>