  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      {{-- <a href="index3.html" class="brand-link">
      <img src="{{ asset('admin') }}/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a> --}}

      <!-- Sidebar -->
      <div class="sidebar">
          <!-- Sidebar user panel (optional) -->
          <div class="user-panel mt-3 pb-3 mb-3 d-flex">
              <div class="image">
                  <img src="{{ asset('admin') }}/dist/img/user2-160x160.jpg" class="img-circle elevation-2"
                      alt="User Image">
              </div>
              <div class="info">
                  <a href="#" class="d-block">{{ auth()->guard('admin')->user()->name }}</a>
              </div>
          </div>

          <!-- SidebarSearch Form -->
          {{-- <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div> --}}

          <!-- Sidebar Menu -->
          <nav class="mt-2">
              <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                  data-accordion="false">
                  <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

                  {{-- Admins --}}
                  <li class="nav-item {{ request()->routeIs('dashboard.admins.*') ? ' menu-open' : '' }}">
                      <a href="#" class="nav-link {{ request()->routeIs('dashboard.admins.*') ? 'active' : '' }}">
                          <i class=" nav-icon">
                              {{-- <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                  class="bi bi-person-vcard-fill" viewBox="0 0 16 16">
                                  <path
                                      d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm9 1.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 0-1h-4a.5.5 0 0 0-.5.5M9 8a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 0-1h-4A.5.5 0 0 0 9 8m1 2.5a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 0-1h-3a.5.5 0 0 0-.5.5m-1 2C9 10.567 7.21 9 5 9c-2.086 0-3.8 1.398-3.984 3.181A1 1 0 0 0 2 13h6.96q.04-.245.04-.5M7 6a2 2 0 1 0-4 0 2 2 0 0 0 4 0" />
                              </svg> --}}
                              <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                                  xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="none"
                                  viewBox="0 0 24 24">
                                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                      stroke-width="2"
                                      d="M14.079 6.839a3 3 0 0 0-4.255.1M13 20h1.083A3.916 3.916 0 0 0 18 16.083V9A6 6 0 1 0 6 9v7m7 4v-1a1 1 0 0 0-1-1h-1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1h1a1 1 0 0 0 1-1Zm-7-4v-6H5a2 2 0 0 0-2 2v2a2 2 0 0 0 2 2h1Zm12-6h1a2 2 0 0 1 2 2v2a2 2 0 0 1-2 2h-1v-6Z" />
                              </svg>

                          </i>
                          <p>
                              Admins
                              <i class="right  ">
                                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                      fill="currentColor" class="bi bi-arrow-left-short" viewBox="0 0 16 16">
                                      <path fill-rule="evenodd"
                                          d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5" />
                                  </svg>
                              </i>
                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="{{ route('dashboard.admins.view') }}"
                                  class="nav-link {{ request()->routeIs('dashboard.admins.view') ? 'active' : '' }}">
                                  <i class="nav-icon">
                                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                          fill="currentColor" class="bi bi-arrow-right-short" viewBox="0 0 16 16">
                                          <path fill-rule="evenodd"
                                              d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8" />
                                      </svg>
                                  </i>
                                  <p>All Admins</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="{{ route('dashboard.admins.create') }}"
                                  class="nav-link {{ request()->routeIs('dashboard.admins.create') ? 'active' : '' }}">
                                  <i class="nav-icon">
                                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                          fill="currentColor" class="bi bi-arrow-right-short" viewBox="0 0 16 16">
                                          <path fill-rule="evenodd"
                                              d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8" />
                                      </svg>
                                  </i>
                                  <p>Add Admin</p>
                              </a>
                          </li>
                          {{-- <li class="nav-item">
                              <a href="./index3.html" class="nav-link">
                                  <i class="nav-icon">
                                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                          fill="currentColor" class="bi bi-arrow-right-short" viewBox="0 0 16 16">
                                          <path fill-rule="evenodd"
                                              d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8" />
                                      </svg>
                                  </i>
                                  <p>Dashboard v3</p>
                              </a>
                          </li> --}}
                      </ul>
                  </li>

                  {{-- Uesrs --}}
                  <li class="nav-item {{ request()->routeIs('dashboard.users.*') ? ' menu-open' : '' }}">
                      <a href="#" class="nav-link {{ request()->routeIs('dashboard.users.*') ? 'active' : '' }}">
                          <i class=" nav-icon">
                              {{-- <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-person-vcard-fill" viewBox="0 0 16 16">
                                <path
                                    d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm9 1.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 0-1h-4a.5.5 0 0 0-.5.5M9 8a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 0-1h-4A.5.5 0 0 0 9 8m1 2.5a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 0-1h-3a.5.5 0 0 0-.5.5m-1 2C9 10.567 7.21 9 5 9c-2.086 0-3.8 1.398-3.984 3.181A1 1 0 0 0 2 13h6.96q.04-.245.04-.5M7 6a2 2 0 1 0-4 0 2 2 0 0 0 4 0" />
                            </svg> --}}
                              <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                                  xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="none"
                                  viewBox="0 0 24 24">
                                  <path stroke="currentColor" stroke-linecap="round" stroke-width="2"
                                      d="M4.5 17H4a1 1 0 0 1-1-1 3 3 0 0 1 3-3h1m0-3.05A2.5 2.5 0 1 1 9 5.5M19.5 17h.5a1 1 0 0 0 1-1 3 3 0 0 0-3-3h-1m0-3.05a2.5 2.5 0 1 0-2-4.45m.5 13.5h-7a1 1 0 0 1-1-1 3 3 0 0 1 3-3h3a3 3 0 0 1 3 3 1 1 0 0 1-1 1Zm-1-9.5a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0Z" />
                              </svg>
                          </i>
                          <p>
                              Users
                              <i class="right  ">
                                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                      fill="currentColor" class="bi bi-arrow-left-short" viewBox="0 0 16 16">
                                      <path fill-rule="evenodd"
                                          d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5" />
                                  </svg>
                              </i>
                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="{{ route('dashboard.users.view') }}"
                                  class="nav-link {{ request()->routeIs('dashboard.users.view') ? 'active' : '' }}">
                                  <i class="nav-icon">
                                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                          fill="currentColor" class="bi bi-arrow-right-short" viewBox="0 0 16 16">
                                          <path fill-rule="evenodd"
                                              d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8" />
                                      </svg>
                                  </i>
                                  <p>All Users</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="{{ route('dashboard.users.create') }}"
                                  class="nav-link {{ request()->routeIs('dashboard.users.create') ? 'active' : '' }}">
                                  <i class="nav-icon">
                                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                          fill="currentColor" class="bi bi-arrow-right-short" viewBox="0 0 16 16">
                                          <path fill-rule="evenodd"
                                              d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8" />
                                      </svg>
                                  </i>
                                  <p>Add User</p>
                              </a>
                          </li>
                      </ul>
                  </li>

                  {{-- Skills --}}
                  <li class="nav-item {{ request()->routeIs('dashboard.skills.*') ? ' menu-open' : '' }}">
                      <a href="#"
                          class="nav-link {{ request()->routeIs('dashboard.skills.*') ? 'active' : '' }}">
                          <i class=" nav-icon">
                              <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                                  xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="none"
                                  viewBox="0 0 24 24">
                                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                      stroke-width="2"
                                      d="M8 7H5a2 2 0 0 0-2 2v4m5-6h8M8 7V5a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2m0 0h3a2 2 0 0 1 2 2v4m0 0v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-6m18 0s-4 2-9 2-9-2-9-2m9-2h.01" />
                              </svg>

                          </i>
                          <p>
                              Skills
                              <i class="right  ">
                                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                      fill="currentColor" class="bi bi-arrow-left-short" viewBox="0 0 16 16">
                                      <path fill-rule="evenodd"
                                          d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5" />
                                  </svg>
                              </i>
                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="{{ route('dashboard.skills.view') }}"
                                  class="nav-link {{ request()->routeIs('dashboard.skills.view') ? 'active' : '' }}">
                                  <i class="nav-icon">
                                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                          fill="currentColor" class="bi bi-arrow-right-short" viewBox="0 0 16 16">
                                          <path fill-rule="evenodd"
                                              d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8" />
                                      </svg>
                                  </i>
                                  <p>All Skill</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="{{ route('dashboard.skills.create') }}"
                                  class="nav-link {{ request()->routeIs('dashboard.skills.create') ? 'active' : '' }}">
                                  <i class="nav-icon">
                                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                          fill="currentColor" class="bi bi-arrow-right-short" viewBox="0 0 16 16">
                                          <path fill-rule="evenodd"
                                              d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8" />
                                      </svg>
                                  </i>
                                  <p>Add Skill</p>
                              </a>
                          </li>
                      </ul>
                  </li>

                  {{-- Categories --}}
                  <li class="nav-item {{ request()->routeIs('dashboard.categories.*') ? ' menu-open' : '' }}">
                      <a href="#"
                          class="nav-link {{ request()->routeIs('dashboard.categories.*') ? 'active' : '' }}">
                          <i class=" nav-icon">
                              <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                                  xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="none"
                                  viewBox="0 0 24 24">
                                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                      stroke-width="2"
                                      d="M6 8v8m0-8a2 2 0 1 0 0-4 2 2 0 0 0 0 4Zm0 8a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm12 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm0 0V9a3 3 0 0 0-3-3h-3m1.5-2-2 2 2 2" />
                              </svg>

                          </i>
                          <p>
                              Categories
                              <i class="right  ">
                                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                      fill="currentColor" class="bi bi-arrow-left-short" viewBox="0 0 16 16">
                                      <path fill-rule="evenodd"
                                          d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5" />
                                  </svg>
                              </i>
                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="{{ route('dashboard.categories.view') }}"
                                  class="nav-link {{ request()->routeIs('dashboard.categories.view') ? 'active' : '' }}">
                                  <i class="nav-icon">
                                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                          fill="currentColor" class="bi bi-arrow-right-short" viewBox="0 0 16 16">
                                          <path fill-rule="evenodd"
                                              d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8" />
                                      </svg>
                                  </i>
                                  <p>All Categories</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="{{ route('dashboard.categories.create') }}"
                                  class="nav-link {{ request()->routeIs('dashboard.categories.create') ? 'active' : '' }}">
                                  <i class="nav-icon">
                                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                          fill="currentColor" class="bi bi-arrow-right-short" viewBox="0 0 16 16">
                                          <path fill-rule="evenodd"
                                              d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8" />
                                      </svg>
                                  </i>
                                  <p>Add Categories</p>
                              </a>
                          </li>
                      </ul>
                  </li>

                  {{-- Tags --}}
                  <li class="nav-item {{ request()->routeIs('dashboard.tags.*') ? ' menu-open' : '' }}">
                      <a href="#"
                          class="nav-link {{ request()->routeIs('dashboard.tags.*') ? 'active' : '' }}">
                          <i class=" nav-icon">
                              <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                                  xmlns="http://www.w3.org/2000/svg" width="19" height="19" fill="none"
                                  viewBox="0 0 24 24">
                                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                      stroke-width="2"
                                      d="M15.583 8.445h.01M10.86 19.71l-6.573-6.63a.993.993 0 0 1 0-1.4l7.329-7.394A.98.98 0 0 1 12.31 4l5.734.007A1.968 1.968 0 0 1 20 5.983v5.5a.992.992 0 0 1-.316.727l-7.44 7.5a.974.974 0 0 1-1.384.001Z" />
                              </svg>
                          </i>
                          <p>
                              Tags
                              <i class="right  ">
                                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                      fill="currentColor" class="bi bi-arrow-left-short" viewBox="0 0 16 16">
                                      <path fill-rule="evenodd"
                                          d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5" />
                                  </svg>
                              </i>
                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="{{ route('dashboard.tags.view') }}"
                                  class="nav-link {{ request()->routeIs('dashboard.tags.view') ? 'active' : '' }}">
                                  <i class="nav-icon">
                                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                          fill="currentColor" class="bi bi-arrow-right-short" viewBox="0 0 16 16">
                                          <path fill-rule="evenodd"
                                              d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8" />
                                      </svg>
                                  </i>
                                  <p>All Tags</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="{{ route('dashboard.tags.create') }}"
                                  class="nav-link {{ request()->routeIs('dashboard.tags.create') ? 'active' : '' }}">
                                  <i class="nav-icon">
                                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                          fill="currentColor" class="bi bi-arrow-right-short" viewBox="0 0 16 16">
                                          <path fill-rule="evenodd"
                                              d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8" />
                                      </svg>
                                  </i>
                                  <p>Add Tag</p>
                              </a>
                          </li>
                      </ul>
                  </li>

                  {{-- Posts --}}
                  <li class="nav-item {{ request()->routeIs('dashboard.posts.*') ? ' menu-open' : '' }}">
                      <a href="#"
                          class="nav-link {{ request()->routeIs('dashboard.posts.*') ? 'active' : '' }}">
                          <i class=" nav-icon">
                              <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                                  xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="none"
                                  viewBox="0 0 24 24">
                                  <path stroke="currentColor" stroke-linejoin="round" stroke-width="2"
                                      d="M15 4v3a1 1 0 0 1-1 1h-3m2 10v1a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-7.13a1 1 0 0 1 .24-.65L6.7 8.35A1 1 0 0 1 7.46 8H9m-1 4H4m16-7v10a1 1 0 0 1-1 1h-7a1 1 0 0 1-1-1V7.87a1 1 0 0 1 .24-.65l2.46-2.87a1 1 0 0 1 .76-.35H19a1 1 0 0 1 1 1Z" />
                              </svg>
                          </i>
                          <p>
                              Posts
                              <i class="right  ">
                                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                      fill="currentColor" class="bi bi-arrow-left-short" viewBox="0 0 16 16">
                                      <path fill-rule="evenodd"
                                          d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5" />
                                  </svg>
                              </i>
                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="{{ route('dashboard.posts.view') }}"
                                  class="nav-link {{ request()->routeIs('dashboard.posts.view') ? 'active' : '' }}">
                                  <i class="nav-icon">
                                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                          fill="currentColor" class="bi bi-arrow-right-short" viewBox="0 0 16 16">
                                          <path fill-rule="evenodd"
                                              d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8" />
                                      </svg>
                                  </i>
                                  <p>All Posts</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="{{ route('dashboard.posts.create') }}"
                                  class="nav-link {{ request()->routeIs('dashboard.posts.create') ? 'active' : '' }}">
                                  <i class="nav-icon">
                                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                          fill="currentColor" class="bi bi-arrow-right-short" viewBox="0 0 16 16">
                                          <path fill-rule="evenodd"
                                              d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8" />
                                      </svg>
                                  </i>
                                  <p>Add Post</p>
                              </a>
                          </li>
                          {{-- <li class="nav-item">
                              <a href="{{ route('dashboard.comments.view') }}"
                                  class="nav-link {{ request()->routeIs('dashboard.comments.view') ? 'active' : '' }}">
                                  <i class="nav-icon">
                                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                          fill="currentColor" class="bi bi-arrow-right-short" viewBox="0 0 16 16">
                                          <path fill-rule="evenodd"
                                              d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8" />
                                      </svg>
                                  </i>
                                  <p>Comments</p>
                              </a>
                          </li> --}}
                      </ul>
                  </li>

                  {{-- Comments --}}
                  <li class="nav-item">
                      <a href="{{ route('dashboard.comments.view') }}"
                          class="nav-link {{ request()->routeIs('dashboard.comments.*') ? 'active' : '' }}">
                          <i class="nav-icon">
                              <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                                  xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="none"
                                  viewBox="0 0 24 24">
                                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                      stroke-width="2"
                                      d="M18 5V4a1 1 0 0 0-1-1H8.914a1 1 0 0 0-.707.293L4.293 7.207A1 1 0 0 0 4 7.914V20a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-5M9 3v4a1 1 0 0 1-1 1H4m11.383.772 2.745 2.746m1.215-3.906a2.089 2.089 0 0 1 0 2.953l-6.65 6.646L9 17.95l.739-3.692 6.646-6.646a2.087 2.087 0 0 1 2.958 0Z" />
                              </svg>
                          </i>
                          <p>
                              Comments
                              {{-- <span class="right badge badge-danger">1</span> --}}
                          </p>
                      </a>
                  </li>

                  {{-- Questions
                  <li class="nav-item {{ request()->routeIs('dashboard.questions.*') ? ' menu-open' : '' }}">
                      <a href="#"
                          class="nav-link {{ request()->routeIs('dashboard.questions.*') ? 'active' : '' }}">
                          <i class=" nav-icon">
                              <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                                  xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="none"
                                  viewBox="0 0 24 24">
                                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                      stroke-width="2"
                                      d="M10 11V8a1 1 0 0 0-1-1H6a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h3a1 1 0 0 0 1-1Zm0 0v2a4 4 0 0 1-4 4H5m14-6V8a1 1 0 0 0-1-1h-3a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h3a1 1 0 0 0 1-1Zm0 0v2a4 4 0 0 1-4 4h-1" />
                              </svg>


                          </i>
                          <p>
                              Questions
                              <i class="right  ">
                                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                      fill="currentColor" class="bi bi-arrow-left-short" viewBox="0 0 16 16">
                                      <path fill-rule="evenodd"
                                          d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5" />
                                  </svg>
                              </i>
                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="{{ route('dashboard.questions.view') }}"
                                  class="nav-link {{ request()->routeIs('dashboard.questions.view') ? 'active' : '' }}">
                                  <i class="nav-icon">
                                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                          fill="currentColor" class="bi bi-arrow-right-short" viewBox="0 0 16 16">
                                          <path fill-rule="evenodd"
                                              d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8" />
                                      </svg>
                                  </i>
                                  <p>All Questions</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="{{ route('dashboard.questions.create') }}"
                                  class="nav-link {{ request()->routeIs('dashboard.questions.create') ? 'active' : '' }}">
                                  <i class="nav-icon">
                                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                          fill="currentColor" class="bi bi-arrow-right-short" viewBox="0 0 16 16">
                                          <path fill-rule="evenodd"
                                              d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8" />
                                      </svg>
                                  </i>
                                  <p>Add Questions</p>
                              </a>
                          </li>
                      </ul>
                  </li> --}}

                  {{-- Messages --}}
                  <li class="nav-item">
                      <a href="{{ route('dashboard.messages.view') }}"
                          class="nav-link {{ request()->routeIs('dashboard.messages.*') ? 'active' : '' }}">
                          <i class="nav-icon">
                            <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 9h5m3 0h2M7 12h2m3 0h5M5 5h14a1 1 0 0 1 1 1v9a1 1 0 0 1-1 1h-6.616a1 1 0 0 0-.67.257l-2.88 2.592A.5.5 0 0 1 8 18.477V17a1 1 0 0 0-1-1H5a1 1 0 0 1-1-1V6a1 1 0 0 1 1-1Z"/>
                              </svg>
                              
                          </i>
                          <p>
                              Messages
                              {{-- <span class="right badge badge-danger">1</span> --}}
                          </p>
                      </a>
                  </li>

                  {{-- <li class="nav-item {{ request()->routeIs('dashboard.users.*') ? ' menu-open' : '' }}">
                      <a href="#"
                          class="nav-link {{ request()->routeIs('dashboard.users.*') ? 'active' : '' }}">
                          <i class=" nav-icon">
                              <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                                  xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="none"
                                  viewBox="0 0 24 24">
                                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                      stroke-width="2"
                                      d="M12 11H4m15.5 5a.5.5 0 0 0 .5-.5V8a1 1 0 0 0-1-1h-3.75a1 1 0 0 1-.829-.44l-1.436-2.12a1 1 0 0 0-.828-.44H8a1 1 0 0 0-1 1M4 9v10a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-7a1 1 0 0 0-1-1h-3.75a1 1 0 0 1-.829-.44L9.985 8.44A1 1 0 0 0 9.157 8H5a1 1 0 0 0-1 1Z" />
                              </svg>
                          </i>
                          <p>
                              Comments
                              <i class="right  ">
                                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                      fill="currentColor" class="bi bi-arrow-left-short" viewBox="0 0 16 16">
                                      <path fill-rule="evenodd"
                                          d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5" />
                                  </svg>
                              </i>
                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="{{ route('dashboard.users.view') }}"
                                  class="nav-link {{ request()->routeIs('dashboard.users.view') ? 'active' : '' }}">
                                  <i class="nav-icon">
                                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                          fill="currentColor" class="bi bi-arrow-right-short" viewBox="0 0 16 16">
                                          <path fill-rule="evenodd"
                                              d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8" />
                                      </svg>
                                  </i>
                                  <p>All Comments</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="{{ route('dashboard.users.create') }}"
                                  class="nav-link {{ request()->routeIs('dashboard.users.create') ? 'active' : '' }}">
                                  <i class="nav-icon">
                                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                          fill="currentColor" class="bi bi-arrow-right-short" viewBox="0 0 16 16">
                                          <path fill-rule="evenodd"
                                              d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8" />
                                      </svg>
                                  </i>
                                  <p>Add Category</p>
                              </a>
                          </li>
                      </ul>
                  </li> --}}

                  {{-- <li class="nav-item">
                      <a href="pages/widgets.html" class="nav-link">
                          <i class="nav-icon fas fa-th"></i>
                          <p>
                              Widgets
                              <span class="right badge badge-danger">New</span>
                          </p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="#" class="nav-link">
                          <i class="nav-icon fas fa-copy"></i>
                          <p>
                              Layout Options
                              <i class="fas fa-angle-left right"></i>
                              <span class="badge badge-info right">6</span>
                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="pages/layout/top-nav.html" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Top Navigation</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="pages/layout/top-nav-sidebar.html" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Top Navigation + Sidebar</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="pages/layout/boxed.html" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Boxed</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="pages/layout/fixed-sidebar.html" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Fixed Sidebar</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="pages/layout/fixed-sidebar-custom.html" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Fixed Sidebar <small>+ Custom Area</small></p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="pages/layout/fixed-topnav.html" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Fixed Navbar</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="pages/layout/fixed-footer.html" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Fixed Footer</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="pages/layout/collapsed-sidebar.html" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Collapsed Sidebar</p>
                              </a>
                          </li>
                      </ul>
                  </li>

                  <li class="nav-header">EXAMPLES</li>
                  <li class="nav-item">
                      <a href="pages/calendar.html" class="nav-link">
                          <i class="nav-icon far fa-calendar-alt"></i>
                          <p>
                              Calendar
                              <span class="badge badge-info right">2</span>
                          </p>
                      </a>
                  </li> --}}


              </ul>
              {{-- Logout --}}
              <div class=" mt-3 pb-3 mb-3 ">
                  @auth
                      <form action="{{ route('auth.logout') }}" method="POST">
                          @csrf
                          <button type="submit" class="btn btn-outline-light navigation--button ">Logout</button>
                      </form>
                  @endauth
              </div>
          </nav>
          <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
  </aside>
