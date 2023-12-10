<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
      <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link {{ Request::is('home') ? 'active' : '' }}" aria-current="page" href="/">
            <i data-feather="home"></i>
            Home
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('index*') ? 'active' : '' }}" href="/index">
            <i data-feather="file-text"></i>
            Presensi QR
          </a>
        </li>
      </ul>
    </div>
</nav>