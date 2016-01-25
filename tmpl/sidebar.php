<?php
/**
 * Define the default sidebar that is shown with the asortments of tasks
 * and related documents present throught the site.
 */
?>
<section id="sidebar">

    <div class="section-title">

        <span class="title">Tasks</span>

    </div>

    <ul id="tasks">

        <?php foreach ( $data['tasks'] as $task ) : ?>

            <li class="task">

                <a href="#<?php print trim($task['name']); ?>">
                    <?php print $task['name']; ?>
                </a>

            </li> <!-- .task -->

        <?php endforeach; ?>

    </ul> <!-- #tasks -->

    <div class="section-title">

        <span class="title">Files</span>

    </div>

    <ul id="files">

        <?php foreach ( $data['files'] as $file ) : ?>

            <li class="file">

                <a href="<?php print $file['path']; ?>" class="title" download>
                    <?php print $file['name']; ?>
                </a>

                <span class="description"></span>

            </li>

        <?php endforeach; ?>
    </ul> <!-- #files -->

</section> <!-- #sidebar -->
