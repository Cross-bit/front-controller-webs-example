console.log("started");
var articleId = 1;

var addArticleBtn = document.getElementById("add-article-window-btn");

var submitArticlesBtn = document.getElementById("save-articles-btn");

addArticleBtn.addEventListener("click", AddNewArticleBox);
submitArticlesBtn.addEventListener("click", SaveArticles);

var articlesEditForm = document.getElementById('article-edit-form');

var articleBoxTemplate = articlesEditForm.querySelector('.create-article-box');

function AddNewArticleBox() {

    articleId++; // AI

    let templateClone = articleBoxTemplate.cloneNode( true );
    templateClone.id = articleId;

    templateClone.style.display = 'block';  

    //add event to delete
    let cloneBtn = templateClone.querySelector('.article-delete-btn'); 

    cloneBtn.addEventListener('click',  
        RemoveArticleBox
    );

    cloneBtn.cardToRemove = templateClone;

    articlesEditForm.appendChild( templateClone );
    articlesEditForm.appendChild(addArticleBtn);
}

function RemoveArticleBox(evntData) {
    var boxToRemove = evntData.currentTarget.cardToRemove;
    boxToRemove.remove();
}



function SaveArticles(){

    var form = document.getElementById('article-edit-form');
    var articleBoxes = form.querySelectorAll(' .create-article-box');
    
    //console.log(articleBoxes);
    

    dataObject = {};

    currentArticle = {};

    articleBoxes.forEach((articleEditHtml) =>{
        var id = articleEditHtml.id;

        var titleHtml = articleEditHtml.querySelector('.articles-create-title');
        var contentHtml = articleEditHtml.querySelector('.content-edit-view');

        currentArticle.title = titleHtml.value;
        currentArticle.content = contentHtml.value;

        dataObject[id] = currentArticle;

        currentArticle = {};
    });

    var jsonData = JSON.stringify(dataObject);
    
    var location = window.location.href;

    var request =  location + '?' + new URLSearchParams({ 
        method: 'ValidataArticlesList', });    

    fetch(request, {
        headers: {
            "Content-Type": "application/json",  
            "Accept":       "application/json"   
        },
        method: 'POST',
        body: jsonData

    }).then(response => response.json()).then(res => {
        
        Object.keys(res).forEach(function(id) {

            if(id != -1){
                var status = res[id]['status'];
    
                var corespondingBox = document.getElementById(id);
                switch(status){
                    case 'title-long':
                        SetErrorMessage('Title is too long!', corespondingBox);
                        break;
                    case 'content-long':
                        SetErrorMessage('Content is too long!', corespondingBox);
                        break;
                    case 'title-empty':
                        SetErrorMessage('Title can not be empty!', corespondingBox);
                        break;
                    default: // ok
                        var succesMessage = CreateSuccesMessageNode();
                        corespondingBox.replaceWith(succesMessage);
    
                }
            }
        });
    });
}

function SetErrorMessage(message, corespondingBox){
    var errorMessage = corespondingBox.querySelector('.article-error-message');
    errorMessage.style.display = 'block';
    errorMessage.innerHTML = message;

}

function CreateSuccesMessageNode(){
    var successMessage = document.createElement("span");
    successMessage.classList.add('article-create-message-success');
    var message = document.createTextNode("Successfully saved!");
    successMessage.appendChild(message);
    return successMessage;

}