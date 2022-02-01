<div class="wrapper">

<h1><?= $pageContent['name'] ?> </h1>

<hr>
<div class="article-content">
    <?php
        echo $pageContent['article'];
    ?>
</div>

<hr>

<div class="single-article-menu" >
    <button class="btn btn-action" onclick="location.href='<?= BASE_URL ?>/article-edit/<?= $pageContent['id'] ?>'" >Edit</button>
    <button class="btn" onclick="location.href='<?= BASE_URL ?>/articles'" type="button" > Back to articles </button>
</div>

</div>