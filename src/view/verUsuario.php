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

<h1>Usuario:</h1>
<table>
    <tr>
        <th>Id</th>
        <th>Username</th>
        <th>Nombre completo</th>
        <th>Pass</th>
        <th>Email</th>
        <th>Estado</th>
    </tr>

    <form action="/usuarios/modify/<?php echo $row->getId() ?>" method="POST">
        <tr>
        <td><?php echo  $row->getId() ?></td>
            <td> <input name="username" type="text" value="<?php echo  $row->getUsername() ?>"></td>
            <td> <input name="nombrecompleto" type="text" value="<?php echo  $row->getNombreCompleto() ?>"></td>
            <td> <input name="pass" type="password" value="<?php echo  $row->getPass() ?>"></td>
            <td> <input name="email" type="text" value="<?php echo  $row->getEmail() ?>"></td>
            <td> <input name="estado" type="text" value="<?php echo  $row->getEstado() ?>"></td>
        </tr>
        <input type="submit" value="Modificar">
    </form>


</table>

<a href="/usuarios" style="background-color:green;color:white;cursor:pointer">Volver</a>