<h1>tma</h1>
<form action="{{ route('logout') }}" method="post">
    @csrf
<button class="dropdown-item" href="#"  >
    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
    Logout
</button>
</form>
