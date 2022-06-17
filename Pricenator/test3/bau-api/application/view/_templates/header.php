<?php

header('Cache-control: private'); // IE 6 FIX

if (isset($_SESSION['lang'])) {
    $lang = $_SESSION['lang'];
    setcookie('lang', $lang, time() + (3600 * 24 * 30));
} else if (isset($_COOKIE['lang'])) {
    $lang = $_COOKIE['lang'];
    $_SESSION['lang'] = $lang;
} else {
    $lang = 'en';
    $_SESSION['lang'] = $lang;
    setcookie('lang', $lang, time() + (3600 * 24 * 30));
}

switch ($lang) {
    case 'en':
        $lang_file = 'lang-en.php';
        break;

    case 'ar':
        $lang_file = 'lang-ar.php';
        break;

        $lang_file = 'lang-en.php';

}

include_once 'translation/' . $lang_file;
?>
<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Hotel Reservation</title>

    <!-- Styles -->
    <link href="<?= URL ?>theme/bootstrap/css/app.css" rel="stylesheet">
    <link href="<?= URL ?>theme/bootstrap/css/font-awesome.min.css" rel="stylesheet">
           <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous"> 
               <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/3.1.3/css/bootstrap-datetimepicker.min.css" rel="stylesheet">
                  <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
                  <style type="text/css">
                      .panel-heading>.dropdown .dropdown-toggle,.panel-title,.panel-title>.small,.panel-title>.small>a,.panel-title>a,.panel-title>small,.panel-title>small>a{
    color:inherit
}
.list-group-item-heading{
    margin-top:0;
    margin-bottom:5px
}
.list-group-item-text{
    margin-bottom:0;
    line-height:1.3
}
.panel{
    margin-bottom:22px;
    background-color:#fff;
    border:1px solid transparent;
    border-radius:4px;
    box-shadow:0 1px 1px rgba(0,0,0,.05)
}
.panel-title,.panel>.list-group,.panel>.panel-collapse>.list-group,.panel>.panel-collapse>.table,.panel>.table,.panel>.table-responsive>.table{
    margin-bottom:0
}
.panel-body{
    padding:15px
}
.panel-body:after,.panel-body:before{
    content:" ";
    display:table
}
.panel-heading{
    padding:10px 15px;
    border-bottom:1px solid transparent;
    border-top-right-radius:3px;
    border-top-left-radius:3px
}
.panel-title{
    margin-top:0;
    font-size:16px
}
.panel-footer{
    padding:10px 15px;
    background-color:#f5f5f5;
    border-top:1px solid #d3e0e9;
    border-bottom-right-radius:3px;
    border-bottom-left-radius:3px
}
.panel>.list-group .list-group-item,.panel>.panel-collapse>.list-group .list-group-item{
    border-width:1px 0;
    border-radius:0
}
.panel-group .panel-heading,.panel>.table-bordered>tbody>tr:first-child>td,.panel>.table-bordered>tbody>tr:first-child>th,.panel>.table-bordered>tbody>tr:last-child>td,.panel>.table-bordered>tbody>tr:last-child>th,.panel>.table-bordered>tfoot>tr:last-child>td,.panel>.table-bordered>tfoot>tr:last-child>th,.panel>.table-bordered>thead>tr:first-child>td,.panel>.table-bordered>thead>tr:first-child>th,.panel>.table-responsive>.table-bordered>tbody>tr:first-child>td,.panel>.table-responsive>.table-bordered>tbody>tr:first-child>th,.panel>.table-responsive>.table-bordered>tbody>tr:last-child>td,.panel>.table-responsive>.table-bordered>tbody>tr:last-child>th,.panel>.table-responsive>.table-bordered>tfoot>tr:last-child>td,.panel>.table-responsive>.table-bordered>tfoot>tr:last-child>th,.panel>.table-responsive>.table-bordered>thead>tr:first-child>td,.panel>.table-responsive>.table-bordered>thead>tr:first-child>th{
    border-bottom:0
}
.panel>.table-responsive:last-child>.table:last-child,.panel>.table-responsive:last-child>.table:last-child>tbody:last-child>tr:last-child,.panel>.table-responsive:last-child>.table:last-child>tfoot:last-child>tr:last-child,.panel>.table:last-child,.panel>.table:last-child>tbody:last-child>tr:last-child,.panel>.table:last-child>tfoot:last-child>tr:last-child{
    border-bottom-left-radius:3px;
    border-bottom-right-radius:3px
}
.panel>.list-group:first-child .list-group-item:first-child,.panel>.panel-collapse>.list-group:first-child .list-group-item:first-child{
    border-top:0;
    border-top-right-radius:3px;
    border-top-left-radius:3px
}
.panel>.list-group:last-child .list-group-item:last-child,.panel>.panel-collapse>.list-group:last-child .list-group-item:last-child{
    border-bottom:0;
    border-bottom-right-radius:3px;
    border-bottom-left-radius:3px
}
.panel>.panel-heading+.panel-collapse>.list-group .list-group-item:first-child{
    border-top-right-radius:0;
    border-top-left-radius:0
}
.panel>.table-responsive:first-child>.table:first-child,.panel>.table-responsive:first-child>.table:first-child>tbody:first-child>tr:first-child,.panel>.table-responsive:first-child>.table:first-child>thead:first-child>tr:first-child,.panel>.table:first-child,.panel>.table:first-child>tbody:first-child>tr:first-child,.panel>.table:first-child>thead:first-child>tr:first-child{
    border-top-right-radius:3px;
    border-top-left-radius:3px
}
.list-group+.panel-footer,.panel-heading+.list-group .list-group-item:first-child{
    border-top-width:0
}
.panel>.panel-collapse>.table caption,.panel>.table caption,.panel>.table-responsive>.table caption{
    padding-left:15px;
    padding-right:15px
}
.panel>.table-responsive:first-child>.table:first-child>tbody:first-child>tr:first-child td:first-child,.panel>.table-responsive:first-child>.table:first-child>tbody:first-child>tr:first-child th:first-child,.panel>.table-responsive:first-child>.table:first-child>thead:first-child>tr:first-child td:first-child,.panel>.table-responsive:first-child>.table:first-child>thead:first-child>tr:first-child th:first-child,.panel>.table:first-child>tbody:first-child>tr:first-child td:first-child,.panel>.table:first-child>tbody:first-child>tr:first-child th:first-child,.panel>.table:first-child>thead:first-child>tr:first-child td:first-child,.panel>.table:first-child>thead:first-child>tr:first-child th:first-child{
    border-top-left-radius:3px
}
.panel>.table-responsive:first-child>.table:first-child>tbody:first-child>tr:first-child td:last-child,.panel>.table-responsive:first-child>.table:first-child>tbody:first-child>tr:first-child th:last-child,.panel>.table-responsive:first-child>.table:first-child>thead:first-child>tr:first-child td:last-child,.panel>.table-responsive:first-child>.table:first-child>thead:first-child>tr:first-child th:last-child,.panel>.table:first-child>tbody:first-child>tr:first-child td:last-child,.panel>.table:first-child>tbody:first-child>tr:first-child th:last-child,.panel>.table:first-child>thead:first-child>tr:first-child td:last-child,.panel>.table:first-child>thead:first-child>tr:first-child th:last-child{
    border-top-right-radius:3px
}
.panel>.table-responsive:last-child>.table:last-child>tbody:last-child>tr:last-child td:first-child,.panel>.table-responsive:last-child>.table:last-child>tbody:last-child>tr:last-child th:first-child,.panel>.table-responsive:last-child>.table:last-child>tfoot:last-child>tr:last-child td:first-child,.panel>.table-responsive:last-child>.table:last-child>tfoot:last-child>tr:last-child th:first-child,.panel>.table:last-child>tbody:last-child>tr:last-child td:first-child,.panel>.table:last-child>tbody:last-child>tr:last-child th:first-child,.panel>.table:last-child>tfoot:last-child>tr:last-child td:first-child,.panel>.table:last-child>tfoot:last-child>tr:last-child th:first-child{
    border-bottom-left-radius:3px
}
.panel>.table-responsive:last-child>.table:last-child>tbody:last-child>tr:last-child td:last-child,.panel>.table-responsive:last-child>.table:last-child>tbody:last-child>tr:last-child th:last-child,.panel>.table-responsive:last-child>.table:last-child>tfoot:last-child>tr:last-child td:last-child,.panel>.table-responsive:last-child>.table:last-child>tfoot:last-child>tr:last-child th:last-child,.panel>.table:last-child>tbody:last-child>tr:last-child td:last-child,.panel>.table:last-child>tbody:last-child>tr:last-child th:last-child,.panel>.table:last-child>tfoot:last-child>tr:last-child td:last-child,.panel>.table:last-child>tfoot:last-child>tr:last-child th:last-child{
    border-bottom-right-radius:3px
}
.panel>.panel-body+.table,.panel>.panel-body+.table-responsive,.panel>.table+.panel-body,.panel>.table-responsive+.panel-body{
    border-top:1px solid #ddd
}
.panel>.table>tbody:first-child>tr:first-child td,.panel>.table>tbody:first-child>tr:first-child th{
    border-top:0
}
.panel>.table-bordered,.panel>.table-responsive>.table-bordered{
    border:0
}
.panel>.table-bordered>tbody>tr>td:first-child,.panel>.table-bordered>tbody>tr>th:first-child,.panel>.table-bordered>tfoot>tr>td:first-child,.panel>.table-bordered>tfoot>tr>th:first-child,.panel>.table-bordered>thead>tr>td:first-child,.panel>.table-bordered>thead>tr>th:first-child,.panel>.table-responsive>.table-bordered>tbody>tr>td:first-child,.panel>.table-responsive>.table-bordered>tbody>tr>th:first-child,.panel>.table-responsive>.table-bordered>tfoot>tr>td:first-child,.panel>.table-responsive>.table-bordered>tfoot>tr>th:first-child,.panel>.table-responsive>.table-bordered>thead>tr>td:first-child,.panel>.table-responsive>.table-bordered>thead>tr>th:first-child{
    border-left:0
}
.panel>.table-bordered>tbody>tr>td:last-child,.panel>.table-bordered>tbody>tr>th:last-child,.panel>.table-bordered>tfoot>tr>td:last-child,.panel>.table-bordered>tfoot>tr>th:last-child,.panel>.table-bordered>thead>tr>td:last-child,.panel>.table-bordered>thead>tr>th:last-child,.panel>.table-responsive>.table-bordered>tbody>tr>td:last-child,.panel>.table-responsive>.table-bordered>tbody>tr>th:last-child,.panel>.table-responsive>.table-bordered>tfoot>tr>td:last-child,.panel>.table-responsive>.table-bordered>tfoot>tr>th:last-child,.panel>.table-responsive>.table-bordered>thead>tr>td:last-child,.panel>.table-responsive>.table-bordered>thead>tr>th:last-child{
    border-right:0
}
.panel>.table-responsive{
    border:0;
    margin-bottom:0
}
.panel-group{
    margin-bottom:22px
}
.panel-group .panel{
    margin-bottom:0;
    border-radius:4px
}
.panel-group .panel+.panel{
    margin-top:5px
}
.panel-group .panel-heading+.panel-collapse>.list-group,.panel-group .panel-heading+.panel-collapse>.panel-body{
    border-top:1px solid #d3e0e9
}
.panel-group .panel-footer{
    border-top:0
}
.panel-group .panel-footer+.panel-collapse .panel-body{
    border-bottom:1px solid #d3e0e9
}
.panel-default{
    border-color:#d3e0e9
}
.panel-default>.panel-heading{
    color:#333;
    background-color:#fff;
    border-color:#d3e0e9
}
.panel-default>.panel-heading+.panel-collapse>.panel-body{
    border-top-color:#d3e0e9
}
.panel-default>.panel-heading .badge{
    color:#fff;
    background-color:#333
}
.panel-default>.panel-footer+.panel-collapse>.panel-body{
    border-bottom-color:#d3e0e9
}
.panel-primary{
    border-color:#3097D1
}
.panel-primary>.panel-heading{
    color:#fff;
    background-color:#3097D1;
    border-color:#3097D1
}
.panel-primary>.panel-heading+.panel-collapse>.panel-body{
    border-top-color:#3097D1
}
.panel-primary>.panel-heading .badge{
    color:#3097D1;
    background-color:#fff
}
.panel-primary>.panel-footer+.panel-collapse>.panel-body{
    border-bottom-color:#3097D1
}
.panel-success{
    border-color:#d6e9c6
}
.panel-success>.panel-heading{
    color:#3c763d;
    background-color:#dff0d8;
    border-color:#d6e9c6
}
.panel-success>.panel-heading+.panel-collapse>.panel-body{
    border-top-color:#d6e9c6
}
.panel-success>.panel-heading .badge{
    color:#dff0d8;
    background-color:#3c763d
}
.panel-success>.panel-footer+.panel-collapse>.panel-body{
    border-bottom-color:#d6e9c6
}
.panel-info{
    border-color:#bce8f1
}
.panel-info>.panel-heading{
    color:#31708f;
    background-color:#d9edf7;
    border-color:#bce8f1
}
.panel-info>.panel-heading+.panel-collapse>.panel-body{
    border-top-color:#bce8f1
}
.panel-info>.panel-heading .badge{
    color:#d9edf7;
    background-color:#31708f
}
.panel-info>.panel-footer+.panel-collapse>.panel-body{
    border-bottom-color:#bce8f1
}
.panel-warning{
    border-color:#faebcc
}
.panel-warning>.panel-heading{
    color:#8a6d3b;
    background-color:#fcf8e3;
    border-color:#faebcc
}
.panel-warning>.panel-heading+.panel-collapse>.panel-body{
    border-top-color:#faebcc
}
.panel-warning>.panel-heading .badge{
    color:#fcf8e3;
    background-color:#8a6d3b
}
.panel-warning>.panel-footer+.panel-collapse>.panel-body{
    border-bottom-color:#faebcc
}
.panel-danger{
    border-color:#ebccd1
}
.panel-danger>.panel-heading{
    color:#a94442;
    background-color:#f2dede;
    border-color:#ebccd1
}
.panel-danger>.panel-heading+.panel-collapse>.panel-body{
    border-top-color:#ebccd1
}
.panel-danger>.panel-heading .badge{
    color:#f2dede;
    background-color:#a94442
}
.panel-danger>.panel-footer+.panel-collapse>.panel-body{
    border-bottom-color:#ebccd1
}
                  </style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="">
                   Hotel Reservation
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
<!--                                                     <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Manage <span class="caret"></span>
                                </a>

                              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="">
                                        News
                                    </a>
                            <a class="dropdown-item" href="">
                                        Teams
                                    </a>
                            <a class="dropdown-item" href="">
                                        Highligh
                                    </a>
                             <a class="dropdown-item" href="">
                                        Results
                                    </a>
                                </div> </li> -->
                                       <!--<li class="nav-item Navbar">
         <a class="nav-link" href="{{ route('viewdetails') }}" role="button"  aria-haspopup="true" aria-expanded="false">
        All Details<span class="caret"></span></a></li>-->
<!--                                                <li class="nav-item Navbar">
         <a class="nav-link" href="{{ route('addResult') }}" role="button"  aria-haspopup="true" aria-expanded="false">
        Result<span class="caret"></span></a></li>-->
        <li class="nav-item Navbar">
         <a class="nav-link" href="<?php echo URL . 'foodDrink/index'; ?>" role="button"  aria-haspopup="true" aria-expanded="false">
        Food/Drink<span class="caret"></span></a></li>
                                                <li class="nav-item Navbar">
                                    <a class="nav-link" href="<?php echo URL . 'extraService/index'; ?>" role="button"  aria-haspopup="true" aria-expanded="false">
                                    Extra Services<span class="caret"></span></a>
</li>    
                                                        <li class="nav-item Navbar">
                                    <a class="nav-link" href="<?php echo URL . 'categoryfd/index'; ?>" role="button"  aria-haspopup="true" aria-expanded="false">
                                    Category Food/Drink<span class="caret"></span></a>
</li>
        <li class="nav-item Navbar">
         <a class="nav-link" href="<?php echo URL . 'maintenance/index'; ?>" role="button"  aria-haspopup="true" aria-expanded="false">
        Maintenance<span class="caret"></span></a></li>
<li class="nav-item Navbar">
         <a class="nav-link" href="<?php echo URL . 'bathe/index'; ?>" role="button"  aria-haspopup="true" aria-expanded="false">
        Bathes<span class="caret"></span></a></li>
        <li class="nav-item Navbar">
            
         <a class="nav-link" href="<?php echo URL . 'customer/index'; ?>" role="button"  aria-haspopup="true" aria-expanded="false">
        Customers<span class="caret"></span></a></li>
                        <li class="nav-item Navbar">
                                    <a class="nav-link" href="<?php echo URL . 'room/index'; ?>" role="button"  aria-haspopup="true" aria-expanded="false">
                                    Rooms<span class="caret"></span></a>
</li>
         <li class="nav-item Navbar">
         <a class="nav-link" href="<?php echo URL .
'reservation/index'; ?>" role="button"  aria-haspopup="true"
aria-expanded="false">
        Reservation<span class="caret"></span></a></li>
                    



       <li class="nav-item Navbar">
         <a class="nav-link" href="<?php echo URL .
'testa/index'; ?>" role="button"  aria-haspopup="true"
aria-expanded="false">
        RoomResvrtion <span class="caret"></span></a></li>

                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">

