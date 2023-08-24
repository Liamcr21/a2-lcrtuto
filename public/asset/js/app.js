document.addEventListener('DOMContentLoaded', () => {
    new App();
});


class App{
    constructor(){
        this.HandleCommentForm();
    }

    HandleCommentForm(){
        const commentForm = document.querySelector('form.comment-form');
    
        if (null == commentForm){
            return;
        }
    
        commentForm.addEventListener('submit', async => {
            console.log(e);
        });
    }
}

console.log('cc');