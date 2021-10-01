let faces_form = document.querySelector('.faces-form');
let kids_form = document.querySelector('.kids-form');
let table_form = document.querySelector('.table-form');

document.querySelector('.faces-button').addEventListener("click", function(){
    faces_form.classList.remove("hide");
    kids_form.classList.add("hide");
    table_form.classList.add("hide");
});

document.querySelector('.kids-button').addEventListener("click", function(){
    faces_form.classList.add("hide");
    kids_form.classList.remove("hide");
    table_form.classList.add("hide");
});

document.querySelector('.table-button').addEventListener("click", function(){
    faces_form.classList.add("hide");
    kids_form.classList.add("hide");
    table_form.classList.remove("hide");
});

let forms = document.querySelectorAll('form');
for (let form of forms) {
    form.addEventListener("submit", async function( event ){
        event.preventDefault();
        let options = {
            method: "post",
            body: new FormData(this),
        }
        let url = this.action;
        let responce = await fetch(url, options);
        let body = await responce.text();
        let original = this.innerHTML;
        if ( this.contains( document.querySelector('.filter') ) ){
            let result = document.querySelector('.table-result');
            result.innerHTML = body;
        } else {
            this.innerHTML = body;
            setTimeout(() => { 
                this.innerHTML = original; 
            }, 3000);
        }
    });
}