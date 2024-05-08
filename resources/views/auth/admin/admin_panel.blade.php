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
                <div class="col-sm-12">
                  <div class="statistics-details d-flex align-items-center justify-content-around">
                    <div>
                      <p class="statistics-title">Total Users Added</p>
                      <h3 class="rate-percentage">50</h3>
                      <p class="text-danger d-flex"><i class="mdi mdi-menu-down"></i><span>-0.5%</span></p>
                    </div>
                    <div>
                      <p class="statistics-title">Total Invoices Created</p>
                      <h3 class="rate-percentage">7,682</h3>
                      <p class="text-success d-flex"><i class="mdi mdi-menu-up"></i><span>+0.1%</span></p>
                    </div>
                    <div>
                      <p class="statistics-title">Total Invoices Shared</p>
                      <h3 class="rate-percentage">68.8</h3>
                      <p class="text-danger d-flex"><i class="mdi mdi-menu-down"></i><span>68.8</span></p>
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
@endsection

