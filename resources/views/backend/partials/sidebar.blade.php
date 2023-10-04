<aside class="main-sidebar bg-light elevation-4">
   {{--frontend route--}}
   <a href="#" class="brand-link" target="_blank">
      {{-- <span class="brand-text font-weight-light">{{ env('APP_NAME') }}</span> --}}
      <img class="admin-dashboard-logo" src="{{ asset('images/logo.png') }}" alt="{{ env('DISPLAY_NAME') }}">
   </a>
   <hr class="border border-seconday">
   <div class="sidebar sidebar-wrapper">
      <!-- Sidebar Menu -->
      <nav class="mt-2">
         <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item has-treeview">
               <a href="{{route('dashbashborad')}}" class="nav-link">
                  <i class="fas fa-tachometer-alt"></i>
                  <p>
                     Dashboard
                  </p>
               </a>
            </li>
            <li class="nav-item has-treeview">
               <a href="#" class="nav-link">
                  <i class="fas fa-home"></i>
                  <p>
                     Hompage
                  </p>
                  <i class="fas fa-angle-left right"></i>
               </a>
               <ul class="nav nav-treeview">
                  <li class="nav-item">
                     <a href="{{route('backend.roomcategories_index')}}" class="nav-link">
                        <i class="fa fa-circle nav-icon"></i>
                        <p>Manage Room Category</p>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a href="{{route('backend.menucategories_index')}}" class="nav-link">
                        <i class="fa fa-circle nav-icon"></i>
                        <p>Manage Menu Category</p>
                     </a>
                  </li>
               </ul>
            </li>
            <li class="nav-item has-treeview">
               <a href="" class="nav-link">
                  <i class="fas fa-image"></i>
                  <p>
                     Slider Banners
                  </p>
                  <i class="fas fa-angle-left right"></i>
               </a>
               <ul class="nav nav-treeview" style="display: none;">
                  <li class="nav-item">
                     <a href="{{route('backend.banner_index')}}" class="nav-link">
                        <i class="fa fa-circle nav-icon"></i>
                        <p>Manage Slider Banners</p>
                     </a>
                  </li>
               </ul>
            </li>
            <li class="nav-item has-treeview">
               <a href="#" class="nav-link">
                  <i class="fas fa-home"></i>
                  <p>
                     Testimonial
                  </p>
                  <i class="fas fa-angle-left right"></i>
               </a>
               <ul class="nav nav-treeview">
                  <li class="nav-item">
                     <a href="{{route('backend.testimonial')}}" class="nav-link">
                        <i class="fa fa-circle nav-icon"></i>
                        <p>Manage Testimonials</p>
                     </a>
                  </li>
               </ul>
            </li>
            <li class="nav-item has-treeview">
               <a href="#" class="nav-link">
                  <i class="fa-solid fa-hotel"></i>
                  <p>
                     Rooms
                  </p>
                  <i class="fas fa-angle-left right"></i>
               </a>
               <ul class="nav nav-treeview" style="display: none;">
                  <li class="nav-item">
                     <a href="{{route('backend.rooms_index')}}" class="nav-link">
                        <i class="fa fa-circle nav-icon"></i>
                        <p>Manage Rooms</p>
                     </a>
                  </li>
               </ul>
            </li>
            <li class="nav-item has-treeview">
               <a href="#" class="nav-link">
                  <i class="fas fa-qrcode"></i>
                  <p>
                     Restaurants and Bar
                  </p>
                  <i class="fas fa-angle-left right"></i>
               </a>
               <ul class="nav nav-treeview" style="display: none;">
                  <li class="nav-item">
                     <a href="{{route('backend.restaurant_index')}}" class="nav-link">
                        <i class="fa fa-circle nav-icon"></i>
                        <p>About Restaurants</p>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a href="{{route('backend.menues_index')}}" class="nav-link">
                        <i class="fa fa-circle nav-icon"></i>
                        <p>Manage Restaurant Menu</p>
                     </a>
                  </li>
               </ul>
            </li>
            <li class="nav-item has-treeview ">
               <a href="#" class="nav-link">
                  <i class="fas fa-wrench"></i>
                  <p>
                     Services
                  </p>
                  <i class="fas fa-angle-left right"></i>
               </a>
               <ul class="nav nav-treeview" style="display: none;">
                  <li class="nav-item ">
                     <a href="{{route('backend.services')}}" class="nav-link">
                        <i class="fa fa-circle nav-icon"></i>
                        <p>Manage Services</p>
                     </a>
                  </li>
               </ul>
            </li>
            <li class="nav-item has-treeview">
               <a href="#" class="nav-link">
                  <i class="fas fa-info-circle"></i>
                  <p>
                     About Us
                  </p>
                  <i class="fas fa-angle-left right"></i>
               </a>
               <ul class="nav nav-treeview" style="display: none;">
                  <li class="nav-item">
                     <a href="{{route('backend.about_us_index')}}" class="nav-link">
                        <i class="fa fa-circle nav-icon"></i>
                        <p>About Us</p>
                     </a>
                  </li>

               </ul>
            </li>




            <!-- <li class="nav-item has-treeview d-none">
               <a href="#" class="nav-link">
                  <i class="fas fa-users"></i>
                  <p>
                     Team
                  </p>
                  <i class="fas fa-angle-left right"></i>
               </a>
               <ul class="nav nav-treeview" style="display: none;">
                  <li class="nav-item">
                     <a href="" class="nav-link">
                        <i class="fa fa-circle nav-icon"></i>
                        <p>Team Category</p>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a href="#" class="nav-link">
                        <i class="fa fa-circle nav-icon"></i>
                        <p>Manage Team</p>
                     </a>
                  </li>
               </ul>
            </li> -->


            {{--
            <li class="nav-item has-treeview">
               <a href="#" class="nav-link">
                  <i class="fas fa-newspaper"></i>
                  <p>
                     Careers
                  </p>
                  <i class="fas fa-angle-left right"></i>
               </a>
               <ul class="nav nav-treeview" style="display: none;">
                  <li class="nav-item">
                     <a href="{{ route('careers.index') }}" class="nav-link">
            <i class="fa fa-circle nav-icon"></i>
            <p>Manage Careers</p>
            </a>
            </li>
         </ul>
         </li>
         <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
               <i class="fas fa-flag"></i>
               <p>
                  Countries
               </p>
               <i class="fas fa-angle-left right"></i>
            </a>
            <ul class="nav nav-treeview" style="display: none;">
               <li class="nav-item">
                  <a href="{{ route('countries.create') }}" class="nav-link">
                     <i class="fa fa-circle nav-icon"></i>
                     <p>Add Country</p>
                  </a>
               </li>
               <li class="nav-item">
                  <a href="{{ route('countries.index') }}" class="nav-link">
                     <i class="fa fa-circle nav-icon"></i>
                     <p>Manage Countries</p>
                  </a>
               </li>
            </ul>
         </li>
         --}}
         <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
               <i class="fas fa-file"></i>
               <p>
                  Pages
               </p>
               <i class="fas fa-angle-left right"></i>
            </a>
            <ul class="nav nav-treeview" style="display: none;">
               <li class="nav-item">
                  <a href="#" class="nav-link">
                     <i class="fa fa-circle nav-icon"></i>
                     <p>Manage Pages</p>
                  </a>
               </li>
            </ul>
         </li>


         <!-- @role('sales & marketing|admin|editor')
         <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
               <i class="fa-solid fa-rectangle-ad"></i>
               <p>Advertisements</p>
            </a>
         </li>
         @endif -->


         <!-- <li class="nav-item has-treeview">
            <a href="{{ route('backend.profile_index') }}" class="nav-link">
               <i class="fas fa-user-cog"></i>
               <p>
                  Profile Setting
               </p>
            </a>
         </li>
         @role('admin')
         <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
               <i class="fas fa-user-tie"></i>
               <p>
                  Manage User
               </p>
               <i class="fas fa-angle-left right"></i>
            </a>
            <ul class="nav nav-treeview" style="display: none;">
               <li class="nav-item">
                  <a href="" class="nav-link">
                     <i class="fa fa-circle nav-icon"></i>
                     <p>Add User</p>
                  </a>
               </li>
               <li class="nav-item">
                  <a href="" class="nav-link">
                     <i class="fa fa-circle nav-icon"></i>
                     <p>Manage User</p>
                  </a>
               </li>
            </ul>

         </li>
         @endrole -->
         <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
               <i class="fas fa-cogs"></i>
               <p>
                  Site Settings
               </p>
               <i class="fas fa-angle-left right"></i>
            </a>
            <ul class="nav nav-treeview" style="display: none;">
               <li class="nav-item">
                  <a href="{{route('backend.setting_index')}}" class="nav-link">
                     <i class="fa fa-circle nav-icon"></i>
                     <p>
                        Settings
                     </p>
                  </a>
               </li>
            </ul>
         </li>
         </ul>
      </nav>
   </div>
</aside>