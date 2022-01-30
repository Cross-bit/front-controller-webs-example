

var dialogBox = document.getElementById('new-article-dialog');

var createArticleBtn = document.getElementById('create-new-article-btn');
createArticleBtn.addEventListener('click', OpenDialogBox)


var cancleNewArticleBtn = document.getElementById('cancle-new-article-creation-btn');
cancleNewArticleBtn.addEventListener('click', CloseDialogBox);

function OpenDialogBox() {
    dialogBox.style.display = 'block';    
}

async function CloseDialogBox() {
    var articleNameInput = dialogBox.querySelector('#new-article-form #new-article-name');
    
    articleNameInput.value='';
    
    var dialogContent = dialogBox.querySelector('.dialog-content');

    dialogContent.classList.add('dialog-content-leaving-animation');

    await sleep(400);
    
    dialogBox.style.display = 'none';
    dialogContent.classList.remove('dialog-content-leaving-animation');
}

function sleep(time) {
    return new Promise(resolve => setTimeout(resolve, time));
}



