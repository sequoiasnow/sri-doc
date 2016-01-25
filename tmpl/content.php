<section id="content">
    <div id="item-title">

        <h1 class="title"><?php print $data['title']; ?></h1>

    </div>

    <div id="item-description">

        <?php print $data['description']; ?>

    </div>

    <?php if ( isset( $data['images'] ) ) : ?>
        <div class="section-title">

            <span class="title">Images</span>

        </div>

        <div id="image-gallery" class="content-section">

            <?php foreach ( $data['images'] as $image ) : ?>

                <article class="image" style="backgroung-image: url('<?php print $image['file']; ?>')">


                    <?php if ( isset( $image['title'] ) ) : ?>

                        <header class="title-container">

                            <span class="title">
                                <?php print $image['title']; ?>
                            </span>

                        </header>

                    <?php endif; ?>

                    <?php if ( isset( $image['description'] ) ) : ?>

                        <section class="description">

                            <?php print $image['description']; ?>

                        </section>

                    <?php endif; ?>

                </article> <!-- .image -->

            <?php endforeach; ?>

        </div> <!-- #image-container -->

    <?php endif; ?>

    <div class="section-title">

        <span class="title">Tasks</span>

    </div>

    <?php foreach ( $data['tasks'] as $task ) : ?>

        <article id="<?php print trim($taks['name']); ?>" class="task-content content-section">

            <header class="title-container">

                <span class="title">
                    <?php print $task['name']; ?>
                </span>

            </header>

            <section class="content">

                <?php print $task['content']; ?>

            </section>

        </article> <!-- .task-content -->

    <?php endforeach; ?>
</section> <!-- .content -->
