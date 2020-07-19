/*$(document).ready(function() {
    $("#idForm").submit(function(e) {

        event.preventDefault(); //prevent default action 
        var post_url = $(this).attr("action"); //get form action url
        var request_method = $(this).attr("method"); //get form GET/POST method
        var form_data = $(this).serialize(); //Encode form elements for submission
        console.log('Ajax');
        $.ajax({
            url: post_url,
            type: request_method,
            data: form_data
        }).done(function(response) { //
            console.log(post_url);
            console.log(request_method);
            console.log(form_data);
        });


    });
});
*/
var request = new XMLHttpRequest()

request.open('GET', 'http://todo-app.test/', true)
request.onload = function() {
    // Begin accessing JSON data here
    let data = $.parseJSON(this.response);
    if (request.status >= 200 && request.status < 400) {
        const app = document.getElementById('root');
        data.forEach((card) => {

            let containerTask = document.createElement('div');
            containerTask.setAttribute('class', 'card-body');

            let titleTask = document.createElement('h5');
            titleTask.setAttribute('class', 'card-title');
            titleTask.innerText = card.titulo;

            let fechaLimite = document.createElement('p');
            fechaLimite.setAttribute('class', 'card-text');
            fechaLimite.innerText = card.fecha_completada

            let todoTask = document.createElement('div');

            containerTask.appendChild(titleTask);
            containerTask.appendChild(fechaLimite);
            todoTask.setAttribute('class', 'card');
            todoTask.style.width = '18rem';

            todoTask.appendChild(containerTask);

            app.append(todoTask);
        })
    } else {
        console.log('error')
    }
}

request.send()