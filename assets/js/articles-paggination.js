
var currentPage = 1;

window.pageSize = 10;

UpdateListItems();

UpdatePagesCount();

UpdatePagesCounter();

// initialisation
UpdatePage(1);

function UpdateListItems(){
    console.log("loaded");
    var listItemsCollection = document.getElementById('articles-list-container').getElementsByClassName('article-item');
    window.listItemsArr = Array.from(listItemsCollection);
   // window.listItemsArr.push(Array.from(listItemsCollection)[0]);
}

function UpdatePagesCount() {
    window.pagesCount = Math.ceil(window.listItemsArr.length / window.pageSize);

    if(currentPage > window.pagesCount)
        currentPage = window.pagesCount;
}

var pagginationNextBtn = document.getElementById('pagination-next');

var pagginationPreviousBtn = document.getElementById('pagination-previous');

pagginationPreviousBtn.addEventListener('click', ListPrewPage);
pagginationNextBtn.addEventListener('click', ListNextPage);

UpdateButtonVisibility();

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
    
    var startIndex = (pageNumber - 1) * window.pageSize;
    var endIndex = startIndex + window.pageSize -1;

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
    pageCounter.textContent =   window.currentPage + "/" + window.pagesCount;
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

