<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clients | GN</title>
</head>
<body>
    <a href="index.php">Back</a>
    <h1>Clients Edit | GN</h1>
    <div class="content">
        <form action="./index.php?a=edit">
            <div class="input-box">
                <label for="name">Name:</label>
                <input type="text" placeholder="Write a name to client" value="<?= $resultData['name'] ?>" name="name" required>
            </div>
            <br><br>
            <div class="input-box">
                <label for="email">Email:</label>
                <input type="email" placeholder="Write a email to client" value="<?= $resultData['email'] ?>" name="email" required>
            </div>
            <br><br>
            <div class="input-box">
                <label for="phone">Phone:</label>
                <input type="phone" placeholder="Write a phone to client" value="<?= $resultData['phone'] ?>" name="phone" required>
            </div>
            <br><br>
            <input type="submit" name="edit" value="Submit">
        </form>
    </div>
</body>
</html>