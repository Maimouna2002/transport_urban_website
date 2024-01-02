@extends('layouts/contentNavbarLayout')

@section('title', 'Dashboard - Analytics')

@section('vendor-style')
<link rel="stylesheet" href="{{asset('assets/vendor/libs/apex-charts/apex-charts.css')}}">
@endsection

@section('vendor-script')
<script src="{{asset('assets/vendor/libs/apex-charts/apexcharts.js')}}"></script>
@endsection

@section('page-script')
<script src="{{asset('assets/js/dashboards-analytics.js')}}"></script>
@endsection

@section('content')
<div class="card">
  <div class="card-body">
    <h5 class="card-title">Statistiques</h5>
    <div class="row">
      <div class="col-md-4">
          <div class="card">
              <div class="card-body">
                <i class="bx bx-file text-warning" style="font-size: 25px; color: blue; margin-right: 5px;"></i> Compagnies </h6>
                  <p class="card-text text-warning text-center" style="font-size: 32px; color: blue; font-weight: bold;">
                    {{ app('App\Http\Controllers\Admin\CompanyController')->count() }}</p>

              </div>
          </div>
      </div>
      <div class="col-md-4">
          <div class="card">
              <div class="card-body">
                  <i class="bx bx-file text-warning" style="font-size: 25px; color: blue; margin-right: 5px;"></i> Itineraires </h6>
                  <p class="card-text text-warning text-center" style="font-size: 32px; color: blue; font-weight: bold;">
                    {{ app('App\Http\Controllers\Admin\ItineraryController')->count() }}
                </p>
                </p>
              </div>
          </div>
      </div>
      <div class="col-md-4">
          <div class="card">
              <div class="card-body">
                <i class="bx bx-file text-warning" style="font-size: 25px; color: blue; margin-right: 5px;"></i> Utilisateurs </h6>
                  <p class="card-text text-warning text-center" style="font-size: 32px; color: blue; font-weight: bold;">
              </div>
          </div>
      </div>
  </div>
    </div>
  </div>
</div>

@endsection
