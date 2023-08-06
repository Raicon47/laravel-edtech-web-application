<?php

namespace App\Http\Controllers;

use App\Models\CourseUser;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{

    public function pay(Request $request) {


        //get form datas
        $name = $request->input('full_name');
        $phone = $request->input('phone');
        $email = $request->input('email');
        $address = $request->input('address');
        $country = $request->input('country');
        $state = $request->input('state');
        $zipcode = $request->input('zip_code');
        $price = $request->input('price');
        $course = $request->input('course');
        $course_id = $request->input('course_id');


// prepare rave request
$order = [
    'tx_ref' => time(),
    'amount' =>  $price,
    'currency' => 'NGN',
    'payment_options' => 'card',
    'redirect_url' => url('/process'),
    'customer' => [
        'name' => $name,
        'phone' => $phone,
        'email' => $email,
    ],
    'meta' => [
        'price' => $price,
       'name' => $name,
        'phone' => $phone,
        'user_id' => auth()->user()->id,
        'email' => $email,
        'country' => $country,
        'state' => $state,
        'zip_code' => $zipcode,
        'address' => $address,
        'course_name' => $course,
        'course_id' => $course_id,
    ],
    'customazations' => [
        'title' => 'Paying for a course',
        'description' => 'sample'
    ]
];

// call the flutterwave endpoint

$curl = curl_init();

curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://api.flutterwave.com/v3/payments',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_POSTFIELDS => json_encode($order),
    CURLOPT_HTTPHEADER => array(
        'Authorization: Bearer FLWSECK_TEST-10b6ce6d4326cddf04d0a1d52b9f423a-X',
        'Content-Type: application/json'
    ),
));

$response = curl_exec($curl);


curl_close($curl);

$res = json_decode($response);

if($res->status == 'success') {
    $link = $res->data->link;
    header('Location: '.$link);
    exit();
} else {
    notyf()->position('y', 'top')->ripple(true)->addError('Your payment cannot be processed');
    return back();
}

}

//process transaction
public function process() {

    if (isset($_GET['status']))
    {
        // evaluate payment status
        if ($_GET['status'] == 'cancelled')
        {
            notyf()->position('y', 'top')->ripple(true)->addError('Your payment was concelled');
            return back();
            exit();
        } else {
            $txid = $_GET['transaction_id'];

            $curl = curl_init();
            curl_setopt_array($curl, array(
              CURLOPT_URL => "https://api.flutterwave.com/v3/transactions/{$txid}/verify",
              CURLOPT_RETURNTRANSFER => true,
              CURLOPT_ENCODING => "",
              CURLOPT_MAXREDIRS => 10,
              CURLOPT_TIMEOUT => 0,
              CURLOPT_FOLLOWLOCATION => true,
              CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
              CURLOPT_CUSTOMREQUEST => "GET",
              CURLOPT_HTTPHEADER => array(
                "Content-Type: application/json",
                "Authorization: Bearer FLWSECK_TEST-10b6ce6d4326cddf04d0a1d52b9f423a-X"
              ),
            ));
            $response =  curl_exec($curl);
            curl_close($curl);

            $res = json_decode($response);

            //order data
            $order = $res->data->meta;

            //deploy order to database
            $orders = new Order;

            $orders->user_id = $order->user_id;
            $orders->course_name = $order->course_name;
            $orders->price = $order->price;
            $orders->email = $order->email;
            $orders->phone = $order->phone;
            $orders->country = $order->country;
            $orders->state = $order->state;
            $orders->address = $order->address;
            $orders->zip_code = $order->zip_code;

            $orders->save();

            //update user to have course
            $course_user = new CourseUser;

            $course_user->course_id = $order->course_id;
            $course_user->user_id = $order->user_id;

            $course_user->save();

            notyf()->position('y', 'top')->ripple(true)->addSuccess('Congratulation, your purchase was successful');

            return redirect()->route('dashboard');


            }
    }

}
}

