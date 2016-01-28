<section id="content">

    <div id="item-title">

        <h1 class="title"><?php print $data['name']; ?></h1>

    </div>

    <div id="item-description">

        <p><?php print $data['description']; ?></p>
    </div>


    <?php if ( isset( $data['images'] ) ) : ?>
        <div id="image-gallery" class="content-section">

            <div class="section-title">

                <span class="title">Images</span>

            </div>

            <div id="images">

                <?php foreach ( $data['images'] as $image ) : ?>

                    <article class="image" style="background-image: url('<?php print $image['file']; ?>')">

                        <img class="spacer-image" src="<?php print $image['file']; ?>" />

                        <div class="content">

                            <?php if ( isset( $image['name'] ) ) : ?>

                                <header class="title-container">

                                    <span class="title">
                                        <?php print $image['name']; ?>
                                    </span>

                                </header>

                            <?php endif; ?>

                            <?php if ( isset( $image['description'] ) ) : ?>

                                <section class="description">

                                    <p><?php print $image['description']; ?></p>

                                </section>

                            <?php endif; ?>

                        </div> <!-- .content -->

                    </article> <!-- .image -->

                <?php endforeach; ?>

            </div> <!-- #images -->

        </div> <!-- #image-container -->

    <?php endif; ?>

    <?php if ( isset( $data['tasks'] ) ) : ?>
        <?php foreach ( $data['tasks'] as $task ) : ?>

            <div id="<?php print strtolower(preg_replace('/\s+/', '', $task['name'])); ?>" class="task-content content-section">

                <div class="section-title">

                    <span class="title"><?php print $task['name']; ?></span>

                </div>

                <section class="content">

                    <p><?php print $task['content']; ?></p>

                </section>

            </div> <!-- .task-content -->

        <?php endforeach; ?>
    <?php endif; ?>
</section> <!-- .content -->
