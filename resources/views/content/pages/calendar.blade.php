@extends('layouts/contentNavbarLayout')

@section('title', 'Rooms')

@section('content')
<h4 class="fw-bold py-3 mb-4">
  <span class="text-muted fw-light">Calendar /</span> Calendar
</h4>

<div class="row">
  <div class="col-md-12">
    <div class="card mb-4">
      <h5 class="card-header"></h5>
      <div class="card-body">
        <div class="row">
          <div class="col-md-4 float-end">
            <div class="mb-3">
              <label>Date Range</label>
              <div id="date_range" class="form-control">
                <i class="fa fa-calendar"></i>&nbsp;
                <span></span> <i class="fa fa-caret-down"></i>
              </div>
            </div>
          </div>
          <div class="col-md-3 float-end">
            <div class="mb-3">
              <label>Room Type</label>
              <select id="room_type">
                <option value="all">All</option>
                <option value="1">Standard Queen</option>
              </select>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <div class="table-responsive mt-4">
              <table class="table table-bordered" style="width: 100%;">
                <thead>
                    <tr>
                      <th rowspan="3" style="width: 10em;" class="text-center calendar-left-header">Room No.</th>
                      <th rowspan="3" style="width: 10em;" class="text-center calendar-left-header">Room Type</th>
                      <th rowspan="3" style="width: 10em;" class="text-center calendar-left-header">Status</th>
                    </tr>
                    <div id="calendar_header_right">
                      <tr>
                        <th colspan="7" class="text-center">
                          <label><b id="calendar_range">26 August 2022 - 1 Sepmtember 2022</b></label>
                        </th>
                      </tr>
                      <tr>
                        <th class="text-center calendar-day-date-header">
                          <p class="calendar-date">26</p>
                          <p class="calendar-day">FRI</p>
                        </th>
                        <th class="text-center calendar-day-date-header">
                          <p class="calendar-date">27</p>
                          <p class="calendar-day">SAT</p>
                        </th>
                        <th class="text-center calendar-day-date-header">
                          <p class="calendar-date">28</p>
                          <p class="calendar-day">SUN</p>
                        </th>
                        <th class="text-center calendar-day-date-header">
                          <p class="calendar-date">29</p>
                          <p class="calendar-day">MON</p>
                        </th>
                        <th class="text-center calendar-day-date-header">
                          <p class="calendar-date">30</p>
                          <p class="calendar-day">TUE</p>
                        </th>
                        <th class="text-center calendar-day-date-header">
                          <p class="calendar-date">31</p>
                          <p class="calendar-day">WED</p>
                        </th>
                        <th class="text-center calendar-day-date-header">
                          <p class="calendar-date">1</p>
                          <p class="calendar-day">THU</p>
                        </th>
                      </tr>
                    </div>
                </thead>
                <tbody id="calendar_body">
                  <tr>
                    <td class="text-center">301</td>
                    <td class="text-center">Standard Queen</td>
                    <td class="text-center">
                      <span class="badge bg-label-danger">Dirty</span>
                    </td>
                    <td colspan="3" class="calendar-check-in">
                      <div class="d-flex justify-content-between">
                        <p class="calendar-guest-no">AHB_08_28_00001</p>
                        <p class="calendar-view"><u>View</u></p>
                      </div>
                      <div class="d-sm-flex justify-content-between">
                        <p class="calendar-date-stay">26 Aug 2022 - 28 Aug 2022</p>
                        <p class="calendar-status">Check-in</p>
                      </div>
                    </td>
                    <td colspan="2" class="calendar-arrival">
                      <div class="d-flex justify-content-between">
                        <p class="calendar-guest-no">AHB_08_28_00001</p>
                        <p class="calendar-view"><u>View</u></p>
                      </div>
                      <div class="d-sm-flex justify-content-between">
                        <p class="calendar-date-stay">26 Aug 2022 - 28 Aug 2022</p>
                        <p class="calendar-status">Check-in</p>
                      </div>
                    </td>
                    <td></td>
                    <td></td>
                    {{-- <td class="calendar-checkout">
                      <div class="d-flex justify-content-between">
                        <p class="calendar-guest-no">AHB_08_28_00001</p>
                        <p class="calendar-view"><u>View</u></p>
                      </div>
                      <div class="d-sm-flex justify-content-between">
                        <p class="calendar-date-stay">26 Aug 2022 - 28 Aug 2022</p>
                        <p class="calendar-status">Check-in</p>
                      </div>
                    </td>
                    <td class="calendar-checkout">
                      <div class="d-flex justify-content-between">
                        <p class="calendar-guest-no">AHB_08_28_00001</p>
                        <p class="calendar-view"><u>View</u></p>
                      </div>
                      <div class="d-sm-flex justify-content-between">
                        <p class="calendar-date-stay">26 Aug 2022 - 28 Aug 2022</p>
                        <p class="calendar-status">Check-in</p> --}}
                      </div>
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
      <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="addModalTitle"> Information</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form id="addForm">
              <div class="row">

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
            <h5 class="modal-title" id="editModalTitle"> Information</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form id="addForm">
              <div class="row">

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
            <h5 class="modal-title" id="viewModalTitle"> Information</h5>
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
    </div>
    <!--END -->

    <!-- DELETE MODAL -->
    <div class="modal fade" id="deleteModal" data-bs-backdrop="static" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="editMotalTitle">Delete </h5>
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
  setup();

  $('#room_type').select2({
    width: '100%'
  });

  function setup(){
    var start = moment();
    var end = moment().add(6, 'days');
    function cb(start, end) {
      $('#date_range span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
    }

    $('#date_range').daterangepicker({
        startDate: start,
        endDate: end,
        ranges: {
           'Today': [moment(), moment()],
           'This Week': [moment(), moment().add(6, 'days')],
           'This Month': [moment().startOf('month'), moment().endOf('month')],
        }
    }, cb);

    cb(start, end);
  }
</script>

@endsection
