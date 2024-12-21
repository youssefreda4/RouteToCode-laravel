 <!-- Navigation-->
 <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
     <div class="container px-5">
         <a class="navbar-brand" href="{{ route('front.home') }}">RouteToCode</a>
         <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
             aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
             <span class="navbar-toggler-icon"></span>
         </button>
         <div class="collapse navbar-collapse" id="navbarSupportedContent">
             <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                 <li class="nav-item">
                     <a class="nav-link {{ request()->routeIs('front.home') ? 'active' : '' }}"
                         href="{{ route('front.home') }}">Home</a>
                 </li>
                 <li class="nav-item ">
                     <a class="nav-link {{ request()->routeIs('front.about.view') ? 'active' : '' }} "
                         href="{{ route('front.about.view') }}">About</a>
                 </li>
                 <li class="nav-item ">
                     <a class="nav-link  {{ request()->routeIs('front.contact.view') ? 'active' : '' }}"
                         href="{{ route('front.contact.view') }}">Contact</a>
                 </li>
                 @guest
                     <li class="nav-item ">
                         <a class="nav-link" href="{{ route('login') }}">Login</a>
                     </li>
                 @endguest
                 @auth
                     <li class="nav-item ">
                         <a class="nav-link {{ request()->routeIs('front.profile.view') ? 'active' : '' }}"
                             href="{{ route('front.profile.view') }}">Profile</a>
                     </li>
                     {{-- <li class="nav-item ">
                         <a class="nav-link {{ request()->routeIs('front.question.view') ? 'active' : '' }}"
                             href="{{ route('front.question.view') }}">Questions</a>
                     </li> --}}
                     <li class="nav-item dropdown">
                         <a class="nav-link {{ request()->routeIs('front.posts.*') ? 'active' : '' }} dropdown-toggle"
                             id="navbarDropdownBlog" href="#" role="button" data-bs-toggle="dropdown"
                             aria-expanded="false">Posts</a>
                         <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownBlog">
                             <li><a class="dropdown-item" href="{{ route('front.posts.view') }}">All Posts</a></li>
                             <li><a class="dropdown-item" href="{{ route('front.posts.create') }}">Add Post</a></li>
                         </ul>
                     </li>

                     <li class="nav-item dropdown me-3">
                         <a class="nav-link dropdown position-relative" id="navbarDropdownNotifications" href="#"
                             role="button" data-bs-toggle="dropdown" aria-expanded="false">
                             <i class="bi bi-bell"></i>
                             @if (auth()->user()->unreadNotifications->isNotEmpty())
                                 <span class="translate-middle badge rounded-pill bg-danger">
                                     {{ count(auth()->user()->unreadNotifications) }}
                                 </span>
                             @endif
                         </a>
                         <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownNotifications">
                             @forelse (auth()->user()->unreadNotifications as $notification)
                                 <a class="dropdown-item" href="{{ route('front.likes.markAsRead', $notification->id) }}">
                                     {{ $notification->data['user_name'] }} :
                                     {{ $notification->data['status'] }}
                                     <span class="float-right text-muted text-sm">
                                         {{ $notification->created_at->diffForHumans() }}
                                     </span>
                                 </a>
                                 {{-- <li>
                                     <hr class="dropdown-divider">
                                 </li> --}}
                             @empty
                                 <div class="m-3">
                                     <div class="text-center alert alert-info">
                                         There is no Notifications !
                                     </div>
                                 </div>
                             @endforelse
                             {{-- <li><a class="dropdown-item text-center" href="#">View All Notifications</a></li> --}}
                         </ul>
                     </li>


                     <li class="nav-item">
                         <form action="{{ route('auth.logout') }}" method="POST" class="d-inline">
                             @csrf
                             <button type="submit" class="btn btn-outline-light ">Logout</button>
                         </form>
                     </li>

                 @endauth
             </ul>
         </div>
     </div>
 </nav>
