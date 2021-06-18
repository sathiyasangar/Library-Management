@extends('layout.master')

@push('plugin-styles')
  <!-- {!! Html::style('/assets/plugins/plugin.css') !!} -->
@endpush

@section('content')

@php
  $user_role = Auth::user()->role;
@endphp

<div class="row">
  <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
    <div class="card card-statistics">
      <div class="card-body">
        <div class="d-flex flex-md-column flex-xl-row flex-wrap justify-content-between align-items-md-center justify-content-xl-between">
          <div class="float-left">
            <i class="mdi mdi-alphabetical text-danger icon-lg"></i>
          </div>
          <div class="float-right">
            <p class="mb-0 text-right">Total Language</p>
            <div class="fluid-container">
              <h3 class="font-weight-medium text-right mb-0">{{$languageCount}}</h3>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
    <div class="card card-statistics">
      <div class="card-body">
        <div class="d-flex flex-md-column flex-xl-row flex-wrap justify-content-between align-items-md-center justify-content-xl-between">
          <div class="float-left">
            <i class="mdi mdi-book text-warning icon-lg"></i>
          </div>
          <div class="float-right">
            <p class="mb-0 text-right">Total Books</p>
            <div class="fluid-container">
              <h3 class="font-weight-medium text-right mb-0">{{$bookCount}}</h3>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  @if($user_role == 1)
  <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
    <div class="card card-statistics">
      <div class="card-body">
        <div class="d-flex flex-md-column flex-xl-row flex-wrap justify-content-between align-items-md-center justify-content-xl-between">
          <div class="float-left">
            <i class="mdi mdi-book text-success icon-lg"></i>
          </div>
          <div class="float-right">
            <p class="mb-0 text-right">Subscriber Books</p>
            <div class="fluid-container">
              <h3 class="font-weight-medium text-right mb-0">{{$subscribeCount}}</h3>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  @else
  <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
    <div class="card card-statistics">
      <div class="card-body">
        <div class="d-flex flex-md-column flex-xl-row flex-wrap justify-content-between align-items-md-center justify-content-xl-between">
          <div class="float-left">
            <i class="mdi mdi-book-open-variant text-success icon-lg"></i>
          </div>
          <div class="float-right">
            <p class="mb-0 text-right">Your Books</p>
            <div class="fluid-container">
              <h3 class="font-weight-medium text-right mb-0">{{$usersubscribeCount}}</h3>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  @endif
  <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
    <div class="card card-statistics">
      <div class="card-body">
        <div class="d-flex flex-md-column flex-xl-row flex-wrap justify-content-between align-items-md-center justify-content-xl-between">
          <div class="float-left">
            <i class="mdi mdi-account-box-multiple text-info icon-lg"></i>
          </div>
          <div class="float-right">
            <p class="mb-0 text-right">Total Users</p>
            <div class="fluid-container">
              <h3 class="font-weight-medium text-right mb-0">{{$userCount}}</h3>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@push('plugin-scripts')
  {!! Html::script('/assets/plugins/chartjs/chart.min.js') !!}
  {!! Html::script('/assets/plugins/jquery-sparkline/jquery.sparkline.min.js') !!}
@endpush

@push('custom-scripts')
  {!! Html::script('/assets/js/dashboard.js') !!}
@endpush