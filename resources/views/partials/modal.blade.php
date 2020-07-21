<div class="modal fade" id="workerEditorModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="workerEditorModalLabel">Worker Editor</h4>
            </div>
            <div class="modal-body">
                <form id="modalFormData" name="modalFormData" class="form-horizontal" novalidate="">

                    <div class="form-group">
                        <label for="link" class="control-label">Link</label>
                        <input type="text" class="form-control" id="link" name="link" placeholder="Enter URL" value="">
                    </div>

                    <div class="form-group">
                        <label for="description" class="control-label">Description</label>
                        <input type="text" class="form-control" id="description" name="description" placeholder="Enter Link Description" value="">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="btn-save" value="add">Save changes</button>
                <input type="hidden" id="worker_id" name="worker_id" value="0">
            </div>
        </div>
    </div>
</div>