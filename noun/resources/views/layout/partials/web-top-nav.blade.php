<nav class="navbar navbar-expand-lg navbar-light bg-white top-fixed">
    <a class="navbar-brand" href="#">Noun</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item  no-arrow">
            <a class="nav-link text-dark " href="{{route('blog')}}"
                 aria-haspopup="true" aria-expanded="false">
                Blogs
            </a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Student
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="{{route('student.tma')}}">TMA Test</a>
            <a class="dropdown-item" href="{{route('student.pastquestions')}}">Past Question</a>
            {{-- <a class="dropdown-item" href="{{route('student.subscription')}}">Subscription</a> --}}
            <a class="dropdown-item" href="{{route('student.meetatutor')}}">Meet a Tutor</a>
          </div>
        </li>
        <li class="nav-item  no-arrow">
            <a class="nav-link text-dark " href="{{route('becomeatutor')}}"
                 aria-haspopup="true" aria-expanded="false">
                Become a Tutor
            </a>
        </li>
      </ul>
      <div class="topbar-divider d-none d-sm-block"></div>
    @if(Auth::user())
      <li class="nav-item dropdown no-arrow" style="list-style:none">
          <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
              data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{auth()->user()->name}}</span>
          </a>
          <!-- Dropdown - User Information -->
          <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
              aria-labelledby="userDropdown">
              <a class="dropdown-item" href="#">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
              </a>
              <a class="dropdown-item" href="#">
                  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                  Settings
              </a>
              <a class="dropdown-item" href="#">
                  <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                  Activity Log
              </a>
              <div class="dropdown-divider"></div>
              <form action="{{ route('logout') }}" method="post">
                  @csrf
              <button class="dropdown-item" href="#"  >
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
              </button>
              </form>
          </div>
      </li>
      @else
      <li class="nav-item" style="list-style:none">
          <a class="nav-link text-dark " href="{{route('auth.login')}}"
               aria-haspopup="true" aria-expanded="false">
              Login
          </a>
      </li>
      <li class="nav-item" style="list-style:none">
          <a class="nav-link text-dark" href="{{route('auth.register')}}"
               aria-haspopup="true" aria-expanded="false">
              SignUp
          </a>
      </li>
      @endif
    </div>
</nav>
