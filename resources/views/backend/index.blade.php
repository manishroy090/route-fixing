@extends('backend.layouts.master')
@section('title')
{{ env('APP_NAME') }} | About Us
@endsection
@section('content')
<div class="content-header">
   <div class="container-fluid">
      <div class="row mb-2">
         <div class="col-sm-12">
            @include('flashMessage.message')
         </div>
      </div>
   </div>
</div>
<!-- /.content-header -->
<!-- Main content -->
<div class="content">
   <div class="container-fluid">
      <div class="py-12 d-flex flex-row ">
         <div class="card border border-secondary rounded p-1 flex flex-row shadow-lg" style="width: 18rem;">
            <span class="border-right border-secondary mt-1 text-center pt-5 font-weight-bold text-md" style="width:9rem;height:8rem"> Booked Rooms</span>
            <div class="flex flex-col">
               <div class="mb-3">
                  <svg xmlns="http://www.w3.org/2000/svg" class="mt-5 ml-5" height="3em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                     <path d="M0 32C0 14.3 14.3 0 32 0H480c17.7 0 32 14.3 32 32s-14.3 32-32 32V448c17.7 0 32 14.3 32 32s-14.3 32-32 32H304V464c0-26.5-21.5-48-48-48s-48 21.5-48 48v48H32c-17.7 0-32-14.3-32-32s14.3-32 32-32V64C14.3 64 0 49.7 0 32zm96 80v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V112c0-8.8-7.2-16-16-16H112c-8.8 0-16 7.2-16 16zM240 96c-8.8 0-16 7.2-16 16v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V112c0-8.8-7.2-16-16-16H240zm112 16v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V112c0-8.8-7.2-16-16-16H368c-8.8 0-16 7.2-16 16zM112 192c-8.8 0-16 7.2-16 16v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V208c0-8.8-7.2-16-16-16H112zm112 16v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V208c0-8.8-7.2-16-16-16H240c-8.8 0-16 7.2-16 16zm144-16c-8.8 0-16 7.2-16 16v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V208c0-8.8-7.2-16-16-16H368zM328 384c13.3 0 24.3-10.9 21-23.8c-10.6-41.5-48.2-72.2-93-72.2s-82.5 30.7-93 72.2c-3.3 12.8 7.8 23.8 21 23.8H328z" />
                  </svg>
               </div>
               <span class="mt-5 ml-5  pt-5 text-xl">43</span>

            </div>

         </div>
         <div class="card border border-secondary rounded p-1 flex flex-row shadow-lg ml-5" style="width: 18rem;">
            <span class="border-right border-secondary mt-1 text-center pt-5 font-weight-bold text-md" style="width:9rem;height:8rem">Total Earning</span>
            <div class="flex flex-col">
               <div class="mb-3">
                  <svg xmlns="http://www.w3.org/2000/svg" class="mt-5 ml-5" height="3em" viewBox="0 0 576 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                     <path d="M64 64C28.7 64 0 92.7 0 128V384c0 35.3 28.7 64 64 64H512c35.3 0 64-28.7 64-64V128c0-35.3-28.7-64-64-64H64zm64 320H64V320c35.3 0 64 28.7 64 64zM64 192V128h64c0 35.3-28.7 64-64 64zM448 384c0-35.3 28.7-64 64-64v64H448zm64-192c-35.3 0-64-28.7-64-64h64v64zM288 160a96 96 0 1 1 0 192 96 96 0 1 1 0-192z" />
                  </svg>
               </div>
               <span class="mt-5 ml-5  pt-5 text-xl">43</span>

            </div>

         </div>
         <div class="card border border-secondary rounded p-1 flex flex-row shadow-lg ml-5" style="width: 18rem;">
            <span class="border-right border-secondary mt-1 text-center pt-5 font-weight-bold text-md" style="width:9rem;height:8rem">Total Gaust</span>
            <div class="flex flex-col">
               <div class="mb-3">
                  <i class="fa fa-users text-xl  mt-5 ml-5" height="3rem"></i>
               </div>
               <span class="mt-5 ml-5  pt-5 text-xl">43</span>

            </div>

         </div>




      </div>
   </div>
</div>
@endsection