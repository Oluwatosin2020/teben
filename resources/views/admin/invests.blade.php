@extends('admin.layout.app')

@section('content')

    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
          <div class="section-body">
    
                <div class="card">
                  <div class="card-header">
                    <h4>Investment history</h4>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped" id="table-1">
                        <thead>
                          <tr>
                            <th class="text-center">Reference</th>
                            <th>Amount</th>
                            <th>Duration</th>
                            <th>Profit</th>
                            <th>Percent</th>
                            <th>Due Date</th>
                            <th>Status</th>
                            <th>Invest Date</th>
                          </tr>
                        </thead>
                        <tbody>
                        
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
           
        </section>
    </div>

   <!-- Start datatable js -->
  <script src="{{asset('public/dashboard/datatables/datatables.min.js') }}"></script>
  <script src="{{asset('public/dashboard/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js') }}"></script>
  <script src="{{asset('public/dashboard/jquery-ui/jquery-ui.min.js') }}"></script>

@endsection