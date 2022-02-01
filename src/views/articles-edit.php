<div class="wrapper">

    <h1>Article edit </h1>
    
    <hr>

    <form id="article-edit-form" action="?method=SaveEditedArticle" method="post">

        <h2>Title:</h2>
        <input type="text" id="title-edit" class="requiredTextInput" name="title" maxlength="32" required="required" placeholder="Article title" value="<?= $pageContent['name'] ?>">
        <h2>Content:</h2>
        <textarea id="content-edit-view" name="content" rows="20" maxlength="1024" ><?= $pageContent['article'] ?></textarea> 
    </form>


    <div class="article-edit-menu" >
        <input class="btn btn-accept" type="submit" form="article-edit-form" value="Save"/>
        <button class="btn btn-reject" onclick="location.href='<?= BASE_URL ?>/articles'" type="button" > Back to articles </button>
    </div>

</div>