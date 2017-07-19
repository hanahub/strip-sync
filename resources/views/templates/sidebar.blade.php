<div class="left side-menu">
  <div class="slimscroll-menu" id="remove-scroll">

    <!--- Sidemenu -->
    <div id="sidebar-menu">
      <!-- Left Menu Start -->
      <ul class="metismenu" id="side-menu">
        <li class="menu-title">@lang('front.NAVIGATION.TITLE')</li>

        <li>
          <a href="{{ route('dashboard') }}"><i class="fi-paper"></i> <span> @lang('front.NAVIGATION.DASHBOARD') </span></a>
        </li>
        @if(Page::profiles()->isEnabled())
          <li>
            <a href="{{ route('profiles.index') }}"><i class="fi-briefcase"></i> <span> @lang('front.NAVIGATION.PROFILES') </span></a>
          </li>
        @endif
        @if(Page::schedule()->isEnabled())
          <li>
            <a href=""><i class="fi-help"></i> <span> @lang('front.NAVIGATION.SCHEDULE') </span></a>
          </li>
        @endif
        @if(Page::stage()->isEnabled())
          <li>
            <a href=""><i class="fi-box"></i> <span> @lang('front.NAVIGATION.STAGE') </span></a>
          </li>
        @endif
        @if(Page::privateRooms()->isEnabled())
          <li>
            <a href=""><i class="fi-bar-graph-2"></i>
              <span> @lang('front.NAVIGATION.PRIVATE_ROOMS') </span></a>
          </li>
        @endif
        <li>
          <a href="javascript: void(0);"><i class="fi-target"></i>
            <span> @lang('front.NAVIGATION.CHECKIN.TITLE') </span> <span
                class="menu-arrow"></span></a>
          <ul class="nav-second-level" aria-expanded="false">
            <li><a href="">@lang('front.NAVIGATION.CHECKIN.SHIFT')</a></li>
            <li><a href="">@lang('front.NAVIGATION.CHECKIN.ROOM')</a></li>
            <li><a href="">@lang('front.NAVIGATION.CHECKIN.STAGE')</a></li>
          </ul>
        </li>
        @if(Page::stats()->isEnabled())
          <li>
            <a href=""><i class="fi-mail"></i> <span> @lang('front.NAVIGATION.STATS') </span></a>
          </li>
        @endif
        <li>
          <a href=""><i class="fi-layout"></i> <span> @lang('front.NAVIGATION.CUSTOMERS') </span></a>
        </li>
        <li>
          <a href=""><i class="fi-clock"></i> <span> @lang('front.NAVIGATION.HISTORY') </span></a>
        </li>
      </ul>

    </div>
    <!-- Sidebar -->
    <div class="clearfix"></div>

  </div>
  <!-- Sidebar -left -->

</div>