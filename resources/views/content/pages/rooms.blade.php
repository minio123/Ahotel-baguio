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
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
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
            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
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
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="row">
              <div class="col-md-4">
                <div class="mb-3">
                  <label>Room No.:&nbsp;</label>
                  <label>&nbsp;<b id="view_room_no">301</b></label>
                </div>
              </div>
              <div class="col-md-4">
                <div class="mb-3">
                  <label>Room Type:&nbsp;</label>
                  <label>&nbsp;<b id="view_room_type">Standard Queen</b></label>
                </div>
              </div>
              <div class="col-md-4">
                <div class="mb-3">
                  <label>No of Beds:&nbsp;</label>
                  <label>&nbsp;<b id="view_no_of_beds">2 beds</b></label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="mb-3">
                  <label>Other Room Description</label>
                  <div id="view_other_room_description">
                    N/A
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="mb-3">
                  <label>Created By:&nbsp;</label>
                  <label>&nbsp;<b id="view_added_by">Herminio Amboni Jr</b></label>
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
  var table = $('#zero_config').DataTable({
    processing: true
  });

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
  fetchAllActiveRooms();
  async function fetchAllActiveRooms(){

    // $('.dataTables_processing').css({"display": "block", "z-index": 10000 });

    // if ($.fn.DataTable.isDataTable('#zero_config')){
    //   $('#zero_config').dataTable().fnClearTable();
    //   $('#zero_config').dataTable().fnDestroy();
    // }

    $.ajax({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      type:"POST",
      url:'/fetch-all-rooms',
      data:'',
      dataType:'json',
      beforeSend:function(){
      },
      success:function(response){
        const tBody = document.getElementById('roomBody');
        tBody.innerHTML = '';
        response.forEach(element => {
          var row = document.createElement('tr');

          row.innerHTML = `
          <td>
              ${element.room_no}
          </td>
          <td>
              ${element.room_type_name} (${element.room_type_acronym})
          </td>
          <td>
              ${element.no_of_beds}
          </td>
          <td>
            <span data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="right" data-bs-html="true" title="View">
              <button class="btn btn-primary btn-icon btn-sm" data-bs-toggle="modal" data-bs-target="#viewModal" data-bs-id="${element.id}"><i class="bx bx-show"></i></button>
            </span>
            <span data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="right" data-bs-html="true" title="Edit">
              <button class="btn btn-info btn-icon btn-sm" data-bs-toggle="modal" data-bs-target="#editModal" data-bs-id="${element.id}"><i class="bx bx-edit"></i></button>
            </span>
            <span data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="right" data-bs-html="true" title="Delete">
              <button class="btn btn-danger btn-icon btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal" data-bs-id="${element.id}"><i class="bx bx-trash"></i></button>
              </span>
          </td>

          `;
          $('.dataTables_processing').css({"display": "none", "z-index": 10000 });
          tBody.append(row);
        });
      },
      error: function(error){
       console.log(console.error);
      }
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
          fetchAllActiveRooms();
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

</script>

@endsection
