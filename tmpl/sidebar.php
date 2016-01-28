<?php
/**
 * Define the default sidebar that is shown with the asortments of tasks
 * and related documents present throught the site.
 */

if ( isset( $data['tasks'] ) || isset( $data['files'] ) ) : ?>
<section id="sidebar">

    <?php if ( isset( $data['tasks'] ) ) : ?>

        <div class="section-title">

            <span class="title">Tasks</span>

        </div>

        <ul id="tasks">

            <?php foreach ( $data['tasks'] as $task ) : ?>

                <li class="task">

                    <a href="#<?php print strtolower(preg_replace('/\s+/', '', $task['name'])); ?>">
                        <?php print $task['name']; ?>
                    </a>

                </li> <!-- .task -->

            <?php endforeach; ?>

        </ul> <!-- #tasks -->
    <?php endif; ?>

    <?php if ( isset( $data['files'] ) ) : ?>
        <div class="section-title">

            <span class="title">Files</span>

        </div>

        <ul id="files">

            <?php foreach ( $data['files'] as $file ) : ?>

                <li class="file">

                    <a href="<?php print $file['path']; ?>" class="title" target="_blank">
                        <?php print $file['name']; ?>
                    </a>

                    <span class="description"></span>

                </li>

            <?php endforeach; ?>
        </ul> <!-- #files -->
    <?php endif; ?>

</section> <!-- #sidebar -->
<?php endif; ?>
