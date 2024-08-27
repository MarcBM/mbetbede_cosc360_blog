<div class="sidebar border border-right col-md-3 col-lg-2 p-0 bg-body-tertiary">
  <div class="offcanvas-md offcanvas-end bg-body-tertiary" tabindex="-1" id="sidebarMenu" aria-labelledby="sidebarMenuLabel">
    <div class="offcanvas-header">
      <h5 class="offcanvas-title" id="sidebarMenuLabel">BLOG</h5>
      <button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#sidebarMenu" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body d-md-flex flex-column p-0 pt-lg-3 overflow-y-auto">
      <ul class="nav flex-column">
        @guest
          <li class="nav-item">
            <a class="nav-link d-flex align-items-center gap-2 active" aria-current="page" href="/home">
              <svg class="bi"><use xlink:href="#house-fill"/></svg>
              Home
            </a>
          </li>
        @else
          <li class="nav-item">
            <a class="nav-link d-flex align-items-center gap-2 active" aria-current="page" href="/posts">
              <svg class="bi"><use xlink:href="#house-fill"/></svg>
              My Posts
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link d-flex align-items-center gap-2" href="/admin/posts">
              <svg class="bi"><use xlink:href="#file-earmark"/></svg>
              All Posts
            </a>
          </li>
          @if (Auth::user()->role == 'admin')
            <li class="nav-item">
              <a class="nav-link d-flex align-items-center gap-2" href="/admin/users">
                <svg class="bi"><use xlink:href="#people"/></svg>
                Users
              </a>
            </li>
          @endif
        @endguest
      </ul>

      <hr class="my-3">

      <ul class="nav flex-column mb-auto">
        @guest
          @if (Route::has('login'))
              <li class="nav-item">
                  <a class="nav-link d-flex align-items-center gap-2" href="{{ route('login') }}">
                    <svg class="bi"><use xlink:href="#people"/></svg>
                    Login
                  </a>
              </li>
          @endif

          @if (Route::has('register'))
              <li class="nav-item">
                  <a class="nav-link d-flex align-items-center gap-2" href="{{ route('register') }}">
                    <svg class="bi"><use xlink:href="#people"/></svg>
                    Register
                  </a>
              </li>
          @endif
        @else
          <li class="nav-item">
            <a class="nav-link d-flex align-items-center gap-2" href="{{ route('logout') }}"
              onclick="event.preventDefault();
              document.getElementById('logout-form').submit();">
              <svg class="bi"><use xlink:href="#door-closed"/></svg>
              Sign out
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
          </li>
        @endguest
      </ul>
    </div>
  </div>
</div>