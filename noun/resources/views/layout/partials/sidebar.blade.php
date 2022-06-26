@if(auth()->user()->role == 'admin')
<!-- Sidebar -->
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
        Management
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link" href="{{route('admin.students.index')}}">
            <i class="fas fa-user-graduate"></i>
            <span>Students</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{route('admin.tutor.index')}}">
            <i class="fas fa-chalkboard-teacher"></i>
            <span>Tutor</span>
        </a>
    </li>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePastquestion"
            aria-expanded="true" aria-controls="collapsePastquestion">
            <i class="fas fa-question"></i>
            <span>Past Questions</span>
        </a>
        <div id="collapsePastquestion" class="collapse" aria-labelledby="collapsePastquestion"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{route('admin.pastquestion.create')}}"><i class="fas fa-plus"></i>&nbsp;&nbsp;Create Past Questions</a>
                <a class="collapse-item" href="{{route('admin.pastquestion.index')}}"><i class="fas fa-list"></i>&nbsp;&nbsp;Manage Past Questions</a>
            </div>
        </div>
    </li>


    <li class="nav-item">
        <a class="nav-link" href="{{route('admin.tma.create')}}">
            <i class="fas fa-chalkboard-teacher"></i>
            <span>TMA Test</span>
        </a>
    </li>


    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseSemester"
            aria-expanded="true" aria-controls="collapseSemester">
            <i class="fas fa-university"></i>
            <span>Semester</span>
        </a>
        <div id="collapseSemester" class="collapse" aria-labelledby="collapseSemester"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{route('admin.semester.create')}}"><i class="fas fa-plus"></i>&nbsp;&nbsp;Create Semester</a>
                <a class="collapse-item" href="{{route('admin.semester.index')}}"><i class="fas fa-list"></i>&nbsp;&nbsp;Manage Semester</a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFaculty"
            aria-expanded="true" aria-controls="collapseSemester">
            <i class="fas fa-user-tie"></i>
            <span>Faculty</span>
        </a>
        <div id="collapseFaculty" class="collapse" aria-labelledby="collapseFaculty"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{route('admin.faculty.create')}}"><i class="fas fa-plus"></i>&nbsp;&nbsp;Create Faculty</a>
                <a class="collapse-item" href="{{route('admin.faculty.index')}}"><i class="fas fa-list"></i>&nbsp;&nbsp;Manage Faculty</a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseCourse"
            aria-expanded="true" aria-controls="collapseSemester">
            <i class="fas fa-book-reader"></i>
            <span>Courses</span>
        </a>
        <div id="collapseCourse" class="collapse" aria-labelledby="collapseCourse"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{route('admin.course.create')}}"><i class="fas fa-plus"></i>&nbsp;&nbsp;Create Course</a>
                <a class="collapse-item" href="{{route('admin.course.index')}}"><i class="fas fa-list"></i>&nbsp;&nbsp;Manage Course</a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseContact"
            aria-expanded="true" aria-controls="collapseContact">
            <i class="fas fa-user-tie"></i>
            <span>User Contact</span>
        </a>
        <div id="collapseContact" class="collapse" aria-labelledby="collapseContact"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{route('admin.usercontact.index')}}"><i class="fas fa-list"></i>&nbsp;&nbsp;User Contact</a>
            </div>
        </div>
    </li>



    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Blogs
    </div>


    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBlogs"
            aria-expanded="true" aria-controls="collapseBlogs">
            <i class="fas fa-file"></i>
            <span>Blogs</span>
        </a>
        <div id="collapseBlogs" class="collapse" aria-labelledby="headingBlogs"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{route('admin.blogs.create')}}"><i class="fas fa-plus"></i>&nbsp;&nbsp;Create Blog</a>
                <a class="collapse-item" href="{{route('admin.blogs.index')}}"><i class="fas fa-list"></i>&nbsp;&nbsp;Manage Blog</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBlogCategories"
            aria-expanded="true" aria-controls="collapseBlogCategories">
            <i class="fas fa-file"></i>
            <span>Blog Categories</span>
        </a>
        <div id="collapseBlogCategories" class="collapse" aria-labelledby="headingBlogCategories"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('admin.categories.create') }}"><i class="fas fa-plus"></i>&nbsp;&nbsp;Create Category</a>
                <a class="collapse-item" href="{{ route('admin.categories.index') }}"><i class="fas fa-list"></i>&nbsp;&nbsp;Manage Category</a>
            </div>
        </div>
    </li>


    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->
@elseif(auth()->user()->role == 'tutor')
    <!-- Sidebar -->
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


        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Management
        </div>

        <!-- Nav Item - Pages Collapse Menu -->

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseSemester"
                aria-expanded="true" aria-controls="collapseSemester">
                <i class="fas fa-university"></i>
                <span>Course</span>
            </a>
            <div id="collapseSemester" class="collapse" aria-labelledby="collapseSemester"
                data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="{{route('course.create')}}"><i class="fas fa-plus"></i>&nbsp;Create Schedule</a>
                    <a class="collapse-item" href="{{route('course.index')}}"><i class="fas fa-list"></i>&nbsp;Manage Schedule</a>
                </div>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFaculty"
                aria-expanded="true" aria-controls="collapseSemester">
                <i class="fas fa-user-tie"></i>
                <span>Bank Details</span>
            </a>
            <div id="collapseFaculty" class="collapse" aria-labelledby="collapseFaculty"
                data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="{{route('bankdetail.create')}}"><i class="fas fa-plus"></i>&nbsp;&nbsp;Create Bank Details</a>
                    <a class="collapse-item" href="{{route('bankdetail.index')}}"><i class="fas fa-list"></i>&nbsp;&nbsp;Manage Bank Details</a>
                </div>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseCourse"
                aria-expanded="true" aria-controls="collapseSemester">
                <i class="fas fa-book-reader"></i>
                <span>Students</span>
            </a>
            <div id="collapseCourse" class="collapse" aria-labelledby="collapseCourse"
                data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="{{route('tutor.student.course')}}"><i class="fas fa-list"></i>&nbsp;&nbsp;Manage Student</a>
                </div>
            </div>
        </li>
    </ul>
        <!-- End of Sidebar -->
        @elseif(auth()->user()->role == 'student' && auth()->user()->tutor_also ==1)
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


            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Management
            </div>

            <!-- Nav Item - Pages Collapse Menu -->

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseSemester"
                    aria-expanded="true" aria-controls="collapseSemester">
                    <i class="fas fa-university"></i>
                    <span>Course</span>
                </a>
                <div id="collapseSemester" class="collapse" aria-labelledby="collapseSemester"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{route('course.create')}}"><i class="fas fa-plus"></i>&nbsp;Create Schedule</a>
                        <a class="collapse-item" href="{{route('course.index')}}"><i class="fas fa-list"></i>&nbsp;Manage Schedule</a>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFaculty"
                    aria-expanded="true" aria-controls="collapseSemester">
                    <i class="fas fa-user-tie"></i>
                    <span>Bank Details</span>
                </a>
                <div id="collapseFaculty" class="collapse" aria-labelledby="collapseFaculty"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{route('bankdetail.create')}}"><i class="fas fa-plus"></i>&nbsp;&nbsp;Create Bank Details</a>
                        <a class="collapse-item" href="{{route('bankdetail.index')}}"><i class="fas fa-list"></i>&nbsp;&nbsp;Manage Bank Details</a>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseCourse"
                    aria-expanded="true" aria-controls="collapseSemester">
                    <i class="fas fa-book-reader"></i>
                    <span>Students </span>
                </a>
                <div id="collapseCourse" class="collapse" aria-labelledby="collapseCourse"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="#"><i class="fas fa-list"></i>&nbsp;&nbsp;Manage Student</a>
                    </div>
                </div>
            </li>
        </ul>
@endif
