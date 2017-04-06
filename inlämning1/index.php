<?php
    require("unicorns.php");

    $unicornHelper = new UnicornHelper();

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Unicorns lookup</title>
    <link href="vendor/twbs/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="vendor/twbs/bootstrap/dist/css/bootstrap-theme.min.css" rel="stylesheet">
    <link href="main.css" rel="stylesheet">
  </head>
  <body>
    <div class="sitewidth">
      <h1>Unicorns lookup</h1>
      <form action="index.php" method="get" id="formindex">
              <label for="name">ID: </label>
              <input type="text" name="id" class="form-control">
        </form>
        <input type="submit" value="Go to unicorn" class="btn btn-success" form="formindex">
        <input type="button" onclick="location.href='index.php';" class="btn btn-primary" value="Go to list" />

        <?php
        $foundUnicorn = false;

        if(isset($_GET['id'])) {
            $id = $_GET["id"];
            $response = $unicornHelper->getUnicorn($id);
            if($response->code == 200 && $id != "") {
              $foundUnicorn = true;
              $unicorn = $response->body;
              echo UnicornHelper::generateUnicornDetails($unicorn->name,
                $unicorn->description, $unicorn->reportedBy,
                $unicorn->spottedWhen->date, $unicorn->image);
          }
        }
        if($foundUnicorn == false) {
          if(isset($_GET['id'])) {
            echo "<p class='bg-danger'>Could not found unicorn with id: $id </p>";
          }
          foreach ($unicornHelper->getUnicorns() as $unicorn) {
            echo UnicornHelper::generateUnicornOneline($unicorn->id, $unicorn->name, $unicorn->details);
          }
        }
        ?>
      <form>
    </div>
  </body>
</html>
