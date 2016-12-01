<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" CONTENT="noindex,nofollow">
    <title><?php echo $template['title']; ?></title>
    <?php echo $template['metadata']; ?>
    <?php include('css.php'); ?>
</head>
<body class="nav-md">
<div class="container body">
    <div class="main_container">
        <?php include('nav.php'); ?>

        <!-- top navigation -->
        <?php include('top_nav.php'); ?>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
            <?php echo $template['body']; ?>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <?php include('footer.php'); ?>
        <!-- /footer content -->
    </div>
</div>
<?php include('js.php'); ?>
</body>
</html>