<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="views/css/index.css">
    <title>Clients</title>
</head>
<body>
    <a class="button btn-back" href="index.php">Back</a>
    <h1>Clients config</h1>
    <div class="content">
        <form action="index.php" method="POST">
            <div class="input-box">
                <label for="name">Name:</label>
                <input class="input" type="text" placeholder="Write a name to client" value="<?= isset($resultData[0]['name']) ? $resultData[0]['name'] : '' ?>" name="name" required>
            </div>
            <br><br>
            <div class="input-box">
                <label for="email">Email:</label>
                <input class="input" type="email" placeholder="Write a email to client" value="<?= isset($resultData[0]['email']) ? $resultData[0]['email'] : '' ?>" name="email" required>
            </div>
            <br><br>
            <div class="input-box">
                <label for="phone">Phone:</label>
                <input class="input" type="number" placeholder="Write a phone to client" value="<?= isset($resultData[0]['phone']) ? $resultData[0]['phone'] : '' ?>" name="phone" required>
            </div>
            <br><br>
            <input type="hidden" name="a" value="<?= isset($resultData[0]['id']) ? 'edit' : 'new' ?>">
            <input type="hidden" name="id" value="<?= isset($resultData[0]['id']) ? $resultData[0]['id'] : '' ?>">
            <input class="button btn-search" type="submit" name="submit" value="Submit">
        </form>
    </div>
</body>
</html>