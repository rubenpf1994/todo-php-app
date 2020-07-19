var request = new XMLHttpRequest()

request.open('GET', 'http://todo-app.test/', true)
request.onload = function() {
    // Begin accessing JSON data here
    let data = $.parseJSON(this.response);
    console.log(data);
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