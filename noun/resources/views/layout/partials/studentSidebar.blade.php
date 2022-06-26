<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route('home')}}">
        <div class="sidebar-brand-icon">
            <i class="fas fa-graduation-cap"></i>
        </div>
        <div class="sidebar-brand-text mx-3">{{ config('app.name') }}</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    {{-- <li class="nav-item">
        <a class="nav-link" href="index.html">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li> --}}

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
    Subscribe.
    </div>

    @if(auth()->user() == !null)
        @if(isset(auth()->user()->subscribe))
            @if(auth()->user()->subscribe->tma_test == 1)
                <li class="nav-item">
                    <a class="nav-link" href="{{route('student.tma')}}">
                        <i class="fas fa-user-tie"></i><span>TMA Test</span>
                    </a>
                </li>
            @endif
            @if(auth()->user()->subscribe->past_questions == 1)
                <li class="nav-item">
                    <a class="nav-link" href="{{route('student.pastquestions')}}">
                        <i class="fas fa-user-tie"></i><span>Past Question</span>
                    </a>
                </li>
                @endif
                @if(auth()->user()->subscribe->connect_with_tutor == 1)
                <li class="nav-item">
                    <a class="nav-link" href="{{route('student.mytutor')}}">
                    <i class="fas fa-user-tie"></i><span>My Tutor</span></a>
                </li>
                @endif
                @if(auth()->user()->subscribe->become_a_tutor == 1)
                <li class="nav-item">
                    <a class="nav-link href="{{route('student.meetatutor')}}">
                        <i class="fas fa-user-tie"></i><span>Meet a Tutor</span></a>
                    </li>
                @endif
        @endif
    @endif
    <!-- Nav Item - Pages Collapse Menu -->

    <!-- Divider -->
    <hr class="sidebar-divider">

    @if (auth()->user()->role == 'student')
    <li class="nav-item  ">
        <a class="nav-link" href="{{route('student.becomeatutor')}}"
                aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-user-tie"></i><span>
            Become a Tutor</span>
        </a>
    </li>
    @elseif (auth()->user()->role == 'student' && auth()->user()->tutor_also == 1 )
    <li class="nav-item">
        <a class="nav-link  " href="{{route('course.index')}}"
                aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-user-tie"></i><span>
            Switch to Tutor
            </span>
        </a>
    </li>
    @endif

    <!-- Heading -->


</ul>
