<!DOCTYPE html>
<html>
<head>

</head>
<body>
    <section id="primary-nav">

        <div id="breadcrumb">

            <?php foreach ( $data['groups'] as $group ) : ?>

                <div class="item">
                    <a href="<?php print $group['url']; ?>">
                        <?php print $group['name']; ?>
                    </a>
                </div>

            <?php endforeach; ?>

        </div> <!-- #breadcrumb -->

        <!-- Rendered by react -->
        <div id="search-container"></div>

    </section>

    <section id="page">

        <?php include 'sidebar.php'; ?>

        <?php include 'content.php'; ?>

    </section> <!-- #page -->

</body>
</html>
