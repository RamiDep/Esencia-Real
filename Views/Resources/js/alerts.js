/* SELECCIONAR TODOS LOS FORMULARIOS QUE TENGAN ESA CLASE */
const ajax_forms = document.querySelectorAll(".FormularioAjax");


/* Funcion que envia el formulario */
function submitForm(even){
    even.preventDefault();   
}

/* Funcion que muestra la alerta en sweet alert */
function alertBySweetAlert(alert){

}


ajax_forms.forEach(form => {
    form.addEventListener("submit", submitForm);
});