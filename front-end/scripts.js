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
let requestTask = new XMLHttpRequest()
let requestAudit = new XMLHttpRequest()

requestTask.open('GET', 'http://todo-app.test/?type=todoTasks', true)
requestTask.onload = function() {
    // Begin accessing JSON data here
    let data = $.parseJSON(this.response);
    if (requestTask.status >= 200 && requestTask.status < 400) {
        const todo = document.getElementById('todo');
        const done = document.getElementById('done');
        console.log(data);
        data.forEach((card) => {

            let containerTask = document.createElement('div');
            containerTask.setAttribute('class', 'card-body');

            let titleTask = document.createElement('h5');
            titleTask.setAttribute('class', 'card-title');
            titleTask.innerText = card.titulo;
            let checkButton = document.createElement('button');
            checkButton.innerText = "Completado";
            checkButton.setAttribute('class', 'btn btn-info');
            checkButton.setAttribute('name', 'idCompleted');
            checkButton.setAttribute('type', 'submit');
            checkButton.setAttribute('value', card.id);

            let buttonDelete = document.createElement('button');
            buttonDelete.innerText = "Eliminar";
            buttonDelete.setAttribute('class', 'btn btn-danger');
            buttonDelete.setAttribute('name', 'idDelete');
            buttonDelete.setAttribute('type', 'submit');
            buttonDelete.setAttribute('value', card.id);

            let fechaLimite = document.createElement('p');
            fechaLimite.setAttribute('class', 'card-text');
            fechaLimite.innerText = card.fecha_completada

            let todoTask = document.createElement('div');

            containerTask.appendChild(titleTask);
            containerTask.appendChild(fechaLimite);
            containerTask.appendChild(buttonDelete);
            if (card.completada === "0") {
                containerTask.appendChild(checkButton);
            }

            todoTask.setAttribute('class', 'card');
            todoTask.style.width = '18rem';

            todoTask.appendChild(containerTask);

            if (card.completada === "1") {
                done.append(todoTask);
            } else {
                todo.append(todoTask);
            }

        })
    } else {
        console.log('error')
    }
}

requestAudit.open('GET', 'http://todo-app.test/?type=auditTasks', true)
requestAudit.onload = function() {
    // Begin accessing JSON data here
    let data = $.parseJSON(this.response);
    if (requestAudit.status >= 200 && requestAudit.status < 400) {
        let tableContent = document.getElementById("bodyTable");
        data.forEach((audit) => {
            console.log(audit.titulo);
            let tableRow = document.createElement('tr');
            let tdTarea = document.createElement('td');
            tdTarea.innerText = audit.titulo;
            let tdAccion = document.createElement('td');
            tdAccion.innerText = audit.accion;
            let tdDescripcion = document.createElement('td');
            tdDescripcion.innerText = audit.descripcion;
            let tdEstado = document.createElement('td');
            tdEstado.innerText = (audit.completada === "1") ? "Completda" : "Pendiente";
            let buttonView = document.createElement("button");
            buttonView.innerHTML = "Ver";

            tableRow.appendChild(tdTarea);
            tableRow.appendChild(tdAccion);
            tableRow.appendChild(tdDescripcion);
            tableRow.appendChild(tdEstado);
            tableRow.appendChild(buttonView);
            tableContent.append(tableRow);
        })
    }
}

requestTask.send()
requestAudit.send()