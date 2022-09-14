@extends('layouts/contentNavbarLayout')

@section('title', '')

@section('content')
<h4 class="fw-bold py-3 mb-4">
  <span class="text-muted fw-light">Settings /</span> Discounts
</h4>

<div class="row">
  <div class="col-md-12">
    <div class="card mb-4">
      <h5 class="card-header">Discount Lists</h5>
      <div class="card-body">
        <div class="row">
          <div class="col-12 d-flex justify-content-end">
            <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addModal"><i class="bx bx-plus"></i>&nbsp; Add Discount Type</button>
          </div>
          <div class="col-12">
            <div class="table-responsive mt-4">
              <table class="table table-hover" id="zero_config">
                <thead>
                  <th>Discount Name</th>
                  <th>Actions</th>
                </thead>
                <tbody id="disocuntBody">
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
            <h5 class="modal-title" id="addModalTitle">Discount Information</h5>
            <button type="button" class="btn-close close-add" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form id="addForm">
              <div class="row">
                <div class="col-md-12">
                  <div class="mb-3">
                    <label>Discount Name</label>
                    <input type="text" class="form-control" id="discount_name" name="discount_name" placeholder="Discount Name" autocomplete="off">
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
            <h5 class="modal-title" id="editModalTitle">Discount Information</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form id="editForm">
              <div class="row">
                <div class="col-md-12">
                  <div class="mb-3">
                    <label>Discount Name</label>
                    <input type="text" class="form-control" id="edit_discount_name" name="discount_name" placeholder="Discount Name" autocomplete="off">
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
    <div class="modal fade" id="deleteModal" data-bs-backdrop="static" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="editMotalTitle">Delete Discount Type</h5>
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

  //FETCH
  var table;
  fetchAllActiveDiscout();
  async function fetchAllActiveDiscout(){

    table = $('#zero_config').DataTable({
        processing: true,
        searching: true,
        serverSide: true,
        ajax: {
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          url: "/fetch-all-discount",
          type:"POST"
        },
        columns: [
            {data: 'discount_name'},
            {
              data: null,
              render: function(data, type, full){
                console.log(full)
                return `
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
    $.ajax({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      type:"POST",
      url:'/create-discount',
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
  $('#zero_config tbody').on('click','.btn-edit', async function(){
    var id = $(this).attr('data-bs-id');
    discount_id = id;
    $.ajax({
      type:"GET",
      url:'/fetch-discount-data/'+id,
      data:'',
      dataType:'json',
      beforeSend:function(){
      },
      success:function(response){
        if(response != '' || response != null){
          document.getElementById('edit_discount_name').value = response.discount_name;
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
      url:'/update-discount-data/'+discount_id,
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
    discount_id = id;
  });

  $('#deleteBtn').on('click', function(){
    $.ajax({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      type:"POST",
      url:'/delete-disocunt/'+discount_id,
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
