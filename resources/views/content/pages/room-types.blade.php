@extends('layouts/contentNavbarLayout')

@section('title', '')

@section('content')
<h4 class="fw-bold py-3 mb-4">
  <span class="text-muted fw-light">Rooms /</span> Room Types
</h4>

<div class="row">
  <div class="col-md-12">
    <div class="card mb-4">
      <h5 class="card-header">Room Type Lists</h5>
      <div class="card-body">
        <div class="row">
          <div class="col-12 d-flex justify-content-end">
            <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addModal"><i class="bx bx-plus"></i>&nbsp; Add Room Type</button>
          </div>
          <div class="col-12">
            <div class="table-responsive mt-4">
              <table class="table table-hover" id="zero_config">
                <thead>
                  <th>Room Type Name</th>
                  <th>Room Acronym</th>
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
            <h5 class="modal-title" id="addModalTitle">Room Type Information</h5>
            <button type="button" class="btn-close close-add" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form id="addForm">
              <div class="row">
                <div class="col-md-6">
                  <div class="mb-3">
                    <label>Room Type Name</label>
                    <input type="text" class="form-control" id="room_type_name" name="room_type_name" placeholder="Room Type Name" autocomplete="off">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="mb-3">
                    <label>Room Type Acronym</label>
                    <input type="text" class="form-control" id="room_type_acronym" name="room_type_acronym" placeholder="Room Type Name" autocomplete="off">
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
                    <label>Room Type Name</label>
                    <input type="text" class="form-control" id="edit_room_type_name" name="room_type_name" placeholder="Room Type Name" autocomplete="off">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="mb-3">
                    <label>Room Type Acronym</label>
                    <input type="text" class="form-control" id="edit_room_type_acronym" name="room_type_acronym" placeholder="Room Type Name" autocomplete="off">
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
      <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="viewModalTitle">Room Type Information</h5>
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
    {{-- <div class="modal fade" id="deleteModal" data-bs-backdrop="static" tabindex="-1" aria-hidden="true">
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
    </div> --}}
    <!--END -->

  </div>
</div>

<script>

  //FETCH
  var table;
  fetAllActiveRoomType();
  async function fetAllActiveRoomType(){

    // $('.dataTables_processing').css({"display": "block", "z-index": 10000 });
    // const tBody = document.getElementById('roomTypeBody');
    // tBody.innerHTML = '';
    // $.ajax({
    //   type:"GET",
    //   url:'/fetch-all-room-types',
    //   data:'',
    //   dataType:'json',
    //   beforeSend:function(){
    //   },
    //   success:function(response){
    //     if(response.length > 0){
    //       response.forEach(element =>{
    //         const row = document.createElement('tr');

    //         row.innerHTML = `
    //           <td>${element.room_type_name}</td>
    //           <td>${element.room_type_acronym}</td>
    //           <td>
    //             <span data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="right" data-bs-html="true" title="Edit">
    //               <button class="btn btn-info btn-icon btn-sm btn-edit" data-bs-toggle="modal" data-bs-target="#editModal" data-bs-id="${element.id}">
    //                 <i class="bx bx-edit"></i>
    //               </button>
    //             </span>
    //             <span data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="right" data-bs-html="true" title="Delete">
    //               <button class="btn btn-danger btn-icon btn-sm btn-delete" data-bs-toggle="modal" data-bs-target="#deleteModal" data-bs-id="${element.id}">
    //                 <i class="bx bx-trash"></i>
    //               </button>
    //             </span>
    //           </td>
    //         `;
    //         tBody.appendChild(row);
    //         $('.dataTables_processing').css({"display": "none", "z-index": 10000 });
    //       });
    //     }else{
    //       $('.dataTables_processing').css({"display": "none", "z-index": 10000 });
    //       tBody.innerHTML=`
    //         <tr>
    //           <td colspan="4" class="text-center">
    //             No matching records found
    //           </td>
    //         </tr>
    //       `;
    //     }
    //   },
    //   error: function(error){
    //   console.log(error);
    //   }
    // });

    table = $('#zero_config').DataTable({
        processing: true,
        searching: true,
        serverSide: true,
        ajax: {
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          url: "/fetch-all-room-types",
          type:"POST"
        },
        columns: [
            {data: 'room_type_name'},
            {data: 'room_type_acronym'},
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
      url:'/create-room-type',
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
          icon: 'success',
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
    room_type_id = id;
    $.ajax({
      type:"GET",
      url:'/fetch-room-type-data/'+id,
      data:'',
      dataType:'json',
      beforeSend:function(){
      },
      success:function(response){
        if(response != '' || response != null){
          document.getElementById('edit_room_type_name').value = response.room_type_name;
          document.getElementById('edit_room_type_acronym').value = response.room_type_acronym;
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
      url:'/update-room-type/'+room_type_id,
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

        Swal.fire({
          text: error.responseJSON.message,
          icon: 'error',
        });
      }
    });
  });

   //DELETE
   $('#zero_config tbody').on('click','.btn-delete', async function(){
    var id = $(this).attr('data-bs-id');
    room_type_id = id;
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
          url:'/delete-room-type/'+room_type_id,
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
  //     url:'/delete-room-type/'+room_type_id,
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
