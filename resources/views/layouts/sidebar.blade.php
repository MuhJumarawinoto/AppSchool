<aside id="sidebar" class="sidebar">

<ul class="sidebar-nav" id="sidebar-nav">
<li class="nav-item">
    <a class="nav-link {{ Request::is('home') ? '' : 'collapsed' }}" href="{{route('home')}}">
    <i class="fa-solid fa-house"></i>
      <span>DASHBOARD  </span>
    </a>
  </li><!-- End Blank Page Nav -->

  <li class="nav-item">
    <a class="nav-link {{ Request::is('siswa') ? '' : 'collapsed' }}" title ="halaman siswa" href="{{route('siswa')}}">
    <i class="fa-sharp fa-solid fa-graduation-cap"></i></i>
      <span>SISWA </span>
    </a>
  </li><!-- End Dashboard Nav -->

  
  <li class="nav-item">
    <a class="nav-link {{ Request::is('guru') ? '' : 'collapsed' }}" href="http://localhost:5173/">
    <i class="fa-solid fa-person-chalkboard"></i>
      <span>GURU  </span>
    </a>
  </li><!-- End Blank Page Nav -->

  

</ul>

</aside><!-- End Sidebar-->


      