<style>
    @import url(https://fonts.googleapis.com/css?family=Roboto:100,300,400,900,700,500,300,100);
    *{
      margin: 0;
      box-sizing: border-box;
      -webkit-print-color-adjust: exact;
    }
    body{
      background: #E0E0E0;
      font-family: 'Roboto', sans-serif;
    }
    ::selection {background: #f31544; color: #FFF;}
    ::moz-selection {background: #f31544; color: #FFF;}
    .clearfix::after {
        content: "";
        clear: both;
        display: table;
    }
    .col-left {
        float: left;
    }
    .col-right {
        float: right;
    }
    h1{
      font-size: 1.5em;
      color: #444;
    }
    h2{font-size: .9em;}
    h3{
      font-size: 1.2em;
      font-weight: 300;
      line-height: 2em;
    }
    p{
      font-size: .75em;
      color: #666;
      line-height: 1.2em;
    }
    a {
        text-decoration: none;
        color: #00a63f;
    }
    
    #invoiceholder{
      width:100%;
      height: 100%;
      padding: 50px 0;
    }
    #invoice{
      position: relative;
      margin: 0 auto;
      width: 700px;
      background: #FFF;
    }
    
    [id*='invoice-']{ /* Targets all id with 'col-' */
    /*  border-bottom: 1px solid #EEE;*/
      padding: 20px;
    }
    
    #invoice-top{border-bottom: 2px solid #00a63f;}
    #invoice-mid{min-height: 110px;}
    #invoice-bot{ min-height: 240px;}
    
    .logo{
        display: inline-block;
        vertical-align: middle;
        width: 110px;
        overflow: hidden;
    }
    .info{
        display: inline-block;
        vertical-align: middle;
        margin-left: 20px;
    }
    .logo img,
    .clientlogo img {
        width: 100%;
    }
    .clientlogo{
        display: inline-block;
        vertical-align: middle;
        width: 50px;
    }
    .clientinfo {
        display: inline-block;
        vertical-align: middle;
        margin-left: 20px
    }
    .title{
      float: right;
    }
    .title p{text-align: right;}
    #message{margin-bottom: 30px; display: block;}
    h2 {
        margin-bottom: 5px;
        color: #444;
    }
    .col-right td {
        color: #666;
        padding: 5px 8px;
        border: 0;
        font-size: 0.75em;
        border-bottom: 1px solid #eeeeee;
    }
    .col-right td label {
        margin-left: 5px;
        font-weight: 600;
        color: #444;
    }
    .cta-group a {
        display: inline-block;
        padding: 7px;
        border-radius: 4px;
        background: rgb(196, 57, 10);
        margin-right: 10px;
        min-width: 100px;
        text-align: center;
        color: #fff;
        font-size: 0.75em;
    }
    .cta-group .btn-primary {
        background: #00a63f;
    }
    .cta-group.mobile-btn-group {
        display: none;
    }
    table{
      width: 100%;
      border-collapse: collapse;
    }
    td{
        padding: 10px;
        border-bottom: 1px solid #cccaca;
        font-size: 0.70em;
        text-align: left;
    }
    
    .tabletitle th {
      border-bottom: 2px solid #ddd;
      text-align: left;
    }
    .tabletitle th:nth-child(2) {
        text-align: left;
    }
    th {
        font-size: 0.7em;
        text-align: left;
        padding: 5px 10px;
    }
    .item{width: 50%;}
    .list-item td {
        text-align: left;
    }
    .list-item td:nth-child(2) {
        text-align: left;
    }
    .total-row th,
    .total-row td {
        text-align: left;
        font-weight: 700;
        font-size: .75em;
        border: 0 none;
    }
    .table-main {
        
    }
    footer {
        border-top: 1px solid #eeeeee;;
        padding: 15px 20px;
    }
    .effect2
    {
      position: relative;
    }
    .effect2:before, .effect2:after
    {
      z-index: -1;
      position: absolute;
      content: "";
      bottom: 15px;
      left: 10px;
      width: 50%;
      top: 80%;
      max-width:300px;
      background: #777;
      -webkit-box-shadow: 0 15px 10px #777;
      -moz-box-shadow: 0 15px 10px #777;
      box-shadow: 0 15px 10px #777;
      -webkit-transform: rotate(-3deg);
      -moz-transform: rotate(-3deg);
      -o-transform: rotate(-3deg);
      -ms-transform: rotate(-3deg);
      transform: rotate(-3deg);
    }
    .effect2:after
    {
      -webkit-transform: rotate(3deg);
      -moz-transform: rotate(3deg);
      -o-transform: rotate(3deg);
      -ms-transform: rotate(3deg);
      transform: rotate(3deg);
      right: 10px;
      left: auto;
    }
    @media screen and (max-width: 767px) {
        h1 {
            font-size: .9em;
        }
        #invoice {
            width: 100%;
        }
        #message {
            margin-bottom: 20px;
        }
        [id*='invoice-'] {
            padding: 20px 10px;
        }
        .logo {
            width: 140px;
        }
        .title {
            float: none;
            display: inline-block;
            vertical-align: middle;
            margin-left: 40px;
        }
        .title p {
            text-align: left;
        }
        .col-left,
        .col-right {
            width: 100%;
        }
        .table {
            margin-top: 20px;
        }
        #table {
            white-space: nowrap;
            overflow: auto;
        }
        td {
            white-space: normal;
        }
        .cta-group {
            text-align: center;
        }
        .cta-group.mobile-btn-group {
            display: block;
            margin-bottom: 20px;
        }
         /*==================== Table ====================*/
        .table-main {
            border: 0 none;
        }  
          .table-main thead {
            border: none;
            clip: rect(0 0 0 0);
            height: 1px;
            margin: -1px;
            overflow: hidden;
            padding: 0;
            position: absolute;
            width: 2px;
          }
          .table-main tr {
            border-bottom: 2px solid #eee;
            display: block;
            margin-bottom: 20px;
          }
          .table-main td {
            font-weight: 700;
            display: block;
            padding-left: 40%;
            max-width: none;
            position: relative;
            border: 1px solid #cccaca;
            text-align: left;
          }
          .table-main td:before {
            /*
            * aria-label has no advantage, it won't be read inside a table
            content: attr(aria-label);
            */
            content: attr(data-label);
            position: absolute;
            left: 12px;
            font-weight: normal;
            text-transform: uppercase;
          }
        .total-row th {
            display: none;
        }
        .total-row td {
            text-align: left;
        }
        footer {text-align: center;}
    }
    
    </style>
    <body>
    
      <div id="invoiceholder">
      <div id="invoice" class="effect2">
        
        <div id="invoice-top" style="background-image: linear-gradient(red, yellow);">
         <div class="logo"> <!--<img src="uploads\category\SLSU png.png" alt="Logo" /> -->
            <span>Hotel De SLSU</span>
            </div>
          <div class="title">
            <h1>INVOICE </h1>
            
          </div><!--End Title-->
        </div><!--End InvoiceTop-->
    
    
       
          
       
        <div id="invoice-mid">   
          <div id="message">
            <h2>Address: <span> Brgy. San Roque Sogod, Southern Leyte</span></h2>
            <h2>Contact #:<span>  0997 981 4506</span></h2>
          </div>
           
            <div class="clearfix">
                <div class="col-left">
                   <div class="clientinfo">
                        <h2 id="supplier">{{$roomreservation->user->lastname}}, {{$roomreservation->user->firstname}} </h2>
                        <p><span id="address">{{$roomreservation->user->email}}</span></p>
                    </div>
                </div>
                <div class="col-right">
                    <table class="table">
                        <tbody>
                            <tr>
                                <td><span>Invoice Total</span><label id="invoice_total">61.2</label></td>
                                <td><label id="currency"></label></td>
                            </tr>
                            <tr>
                                <td><span>Payment Term</span><label id="payment_term">60 gg DFFM</label></td>
                                <td><span>Invoice Type</span><label id="invoice_type">EXP REP INV</label></td>
                            </tr>
                            <tr><td colspan="2"><span>Note</span>#<label id="note">None</label></td></tr>
                        </tbody>
                    </table>
                </div>
            </div>       
        </div><!--End Invoice Mid-->
        
        <div id="invoice-bot">
          
          <div id="table">
            <table class="table-main">
              <thead>    
                  <tr class="tabletitle">
                    <th>Room No</th>
                    <th>Room Name</th>
                    <th>Check-In</th>
                    <th>Check-Out</th>
                    <th>Price</th>
                   <!-- <th>Package</th> -->
                    <th>No of Nights</th>
                    <!--  <th>Add Ons</th> -->
                    <th>Total</th>
                  </tr>
              </thead>
              <tr class="list-item">
                <td data-label="Room No" class="tableitem">{{$roomreservation->room_id}}</td>
                <td data-label="Room Name" class="tableitem">{{$roomreservation->room->name}}</td>
                <td data-label="Check-In" class="tableitem">{{$roomreservation->check_in}}</td>
                <td data-label="Check-Out" class="tableitem">{{$roomreservation->check_out}}</td>
                <td data-label="Price" class="tableitem">{{$roomreservation->room->price}}</td>
                <!--<td data-label="Package" class="tableitem">46.6</td> -->
                <td data-label="No of Nights" class="tableitem">DP20</td>
                 <!-- <td data-label="Add Ons" class="tableitem">DP20</td> -->
                <td data-label="Total" class="tableitem">{{$roomreservation->total}}</td>
              </tr>
             
                <tr class="list-item total-row">
                    <th colspan="7" class="tableitem">Grand Total</th>
                    <td data-label="Grand Total" class="tableitem">{{$roomreservation->total}}</td>
                </tr>
            </table>
          </div><!--End Table-->
         
        </div><!--End InvoiceBot-->
        <footer>
          <div id="legalcopy" class="clearfix">
            <p class="col-right">Important Note: Please print or keep this for this will be used during Check-in.
            </p>
          </div>
        </footer>
      </div><!--End Invoice-->
    </div><!-- End Invoice Holder-->
      
      
    
    
        </body>
    