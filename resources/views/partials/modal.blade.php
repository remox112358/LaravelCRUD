<div class="modal fade" id="workerEditorModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="workerEditorModalLabel">{{ config('app.name') }}</h4>
            </div>
            <div class="modal-body">
                <form id="modalFormData" name="modalFormData" class="form-horizontal" novalidate="">

                    @csrf

                    <div class="form-group" title="Обязательно к заполнению">
                        <label for="workerName" class="control-label">Имя<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="workerName" name="name" value="">
                    </div>

                    <div class="form-group" title="Обязательно к заполнению">
                        <label for="workerSurname" class="control-label">Фамилия<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="workerSurname" name="surname" value="">
                    </div>

                    <div class="form-group" title="Обязательно к заполнению">
                        <label for="workerProfession" class="control-label">Профессия<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="workerProfession" name="profession" value="">
                    </div>

                    <div class="form-group" title="Обязательно к заполнению">
                        <label for="workerExperience" class="control-label">Стаж работы<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="workerExperience" name="experience" value="">
                    </div>

                    <div class="form-group" title="Обязательно к заполнению">
                        <label for="workerSalary" class="control-label">Зарплата<span class="text-danger">*</span></label>
                        <input type="number" class="form-control" id="workerSalary" min="1000" name="salary" value="">
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="btnSave" value="add">Сохранить</button>
                <input type="hidden" id="workerID" name="worker_id" value="0">
            </div>
        </div>
    </div>
</div>