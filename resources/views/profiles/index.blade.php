@extends('layout')

@section('content')


  <!-- Start content -->
  <div class="content">
    <div class="container-fluid">

      <div class="row">
        <div class="col-12">
          <div class="page-title-box">
            <h4 class="page-title float-left">Employee Profiles</h4>

            <ol class="breadcrumb float-right">
            </ol>

            <div class="clearfix"></div>
          </div>
        </div>
      </div>
      <!-- end row -->


      <div class="row">

        <div class="col-md-12">
          <div class="card-box">
            <profiles-list :users="{{ json_encode($users) }}"></profiles-list>
          </div>
        </div> <!-- end col -->
      </div>

    </div> <!-- container -->

  </div>
  <!-- content -->

@endsection
