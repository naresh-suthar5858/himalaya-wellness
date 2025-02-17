  <!--   navbar     -->
  <nav class="navbar bg-body-tertiary fixed-top">
      <div class="container-fluid">
          <a class="navbar-brand" href="{{ route('homepage') }}">
              <img src="{{ asset('himalaya/resources/logo/logo-aboutus.avif') }}" alt="Bootstrap" width="30"
                  height="24">
          </a>
          <a class="navbar-brand center" href="{{ route('homepage') }}" style="font-family: Imprint MT Shadow;">YOGESH
              ENTERPRISES </a>
          <form class="d-flex" role="search" method="POST" action="{{ route('cetalog.show') }}">
              @csrf
              <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="keyword">
              <button class="btn btn-outline-success" type="submit">Search</button>
          </form>
          <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar"
              aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
          </button>


          <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar"
              aria-labelledby="offcanvasNavbarLabel">
              <div class="offcanvas-header">
                  <h5 class="offcanvas-title" id="offcanvasNavbarLabel">YOGESH ENTERPRISES </h5>
                  <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
              </div>


              <div class="offcanvas-body">
                  <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">

                      <li class="nav-item">
                          <a class="nav-link active" href="{{ route('homepage') }}">Home</a>
                      </li>

                      <li class="nav-item">
                          <a class="nav-link active" href="{{ route('about') }}">ABOUT</a>
                      </li>

                      <li class="nav-item">
                          <a class="nav-link active" href="{{ route('category') }}">PRODUCTS</a>
                      </li>
                      @foreach (pages() as $page)
                          <li class="nav-item">
                              <a class="nav-link active" href="{{ route('showPage-',$page->url_key) }}">{{$page->title}}</a>
                          </li>
                      @endforeach
                      <li class="nav-item ">
                          <a class="nav-link active" href="{{ route('contact') }}">CONTACT </a>
                      </li>

                  </ul>
              </div>
          </div>

      </div>

  </nav>
