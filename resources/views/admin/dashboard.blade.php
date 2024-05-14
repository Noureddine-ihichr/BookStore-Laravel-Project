



<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Admin Panel</title>


   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

 
   <link rel="stylesheet" href="{{ asset('css/admin_style.css') }}">

</head>
<body>
   
@include('admin.admin_header')



<section class="dashboard">

   <h1 class="title">Dashboard</h1>

   <div class="box-container">

      <div class="box">
         @php
            $total_pendings = 0;
            $select_pending = \Illuminate\Support\Facades\DB::table('orders')->where('payment_status', 'pending')->get();
            if ($select_pending->isNotEmpty()) {
               foreach ($select_pending as $order) {
                  $total_pendings += $order->total_price;
               }
            }
         @endphp
         <h3>${{ $total_pendings }}/-</h3>
         <p>Total Pendings</p>
      </div>

      <div class="box">
         @php
            $total_completed = 0;
            $select_completed = \Illuminate\Support\Facades\DB::table('orders')->where('payment_status', 'completed')->get();
            if ($select_completed->isNotEmpty()) {
               foreach ($select_completed as $order) {
                  $total_completed += $order->total_price;
               }
            }
         @endphp
         <h3>${{ $total_completed }}/-</h3>
         <p>Completed Payments</p>
      </div>

      <div class="box">
         @php
            $number_of_orders = \Illuminate\Support\Facades\DB::table('orders')->count();
         @endphp
         <h3>{{ $number_of_orders }}</h3>
         <p>Orders Placed</p>
      </div>

      <div class="box">
         @php
            $number_of_products = \Illuminate\Support\Facades\DB::table('products')->count();
         @endphp
         <h3>{{ $number_of_products }}</h3>
         <p>Products Added</p>
      </div>

      <div class="box">
         @php
            $number_of_users = \Illuminate\Support\Facades\DB::table('users')->where('user_type', 'user')->count();
         @endphp
         <h3>{{ $number_of_users }}</h3>
         <p>Normal Users</p>
      </div>

      <div class="box">
         @php
            $number_of_admins = \Illuminate\Support\Facades\DB::table('users')->where('user_type', 'admin')->count();
         @endphp
         <h3>{{ $number_of_admins }}</h3>
         <p>Admin Users</p>
      </div>

      <div class="box">
         @php
            $number_of_accounts = \Illuminate\Support\Facades\DB::table('users')->count();
         @endphp
         <h3>{{ $number_of_accounts }}</h3>
         <p>Total Accounts</p>
      </div>

      <div class="box">
         @php
            $number_of_messages = \Illuminate\Support\Facades\DB::table('contacts')->count();
         @endphp
         <h3>{{ $number_of_messages }}</h3>
         <p>New Messages</p>
      </div>

   </div>

</section>


<script src="{{ asset('js/admin_script.js') }}"></script>

</body>
</html>

@php
    session_start();
    $admin_id = session('admin_id');

    if (!isset($admin_id)) {
        return redirect()->route('login'); // Redirect to login route if admin_id is not set
    }
@endphp

