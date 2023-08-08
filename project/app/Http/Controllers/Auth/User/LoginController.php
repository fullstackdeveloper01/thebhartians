<?php



namespace App\Http\Controllers\Auth\User;



use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Auth;
use DB;

use Validator;
use Session;

use App\Models\Cart;
use App\Models\Product;


class LoginController extends Controller

{

    public function __construct()

    {

        $this->middleware('guest', ['except' => ['logout', 'userLogout']]);

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

      if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {

        // if successful, then redirect to their intended location 

        // Check If Email is verified or not

          if(Auth::user()->email_verified == 'No')

          {

            Auth::logout();

            return response()->json(array('errors' => [ 0 => __('Your Email is not Verified!') ]));   

          }



          if(Auth::user()->ban == 1)

          {

            Auth::logout();

            return response()->json(array('errors' => [ 0 => __('Your Account Has Been Banned.') ]));   

          }

           //
           $user_id = Auth::user()->id;

           $user_cart = DB::table('cart_items')->where('user_id', $user_id)->first(); 
 
           if($user_cart)
           {
             
             $items = json_decode($user_cart->items, true);
 
             Session::put('cart', null); 
 
             foreach ($items as $prod_id => $pro_data) { 
               $this->pro_add_to_cart($prod_id, $pro_data);
             }  
             
           }



          // Login Via Modal

          if(empty($request->auth_modal)){

            if(!empty($request->modal))

            {

              // Login as Vendor

              if(!empty($request->vendor))

              {

                if(Auth::user()->is_vendor == 2)

                {

                  return response()->json(route('/'));

                }

                else {

                  return response()->json(route('/'));

                  }

              }

            // Login as User

            return response()->json(1);          

            }

          } 
          
          // Login as User

          return response()->json(redirect()->intended(route('/'))->getTargetUrl());

      }



      // if unsuccessful, then redirect back to the login with the form data

          return response()->json(array('errors' => [ 0 => __('Credentials Doesn\'t Match !') ]));     

    }

    public function pro_add_to_cart($id, $itemData)
    {
      if (Session::has('currency')) {
          $curr = DB::table('currencies')->find(Session::get('currency'));
      }
      else {
          $curr = DB::table('currencies')->where('is_default','=',1)->first();
      }
      
      $item =$itemData['item'] ;
      $qty =$itemData['qty'];
      $size =$itemData['size'];
      $color =$itemData['color'];
      $size_qty =$itemData['size_qty'];
      $size_price =$itemData['size_price'];
      $size_key =$itemData['size_key'];
      $keys =$itemData['keys'];
      $values =$itemData['values'];
      $affilate_user =$itemData['affilate_user'];

      $prod = Product::where('id','=',$id)->first(['id','user_id','slug','name','photo','size','size_qty','size_price','color','price','stock','type','file','link','license','license_qty','measure','whole_sell_qty','whole_sell_discount','attributes','minimum_qty','stock_check','size_all','color_all']);

      if($size_qty == '0' && $prod->stock_check == 1)
      {
          return false;
      }

      $oldCart = Session::has('cart') ? Session::get('cart') : null;
      $cart = new Cart($oldCart);

      if(!empty($cart->items)){
          if(!empty($cart->items[$id.$size.$color.str_replace(str_split(' ,'),'',$values)])){
              $minimum_qty = (int)$prod->minimum_qty;
              if($cart->items[$id.$size.$color.str_replace(str_split(' ,'),'',$values)]['qty'] < $minimum_qty ){
                  $data = array();
                  $data[1] = true;
                  $data[2] = $minimum_qty;
                  return false;
              }
          }
          else{
              
              if($prod->minimum_qty != null){
                  $minimum_qty = (int)$prod->minimum_qty;
                  if($qty < $minimum_qty){
                      $data = array();
                      $data[1] = true;
                      $data[2] = $minimum_qty;
                      return false;
                  }
              }
          }
      }else{ 
        
          if($prod->minimum_qty != null){
              $minimum_qty = (int)$prod->minimum_qty;
              if($qty < $minimum_qty){
                  $data = array();
                  $data[3] = true;
                  $data[4] = $minimum_qty;
                  return false;
              }
          }
      }

      $cart->addnum($prod, $prod->id, $qty, $size,$color,$size_qty,$size_price,$size_key,$keys,$values,$affilate_user);

      if($cart->items[$id.$size.$color.str_replace(str_split(' ,'),'',$values)]['dp'] == 1)
      {
          return false;
      }
      if($cart->items[$id.$size.$color.str_replace(str_split(' ,'),'',$values)]['stock'] < 0)
      {
          return false;
      }
      if($prod->stock_check == 1){
          if($cart->items[$id.$size.$color.str_replace(str_split(' ,'),'',$values)]['size_qty'])
          {
              if($cart->items[$id.$size.$color.str_replace(str_split(' ,'),'',$values)]['qty'] > $cart->items[$id.$size.$color.str_replace(str_split(' ,'),'',$values)]['size_qty'])
              {
                  return false;
              }
          }
      }


      $cart->totalPrice = 0;
      foreach($cart->items as $data)
      $cart->totalPrice += $data['price'];
      Session::put('cart',$cart);   
      
      return true;

    }



    public function logout()

    {

        Auth::logout();

        return redirect('/');

    }



    

}

