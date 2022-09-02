@extends('layouts/contentNavbarLayout')

@section('title', 'Users')

@section('content')
<h4 class="fw-bold py-3 mb-4">
  <span class="text-muted fw-light">Settings /</span> Users
</h4>

<div class="row">
  <div class="col-md-12">
    <div class="card mb-4">
      <h5 class="card-header">User Lists</h5>
      <div class="card-body">
        <div class="row">
          <div class="col-12 d-flex justify-content-end">
            <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addModal"><i class="bx bx-user-plus"></i>&nbsp; Add User</button>
          </div>
          <div class="col-12">
            <div class="table-responsive mt-4">
              <table class="table table-hover" id="zero_config">
                <thead>
                  <th>Name</th>
                  <th>Username</th>
                  <th>User Level</th>
                  <th>Actions</th>
                </thead>
                <tbody id="userBody">
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- ADD MODAL -->
    <div class="modal fade" id="addModal" data-bs-backdrop="static" aria-hidden="true">
      <div class="modal-dialog modal-md modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="addModalTitle">User Information</h5>
            <button type="button" class="btn-close close-add" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form id="addForm">
              <div class="row">
                <div class="col-md-12">
                  <div class="mb-3">
                    <label>Full Name</label>
                    <input type="text" class="form-control required" id="full_name" name="full_name" placeholder="Full Name" autocomplete="off">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="mb-3">
                    <label>User Level</label>
                    <select id="user_level" class="form-control required" name="user_level">
                      <option value=""></option>
                      <option value="Admin">Admin</option>
                      <option value="User">User</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="mb-3">
                    <label>Email Address</label>
                    <input type="text" class="form-control required" id="email" name="email" placeholder="Username" autocomplete="off">
                  </div>
                </div>
                {{-- <div class="col-md-6">
                  <div class="mb-3">
                    <label>Password</label>
                    <input type="password" class="form-control required" id="password" name="password" placeholder="Password" autocomplete="off">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="mb-3">
                    <label>Confirm Password</label>
                    <input type="password" class="form-control required" id="confirm_password" name="confirm_password" placeholder="Confirm Password" autocomplete="off">
                  </div>
                </div> --}}
              </div>
              <!-- Permission -->
              <div class="row">
                <div class="col-12">
                  <h5 class="modal-title mt-3" id="addModalTitle">User Permission</h5>
                  <div class="table-responsive">
                    <table class="table table-bordered">
                      <thead>
                        <th style="width: 50px;"><input type="checkbox" id="select_all" data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="right" data-bs-html="true" title="Select All"></th>
                        <th>Module</th>
                        <th>Action</th>
                      </thead>
                      <tbody id="permissionBody">
                        <tr>
                          <td colspan="3" class="text-center">
                            No data available in table.
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-success" id="saveBtn">Save changes</button>
            <button type="button" class="btn btn-outline-secondary close-add" data-bs-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
    <!-- END -->

    <!-- EDIT MODAL -->
    <div class="modal fade" id="editModal" data-bs-backdrop="static" aria-hidden="true">
      <div class="modal-dialog modal-md modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="editModalTitle">User Information</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form id="editForm">
              @csrf
              <div class="row">
                <div class="col-md-12">
                  <div class="mb-3">
                    <label>Full Name</label>
                    <input type="text" class="form-control required" id="edit_full_name" name="full_name" placeholder="Full Name" autocomplete="off">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="mb-3">
                    <label>User Level</label>
                    <select id="edit_user_level" name="user_level" class="form-control required">
                      <option value=""></option>
                      <option value="Admin">Admin</option>
                      <option value="User">User</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="mb-3">
                    <label>Email Address</label>
                    <input type="text" class="form-control required" id="edit_email" name="email" placeholder="Username" autocomplete="off">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="mb-3">
                    <label>Password</label>
                    <input type="password" class="form-control" id="edit_password" name="password" placeholder="Password" autocomplete="off">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="mb-3">
                    <label>Confirm Password</label>
                    <input type="password" class="form-control" id="edit_confirm_password" name="password" placeholder="Confirm Password" autocomplete="off">
                  </div>
                </div>
              </div>
              <!-- Permission -->
              <div class="row">
                <div class="col-12">
                  <h5 class="modal-title mt-3" id="addModalTitle">User Permission</h5>
                  <div class="table-responsive">
                    <table class="table table-bordered">
                      <thead>
                        <th style="width: 50px;"><input type="checkbox" id="edit_select_all" data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="right" data-bs-html="true" title="Select All"></th>
                        <th>Module</th>
                        <th>Action</th>
                      </thead>
                      <tbody id="permissionBody">
                        <tr>
                          <td colspan="3" class="text-center">
                            No data available in table.
                          </td>
                        </tr>
                      </tbody>
                    </table>
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

    <!-- PASSWORD CHANGE MODAL -->
    <div class="modal fade" id="passwordModal" data-bs-backdrop="static" aria-hidden="true">
      <div class="modal-dialog modal-md modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="passwordModalTitle">Change Password</h5>
            <button type="button" class="btn-close close-password" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form id="passwordForm">
              @csrf
              <div class="row">
                <div class="col-md-6">
                  <div class="mb-3">
                    <label>Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password" autocomplete="off">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="mb-3">
                    <label>Confirm Password</label>
                    <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Confirm Password" autocomplete="off">
                  </div>
                </div>
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-success" id="passwordBtn">Save changes</button>
            <button type="button" class="btn btn-outline-secondary close-password" data-bs-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
    <!--END -->

    <!-- VIEW MODAL -->
    <div class="modal fade" id="viewModal" data-bs-backdrop="static" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog modal-md modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="viewModalTitle">User Information</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="row">
              <div class="col-md-6">
                <div class="mb-3">
                  <label>Full Name:</label>
                  <br>
                  <label><b id="view_full_name"></b></label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="mb-3">
                  <label>Email Address:</label>
                  <br>
                  <label><b id="view_email"></b></label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="mb-3">
                  <label>User Level:</label>
                  <br>
                  <label><b id="view_user_level"></b></label>
                </div>
              </div>

            </div>
            <!-- Permission -->
            <div class="row">
              <div class="col-12">
                <h5 class="modal-title mt-3" id="addModalTitle">User Permission</h5>
                <div class="table-responsive">
                  <table class="table table-bordered">
                    <thead>
                      <th style="width: 50px;"><input type="checkbox" id="edit_select_all" data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="right" data-bs-html="true" title="Select All"></th>
                      <th>Module</th>
                      <th>Action</th>
                    </thead>
                    <tbody id="permissionBody">
                      <tr>
                        <td colspan="3" class="text-center">
                          No data available in table.
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--END -->

    <!-- DELETE MODAL -->
    <div class="modal fade" id="deleteModal" data-bs-backdrop="static" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="editMotalTitle">Delete User</h5>
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
  var table = $('#zero_config').DataTable({
    "processing": true
  });
  var user_id = '';
  var user_level = $('#user_level').select2({
    dropdownParent: $('#addModal'),
    width: '100%',
    placeholder: 'Selet User Level'
  });

  var edit_user_level = $('#edit_user_level').select2({
    dropdownParent: $('#editModal'),
    width: '100%',
    placeholder: 'Selet User Level'
  });


  //FETCH
  fetAllActiveUser();
  async function fetAllActiveUser(){

    $('.dataTables_processing').css({"display": "block", "z-index": 10000 });
    const tBody = document.getElementById('userBody');
    tBody.innerHTML = '';
    $.ajax({
      type:"GET",
      url:'/fetch-all-user',
      data:'',
      dataType:'json',
      beforeSend:function(){
      },
      success:function(response){
        if(response.length > 0){
          response.forEach(element =>{
            const row = document.createElement('tr');

            row.innerHTML = `
              <td>${element.name}</td>
              <td>${element.email}</td>
              <td>${element.user_level}</td>
              <td>
                <span data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="right" data-bs-html="true" title="View">
                  <button class="btn btn-primary btn-icon btn-sm btn-view" data-bs-toggle="modal" data-bs-target="#viewModal" data-bs-id="${element.id}">
                    <i class="bx bx-show"></i>
                  </button>
                </span>
                <span data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="right" data-bs-html="true" title="Change Password">
                  <button class="btn btn-warning btn-icon btn-sm btn-view" data-bs-toggle="modal" data-bs-target="#passwordModal" data-bs-id="${element.id}">
                    <i class="bx bx-key"></i>
                  </button>
                </span>
                <span data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="right" data-bs-html="true" title="Edit">
                  <button class="btn btn-info btn-icon btn-sm btn-edit" data-bs-toggle="modal" data-bs-target="#editModal" data-bs-id="${element.id}">
                    <i class="bx bx-edit"></i>
                  </button>
                </span>
                <span data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="right" data-bs-html="true" title="Delete">
                  <button class="btn btn-danger btn-icon btn-sm btn-delete" data-bs-toggle="modal" data-bs-target="#deleteModal" data-bs-id="${element.id}">
                    <i class="bx bx-trash"></i>
                  </button>
                </span>
              </td>
            `;
            tBody.appendChild(row);
            $('.dataTables_processing').css({"display": "none", "z-index": 10000 });
          });
        }else{
          $('.dataTables_processing').css({"display": "none", "z-index": 10000 });
          tBody.innerHTML=`
            <tr>
              <td colspan="4" class="text-center">
                No matching records found
              </td>
            </tr>
          `;
        }
      },
      error: function(error){
      console.log(error);
      }
    });
  }

  //CREATE
  $('#saveBtn').on('click', async function(){
    const form = document.getElementById('addForm');
    const body = {};
    const formData = new FormData(form);
    formData.forEach((value, key) => body[key] = value);
    $.ajax({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      type:"POST",
      url:'/create-user',
      data:body,
      dataType:'json',
      beforeSend:function(){
      },
      success:function(response){
        if(response.status == 'success'){
          iziToast.success({
            title: 'Success',
            message: response.message,
            position: 'topRight'
          });
          fetAllActiveUser();
          user_level.val('').trigger('change');
          $('#addModal').find('form')[0].reset();
          $('#addModal').modal('toggle');
        }
      },
      error: function(error){
        var errors = error.responseJSON.errors;

        for(var key in errors){
          document.getElementById(key).classList.add('is-invalid');
        }

        setTimeout(() => {
          for(var key in errors){
            document.getElementById(key).classList.remove('is-invalid');
          }
        }, 3500);

        iziToast.error({
          title: 'Failed',
          message: error.responseJSON.message,
          position: 'topRight'
        });
      }
    });
  });

  $('.close-add').on('click', async function (e) {
    user_level.val('').trigger('change');
    $('#addModal').find('form')[0].reset();
  });

  //FETCHING FOR VIEWING DATA
  $('#zero_config tbody').on('click','.btn-view', async function(){
    var id = $(this).attr('data-bs-id');
    user_id = id;
    $.ajax({
      type:"GET",
      url:'/fetch-user-data/'+id,
      data:'',
      dataType:'json',
      beforeSend:function(){
      },
      success:function(response){
        if(response != '' || response != null){
          document.getElementById('view_full_name').innerHTML = response.name;
          document.getElementById('view_email').innerHTML = response.email;
          document.getElementById('view_user_level').innerHTML = response.user_level;
        }
      },
      error: function(error){
      console.log(error);
      }
    });
  });

  $('#zero_config tbody').on('click','.btn-edit', async function(){
    var id = $(this).attr('data-bs-id');
    user_id = id;
    $.ajax({
      type:"GET",
      url:'/fetch-user-data/'+id,
      data:'',
      dataType:'json',
      beforeSend:function(){
      },
      success:function(response){
        if(response != '' || response != null){
          document.getElementById('edit_full_name').value = response.name;
          document.getElementById('edit_email').value = response.email;
          edit_user_level.val(response.user_level).trigger('change');
        }
      },
      error: function(error){
      console.log(error);
      }
    });
  });

  //UPDATE
  $('#updateBtn').on('click', async function(){
    const form = document.getElementById('editForm');
    const body = {};
    const formData = new FormData(form);
    formData.forEach((value, key) => body[key] = value);

    $.ajax({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      type:"POST",
      url:'/update-user-data/'+user_id,
      data:body,
      dataType:'json',
      beforeSend:function(){
      },
      success:function(response){
        if(response.status == 'success'){
          iziToast.success({
            title: 'Success',
            message: response.message,
            position: 'topRight'
          });
          fetAllActiveUser();
          $('#editModal').modal('hide');
        }else{
          iziToast.error({
            title: 'Failed',
            message: response.message,
            position: 'topRight'
          });
        }
      },
      error: function(error){
        var errors = error.responseJSON.errors;

        for(var key in errors){
          document.getElementById(`edit_${key}`).classList.add('is-invalid');
        }

        setTimeout(() => {
          for(var key in errors){
            document.getElementById(`edit_${key}`).classList.remove('is-invalid');
          }
        }, 3500);

        iziToast.error({
          title: 'Failed',
          message: error.responseJSON.message,
          position: 'topRight'
        });
      }
    });
  });

  //PASSWORD RESET
  $('#passwordBtn').on('click', function(){
    const form = document.getElementById('passwordForm');
    const body = {};
    const formData = new FormData(form);
    formData.forEach((value, key) => body[key] = value);
    $.ajax({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      type:"POST",
      url:'/update-user-password/'+user_id,
      data:body,
      dataType:'json',
      beforeSend:function(){
      },
      success:function(response){
        if(response.status == 'success'){
          iziToast.success({
            title: 'Success',
            message: response.message,
            position: 'topRight'
          });
          fetAllActiveUser();
          $('#passwordModal').find('form')[0].reset();
          $('#passwordModal').modal('hide');
        }else{
          iziToast.error({
            title: 'Failed',
            message: response.message,
            position: 'topRight'
          });
          $('#passwordModal').modal('hide');
        }
      },
      error: function(error){
        var errors = error.responseJSON.errors;

        for(var key in errors){
          document.getElementById(key).classList.add('is-invalid');
        }

        setTimeout(() => {
          for(var key in errors){
            document.getElementById(key).classList.remove('is-invalid');
          }
        }, 3500);

        iziToast.error({
          title: 'Failed',
          message: error.responseJSON.message,
          position: 'topRight'
        });
      }
    });
  });

  $('.close-password').on('click', async function (e) {
    $('#passwordModal').find('form')[0].reset();
  });

  //DELETE
  $('#zero_config tbody').on('click','.btn-delete', async function(){
    var id = $(this).attr('data-bs-id');
    user_id = id;
  });

  $('#deleteBtn').on('click', function(){
    $.ajax({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      type:"POST",
      url:'/delete-user/'+user_id,
      data:'',
      dataType:'json',
      beforeSend:function(){
      },
      success:function(response){
        if(response.status == 'success'){
          iziToast.success({
            title: 'Success',
            message: response.message,
            position: 'topRight'
          });
          fetAllActiveUser();
          $('#deleteModal').modal('hide');
        }else{
          iziToast.error({
            title: 'Failed',
            message: response.message,
            position: 'topRight'
          });
          $('#deleteModal').modal('hide');
        }
      }
    });
  });

</script>

@endsection
