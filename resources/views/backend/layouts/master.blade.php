<!DOCTYPE html>
<html lang="en">

<head>
   @include('backend.partials.header')
</head>

<body class="hold-transition sidebar-mini ">
   <div class="wrapper">
      <!-- Navbar -->
      @include('backend.partials.navbar')
      <!-- /.navbar -->
      <!-- Main Sidebar Container -->
      @include('backend.partials.sidebar')
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
         <!-- Main content -->
         <div class="content">
            @yield('content')
         </div>
         <!-- /.content -->
      </div>
      <!-- /.content-wrapper -->
      <!-- Main Footer -->
      @include('backend.partials.footer')
   </div>
   <!-- REQUIRED SCRIPTS -->
   @include('backend.partials.script')
   @yield('script')
</body>

</html>