<div class="wrapper">

    <h1>Article list</h1>
    
    <hr>
    
    <!-- Articles list -->

    
        <form id="article-edit-form" method="post">
            <div id="-1" class="create-article-box" style="display:none;">
                <span class="article-error-message" style="display:none;" >eerre</span>
                <h2>Title:</h2>
                <input type="text" class="articles-create-title requiredTextInput" name="title" placeholder="Article title">
                <h2>Content:</h2>
                <textarea id ="content-edit-view" class="content-edit-view" name="content" rows="5" ></textarea>
                <button type="button" class="btn article-delete-btn">Remove article</button>
            </div>
            <button type="button" id="add-article-window-btn" class="btn add-article-btn" >Add new article</button>
        </form>
    

    <hr>

    <!-- Bottom navigation panel  type="submit" form="article-edit-form" -->

    <div class="article-edit-menu" >
        <button id="save-articles-btn" class="btn btn-accept" >Save</button>
        <button class="btn btn-reject" onclick="location.href='<?= BASE_URL ?>/articles'" type="button" > Back to articles </button>
    </div>

</div>

<!-- js for this particular page -->

<script src="<?= BASE_URL ?>/assets/js/create-articles.js"></script>
