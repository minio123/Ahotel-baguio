@extends('layouts/contentNavbarLayout')

@section('title', '')

@section('content')
<h4 class="fw-bold py-3 mb-4">
  <span class="text-muted fw-light">Guest Lists /</span> Guest Lists
</h4>

<div class="row">
  <div class="col-md-12">
    <div class="card mb-4">
      <h5 class="card-header">Guest Lists </h5>
      <div class="card-body">
        <div class="row">
          <div class="col-12 d-flex justify-content-end">
            <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addModal"><i class="bx bx-user-plus"></i>&nbsp; Add Guests</button>
          </div>
          <div class="col-12">
            <div class="table-responsive mt-4">
              <table class="table table-hover dt-responsive nowrap" style="width:100%;" id="zero_config">
                <thead>
                  <th>Guest No</th>
                  <th>Room No</th>
                  <th>Bookers Name</th>
                  <th>Arrival Date</th>
                  <th>Departure Date</th>
                  <th>No of Adults</th>
                  <th>No of Kids</th>
                  <th >Balance</th>
                  <th>Guest Status</th>
                  <th>Payment Status</th>
                  <th>Actions</th>
                </thead>
                <tbody>
                  <tr>
                    <td>A-22-00001</td>
                    <td>301<br>302</td>
                    <td>Herminio Amboni Jr</td>
                    <td>26 Aug 2022</td>
                    <td>28 Aug 2022</td>
                    <td>1</td>
                    <td>0</td>
                    <td><i class="text-danger">0</i></td>
                    <td>
                      <span class="badge bg-label-success">Check In</span>
                    </td>
                    <td>
                      <span class="badge bg-label-success">Paid</span>
                    </td>
                    <td>
                      <span data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="right" data-bs-html="true" title="View"><button class="btn btn-primary btn-icon btn-sm" data-bs-toggle="modal" data-bs-target="#viewModal"><i class="bx bx-show"></i></button></span>
                      <span data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="right" data-bs-html="true" title="Edit"><button class="btn btn-info btn-icon btn-sm" data-bs-toggle="modal" data-bs-target="#editModal"><i class="bx bx-edit"></i></button></span>
                      <span data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="right" data-bs-html="true" title="Cancel"><button class="btn btn-danger btn-icon btn-sm" data-bs-toggle="modal" data-bs-target="#cancelModal"><i class="bx bx-user-x"></i></button></span>
                      <span data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="right" data-bs-html="true" title="No Show"><button class="btn btn-warning btn-icon btn-sm" data-bs-toggle="modal" data-bs-target="#noShowModal"><i class="bx bx-minus"></i></button></span>
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
      <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="addModalTitle">Guest Information</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form id="addForm">
              {{-- TRANSACTION INFO ROW --}}
              <div class="row">
                <div class="col-md-3">
                  <div class="mb-3">
                    <label>Transaction Type</label>
                    <select name="transaction_type" id="transaction_type" class="form-control">
                      <option value=""></option>
                      <option value="walk-in">Walk-In</option>
                      <option value="reservation">Reservation</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="mb-3">
                    <label>Booking Source</label>
                    <select name="booking_source" id="booking_source" class="form-control">
                      <option value=""></option>
                    </select>
                  </div>
                </div>
              </div>

              {{-- GUEST INFO ROW --}}
              <div class="row">
                <div class="col-md-4">
                  <div class="mb-4">
                    <label>Guest No</label>
                    <input type="text" class="form-control" name="guest_no" id="guest_no" placeholder="" autocomplete="off" readonly value="{{$data}}">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="mb-3">
                    <label>Surname</label>
                    <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Surname" autocomplete="off">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="mb-3">
                    <label>First Name</label>
                    <input type="text" class="form-control" name="first_name" id="first_name" placeholder="First Name" autocomplete="off">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="mb-3">
                    <label>Address</label>
                    <input type="text" class="form-control" name="address" id="address" placeholder="Address" autocomplete="off">
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="mb-3">
                    <label>Contact Number</label>
                    <input type="text" class="form-control" name="contact_number" id="contact_number" placeholder="Contact Number" autocomplete="off">
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="mb-3">
                    <label>Email Address</label>
                    <input type="text" class="form-control" name="email" id="email" placeholder="Email Address" autocomplete="off">
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="mb-3">
                    <label>Date of Birth</label>
                    <input type="text" class="form-control" name="birth_date" id="birth_date" placeholder="Date of Birth" autocomplete="off">
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="mb-3">
                    <label>Nationality</label>
                    <input type="text" class="form-control" name="nationality" id="nationality" placeholder="Nationality" autocomplete="off">
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="mb-3">
                    <label>Company/Organization</label>
                    <input type="text" class="form-control" name="company" id="company" placeholder="Company/Organization" autocomplete="off">
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="mb-3">
                    <label>Plate Number</label>
                    <input type="text" class="form-control" name="plate_number" id="plate_number" placeholder="Plate Number" autocomplete="off">
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="mb-3">
                    <label>Arrival Date</label>
                    <input type="text" class="form-control" name="arrival_date" id="arrival_date" value="<?php echo date('Y-m-d')?>" autocomplete="off">
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="mb-3">
                    <label>Arrival Time</label>
                    <input type="text" class="form-control timepicker" name="arrival_time" id="arrival_time">
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="mb-3">
                    <label>Departure Date</label>
                    <input type="text" class="form-control" name="departure_date" id="departure_date" value="<?php echo date('Y-m-d')?>" autocomplete="off">
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="mb-3">
                    <label>Departure Time</label>
                    <input type="text" class="form-control timepicker" name="departure_time" id="departure_time">
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="mb-3">
                    <label>Leng of Stay</label>
                    <input type="text" class="form-control" name="length_of_stay" id="length_of_stay" autocomplete="off" value="1" readonly>
                  </div>
                </div>
              </div>

              {{-- COMPANION INFO ROW --}}
              <div class="row mt-5">
                <div class="col-12 mb-3">
                  <h5 class="modal-title">Companions Info</h5>
                  <hr>
                </div>
                <div class="col-md-6">
                  <div class="mb-3">
                    <label>Full Name of Companion</label>
                    <div class="input-group">
                      <input type="text" class="form-control" name="compantion_name" id="companion_name" placeholder="Full Name" autocomplete="off">
                      <button class="btn btn-success" id="addCompanion">Add</button>
                    </div>
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="mb-3">
                    <label>No. of Adutls</label>
                    <input type="number" class="form-control" name="adult" id="adult" min="1" value="1" autocomplete="off">
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="mb-3">
                    <label>No. of kids</label>
                    <input type="number" class="form-control" name="kids" id="kids" min="0" value="0" autocomplete="off">
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="mb-3">
                    <label>Total No. of Person</label>
                    <input type="text" class="form-control" name="total_person" id="total_person" value="1" autocomplete="off" readonly>
                  </div>
                </div>
                <div class="col-12">
                  <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th colspan="3" class="text-center text-danger">Compantion Lists</th>
                      </tr>
                      <tr>
                        <th style="width: 30px;" class="text-center">No</th>
                        <th style="width: 70%;">Full Name</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody id="companionBody">
                      <td class="text-center">1</td>
                      <td>Kathleen Gay Amboni</td>
                      <td>
                        <button type="button" id="editCompBtn" class="btn btn-icon btn-sm btn-info" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Edit"><i class="bx bx-edit"></i></button>
                        <button type="button" id="removeCompBtn" class="btn btn-icon btn-sm btn-danger" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Remove"><i class="bx bx-trash"></i></button>
                        <button type="button" id="setMasterCompBtn" class="btn btn-icon btn-sm btn-success" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Set as Master Payer"><i class="bx bx-credit-card"></i></button>
                      </td>
                    </tbody>
                  </table>
                </div>
              </div>

              {{-- ROOM INFORMATION --}}
              <div class="row mt-5">
                <div class="col-12">
                  <h5 class="modal-tittle">Room Information</h5>
                </div>
                <div class="col-md-4">
                  <div class="mb-3">
                    <label>Room No.</label>
                    <select type="text" class="form-control" name="room_no" id="room_no">
                      <option value=""></option>
                    </select>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="mb-3">
                    <label>Rate</label>
                    <input type="text" class="form-control" name="rate" id="rate" placeholder="Rate" autocomplete="off">
                  </div>
                </div>
                <div class="col-2">
                  <div class="mb-3">
                    <button type="button" class="btn btn-success mt-4" id="addRoomBtn">Add Room</button>
                  </div>
                </div>
                <div class="col-12">
                  <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th colspan="3" class="text-center text-danger">Room Lists</th>
                      </tr>
                      <tr>
                        <th style="width: 30px;" class="text-center">No</th>
                        <th style="width: 70%;">Full Name</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody id="roomListBody">
                      <td class="text-center">1</td>
                      <td>301</td>
                      <td>
                        <button type="button" id="removeRBtn" class="btn btn-icon btn-sm btn-danger" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Remove"><i class="bx bx-trash"></i></button>
                        <button type="button" id="masterRmBtn" class="btn btn-icon btn-sm btn-success" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Set as Master Room"><i class="bx bx-check"></i></button>
                      </td>
                    </tbody>
                  </table>
                </div>
              </div>

              {{-- PAYMENT INFORMATION --}}
              <div class="row mt-5">
                <div class="col-12">
                  <h5 class="modal-tittle">Payment Information</h5>
                </div>
                <div class="col-12">
                  <div class="mb-4 mt-3">
                    <h5 class="modal-tittle">
                      <span><b>Balance:&nbsp;</b>Php.</span>&nbsp;<span class="text-danger" id="balance">3,000.00</span>
                    </h5>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="mb-3">
                    <label>Mode of Payment</label>
                    <select name="payment_type" id="payment_type" class="form-control">
                      <option value=""></option>
                      <option value="Bank Transfer">Bank Transfer</option>
                      <option value="Cash">Cash</option>
                      <option value="Credit Card">Credit Card</option>
                      <option value="Debit Card">Debit Card</option>
                      <option value="Gcash">Gcash</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="mb-3">
                    <label>Bank Name</label>
                    <input type="text" class="form-control" name="bank_name" id="bank_name" placeholder="Bank Name" autocomplete="off">
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="mb-3">
                    <label>Payment Status</label>
                    <select name="payment_status" id="payment_status" class="form-control">
                      <option value=""></option>
                      <option value="Initial Deposit">Initial Deposit</option>
                      <option value="Fully Payment">Fully Payment</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="mb-3">
                    <label>Payment Amount</label>
                    <input type="text" class="form-control" name="payment_amount" id="payment_amount" placeholder="Payment Amount" autocomplete="off">
                  </div>
                </div>

                <div class="col-12">
                  <div class="mb-3">
                    <label>
                      <input type="checkbox" class="form-check-input" name="is_discounted" id="is_discounted">&nbsp;Apply Discount
                    </label>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="mb-3">
                    <label>Discount Type</label>
                    <select name="disc_type" id="disc_type" class="form-control">
                      <option value=""></option>
                      <option value="Senior Citizen Discount">Senior Citizen Discount</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="mb-3">
                    <label>Number of Senior</label>
                    <input type="number" class="form-control" name="senior" id="senior" min="0" value="0" autocomplete="off">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="mb-3">
                    <label>Discount Amount</label>
                    <input type="text" class="form-control" name="disc_amount" id="disc_amount" placeholder="Discount Amount" autocomplete="off">
                  </div>
                </div>
                {{-- <div class="col-md-3">
                  <div class="mb-3">
                    <label>Discount Approved By</label>
                    <select name="disc_approved_by" id="disc_approved_by" class="form-control">
                      <option value=""></option>
                      <option value="1">Hermin Doton Amboni</option>
                    </select>
                  </div>
                </div> --}}
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
      <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="editModalTitle"> Information</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form id="editForm">
              <div class="row">
                <div class="col-md-12">
                  <div class="mb-3">
                    <label>Full Name</label>
                    <input type="text" class="form-control" id="edit_full_name" placeholder="Full Name" autocomplete="off">
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
      <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="viewModalTitle"> Information</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="row">

            </div>
          </div>
        </div>
      </div>
    </div>
    <!--END -->

    <!-- DELETE MODAL -->
    <div class="modal fade" id="cancelModal" data-bs-backdrop="static" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog modal-sm modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="cancelModalTitle">Cancel Booking</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="row">
              <div class="col-12">
                <div class="mb-3">
                  <label>Reason for cancelling</label>
                  <input type="text" class="form-control" name="cancel_reason" id="cancel_reason">
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-success" id="cancelBtn" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#confirmCancelModal">Save</button>
            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
    <div class="modal fade" id="confirmCancelModal" data-bs-backdrop="static" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog modal-sm modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
          <div class="modal-header">
            {{-- <h5 class="modal-title" id="confirmCancelModalTitle">Cancel Booking</h5> --}}
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
            <button type="button" class="btn btn-danger" id="cancelBtn">Yes, cancel it!</button>
            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#cancelModal">Close</button>
          </div>
        </div>
      </div>
    </div>
    <!--END -->


    <!-- NO SHOW MODAL -->
    <div class="modal fade" id="noShowModal" data-bs-backdrop="static" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog modal-sm modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="confirmCancelModalTitle">Guest did not show?</h5>
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
            <button type="button" class="btn btn-danger" id="noShowBtn">Yes</button>
            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
    <!--END -->

  </div>
</div>

<script>

  const day = new Date();

  $('#zero_config').DataTable({
  });

  var transaction_type = $('#transaction_type').select2({
    dropdownParent: $('#addModal'),
    width: '100%',
    placeholder:'Select Transaction Type'
  });

  var booking_source = $('#booking_source').select2({
    dropdownParent: $('#addModal'),
    width: '100%',
    placeholder:'Select Bookin Source'
  });

  var room_no = $('#room_no').select2({
      dropdownParent: $('#addModal'),
      width: '100%',
      multiple: false,
      allowClear: true,
      placeholder: "Select Room No."
  });

  var payment_type = $('#payment_type').select2({
    dropdownParent: $('#addModal'),
    width: '100%',
    placeholder:'Select Payment Type'
  });

  var payment_status = $('#payment_status').select2({
    dropdownParent: $('#addModal'),
    width: '100%',
    placeholder:'Select Payment Status'
  });

  var disc_type = $('#disc_type').select2({
    dropdownParent: $('#addModal'),
    width: '100%',
    placeholder:'Select Discount Type'
  });

  $('.timepicker').mdtimepicker({
    theme: 'teal'
  });

  var arrival_date = new Pikaday({
    field: $('#arrival_date')[0],
    minDate: new Date(day.setDate(day.getDate() + 1)),
    yearRange: [1900, day.getFullYear()],
    theme: 'month-year',
    toString(date, format) { // using moment
        return moment(date).format('MMMM DD, YYYY');
    },
  });

  var birth_date = new Pikaday({
    field: $('#birth_date')[0],
    minDate: new Date(day.setDate(day.getDate() + 1)),
    yearRange: [1900, day.getFullYear()],
    theme: 'month-year',
    toString(date, format) { // using moment
        return moment(date).format('MMMM DD, YYYY');
    },
  });

  var departure_date = new Pikaday({
    field: $('#departure_date')[0],
    minDate: new Date(day.setDate(day.getDate())),
    yearRange: [1900, day.getFullYear()],
    theme: 'month-year',
    toString(date, format) { // using moment
      return moment(date).format('MMMM DD, YYYY');
    },
  });

  var birthday = new Pikaday({
    field: $('#birthday')[0],
    yearRange: [1900, day.getFullYear()],
    theme: 'month-year',
    toString(date, format) { // using moment
      return moment(date).format('MMMM DD, YYYY');
    },
  });

  // $('#disc_approved_by').select2({
  //   width: '100%',
  //   placeholder:'Select '
  // });

  getAllSelect2Data();

  async function getAllSelect2Data(){
    $.ajax({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      type:"POST",
      url:'/guest-select-data',
      data:'',
      dataType:'json',
      beforeSend:function(){
      },
      success:function(response){
        if(response.room_lists.length > 0){
          response.room_lists.forEach(element =>{
            var newOption = new Option(element.room_no, element.id, false, false);
            room_no.append(newOption).trigger('change');
          });
        }

        if(response.booking_source.length > 0){
          response.booking_source.forEach(element =>{
            var newOption = new Option(element.source_name, element.id, false, false);
            booking_source.append(newOption).trigger('change');
          });
        }
      }
    });
  }

</script>

@endsection
