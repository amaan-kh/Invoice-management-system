@extends('layouts.adminlayout')

@section('title')
IMS
@endsection

@section('maincontent')
<div class="main-panel">
  <div class="content-wrapper">
    <div class="row">
      <div class="col-sm-12">
        <div class="home-tab">

          <div class="tab-content tab-content-basic">
            <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview">
              <div class="row">
                <div class="col-md-4">
                  <div class="card shadow">
                    <div class="card-body">
                      <p class="card-title statistics-title">Total Users Added</p>
                      <h3 id="userCount" class="card-text rate-percentage"></h3>
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="card shadow">
                    <div class="card-body">
                      <p class="card-title statistics-title">Total Invoices Created</p>
                      <h3 id="invoiceCount" class="card-text rate-percentage"></h3>
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="card shadow">
                    <div class="card-body">
                      <p class="card-title statistics-title">Total Invoices Shared</p>
                      <h3 id="allocateCount" class="card-text rate-percentage"></h3>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<button id="bt"> click</button>
<div id="result"></div>

@endsection
@section('scripts')
<script type="text/javascript">
  $(document).ready(function(){ 

    $.ajax({
                url: "{{ route('dashData') }}", // URL to your Laravel route
                type: 'GET',
                dataType: 'json', // Specify the expected data type
                success: function(data) {
                    // This function will be called if the request succeeds
                  console.log(data);

                  $('#userCount').text(data.userCount);
                  $('#invoiceCount').text(data.invoiceCount);
                  $('#allocateCount').text(data.allocateCount);
                },
                error: function(xhr, status, error) {
                    // This function will be called if the request fails
                    console.error('Error:', error); // Log the error to the console
                  }
    });
    
  });

</script>

@endsection

