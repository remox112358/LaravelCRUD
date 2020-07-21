$(document).ready(() => {

    // Open the modal to CREATE worker
    $('#workerAdd').click(() => {
        $(modal.button).val('add');
        modal.form.reset();
        modal.form.errorReset();
        modal.toggle();
    });

    // Open the modal to UPDATE worker
    $('body').on('click', '.worker-update', function() {
        var workerID = $(this).val();
        $.get('workers/' + workerID, (data) => {
            $(modal.fields.id).val(data.id);
            $(modal.fields.name).val(data.name);
            $(modal.fields.surname).val(data.surname);
            $(modal.fields.profession).val(data.profession);
            $(modal.fields.experience).val(data.experience);
            $(modal.fields.salary).val(data.salary);
            $(modal.button).val('update');

            modal.toggle();
        })
    });

    // CREATE and UPDATE
    $(modal.button).click(function(event) {
        event.preventDefault();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        modal.form.errorReset();

        var props = new (function() 
        {
            this.formData = {
                id: $(modal.fields.id).val(),
                _token: $(modal.fields._token).val(),
                name: $(modal.fields.name).val(),
                surname: $(modal.fields.surname).val(),
                profession: $(modal.fields.profession).val(),
                experience: $(modal.fields.experience).val(),
                salary: $(modal.fields.salary).val()
            };
            this.state = $(modal.button).val();
            this.type = this.state == 'update' ? 'PUT' : 'POST';
            this.ajaxUrl = this.state == 'update' ? 'workers/' + this.formData.id : 'workers';
        });

        $.ajax({
            type: props.type,
            url: props.ajaxUrl,
            data: props.formData,
            dataType: 'json',
            success: (data) => {
                var worker = `
                    <tr id="worker${data.id}">
                        <th scope="row">${data.id}</th>
                        <td>${data.name}</td>
                        <td>${data.surname}</td>
                        <td>${data.profession}</td>
                        <td>${data.experience}</td>
                        <td>${data.salary + '₽'}</td>
                        <td class="table-buttons">
                            <button class="btn btn-primary worker-update" value="${data.id}">
                                <i class="fa fa-pencil" ></i>
                            </button>
                            <button class="btn btn-danger worker-delete" value="${data.id}">
                                <i class="fa fa-trash"></i>
                            </button>
                        </td>
                    </tr>`;
                
                props.state == 'add' ? $('#table').prepend(worker) : $('#worker' + data.id).replaceWith(worker);
                
                modal.form.reset();
                
                modal.toggle();

                props.state == 'add' ? msgAlert('success', 'Работник успешно добавлен !') : msgAlert('success', 'Работник успешно редактирован !');
            },
            error: (data) => {
                let errors = data.responseJSON.errors;
                $.each(errors, (key, value) => {
                    let field = $(`input[name="${key}"]`);
                    $(field).addClass('is-invalid');
                    $(field).after(`<div class="invalid-feedback">${value[0]}</div>`);
                    $('#modalFormData input:not("is-invalid")').addClass('is-valid');
                });
            }
        });
    });

    $(document).on('click', '.worker-delete', function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var workerID = $(this).val();

        $.ajax({
            type: 'DELETE',
            url: 'workers/' + workerID,
            success: (data) => {
                $('#worker' + workerID).remove();
                msgAlert('success', 'Работник успешно удалён !')
            },
            error: (data) => {
                console.log('Error', data);
            }
        });
    });

});
 
const modal = {
    elem: $('#workerEditorModal'),
    button: $('#btnSave'),
    form: {
        elem: $('#modalFormData'),
        reset() {
            $(this.elem).trigger('reset');
        },
        errorReset() {
            $('#modalFormData input').removeClass('is-invalid is-valid');
            $('#modalFormData .invalid-feedback').remove();
        }
    },
    fields: {
        id: $('#workerID'),
        _token: $('input[name="_token"]'),
        name: $('#workerName'),
        surname: $('#workerSurname'),
        profession: $('#workerProfession'),
        experience: $('#workerExperience'),
        salary: $('#workerSalary')
    },
    toggle() {
        $(this.elem).modal('toggle');
    }
}

const msgAlert = (color, message, duration = 3) => {
    var alertCount = $('#alert-box').children('.alert').length;
    var alertElem = $(`<div class="alert alert-${color} fade show">${message}</div>`);

    if(alertCount >= 4) {
        $('#alert-box > .alert:last').remove();
    }

    $('#alert-box').append(alertElem);
    
    window.setTimeout(function() {
        $(alertElem).alert('close');
    }, duration * 1000);
}