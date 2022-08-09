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
        <th>Marca</th>
        <th>Modelo</th>
        <th>Color</th>
        <th>Matrícula</th>
    </tr>

    <tr>
        <td><?php echo  $row->getMarca() ?></td>
        <td><?php echo  $row->getModelo() ?></td>
        <td><?php echo  $row->getColor() ?></td>
        <td><?php echo  $row->getMatricula() ?></td>
    </tr>

</table>

<a href="/" style="background-color:green;color:white;cursor:pointer">Volver</a>