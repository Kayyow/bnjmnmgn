<?php require '../app/views/partials/_sort_bar.php'; ?>

<div class="projects_container">
    <!-- Use HTML comments to remove space between divs -->
    <?= '<!--' ?> 
    <?php foreach ($projects as $project): ?>
        <?= '-->' ?><div class="project">
            <a href="?page=show&id=<?= $project->id ?>">
                <img src="<?= $project->image ?>">
            </a>
            <h3><?= $project->title ?></h3>
        </div><?= '<!--' ?>
    <?php endforeach; ?>
    <?= '-->' ?>
</div>