<?php

/**

 * Created by PhpStorm.

 * User: ShaOn

 * Date: 11/29/2018

 * Time: 12:49 AM

 */



namespace App\Classes;



use App\{

    Models\Order,

    Models\EmailTemplate,

    Models\Generalsetting

};

use PDF;

use PHPMailer\PHPMailer\PHPMailer;

use PHPMailer\PHPMailer\Exception;

use Illuminate\Support\Str;



class GeniusMailer

{


    public $gs;



    public function __construct()

    {
        $this->gs = Generalsetting::findOrFail(1);
    }





    public function sendAutoOrderMail(array $mailData,$id)

    {
       
        $temp = EmailTemplate::where('email_type','=',$mailData['type'])->first();

        $order = Order::findOrFail($id);

        $cart = json_decode($order->cart, true);

        try{



            $body = preg_replace("/{customer_name}/", $mailData['cname'] ,$temp->email_body);

            $body = preg_replace("/{order_amount}/", $mailData['oamount'] ,$body);

            $body = preg_replace("/{admin_name}/", $mailData['aname'] ,$body);

            $body = preg_replace("/{admin_email}/", $mailData['aemail'] ,$body);

            $body = preg_replace("/{order_number}/", $mailData['onumber'] ,$body);

            $body = preg_replace("/{website_title}/", $this->gs->title ,$body); 
            

              $fileName = public_path('assets/temp_files/').Str::random(4).time().'.pdf';

             //$pdf = PDF::loadView('pdf.order', compact('order', 'cart'))->save($fileName);
 
            
            $this->sent_mail($mailData['to'],$temp->email_subject,$body, $fileName); 


        }

        catch (Exception $e){



        }



        $files = glob('assets/temp_files/*'); //get all file names

        foreach($files as $file){

            if(is_file($file))

            unlink($file); //delete file

        }

        

        return true;

    }



    public function sendAutoMail(array $mailData)

    {
        
        $temp = EmailTemplate::where('email_type','=',$mailData['type'])->first();



        try{



            $body = preg_replace("/{customer_name}/", $mailData['cname'] ,$temp->email_body);

            $body = preg_replace("/{order_amount}/", $mailData['oamount'] ,$body);

            $body = preg_replace("/{admin_name}/", $mailData['aname'] ,$body);

            $body = preg_replace("/{admin_email}/", $mailData['aemail'] ,$body);

            $body = preg_replace("/{order_number}/", $mailData['onumber'] ,$body);

            $body = preg_replace("/{website_title}/", $this->gs->title ,$body);

            $this->sent_mail($mailData['to'],$temp->email_subject,$body); 


        }

        catch (Exception $e){



        }



        return true;



    }



    public function sendCustomMail(array $mailData)

    {
         
        try{

            $this->sent_mail($mailData['to'],$mailData['subject'],$mailData['body']); 

        }

        catch (Exception $e){



        }



        return true;

    }

	public function sent_mail($email,$subject,$message,$attach=""){

        $from_email = $this->gs->from_email;
        $from_name = $this->gs->from_name; 

		$params = array(
			'to'        => $email,   
			'subject'   => $subject,
			'html'      => $message,
			'from'      => 'support@html.manageprojects.in',
		); 
		
		$request =  'https://api.sendgrid.com/api/mail.send.json';
		$headr = array();
		//$pass = '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';
		//$pass = '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';//(Test)
		$pass = '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';//(Bhavana)
		//$pass = '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';// (Client)
		// set authorization header
		$headr[] = 'Authorization: Bearer '.$pass;
		
		$session = curl_init($request);
		curl_setopt ($session, CURLOPT_POST, true);
		curl_setopt ($session, CURLOPT_POSTFIELDS, $params);
		curl_setopt($session, CURLOPT_HEADER, false);
		curl_setopt($session, CURLOPT_RETURNTRANSFER, true);
		
		// add authorization header
		curl_setopt($session, CURLOPT_HTTPHEADER,$headr);
		
		$response = curl_exec($session);
      
		curl_close($session); 
	       
	    return true; 
	      
  	}



}