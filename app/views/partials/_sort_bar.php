<div class="sort_bar">
    <a href="/">Tout</a>
    <?php
    foreach ($categories as $category) {
        echo "<a href=\"$category->url\">$category->label</a>";
    }
    ?>
</div>