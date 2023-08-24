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
    
        commentForm.addEventListener('submit', async (e) => {
            e.preventDefault();

            const response = await fetch('/ajax/comments',{
                method: 'POST',
                body: new FormData(e.target)
            });

            if (!response.ok) {
                return;
            }

            const json = await response.json();

            console.log(json);
        });
    }
}

console.log('cc');