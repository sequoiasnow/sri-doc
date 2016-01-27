<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="<?php print WEB_ROOT; ?>/dist/css/main.css" />

    <title><?php print $data['name']; ?></title>
</head>
<body>
    <section id="primary-nav">

        <div class="wraper">

            <div id="breadcrumb">

                <?php if ( $data['groups'] ) : ?>

                    <?php foreach ( $data['groups'] as $group ) : ?>

                        <div class="item">
                            <a href="<?php print $group['url']; ?>">
                                <?php print $group['name']; ?>
                            </a>
                        </div>

                    <?php endforeach; ?>

                <?php endif; ?>

            </div> <!-- #breadcrumb -->

            <!-- Rendered by react -->
            <div id="search-container"></div>

        </div> <!-- .wraper -->

    </section>

    <section id="page">

        <?php include 'sidebar.php'; ?>

        <?php include 'content.php'; ?>

    </section> <!-- #page -->

</body>
</html>
