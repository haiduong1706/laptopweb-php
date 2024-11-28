<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Laptop-Store</title>
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" />
    <link rel="stylesheet" href="css/style.css?v=<?php echo time(); ?>">
    <script src="script.js"></script>
</head>
<body>
    <?php
      session_start();
    include("admincp/config/config.php");
    include("pages/header.php");
    include("pages/menu.php");
    ?>
    <div class="container-fluid">
        <div class="row">
            <?php
            include("pages/main.php");
            ?>
        </div>
    </div>
    <?php
    include("pages/footer.php");
    ?>
</body>

</html>