
<!DOCTYPE html>
<html lang="en">

@include('admin.includes.head')
<body id="page-top">
  <div id="wrapper">
    <!-- Sidebar -->
    @include('admin.includes.sidebar')

    <!-- Sidebar -->
    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">

        <!-- TopBar -->
        @include('admin.includes.navbar')

        <!-- Topbar -->

        <!-- Container Fluid-->
        @yield('section')
        <!---Container Fluid-->
      </div>

      <!-- Footer -->
      @include('admin.includes.footer')
      <!-- Footer -->

    </div>
  </div>

@include('admin.includes.script')
 
</body>

</html>