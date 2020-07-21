$(document).ready(() => {

    alertFadeOut(5);

    $('#worker-add').click(() => {
        $(modal.button).val('add');
        $(modal.form).trigger('reset');
        $(modal.elem).modal('show');
    });

});
 
const modal = {
    elem: $('#workerEditorModal'),
    button: $('#btn-save'),
    form: $('#modalFormData')
}

const alertFadeOut = (seconds) => {
    $('.alert').fadeOut(seconds * 1000);
}