<!DOCTYPE html>
<html lang="en">

<head>
<!-- Meta -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">
<meta name="keywords" content="MediaCenter, Template, eCommerce">
<meta name="robots" content="all">
<title> OBC | Online Business Center </title>


<!-- Bootstrap Core CSS -->
<link rel="stylesheet" href="{{ asset('user-dashboard/assets/css/bootstrap.min.css') }}">

<link href="{{ asset('user-dashboard/assets/css/lightbox.css') }}" rel="stylesheet">
<!-- Customizable CSS -->

<link rel="stylesheet" href="{{ asset('user-dashboard/assets/css/main.css') }}">
<link rel="stylesheet" href="{{ asset('user-dashboard/assets/css/blue.css') }}">
<link rel="stylesheet" href="{{ asset('user-dashboard/assets/css/owl.carousel.css') }}">
<link rel="stylesheet" href="{{ asset('user-dashboard/assets/css/owl.transitions.css') }}">
<link rel="stylesheet" href="{{ asset('user-dashboard/assets/css/animate.min.css') }}">
<link rel="stylesheet" href="{{ asset('user-dashboard/assets/css/rateit.css') }}">
<link rel="stylesheet" href="{{ asset('user-dashboard/assets/css/bootstrap-select.min.css') }}">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" >

<link rel="stylesheet" href="{{ asset('user-dashboard/assets/font-awesome/css/font-awesome.min.css') }}">

<!-- Icons/Glyphs -->
<link rel="stylesheet" href="{{ asset('user-dashboard/assets/css/font-awesome.css') }}">

<!-- Fonts -->

<link href="https://fonts.googleapis.com/css?family=Barlow:200,300,300i,400,400i,500,500i,600,700,800" rel="stylesheet">
<link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,600,600italic,700,700italic,800' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
</head>
<body class="cnt-home">
  
  @include('user-dashboard.includes.header')

  @yield('index')

  @include('user-dashboard.includes.footer')

   
<script src="{{ asset('user-dashboard/assets/js/jquery-1.11.1.min.js') }}"></script> 
<script src="{{ asset('user-dashboard/assets/js/bootstrap.min.js') }}"></script> 
<script src="{{ asset('user-dashboard/assets/js/bootstrap-hover-dropdown.min.js') }}"></script> 
<script src="{{ asset('user-dashboard/assets/js/owl.carousel.min.js') }}"></script> 
<script src="{{ asset('user-dashboard/assets/js/echo.min.js') }}"></script> 
<script src="{{ asset('user-dashboard/assets/js/jquery.easing-1.3.min.js') }}"></script> 
<script src="{{ asset('user-dashboard/assets/js/bootstrap-slider.min.js') }}"></script> 
<script src="{{ asset('user-dashboard/assets/js/jquery.rateit.min.js') }}"></script> 
<script src="{{ asset('user-dashboard/assets/js/lightbox.min.js') }}"></script> 
<script src="{{ asset('user-dashboard/assets/js/bootstrap-select.min.js') }}"></script> 
<script src="{{ asset('user-dashboard/assets/js/wow.min.js') }}"></script> 
<script src="{{ asset('user-dashboard/assets/js/scripts.js') }}"></script>

<script src="{{ asset('user-dashboard/assets/js/script.js') }}"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script type="text/javascript">
  const site_url = "http://127.0.0.1:8000/";

  $("body").on("keyup", "#search", function() {
      let text = $("#search").val();
      console.log(text);
  });
</script>
<script>
  @if(Session::has('message'))
  var type = "{{ Session::get('alert-type','info') }}"
  switch(type){
     case 'info':
     toastr.info(" {{ Session::get('message') }} ");
     break;
 
     case 'success':
     toastr.success(" {{ Session::get('message') }} ");
     break;
 
     case 'warning':
     toastr.warning(" {{ Session::get('message') }} ");
     break;
 
     case 'error':
     toastr.error(" {{ Session::get('message') }} ");
     break; 
  }
  @endif 
 </script>

  <script type="text/javascript">
    function AddToWishlist(product_id){
      $.ajax({
        type: "POST",
        dataType: 'json',
        url: "/add-to-wishlist/"+product_id,

        success:function(data){
          Wishlist();
          const Toast = Swal.mixin({
            toast:true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
          })
          if ($.isEmptyObject(data.error)) {
            Toast.fire({
              type: 'success',
              icon: 'success',
              title: data.success,
            })
          }else{
            Toast.fire({
              type: 'error',
              icon: 'error',
              title: data.error,
            })
          }
        }
      })
    }
  </script>

<script type="text/javascript">
  function Wishlist(){
    $.ajax({
      type: "GET",
      dataType: 'json',
      url: "/user/wishlist/get_all_list",

      success:function(response){
        $(#wishQty).text(response.wishQuantity);
        var rows = ""
        $.each(response.wishlist, function (key, value) {
          rows += `
          
          `
        });
        $(#wishlist).html(rows);
      }
    })
  }
  Wishlist();

  function RemoveWishlistProduct(id){
      $.ajax({
        type: "GET",
        dataType: 'json',
        url: "/remove_product_wishlist/"+id,

        success:function(data){

          Wishlist();
          const Toast = Swal.mixin({
            toast:true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
          })
          if ($.isEmptyObject(data.error)) {
            Toast.fire({
              type: 'success',
              icon: 'success',
              title: data.success,
            })
          }else{
            Toast.fire({
              type: 'error',
              icon: 'error',
              title: data.error,
            })
          }
        }
      })
    }

</script>


</body>

</html>