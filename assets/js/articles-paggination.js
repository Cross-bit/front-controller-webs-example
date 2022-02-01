
var PAGINATION = (function() {

    var currentPage = 1;

    var pageSize = 10;

    var pagginationNextBtn = document.getElementById('pagination-next');

    var pagginationPreviousBtn = document.getElementById('pagination-previous');

    pagginationPreviousBtn.addEventListener('click', ListPrewPage);
    pagginationNextBtn.addEventListener('click', ListNextPage);


    function UpdateListItems(){
        var listItemsCollection = document.getElementById('articles-list-container').getElementsByClassName('article-item');
        window.listItemsArr = Array.from(listItemsCollection);
    }

    function UpdatePagesCount() {
        window.pagesCount = Math.ceil(window.listItemsArr.length / pageSize);

        if(currentPage > window.pagesCount)
            currentPage = window.pagesCount;
    }

    function ListNextPage() {

        if(currentPage <= window.pagesCount){
            currentPage++;
        }

        UpdateButtonVisibility();
        
        UpdatePagesCounter();

        UpdatePage(currentPage);
    }

    function ListPrewPage() {

        if(currentPage > 1){
            currentPage--;
        }
        
        UpdateButtonVisibility();
        
        UpdatePagesCounter();

        UpdatePage(currentPage);
    }

    // update graphics

    function UpdatePage(pageNumber) {
        
        var startIndex = (pageNumber - 1) * pageSize;
        var endIndex = startIndex + pageSize -1;

        var currentItem = 0;

        window.listItemsArr.forEach(item => {
            if(currentItem < startIndex || currentItem > endIndex) {
                item.style.display="none";
            }
            else {
                item.style.display="flex";
            }

            currentItem++;
        });
    }

    function UpdatePagesCounter(){
        let pageCounter = document.getElementById('pages-counter');
        pageCounter.textContent =   currentPage + "/" + window.pagesCount;
    }

    function UpdateButtonVisibility(){
        if(window.pagesCount > 1){

            if (currentPage == 1){
                pagginationPreviousBtn.style.display = 'none';
                pagginationNextBtn.style.display = 'inline-block';
            }

            if (currentPage == window.pagesCount) {
                pagginationNextBtn.style.display = 'none';
                pagginationPreviousBtn.style.display = 'inline-block';
            }
            else if (currentPage > 1){
                pagginationPreviousBtn.style.display = 'inline-block';
                pagginationNextBtn.style.display = 'inline-block';    
            }
        
        }
        else{
            pagginationPreviousBtn.style.display = 'none';
            pagginationNextBtn.style.display = 'none';
        }
    }

    return {
        UpdateArticleListCounter: function() {
            
            // update what is in the 
            UpdateListItems();
    
            UpdatePagesCount();
            
            UpdatePagesCounter();
            
            UpdatePage(currentPage);
            
            UpdateButtonVisibility();
        }
    }
}());

PAGINATION.UpdateArticleListCounter();