@extends('layout')

@section('styles')
  <link href="/plugins/sweet-alert2/sweetalert2.min.css" rel="stylesheet" type="text/css">
@endsection

@section('scripts')
  <script src="/plugins/sweet-alert2/sweetalert2.min.js"></script>
@endsection


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
                           :contracts="{{ json_encode($contracts) }}"
                           :url="{{ json_encode(route('profiles.update', [$user->id])) }}"
                           :method="'put'"
            ></profiles-form>
          </div>
        </div> <!-- end col -->
      </div>

    </div> <!-- container -->

  </div>
  <!-- content -->

@endsection
