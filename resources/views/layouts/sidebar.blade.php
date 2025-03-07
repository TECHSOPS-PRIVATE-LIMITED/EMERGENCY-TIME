<!-- Page sidebar start-->

<aside class="page-sidebar">
          <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
          <div class="main-sidebar" id="main-sidebar">
            <ul class="sidebar-menu" id="simple-bar">

            <li class="sidebar-main-title">
                <div>
                  <h5 class="f-w-700 sidebar-title pt-3">ADMIN MENU</h5>
                </div>
              </li>


               <li class="sidebar-list"> <i class="fa-solid fa-thumbtack"></i><a class="sidebar-link" href="file-manager.html">
                  <svg class="stroke-icon">
                    <use href="../assets/svg/iconly-sprite.svg#Paper"></use>
                  </svg>
                  <h6 class="f-w-600">Dashboard </h6></a>
              </li>

              <!-- <li class="sidebar-list"> <i class="fa-solid fa-thumbtack"></i><a class="sidebar-link" href="javascript:void(0)">
                  <svg class="stroke-icon">
                    <use href="../assets/svg/iconly-sprite.svg#Info-circle"></use>
                  </svg>
                  <h6 class="f-w-600">Subscriptions</h6><i class="iconly-Arrow-Right-2 icli"></i></a>
                <ul class="sidebar-submenu">
                  <li> <a href="{{ route('plans.index')}}">All Plans</a></li>
                  <li> <a href="{{ route('plans.create') }}">Create Plan</a></li>
                </ul>
              </li> -->
              <li class="sidebar-list"> <i class="fa-solid fa-thumbtack"></i><a class="sidebar-link" href="{{ route('specialities.index') }}">
                  <svg class="stroke-icon">
                    <use href="../assets/svg/iconly-sprite.svg#Paper"></use>
                  </svg>
                  <h6 class="f-w-600">Specialities </h6></a>
              </li>


              <li class="sidebar-list"> <i class="fa-solid fa-thumbtack"></i><a class="sidebar-link" href="javascript:void(0)">
                  <svg class="stroke-icon">
                    <use href="../assets/svg/iconly-sprite.svg#Info-circle"></use>
                  </svg>
                  <h6 class="f-w-600">Providers</h6><i class="iconly-Arrow-Right-2 icli"></i></a>
                <ul class="sidebar-submenu">
                  <li> <a href="{{ route('providers.index') }}">Manage Providers</a></li>
                  <li> <a href="{{ route('providers.create') }}">Eroll Providers</a></li>
                </ul>
              </li>

              <li class="sidebar-list"> <i class="fa-solid fa-thumbtack"></i><a class="sidebar-link" href="{{ route('patients.index') }}">
                  <svg class="stroke-icon">
                    <use href="../assets/svg/iconly-sprite.svg#Paper"></use>
                  </svg>
                  <h6 class="f-w-600">Patients </h6></a>
              </li>



              <li class="sidebar-list"> <i class="fa-solid fa-thumbtack"></i><a class="sidebar-link" href="{{ route('appointments.index') }}">
                  <svg class="stroke-icon">
                    <use href="../assets/svg/iconly-sprite.svg#Paper"></use>
                  </svg>
                  <h6 class="f-w-600">Appointments </h6></a>
              </li>


              <!-- <li class="sidebar-list"> <i class="fa-solid fa-thumbtack"></i><a class="sidebar-link" href="javascript:void(0)">
                  <svg class="stroke-icon">
                    <use href="../assets/svg/iconly-sprite.svg#Info-circle"></use>
                  </svg>
                  <h6 class="f-w-600">Accounts</h6><i class="iconly-Arrow-Right-2 icli"></i></a>
                <ul class="sidebar-submenu">
                  <li> <a href="project-list.html">Transactions</a></li>
                  <li> <a href="projectcreate.html">Providers Payout</a></li>
                </ul>
              </li> -->

              <li class="sidebar-list"> <i class="fa-solid fa-thumbtack"></i><a class="sidebar-link" href="javascript:void(0)">
                  <svg class="stroke-icon">
                    <use href="../assets/svg/iconly-sprite.svg#Info-circle"></use>
                  </svg>
                  <h6 class="f-w-600">General Setting</h6><i class="iconly-Arrow-Right-2 icli"></i></a>
                <ul class="sidebar-submenu">
                  <li> <a href="{{ route('roles.index') }}">Roles</a></li>
                  <li> <a href="{{ route('countries.index') }}">Countries</a></li>
                  <li> <a href="projectcreate.html">Payment Gateway</a></li>
                  <li> <a href="projectcreate.html">Video Conferencing</a></li>
                </ul>
              </li>



            </ul>
          </div>
          <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
        </aside>
