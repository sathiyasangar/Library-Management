
@php
  $user_role = Auth::user()->role;
@endphp
<nav class="sidebar sidebar-offcanvas dynamic-active-class-disabled" id="sidebar">
  <ul class="nav">
    <li class="nav-item ">
      <a class="nav-link" href="{{ url('/home') }}">
        <i class="menu-icon mdi mdi-television"></i>
        <span class="menu-title">Dashboard</span>
      </a>
    </li>
    @if($user_role == 1)
    <li class="nav-item">
      <a class="nav-link" href="{{ url('/language') }}">
        <i class="menu-icon mdi mdi-alphabetical"></i>
        <span class="menu-title">Language</span>
      </a>
    </li>
    @endif
    <li class="nav-item">
      <a class="nav-link" href="{{ url('/book') }}">
        <i class="menu-icon mdi mdi-book"></i>
        <span class="menu-title">Books</span>
      </a>
    </li>
    @if($user_role == 2)
    <li class="nav-item">
      <a class="nav-link" href="{{ url('/subscribe') }}">
        <i class="menu-icon mdi mdi-book-open-variant"></i>
        <span class="menu-title">Subscribe</span>
      </a>
    </li>
    @endif
    @if($user_role == 1)
    <li class="nav-item">
      <a class="nav-link" href="{{ url('/user') }}">
        <i class="menu-icon mdi mdi-account-outline"></i>
        <span class="menu-title">User</span>
      </a>
    </li>
    @endif
  </ul>
</nav>