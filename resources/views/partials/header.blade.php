<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Dashboard</title>
        
        <link rel="icon" href="{{ url('img/SLSU png.png') }}">
      
        <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css" rel="stylesheet">
        <link href= "https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css" rel="stylesheet">
        <link href=" https://cdn.datatables.net/responsive/2.4.0/css/responsive.bootstrap5.min.css" rel="stylesheet">
     
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link rel="stylesheet" href="{{asset('css/styles.css')}}">
        
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="{{asset('css/toastr.css')}}">
        <link rel="stylesheet" href="{{asset('css/toastr.min.css')}}">

        <link href="{{asset('css/dataTables.min.css')}}" rel="stylesheet">  
        <script src="{{asset('js/jquery.dataTables.min.js')}}"></script>
       
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <link href="{{asset('css/datepicker/bootstrap-datepicker.standalone.min.css')}}" rel="stylesheet"/>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

	<link rel="stylesheet" type="text/css" 
     href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
	
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
            
    </head>
    <body class="sb-nav-fixed">
        @include('sweetalert::alert')