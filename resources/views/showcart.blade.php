<!DOCTYPE html>
<html lang="en">

  <head>

    <base href="/public">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;500;600;700&display=swap" rel="stylesheet">

    <title>Klassy Cafe - Restaurant HTML Template</title>
<!--

TemplateMo 558 Klassy Cafe

https://templatemo.com/tm-558-klassy-cafe

-->
    <!-- Additional CSS Files -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">

    <link rel="stylesheet" href="assets/css/templatemo-klassy-cafe.css">

    <link rel="stylesheet" href="assets/css/owl-carousel.css">

    <link rel="stylesheet" href="assets/css/lightbox.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


   
    </head>

    <body>

    <!-- ***** Preloader Start ***** -->
    {{-- <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div> --}}
    <!-- ***** Preloader End ***** -->


    <!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="{{ url('redirects/') }}" class="logo">
                            <img src="assets/images/klassy-logo.png" align="klassy cafe html template">
                        </a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li class="scroll-to-section"><a href="{{ url('redirects/') }}" class="active">Home</a></li>
                            <li class="scroll-to-section"><a href="{{ url('redirects/') }} ">About</a></li>

                        
                           
                        
                            <li class="scroll-to-section"><a href="{{ url('redirects/') }}">Menu</a></li>
                            <li class="scroll-to-section"><a href="{{ url('redirects/') }}">Chefs</a></li>
                            {{-- <li class="submenu">
                                <a href="javascript:;">Features</a>
                                <ul>
                                    <li><a href="#">Features Page 1</a></li>
                                    <li><a href="#">Features Page 2</a></li>
                                    <li><a href="#">Features Page 3</a></li>
                                    <li><a href="#">Features Page 4</a></li>
                                </ul>
                            </li> --}}
                            <li class="scroll-to-section"><a href="{{ url('redirects/') }}">Contact Us</a></li>
                            <li class="scroll-to-section">
                            
                                @auth
                                    
                                
                            <a href="{{ url('/showcart',Auth::user()->id) }}">
                                Carts{{$count}}  

                            </a>

                                @endauth

                                @guest

                                    Cart[0]

                                @endguest
                            
                            </li>
                            <li>

                                @if (Route::has('login'))
                                <div class="hidden fixed-end  sm:block">
                                    @auth
                                    <x-app-layout>

                                    </x-app-layout>
                                    @else
                                        <li><a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Log in</a></li>

                                        @if (Route::has('register'))
                                           <li> <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a></li>
                                        @endif
                                    @endauth
                                </div>
                            @endif

                            </li>

                        </ul>
                        <a class='menu-trigger'>
                            <span></span>
                        </a>
                        <!-- ***** Menu End ***** -->
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ***** Header Area End ***** -->

    <div id="top">
    <table align="center" bgcolor="tomato" width="500px;">

        <tr align="center">
            <th style="padding: 30px;">Food Name</th>
            <th style="padding: 30px;">Price</th>
            <th style="padding: 30px;">Quantity</th>
            <th style="padding: 30px;">Image</th>
        </tr>

        <form action="{{ url('orderconfirm') }}" method="Post">
            @csrf
    @foreach ($data as $data)
            <tr align="center" style="font-size: 15px;">
                <td style="padding: 20px;">
                    <input type="text" name="foodname[]" value="{{$data->title}}" hidden="">
                    {{$data->title}}
                </td>
                <td style="padding: 20px;">
                    <input type="text" name="price[]" value="{{$data->price}}" hidden="">
                    {{$data->price}} Ks
                </td>
                <td style="padding: 20px;">
                    <input type="text" name="quantity[]" value="{{$data->quantity}}" hidden="">
                    {{$data->quantity}}
                </td>
                <td style="padding: 20px;">
                   
                    <img src="foodimage/{{$data->image}}" width="100px" height="100px">
                </td>
                
            </tr>
   
    @endforeach



        
    </table>

    <table align="right" width="50px" style="position: absolute; top:20%; right:17%;">
        <tr>
            <th style="padding: 30px;"></th>
        </tr>

        @foreach ($data2 as $data2)

<tr>
    <td style="padding:60px; ">
    <a href="{{ url('/remove',$data2->id) }}" class="btn btn-warning ">Remove</a> 
    </td>
</tr>
@endforeach

    </table>
    <br>

    <div align="center">
        <button style="padding: 10px; color:black;" type="button" class="btn btn-info" id="order">Order</button>
    </div>
    <br>


    <div align="center" id="appear" style="padding: 10px; display:none;" >
        <div>
            <label for="">Name</label>
            <input type="text" name="name" placeholder="Enter Name">
        </div>
        <br>
        <div>
            <label for="">Phone</label>
            <input type="number" name="phone" placeholder="Enter Phone Number">
        </div>
        <br>
        <div>
            <label for="">Address</label>
            <input type="text" name="address" placeholder="Enter Your Address">
        </div>
        <br>
        <div>
            <input type="submit" class="btn btn-success" value="Order Confirm" style="color:black">
            <button id="close" type="button" class="btn btn-danger" style="color:black">Close</button>
        </div>

    </div>

</form>
    
   




    <script type="text/javascript">
        $("#order").click(
            function(){
                console.log("hi");
                $("#appear").show();
            });

            $("#close").click(
            function(){
                $("#appear").hide();
            });

    </script>
      <!-- jQuery -->
      <script src="assets/js/jquery-2.1.0.min.js"></script>

      <!-- Bootstrap -->
      <script src="assets/js/popper.js"></script>
      <script src="assets/js/bootstrap.min.js"></script>
  
      <!-- Plugins -->
      <script src="assets/js/owl-carousel.js"></script>
      <script src="assets/js/accordions.js"></script>
      <script src="assets/js/datepicker.js"></script>
      <script src="assets/js/scrollreveal.min.js"></script>
      <script src="assets/js/waypoints.min.js"></script>
      <script src="assets/js/jquery.counterup.min.js"></script>
      <script src="assets/js/imgfix.min.js"></script>
      <script src="assets/js/slick.js"></script>
      <script src="assets/js/lightbox.js"></script>
      <script src="assets/js/isotope.js"></script>
  
      
    </body>
  </html>