@extends('layout')

@section('content')

  <!-- Start content -->
  <div class="content">
    <div class="container-fluid">

      <div class="row">
        <div class="col-12">
          <div class="page-title-box">
            <h4 class="page-title float-left">Venue Settings</h4>

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
            <h4 class="header-title m-t-0 m-b-30">Edit Administrative Settings</h4>

            <settings
                :url="{{ json_encode(route('settings.update')) }}"
                :venue="{{ json_encode($venue) }}"
                :shift-times="{{ json_encode($shiftTimes) }}"
                :pages="{{ json_encode($pages) }}"
                :roles="{{ json_encode($roles) }}"
                :contracts="{{ json_encode($contracts) }}"
            ></settings>
          </div>
        </div> <!-- end col -->
      </div>

    </div> <!-- container -->

  </div>
  <!-- content -->

@endsection
