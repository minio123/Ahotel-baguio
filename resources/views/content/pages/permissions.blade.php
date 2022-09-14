@extends('layouts/contentNavbarLayout')

@section('title', '')

@section('content')
<h4 class="fw-bold py-3 mb-4">
  <span class="text-muted fw-light">Settings /</span> Permission
</h4>

<div class="row">
  <div class="col-md-12">
    <div class="card mb-4">
      <h5 class="card-header">Permission Lists</h5>
      <div class="card-body">
        <div class="row">
          <div class="col-12 d-flex justify-content-end">
            <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addModal"><i class="bx bx-plus"></i>&nbsp; Add Permission</button>
          </div>
          <div class="col-12">
            <div class="table-responsive mt-4">
              <table class="table table-bordered dt-responsive nowrap" id="zero_config">
                <thead>
                  <th>Module Name</th>
                  <th>Action Name</th>
                  <th>Actions</th>
                </thead>
                <tbody>
                  <tr>
                    <td>Users</td>
                    <td>Index</td>
                    <td>
                      {{-- <span data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="right" data-bs-html="true" title="View"><button class="btn btn-primary btn-icon btn-sm" data-bs-toggle="modal" data-bs-target="#viewModal"><i class="bx bx-show"></i></button></span> --}}
                      <span data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="right" data-bs-html="true" title="Edit"><button class="btn btn-info btn-icon btn-sm" data-bs-toggle="modal" data-bs-target="#editModal"><i class="bx bx-edit"></i></button></span>
                      <span data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="right" data-bs-html="true" title="Delete"><button class="btn btn-danger btn-icon btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal"><i class="bx bx-trash"></i></button></span>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- ADD MODAL -->
    <div class="modal fade" id="addModal" data-bs-backdrop="static" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog modal-md modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="addModalTitle">Permission Details</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form id="addForm">
              <div class="row">
                <div class="col-md-6">
                  <div class="mb-3">
                    <label>Module Name</label>
                    <input type="text" class="form-control" id="module_name" placeholder="Module Name" autocomplete="off">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="mb-3">
                    <label>Action Name</label>
                    <input type="text" class="form-control" id="action_name" placeholder="Action Name" autocomplete="off">
                  </div>
                </div>
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-success" id="addBtn">Save changes</button>
            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
    <!-- END -->

    <!-- EDIT MODAL -->
    <div class="modal fade" id="editModal" data-bs-backdrop="static" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog modal-md modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="editModalTitle">Permission Details</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form id="editForm">
              <div class="row">
                <div class="col-md-6">
                  <div class="mb-3">
                    <label>Module Name</label>
                    <input type="text" class="form-control" id="edit_module_name" placeholder="Module Name" autocomplete="off">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="mb-3">
                    <label>Action Name</label>
                    <input type="text" class="form-control" id="edit_action_name" placeholder="Action Name" autocomplete="off">
                  </div>
                </div>
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-success" id="updateBtn">Save changes</button>
            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
    <!--END -->

    <!-- VIEW MODAL -->
    {{-- <div class="modal fade" id="viewModal" data-bs-backdrop="static" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog modal-md modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="viewModalTitle">Permission Details</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form id="addForm">
              <div class="row">

              </div>
            </form>
          </div>
        </div>
      </div>
    </div> --}}
    <!--END -->

    <!-- DELETE MODAL -->
    <div class="modal fade" id="deleteModal" data-bs-backdrop="static" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="editMotalTitle">Delete Permission</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="col-12 text-center">
              <h4>
                Are you sure?
              </h4>
              <h6>You won't be able to revert this!</h6>
            </div>
          </div>
          <div class="modal-footer d-flex justify-content-center">
            <button type="button" class="btn btn-danger" id="deleteBtn">Yes, delete it!</button>
            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
    <!--END -->

  </div>
</div>

<script>
  $('#zero_config').DataTable();
</script>

@endsection
