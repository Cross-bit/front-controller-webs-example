

<div class="wrapper">

    <h1>Article list</h1>
    
    <hr>
    
    <!-- Articles list -->

    <div id="articles-list-container">

        <div class="oddboxinner">

        <?php foreach ($pageContent as $n => $article) {  ?>
            
            <div id="<?= $article['id'] ?>" class="article-item">
                <div class="article-item-title"> 
                    <h2> <?= $article['name'] ?> </h2>
                </div>

                <div id="article-item-buttons">
                    <a href="<?= BASE_URL ?>/article/<?= $article['id'] ?>" class="link-normal">Show</a>
                    <a href ="<?= BASE_URL ?>/article-edit/<?= $article['id'] ?>" class="link-normal" > Edit</a>
                    <button id="article-delete-btn" class="btn delete-btn">Delete</button>
                    <!--<a href="" id="delete-btn" class="link-warning">Delete</a>-->
                </div>
            </div>
            
            <?php } ?>
    </div>

    </div>

    <!-- Create new article dialog -->
    <div id="new-article-dialog" class="dialog">

        <div class="dialog-content">
            <h2>Input new article name:</h2>
                <form id="new-article-form" action="?method=CreateNewArticle" method="post">
                    <input class="requiredTextInput" type="text" id="new-article-name" name="title" required="required" maxlength="32" placeholder="Article title">
                </form>
            <div class="dialog-control" >
                <input class="btn btn-accept" type="submit" form='new-article-form' value="Create" >
                <button id="cancle-new-article-creation-btn" class="btn btn-reject">Cancel</button>
            </div>
        </div>

    </div>

    <hr>

    <!-- Bottom navigation panel -->

    <div class="articles-list-menu">
        <div class="pagination-controlls">
            <button id="pagination-previous" class="btn previous-btn" onclick="" > Previous </button>
            <button id="pagination-next" class="btn next-btn" onclick="" > Next </button>
        </div>
        <p>Page count: <span id="pages-counter"></span></p>
        <button class="btn" id="create-new-article-btn"> Create article </button>
    </div>

</div>

<!-- js for this particular page -->

<script src="<?= BASE_URL ?>/assets/js/dialog-box.js"></script>
<script src="<?= BASE_URL ?>/assets/js/articles-paggination.js"></script>
<script src="<?= BASE_URL ?>/assets/js/delete-article.js"></script>

