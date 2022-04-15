<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listagem de Alunos</title>
</head>
<body>
    <h1>Clients List | GN</h1>
    <form action="index.php">
        <input type="search" name="search" placeholder="Pesquisar">
        <input type="hidden" name="a" value="search">
        <input type="submit" name="submit" value="Enviar">
    </form>
    <div class="content">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($resultData as $data): ?>
                    <tr>
                        <td> <?= $data["id"]; ?> </td>
                        <td> <?= $data["name"]; ?> </td>
                        <td> <?= $data["email"]; ?> </td>
                        <td> <?= $data["phone"]; ?> </td>
                        <td> 
                            <a href="./index.php?a=search&id=<?= $data['id'] ?>">Editar</a>
                            <a href="./index.php?a=delete&id=<?= $data['id'] ?>">Deletar</a> 
                        </td>
                        <td>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>