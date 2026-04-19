/* SELECCIONAR TODOS LOS FORMULARIOS QUE TENGAN ESA CLASE */
const ajax_forms = document.querySelectorAll(".FormularioAjax");


/* Funcion que envia el formulario */
function submitForm(even){
    even.preventDefault();   

    let data = new FormData(this);
    let typeForm = this.getAttribute('data-form');
    let method = this.getAttribute('method');
    let action = this.getAttribute("action");
    let alertText = "";
    let header = new Headers();

    let config = {
        method: method,
        headers: header,
        mode: 'cors',
        cache: 'no-cache',
        body: data 
    }

    switch(typeForm)
    {
        case "save":
            alertText = "Los datos se guardaran en el sistema";
            break;
        case "delete":
            alertText = "Los datos se guardaran en el sistema";
            break;
        case "update":
            alertText = "Los datos se guardaran en el sistema";
            break;
    }

    Swal.fire({
        title: '¿Estas seguro?',
        text: alertText,
        type: 'question',
        confirmButtonText: 'Aceptar',
        cancelButtonText: 'Cancelar',
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
    }).then((result) => { 
        if (result.value) {
            fetch(action, config)
            .then(response => response.json())
            .then(response => {
            return ajaxAlert(response);
            });
        }
    });

}

/* Funcion que muestra la alerta en sweet alert */
function alertBySweetAlert(alert){
    switch(alert.Alert){
        case "simple":
            Swal.fire({
                title: alert.Title,
                text: alert.Text,
                type: alert.Type,
                confirmButtonText: 'Aceptar'
            });
        break;
        case "reload":
            Swal.fire({
                title: alert.Title,
                text: alert.Text,
                type: alert.Type,
                confirmButtonText: 'Aceptar'
            }).then((result) => {
                if (result.value === true) {
                location.reload();
                }
            });
        break;
        case "clear":
            Swal.fire({
                title: alert.Title,
                text: alert.Text,
                type: alert.Type,
                confirmButtonText: 'Aceptar'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.querySelector(".FormularioAjax").reset();
                }
            });
        break;
        case "redirect":
            window.location.href=alert.URL;
        break;
    }
}

/* Funcion que toma cada formulario y lo asocia con la funcion para enviar */
ajax_forms.forEach(form => {
    form.addEventListener("submit", submitForm);
});