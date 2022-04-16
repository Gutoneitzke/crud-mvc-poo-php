<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="views/css/index.css">
    <title>Clients | GN</title>
</head>
<body>
    <?php if(!empty($returnMessage)): ?>
        <p><?= $returnMessage ?></p>
        <button onclick="reload()">x</button>
    <?php endif; ?>
    <h1>Clients List | GN</h1>
    <form action="index.php">
        <input type="search" name="search" placeholder="Pesquisar">
        <input type="hidden" name="a" value="search">
        <input type="submit" name="submit" value="Submit">
    </form>
    <a href="./index.php?a=goToNew">New client</a>
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
                            <a href="./index.php?a=search&v=editCreate&search=<?= $data['id'] ?>">Editar</a>
                            <a href="./index.php?a=delete&id=<?= $data['id'] ?>">Deletar</a> 
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
<script>
    function reload()
    {
        window.location.replace('index.php');
    }
</script>
</html>