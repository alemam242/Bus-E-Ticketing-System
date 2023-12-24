<!-- Modal -->
<div class="modal fade flip" id="deleteOrder" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body p-5 text-center">
                <lord-icon src="https://cdn.lordicon.com/gsqxdxog.json" trigger="loop"
                    colors="primary:#25a0e2,secondary:#00bd9d" style="width:90px;height:90px"></lord-icon>
                <div class="mt-4 text-center">
                    <h4>You are about to delete a product ?</h4>
                    <p class="text-muted fs-15 mb-4">Deleting a product will remove
                        all of
                        the information from database.</p>
                    <div class="hstack gap-2 justify-content-center remove">
                        <button class="btn btn-link link-primary fw-medium text-decoration-none" id="deleteRecord-close"
                            data-bs-dismiss="modal"><i class="ri-close-line me-1 align-middle"></i>
                            Close</button>
                        <button class="btn btn-primary" id="delete-record">Yes,
                            Delete It</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--end modal -->
