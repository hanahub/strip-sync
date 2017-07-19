@extends('layout')

@section('content')


  <!-- Start content -->
  <div class="content">
    <div class="container-fluid">

      <div class="row">
        <div class="col-12">
          <div class="page-title-box">
            <h4 class="page-title float-left">@{{ $t("PROFILES.PAGE_TITLE") }}</h4>

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
            <profiles-form :user="{{ json_encode($user) }}"
                           :roles="{{ json_encode($roles) }}"
                           :nationalities="{{ json_encode($nationalities) }}"
                           :eye-colors="{{ json_encode($eyeColors) }}"
                           :hair-colors="{{ json_encode($hairColors) }}"
            ></profiles-form>
          </div>
        </div> <!-- end col -->
      </div>

    </div> <!-- container -->

  </div>
  <!-- content -->

@endsection
