@extends('layouts/contentNavbarLayout')

@section('title', '')

@section('content')
<h4 class="fw-bold py-3 mb-4">
  <span class="text-muted fw-light">Settings /</span> Hotel Charges
</h4>

<div class="row">
  <div class="col-md-12">
    <div class="card mb-4">
      <h5 class="card-header">Charge Lists</h5>
      <div class="card-body">
        <div class="row">
          <div class="col-12 d-flex justify-content-end">
            <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addModal"><i class="bx bx-plus"></i>&nbsp; Add Charges</button>
          </div>
          <div class="col-12">
            <div class="table-responsive mt-4">
              <table class="table table-hover" id="zero_config">
                <thead>
                  <th>Charge Name</th>
                  <th>Charge Type</th>
                  <th>Actions</th>
                </thead>
                <tbody id="roomTypeBody">
                  {{-- <tr>
                    <td>Standard Economy</td>
                    <td>SQ</td>
                    <td>Herminio Doton Amboni Jr</td>
                    <td>06/22/2022 2:22 P.M.</td>
                    <td>
                      <span data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="right" data-bs-html="true" title="Edit"><button class="btn btn-info btn-icon btn-sm" data-bs-toggle="modal" data-bs-target="#editModal"><i class="bx bx-edit"></i></button></span>
                      <span data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="right" data-bs-html="true" title="Delete"><button class="btn btn-danger btn-icon btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal"><i class="bx bx-trash"></i></button></span>
                    </td>
                  </tr> --}}
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
            <h5 class="modal-title" id="addModalTitle">Charge Information</h5>
            <button type="button" class="btn-close close-add" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form id="addForm">
              <div class="row">
                <div class="col-md-6">
                  <div class="mb-3">
                    <label>Charge Name</label>
                    <input type="text" class="form-control" id="charge_name" name="charge_name" placeholder="Charge Name" autocomplete="off">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="mb-3">
                    <label>Charge Type</label>
                    <select class="form-control" id="charge_type" name="charge_type">
                      <option value=""></option>
                      <option value="Room Charge">Room Charge</option>
                      <option value="Restaurant Charge">Restaurant Charge</option>
                    </select>
                  </div>
                </div>
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-success" id="addBtn">Save changes</button>
            <button type="button" class="btn btn-outline-secondary close-add" data-bs-dismiss="modal">Close</button>
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
            <h5 class="modal-title" id="editModalTitle">Room Type Information</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form id="editForm">
              <div class="row">

                <div class="col-md-6">
                  <div class="mb-3">
                    <label>Charge Name</label>
                    <input type="text" class="form-control" id="edit_charge_name" name="charge_name" placeholder="Charge Name" autocomplete="off">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="mb-3">
                    <label>Charge Type</label>
                    <select class="form-control" id="edit_charge_type" name="charge_type">
                      <option value=""></option>
                      <option value="Room Charge">Room Charge</option>
                      <option value="Restaurant Charge">Restaurant Charge</option>
                    </select>
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

    <!-- DELETE MODAL -->
    <div class="modal fade" id="deleteModal" data-bs-backdrop="static" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="editMotalTitle">Delete Room Type</h5>
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

  var charge_type = $('#charge_type').select2({
    placeholder: 'Select Charge Type',
    width: '100%',
    dropdownParent: $('#addModal')
  });

  var edit_charge_type = $('#edit_charge_type').select2({
    placeholder: 'Select Charge Type',
    width: '100%',
    dropdownParent: $('#editModal')
  });

  //FETCH
  var table;
  fetAllActiveHotelCharges();
  async function fetAllActiveHotelCharges(){
    table = $('#zero_config').DataTable({
        processing: true,
        searching: true,
        serverSide: true,
        ajax: {
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          url: "/fetch-all-charges",
          type:"POST"
        },
        columns: [
            {data: 'charge_name'},
            {data: 'charge_type'},
            {
              data: null,
              render: function(data, type, full){
                console.log(full)
                return `
                  <span data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="right" data-bs-html="true" title="Edit">
                    <button class="btn btn-info btn-icon btn-sm btn-edit" data-bs-toggle="modal" data-bs-target="#editModal" data-bs-id="${full.id}"><i class="bx bx-edit"></i></button>
                  </span>
                  <span data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="right" data-bs-html="true" title="Delete">
                    <button class="btn btn-danger btn-icon btn-sm btn-delete" data-bs-id="${full.id}"><i class="bx bx-trash"></i></button>
                  </span>
                `;
              }
            }
        ]
    });
  }


//CREATE
  $('#addBtn').on('click', async function(){
    const form = document.getElementById('addForm');
    const body = {};
    const formData = new FormData(form);
    formData.forEach((value, key) => body[key] = value);
    $.ajax({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      type:"POST",
      url:'/create-charges',
      data:body,
      dataType:'json',
      beforeSend:function(){
      },
      success:function(response){
        if(response.status == 'success'){
          Swal.fire({
            text: response.message,
            icon: 'success',
          });
          table.ajax.reload();
          charge_type.val('').trigger('change');
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

        Swal.fire({
            text: error.responseJSON.message,
            icon: 'error',
          });
      }
    });
  });

  $('.close-add').on('click', async function (e) {
    $('#addModal').find('form')[0].reset();
  });

  //FETCHING FOR VIEWING DATA
  $('#zero_config tbody').on('click','.btn-edit', async function(){
    var id = $(this).attr('data-bs-id');
    hotel_charge_id = id;
    $.ajax({
      type:"GET",
      url:'/fetch-charges-data/'+id,
      data:'',
      dataType:'json',
      beforeSend:function(){
      },
      success:function(response){
        if(response != '' || response != null){
          document.getElementById('edit_charge_name').value = response.charge_name;
          edit_charge_type.val(response.charge_type).trigger('change');
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
      url:'/update-charges-data/'+hotel_charge_id,
      data:body,
      dataType:'json',
      beforeSend:function(){
      },
      success:function(response){
        if(response.status == 'success'){
          Swal.fire({
            text: response.message,
            icon: 'success',
          });
          table.ajax.reload();
          $('#editModal').modal('hide');
        }else{
          Swal.fire({
            text: response.message,
            icon: 'error',
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

   //DELETE
   $('#zero_config tbody').on('click','.btn-delete', async function(){
    var id = $(this).attr('data-bs-id');
    hotel_charge_id = id;

    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, delete it!',
        customClass: {
            confirmButton: 'btn btn-primary me-3',
            cancelButton: 'btn btn-danger'
        },
        buttonsStyling: false
    }).then(function (result) {
      if (result.value) {
        $.ajax({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          type:"POST",
          url:'/delete-charges/'+hotel_charge_id,
          data:'',
          dataType:'json',
          beforeSend:function(){
          },
          success:function(response){
            if(response.status == 'success'){
              Swal.fire({
                text: response.message,
                icon: 'success',
              });
              table.ajax.reload();
            }else{
              Swal.fire({
                text: response.message,
                icon: 'error',
              });
            }
          }
        });
      }
    });
  });

  // $('#deleteBtn').on('click', function(){
  //   $.ajax({
  //     headers: {
  //       'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  //     },
  //     type:"POST",
  //     url:'/delete-charges/'+hotel_charge_id,
  //     data:'',
  //     dataType:'json',
  //     beforeSend:function(){
  //     },
  //     success:function(response){
  //       if(response.status == 'success'){
  //         iziToast.success({
  //           title: 'Success',
  //           message: response.message,
  //           position: 'topRight'
  //         });
  //         table.ajax.reload();
  //         $('#deleteModal').modal('hide');
  //       }else{
  //         iziToast.error({
  //           title: 'Failed',
  //           message: response.message,
  //           position: 'topRight'
  //         });
  //         $('#deleteModal').modal('hide');
  //       }
  //     }
  //   });
  // });

</script>

@endsection
