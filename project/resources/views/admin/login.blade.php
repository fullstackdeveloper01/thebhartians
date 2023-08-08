<!doctype html>

<html lang="en" dir="ltr">

  

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

      <meta name="author" content="Bhartians">

    <!-- Title -->

    <title>{{$gs->title}}</title>
    

    <!-- favicon -->

    <link rel="icon"  type="image/x-icon" href="{{asset('assets/images/'.$gs->favicon)}}"/>

    <!-- Bootstrap -->

    <link href="{{asset('assets/admin/css/bootstrap.min.css')}}" rel="stylesheet" />

    <!-- Fontawesome -->

    <link rel="stylesheet" href="{{asset('assets/admin/css/fontawesome.css')}}">

    <!-- icofont -->

    <link rel="stylesheet" href="{{asset('assets/admin/css/icofont.min.css')}}">

    <!-- Sidemenu Css -->

    <link href="{{asset('assets/admin/plugins/fullside-menu/css/dark-side-style.css')}}" rel="stylesheet" />

    <link href="{{asset('assets/admin/plugins/fullside-menu/waves.min.css')}}" rel="stylesheet" />



    <link href="{{asset('assets/admin/css/plugin.css')}}" rel="stylesheet" />

    <link href="{{asset('assets/admin/css/jquery.tagit.css')}}" rel="stylesheet" />   

      <link rel="stylesheet" href="{{ asset('assets/admin/css/bootstrap-coloroicker.css') }}">

    <!-- Main Css -->

    <link href="{{asset('assets/admin/css/style.css')}}" rel="stylesheet"/>

    <link href="{{asset('assets/admin/css/custom.css')}}" rel="stylesheet"/>

    <link href="{{asset('assets/admin/css/responsive.css')}}" rel="stylesheet" />

    @yield('styles')



  </head>

  <body>



    <!-- Login and Sign up Area Start -->

    <section class="login-signup">

      <div class="container">

        <div class="row justify-content-center">

          <div class="col-lg-5">

            <div class="login-area">

              <div class="header-area bhartians-login">

                <h4 class="title">{{ __('Login Now') }}</h4>

                <p class="text">{{ __('Welcome back, please sign in below') }}</p>

              </div> 

              <div class="header-area bhartians-security-key">

              <h4 class="title">{{ __('Security Key Authentication ') }}</h4>

              <p class="text">{{ __('Welcome to security key authentication process') }}</p>

              </div> 

              <div class="login-form">

                @include('alerts.admin.form-login')

                <form id="loginform" action="{{ route('admin.login.submit') }}" method="POST">

                  @csrf

                  <div class="form-input bhartians-login">

                    <input type="email" name="email" class="User Name" placeholder="{{ __('Type Email Address') }}" value="" required="" autofocus>

                    <i class="icofont-user-alt-5"></i>

                  </div>

                  <div class="form-input bhartians-login">

                    <input type="password" name="password" class="Password" placeholder="{{ __('Type Password') }}">

                    <i class="icofont-ui-password"></i>

                  </div>

                  <div class="form-input bhartians-security-key">

                       <div class="d-flex mb-20">
													<input type="hidden" class="form-control text-center mr-10" maxlength="50" id="verifyemail" name="verifyemail" value="test010@mailinator.com">

													<input type="text" pattern="[0-9]{1}" class="form-control text-center mr-10 btb_verify_code" id="otp1" name="otp[]" placeholder="" maxlength="1">
													<input type="text" pattern="[0-9]{1}" class="form-control text-center mr-10 btb_verify_code" id="otp2" name="otp[]" placeholder="" maxlength="1">
													<input type="text" pattern="[0-9]{1}" class="form-control text-center mr-10 btb_verify_code" id="otp3" name="otp[]" placeholder="" maxlength="1">
													<input type="text" pattern="[0-9]{1}" class="form-control text-center mr-10 btb_verify_code" id="otp4" name="otp[]" placeholder="" maxlength="1">
												</div>

                    <input type="hidden" name="security_key" maxlength="6" min="0"  max="6" id="bhartiansSecurityKey" class="Password" placeholder="{{ __('Enter 6 digit security key') }}">

                    <i class="icofont-ui-security-key"></i>

                  </div>

                  <div class="form-forgot-pass bhartians-login">

                    <div class="left">

                      <input type="checkbox" name="remember"  id="rp" {{ old('remember') ? 'checked' : '' }}>

                      <label for="rp">{{ __('Remember Password') }}</label>

                    </div>

                    <div class="right">

                      <a href="{{ route('admin.forgot') }}">

                        {{ __('Forgot Password?') }}

                      </a>

                    </div>

                  </div>

                  <input id="authdata" type="hidden"  value="{{ __('Authenticating...') }}">

                  <input id="bhartiansSecurityType" name="bhartians_security_type" type="hidden"  value="1">

                  <button class="submit-btn bhartians-submit">{{ __('Login') }}</button>

                </form>

                

              </div>

            </div>

          </div>

        </div>

      </div>

    </section>

    <!--Login and Sign up Area End -->





    <!-- Dashboard Core -->

    <script src="{{asset('assets/admin/js/vendors/jquery-1.12.4.min.js')}}"></script>

    <script src="{{asset('assets/admin/js/vendors/bootstrap.min.js')}}"></script>

    <script src="{{asset('assets/admin/js/jqueryui.min.js')}}"></script>

    <!-- Fullside-menu Js-->

    <script src="{{asset('assets/admin/plugins/fullside-menu/jquery.slimscroll.min.js')}}"></script>

    <script src="{{asset('assets/admin/plugins/fullside-menu/waves.min.js')}}"></script>



    <script src="{{asset('assets/admin/js/plugin.js')}}"></script>

    <script src="{{asset('assets/admin/js/tag-it.js')}}"></script>

    <script src="{{asset('assets/admin/js/nicEdit.js')}}"></script>

    <script src="{{ asset('assets/admin/js/bootstrap-colorpicker.min.js') }}"></script>

    <script src="{{asset('assets/admin/js/load.js')}}"></script>

    <!-- Custom Js-->

    <script src="{{asset('assets/admin/js/custom.js')}}"></script>

    <!-- AJAX Js-->

    <script src="{{asset('assets/admin/js/myscript.js')}}"></script>

    <script>
        jQuery(document).ready(function(){
          $('.bhartians-security-key').hide(); 
        });
    </script>
    <style>
        .btb_verify_code {
            padding: 0 !important;
        }

      </style>


  </body>



</html>