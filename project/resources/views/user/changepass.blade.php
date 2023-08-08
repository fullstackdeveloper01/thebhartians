@extends('layouts.front')
@section('content')
@include('partials.global.common-header')

<!-- breadcrumb -->
<div class="full-row bg-light overlay-dark py-5" style="background-image: url({{ $gs->breadcrumb_banner ? asset('assets/images/'.$gs->breadcrumb_banner):asset('assets/images/noimage.png') }}); background-position: center center; background-size: cover;">
   <div class="container">
      <div class="row text-center text-white">
         <div class="col-12">
            <h3 class="mb-2 text-white">{{ __('Change Password') }}</h3>
         </div>
         <div class="col-12">
            <nav aria-label="breadcrumb">
               <ol class="breadcrumb mb-0 d-inline-flex bg-transparent p-0">
                  <li class="breadcrumb-item"><a href="{{ route('user-dashboard') }}">{{ __('Dashboard') }}</a></li>
                  <li class="breadcrumb-item active" aria-current="page">{{ __('Change Password') }}</li>
               </ol>
            </nav>
         </div>
      </div>
   </div>
</div>
<!-- breadcrumb -->

<div class="full-row">
   <div class="container">
        <div class="mb-4 d-xl-none">
            <button class="dashboard-sidebar-btn btn bg-primary rounded">
                <i class="fas fa-bars"></i>
            </button>
        </div>
      <div class="row">
         
         <div class="col-xl-12">
            <div class="row align-center">
               <div class="col-lg-12">
                  <div class="widget border-0 p-40 widget_categories bg-light account-info">
                     <h4 class="widget-title down-line mb-30">{{ __('Change Password') }}
                     </h4>
                     <div class="body">
                        <div class="edit-info-area-form">
                           <div class="gocover" style="background: url({{ asset('assets/images/'.$gs->loader) }}) no-repeat scroll center center rgba(45, 45, 45, 0.5);"></div>
                           <form id="passwordform" action="{{ route('user.change.password') }}" method="POST">
                                @csrf
                                <!-- <div class="row">
                                 <div class="col-lg-12 mb-4">
                                 <input type="password" name="cpass" class="Password" placeholder="{{ __('Current Password') }}" required=""><i class="icofont-ui-password"></i>
                                 </div>
                              </div> -->

                              <div class="row">
                                 <div class="col-lg-12 mb-4">
                                 <input type="password" name="newpass" class="Password" placeholder="{{ __('New Password') }}" required=""><i class="icofont-ui-password"></i>
                                 </div>
                              </div>

                              <div class="row">
                                 <div class="col-lg-12 mb-4">
                                 <input type="password" name="renewpass" class="Password" placeholder="{{ __('Re-Type New Password') }}" required=""><i class="icofont-ui-password"></i>
                                 </div>
                              </div>
                              <div class="row">
                                 <div class="col-lg-12 mb-4">
                                  <div class="alert-success">
                                    <p></p>
                                  </div>
                                  <div class="alert-danger">
                                    <ul></ul>
                                  </div>
                                 </div>
                              </div>

                              <div class="form-links">
                                 <button class="submit-btn btn btn-primary" type="submit">{{ __('Submit') }}</button>
                              </div>
                              <input type="hidden" name="file_token" value="{{ $token }}">
 
                                
                              </form>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
</div>
 
  

    @includeIf('partials.global.common-footer')
@endsection
@section('script')


    <script>

        $("#passwordform").on('submit',function(e){
          e.preventDefault();
          $('button.submit-btn').prop('disabled',true);
          $('.gocover').show();
              $.ajax({
               method:"POST",
               url:$(this).prop('action'),
               data:new FormData(this),
               dataType:'JSON',
               contentType: false,
               cache: false,
               processData: false,
               success:function(data)
               {  
                $('.gocover').hide();
                  if ((data.errors)) {
                  $('.alert-success').hide();
                  $('.alert-danger').show();
                  $('.alert-danger ul').html('');
                    for(var error in data.errors)
                    {
                      $('.alert-danger ul').append('<li>'+ data.errors[error] +'</li>');
                    }
                  }
                  else {
                    $('.alert-success').show();
                    $('.alert-success p').html(data);
                  }
                  $('button.submit-btn').prop('disabled',false);
               }
              });
        
        });
        
        </script>

@endsection