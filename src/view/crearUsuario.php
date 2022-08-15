<head>
    <title>Registrar Usuario:</title>
</head>

<body>
    <form action="/usuarios/create" method="POST">
        <input name="username" placeholder="Nombre de usuario" type="text">
        <input name="nombrecompleto" placeholder="Nombre completo" type="text">
        <input name="pass" placeholder="Password" type="text">
        <input name="email" placeholder="Email" type="text">
        <input type="submit" value="Enviar">
    </form>

</body>