<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post</title>
    <link rel="stylesheet" href="lib/bootstrap/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php
                    include 'includes/topo.php';
                ?>
            </div>
        </div>
        <div class="row" style="min-height:500px;">
            <div class="col-md-12">
                <?php include 'includes/menu.php'; ?>
            </div>
            <div class="col-md-10" style="padding-top:50px;">
                <h2>Página teste includes</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <?php include 'includes/rodape.php' ?>
            </div>
        </div>
    </div>
    <script src="lib/bootstrap/js/bootstrap.min.js"></script>    
</body>
</html>