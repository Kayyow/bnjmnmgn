<div class="page_title_container">
    <span class="project_title"><?= $project->title ?></span>
    <span class="project_category"><?= $category->label ?></span>
</div>

<div class="project_container">
    <div class="image">
        <img src="<?= $project->image ?>">
    </div>
    <span class="tools"><?= $project->tools ?></span>
    <?php if ($project->date): ?>
        <span class="date"><?= $project->formattedDate ?></span>
    <?php endif; ?>
    <p class="description"><?= $project->description ?></p>
</div>