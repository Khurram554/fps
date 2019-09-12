<!DOCTYPE html>
<html lang="en"  moznomarginboxes mozdisallowselectionprint>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Print Challan</title>

      <!-- Custom CSS -->  
      <link href="{{ asset('/css/style.css') }}" rel="stylesheet">

      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="_token" content="{{csrf_token()}}" />
      
      
      {{-- <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <!-- Bootstrap core CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.9/css/mdb.min.css" rel="stylesheet">
     
    
    <!-- JQuery -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.9/js/mdb.min.js"></script> --}}


        <link rel="stylesheet" href="{{ asset("/css/bootstrap.css") }}">
        <link rel="stylesheet" href="{{ asset("/css/mdb.min.css") }}">
        <script src="{{ asset("/js/jquery.js")}}"></script>
        <script src="{{ asset("/js/popper.min.js")}}"></script>
        <script src="{{ asset("/js/bootstrap.min.js")}} "></script>
        <script src="{{ asset("/js/mdb.min.js")}} "></script>
        <script src="{{ asset('/js/main.js') }}"></script> 


<style>
        .loader {
          border: 16px solid #f3f3f3;
          border-radius: 50%;
          border-top: 16px solid #3498db;
          width: 120px;
          height: 120px;
          -webkit-animation: spin 2s linear infinite; /* Safari */
          animation: spin 2s linear infinite;
          margin: 0px auto;
        }
        
        
        /* Safari */
        @-webkit-keyframes spin {
          0% { -webkit-transform: rotate(0deg); }
          100% { -webkit-transform: rotate(360deg); }
        }
        
        @keyframes spin {
          0% { transform: rotate(0deg); }
          100% { transform: rotate(360deg); }
        }
        </style>
        
 
</head>

<body>
    

<style>



    body{
        color:#000;
        font-family: 'Times New Roman', Times, serif;
    }
    .row{
        margin-bottom: 650px; 
    }
    .row:last-child{
        margin-bottom: 0px; 
    }
.challan-copy{
    border:1px solid #000;
    padding: 5px;
    margin-left: 5px;
    display: inline-block;
    width: 32%;
    margin-top: 10px;
    height: fit-content;
    

}
table{
    width: 100%;
    margin-top: 35px;
    margin-bottom:10px;
}

ul{
    display: block;
    clear: both;
    margin-top: 130px;

}
h4{
    text-align: center;
    font-weight: 900;
    margin: 10px 0px;
}
div{
    margin: 2px 0px;
}
img{
    margin: 5px 0px;
    width: 200px;
}
b{
    font-weight: 800;
}
.loading{
    position: fixed;
    background: rgba(0,0,0,0.5);
    width: 100%;
    height: 100%;
}
.loading .loader,
.loading h3{
    position: absolute;
    left: 50%;
    top: 50%;
    transform: translate(-50%,-50%);
    color:#fff;
}
.loading h3{
    transform: translate(-23%,380%);
}
</style>

   <div class="loading">
        <div class="loader"></div>
        <h3>
                Creating Fee Invoice...
        </h3>
   </div>
<script>
$(document).ready(function() {
        $(".loading").remove();
        window.print();
});
</script>
<div class="container-fluid prints">
   
      <?php $total = 0; ?>
     
        @foreach ($data->data as $student)
        
        <?php  
                
                
                
                $total +=   (int) $student->tutionfee;
                $total +=   (int) $student->arrears;
                $total +=   (int) $student->registration;            
                $total +=   (int) $student->admission;            
                $total +=   (int) $student->stationery;            
                $total +=   (int) $student->annual;            
                $total +=   (int) $student->notebook;            
                $total +=   (int) $student->fine;            
                $total +=   (int)$student->examination;            
                $copies = ["BANK", "OFFICE", "STUDENT"];

        ?>
        
       
<div class="row">
        @foreach ($copies as $copy)
        <div class=" challan-copy" >
            <h4>FARAN PUBLIC SCHOOL</h4>
                <div>
                    ISSUE DATE: <b>{{ date('d-m-Y') }}</b>

                    <span class="float-right"><b>{{ $copy }} COPY</b></span>
                </div>
                
                <div>
                        DUE DATE: <b>10-{{ date('m-Y') }}</b>
                </div>
    
                <div>
                        VALIDITY DATE: <b>30-{{ date('m-Y') }}</b>
                </div>
    
                <div>
                    <center>
                    <img  src="{{ asset("/logo.jpg") }}" width="100px"/>
                    </center>  
                </div>

                <div>
                        <b>
                        {{$bank['name']}}: {{$bank['branch']}} , {{$bank['city']}}
                        </b>
                    </div>
    
                    <div>
                            Account No: <b>{{$bank['accno']}}</b>
                    </div>

                <div>
                        Reg No: <b>{{ $student->regno}}</b> 
                </div>

                <div>
                        Name: <b>{{ $student->name}}</b> 
                </div>

                <div>
                    Class: <b>{{ $student->class}}</b> Section: <b>{{ $student->section}}</b>
                </div>

                <table border="1px">
                    <tr>
                        <td><b>Head of Account<b></td>
                        <td><b>Amount (Rs)</b></td>
                    </tr>

                    <tr>
                        <td>Tution Fee</td>
                        <td>{{  $student->tutionfee}}</td>   
                    </tr>

                    <tr>
                    <td>Arears </td>
                            <td>{{ $student->arrears }}</td>   
                    </tr>

                    <tr>
                            <td>Registration Fee</td>
                            <td>{{ $student->registration}}</td>   
                    </tr>

                    
                    <tr>
                            <td>Admission Fee</td>
                            <td>{{ $student->admission}}</td>   
                        </tr>
    
                        <tr>
                                <td>Stationery</td>
                                <td>{{ $student->stationery}}</td>   
                        </tr>
    
                        <tr>
                                <td>Annual Charges</td>
                                <td>{{ $student->annual }}</td>   
                        </tr>

                    
                        <tr>
                                <td>Notebook Charges</td>
                                <td>{{ $student->notebook }}</td>   
                            </tr>
        
                            <tr>
                                    <td>Fine</td>
                                    <td>{{ $student->fine}}</td>   
                            </tr>
        
                            <tr>
                                    <td>Examination</td>
                                    <td>{{ $student->examination }}</td>   
                            </tr>  
                            
                            <?php

                            ?>

                            <tr>
                                    <td><b>Total<b></td>
                                    <td>{{$total}}</td>   
                            </tr>    

                            <tr>
                                    <td>Late Fee</td>
                                    <td>100</td>   
                            </tr>    

                            <tr>
                                    <td><b>After Due Date<b></td>
                                    <td>{{$total + 100}}</td>   
                            </tr>    

                </table>

                <div>
                    <span class="float-left">
                        <b>BANK OFFICER</b>
                    </span>

                    <span class="float-right">
                            <b>CASHIER</b>
                    </span>

                </div>

                <ul>
                    <li>Fee is not refundable once paid</li>
                    <li>A fine of Rs. 100 we be charged after due date till validaity</li>
                    <li>After validity date, student name will be struck off from the scchool</li>
                </ul>
    
        </div> <!--End of col 1-->
        @endforeach
        
    </div>
    @endforeach
</div>    
</body>
</html>
