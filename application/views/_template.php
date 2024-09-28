<?php require_once('komponen/css.php'); ?>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Header Section Begin -->
    <?php require_once('komponen/navbar.php'); ?>
    <!-- Header End -->

    <!-- Hero Section Begin -->
    <?php require_once('komponen/caraousel.php'); ?>
    <!-- Hero Section End -->

    <!-- Product Section Begin -->
    <section class="product spad">
        <div class="container">
            <div class="row">
                <?= $contents;?>
            </div>
        </div>
    </section>
    <!-- Product Section End -->

    <!-- Footer Section Begin -->
    <?php require_once('komponen/footer.php'); ?>

    <!-- Search model end -->

    <!-- Js Plugins -->
    <?php require_once('komponen/js.php'); ?>

</body>

</html>