<!doctype html>
<html>
    <head>
        <title>Example form</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
    <body>
        <h1>Thank You!</h1>
        <p><b>Name:</b> <?php echo $_POST["name"]; ?></p>
        <p><b>Age:</b> <?php echo $_POST["age"]; ?></p>
        <p><b>Email:</b> <?php echo $_POST["email"]; ?></p>
        <input type="button" onClick="location.href = 'index.html'" value="Go back to form!" class="btn btn-warning">
</body>
</html>
