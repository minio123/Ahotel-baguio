@extends('layouts/contentNavbarLayout')

@section('title', 'Rooms')

@section('content')
<h4 class="fw-bold py-3 mb-4">
  <span class="text-muted fw-light">Rooms /</span> Rooms
</h4>

<div class="row">
  <div class="col-md-12">
    <div class="card mb-4">
      <h5 class="card-header">Room Lists</h5>
      <div class="card-body">
        <div class="row">
          <div class="col-12 d-flex justify-content-end">
            <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addModal"><i class="bx bx-plus"></i>&nbsp; Add Room</button>
          </div>
          <div class="col-12">
            <div class="table-responsive mt-4">
              <table class="table table-hover" id="zero_config">
                <thead>
                  <th>Room No.</th>
                  <th>Room Type</th>
                  <th>No. of Beds</th>
                  <th>Room Rate</th>
                  <th>Actions</th>
                </thead>
                <tbody id="roomBody">
                  {{-- <tr>
                    <td>301</td>
                    <td>Standard Economy</td>
                    <td>2</td>
                    <td>
                      <span data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="right" data-bs-html="true" title="View"><button class="btn btn-primary btn-icon btn-sm" data-bs-toggle="modal" data-bs-target="#viewModal"><i class="bx bx-show"></i></button></span>
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
      <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="addModalTitle">Room Information</h5>
            <button type="button" class="btn-close close-add" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form id="addForm">
              <div class="row">
                <div class="col-md-6">
                  <div class="mb-3">
                    <label>Room No.</label>
                    <input type="text" class="form-control" id="room_no" name="room_no" placeholder="Room No" autocomplete="off">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="mb-3">
                    <label>Room Type</label>
                    <select id="room_type_id" name="room_type_id">
                      <option value=""></option>
                    </select>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="mb-3">
                    <label>No of Beds</label>
                    <input type="number" class="form-control" id="no_of_beds" name="no_of_beds" min="1" value="1" autocomplete="off">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="mb-3">
                    <label>Room Rate</label>
                    <input type="text" class="form-control" id="room_rate" name="room_rate" placeholder="Room Rate" autocomplete="off">
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="mb-3">
                    <label>Other Room Description</label>
                    <textarea class="form-control w-100" id="room_details" name="room_details" rows="5"></textarea>
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
      <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="editModalTitle">Room Information</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form id="editForm">
              <div class="row">
                <div class="col-md-6">
                  <div class="mb-3">
                    <label>Room No.</label>
                    <input type="text" class="form-control" id="edit_room_no" name ="room_no" placeholder="Room No" autocomplete="off">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="mb-3">
                    <label>Room Type</label>
                    <select id="edit_room_type_id" name="room_type_id">
                      <option value=""></option>
                    </select>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="mb-3">
                    <label>No of Beds</label>
                    <input type="number" class="form-control" id="edit_no_of_beds" name="no_of_beds" min="1" value="1" autocomplete="off">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="mb-3">
                    <label>Room Rate</label>
                    <input type="text" class="form-control" id="edit_room_rate" name="room_rate" placeholder="Room Rate" autocomplete="off">
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="mb-3">
                    <label>Other Room Description</label>
                    <textarea class="form-control w-100" id="edit_room_details" name="room_description" rows="5"></textarea>
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
    <div class="modal fade" id="viewModal" data-bs-backdrop="static" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="viewModalTitle">Room Information</h5>
            <button type="button" class="btn-close close-view" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="row">
              <div class="col-md-6">
                <div class="mb-3">
                  <label>Room No.:&nbsp;</label>
                  <label>&nbsp;<b id="view_room_no">Loading...</b></label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="mb-3">
                  <label>Room Type:&nbsp;</label>
                  <label>&nbsp;<b id="view_room_type_name">Loading...</b></label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="mb-3">
                  <label>Room Rate:&nbsp;</label>
                  <label>&nbsp;<b id="view_room_rate">Loading...</b></label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="mb-3">
                  <label>No of Beds:&nbsp;</label>
                  <label>&nbsp;<b id="view_no_of_beds"></b></label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="mb-3">
                  <label>Other Room Description</label>
                  <div id="view_room_description">
                    Loading...
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="mb-3">
                  <label>Created By:&nbsp;</label>
                  <label>&nbsp;<b id="view_added_by">Loading...</b></label>
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
            <h5 class="modal-title" id="editMotalTitle">Delete Room</h5>
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
  // var table = $('#zero_config').DataTable({
  //   processing: true
  // });

  var room_no = new Cleave('#room_no', {
    numeral: true,
    numeralThousandsGroupStyle: 'none'
  });

  var edit_room_no = new Cleave('#edit_room_no', {
    numeral: true,
    numeralThousandsGroupStyle: 'none'
  });

  var no_of_beds = new Cleave('#no_of_beds', {
    numeral: true,
    numeralThousandsGroupStyle: 'none'
  });

  var room_rate = new Cleave('#room_rate', {
    numeral: true,
    numeralThousandsGroupStyle: 'thousand'
  });

  var edit_no_of_beds = new Cleave('#edit_no_of_beds', {
    numeral: true,
    numeralThousandsGroupStyle: 'none'
  });

  var room_type = $('#room_type_id').select2({
    dropdownParent: $('#addModal'),
    width: '100%',
    allowClear: true,
    placeholder: 'Select Room Type'
  });

  var edit_room_type = $('#edit_room_type_id').select2({
    dropdownParent: $('#editModal'),
    width: '100%',
    allowClear: true,
    placeholder: 'Select Room Type'
  });

  var edit_room_rate = new Cleave('#edit_room_rate', {
    numeral: true,
    numeralThousandsGroupStyle: 'thousand'
  });

  $('#room_details').summernote({
    placeholder: 'Enter Room Description Here',
    tabsize: 0,
    height: 200,
    toolbar: []
  });

  $('#edit_room_details').summernote({
    placeholder: 'Enter Room Description Here',
    tabsize: 0,
    height: 200,
    toolbar: []
  });



  //FETCHING SELECT2
  getSelect2();
  async function getSelect2(){
    $.ajax({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      type:"GET",
      url:'/get-rooms',
      data:'',
      dataType:'json',
      beforeSend:function(){
      },
      success:function(response){
        if(response.length > 0){
          response.forEach(element => {
            var newOption = new Option(element.room_type_name+' ('+element.room_type_acronym+')', element.id, false, false);
            room_type.append(newOption).trigger('change');
          });
          response.forEach(element => {
            var newOption = new Option(element.room_type_name+' ('+element.room_type_acronym+')', element.id, false, false);
            edit_room_type.append(newOption).trigger('change');
          });
        }
      },
      error: function(error){
       console.log(console.error);
      }
    });
  }

  //FETCH
  var table;
  fetchAllActiveRooms();
  async function fetchAllActiveRooms(){
      table = $('#zero_config').DataTable({
        processing: true,
        searching: true,
        serverSide: true,
        ajax: {
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          url: "/fetch-all-rooms",
          type:"POST"
        },
        columns: [
            {data: 'room_no'},
            {
              data: null,
              render: function(data, type, full){
                return full.room_type_name +" ("+full.room_type_acronym+")"
              }
            },
            {data: 'no_of_beds'},
            {data: 'room_rate'},
            {
              data: null,
              render: function(data, type, full){
                return `
                  <span data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="right" data-bs-html="true" title="View">
                    <button class="btn btn-primary btn-icon btn-sm btn-view" data-bs-toggle="modal" data-bs-target="#viewModal" data-bs-id="${full.id}"><i class="bx bx-show"></i></button>
                  </span>
                  <span data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="right" data-bs-html="true" title="Edit">
                    <button class="btn btn-info btn-icon btn-sm btn-edit" data-bs-toggle="modal" data-bs-target="#editModal" data-bs-id="${full.id}"><i class="bx bx-edit"></i></button>
                  </span>
                  <span data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="right" data-bs-html="true" title="Delete">
                    <button class="btn btn-danger btn-icon btn-sm btn-delete" data-bs-toggle="modal" data-bs-target="#deleteModal" data-bs-id="${full.id}"><i class="bx bx-trash"></i></button>
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
    body.files = '';
    $.ajax({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      type:"POST",
      url:'/create-room',
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
          // fetchAllActiveRooms();
          table.ajax.reload();
          room_type.val('').trigger('change');
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
    $('#addModal').find('form')[0].reset();
  });

  //FETCHING FOR VIEWING DATA
  $('#zero_config tbody').on('click','.btn-edit, .btn-view', async function(){
    var id = $(this).attr('data-bs-id');
    room_id = id;
    var cName = this.className;
    $.ajax({
      type:"GET",
      url:'/fetch-room-data/'+id,
      data:'',
      dataType:'json',
      beforeSend:function(){
      },
      success:function(response){
        if(response != '' ||response != null){
          if(cName == "btn btn-primary btn-icon btn-sm btn-view"){
            document.getElementById('view_room_no').innerHTML = response.room_no;
            document.getElementById('view_room_type_name').innerHTML = response.room_type_name;
            document.getElementById('view_no_of_beds').innerHTML = response.no_of_beds;
            document.getElementById('view_room_rate').innerHTML = response.room_rate;
            document.getElementById('view_added_by').innerHTML = response.name;

            if(response.room_description == '' || response.room_description == null){
              document.getElementById('view_room_description').innerHTML = 'N/A';
            }else{
              document.getElementById('view_room_description').innerHTML = response.room_description;
            }

          }else{
            document.getElementById('edit_room_no').value = response.room_no;
            edit_room_type.val(response.room_type_id).trigger('change');
            document.getElementById('edit_no_of_beds').value = response.no_of_beds;
            document.getElementById('edit_room_rate').value = response.room_rate;
          }
        }
      },
      error: function(error){
      console.log(error);
      }
    });
  });

  $('.close-view').on('click', async function (e) {
    document.getElementById('view_room_no').innerHTML = "Loading...";
    document.getElementById('view_room_type_name').innerHTML = "Loading...";
    document.getElementById('view_no_of_beds').innerHTML = "Loading...";
    document.getElementById('view_room_rate').innerHTML = "Loading...";
    document.getElementById('view_added_by').innerHTML = "Loading...";
    document.getElementById('view_room_description').innerHTML = "Loading...";
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
      url:'/update-room/'+room_id,
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
          table.ajax.reload();
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

  //DELETE
   $('#zero_config tbody').on('click','.btn-delete', async function(){
    var id = $(this).attr('data-bs-id');
    room_id = id;
  });

  $('#deleteBtn').on('click', function(){
    $.ajax({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      type:"POST",
      url:'/delete-room/'+room_id,
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
          table.ajax.reload();
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
