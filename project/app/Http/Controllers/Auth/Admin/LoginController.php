<?php



namespace App\Http\Controllers\Auth\Admin;



use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Auth;

use Validator;



class LoginController extends Controller

{

    public function __construct()

    {

      $this->middleware('guest:admin', ['except' => ['logout']]);

    }

    

    public function showForm()

    {

      return view('admin.login');

    }





    public function login(Request $request)

    {

        //--- Validation Section

        $rules = [

                  'email'   => 'required|email',

                  'password' => 'required'

                ];



        $validator = Validator::make($request->all(), $rules);

        

        if ($validator->fails()) {

          return response()->json(array('errors' => $validator->getMessageBag()->toArray()));

        }

        //--- Validation Section Ends



      // Attempt to log the user in

      if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {

        // if successful, then redirect to their intended location 

        if ($response = $this->authenticated($request, Auth::guard('admin')->user())) {
            return $response;
        }


        return response()->json(redirect()->intended(route('admin.dashboard'))->getTargetUrl());

      }



      // if unsuccessful, then redirect back to the login with the form data

          return response()->json(array('errors' => [ 0 => 'Credentials Doesn\'t Match !' ]));     

    }

    protected function authenticated(Request $request, $user)
    {
     
    	if ($request->bhartians_security_type == 1) { 

            $message = 'Enter security key!'; 

            Auth::guard('admin')->logout(); 

            $token = csrf_token();

            return response()->json(array('success' => true, 'token' => $token));

      }else{

        if($request->security_key != $user->security_key)
        {
            $message = 'Security key is invalid!'; 
            Auth::guard('admin')->logout();

            $token = csrf_token();

            return response()->json(array('token' => $token, 'errors' => [ 0 => 'Your security key not match!' ])); 
        }
      }
    }



    public function logout()

    {

        Auth::guard('admin')->logout();

        return redirect('admin/login');

    }

}