@extends('layout.main')

@section('title', 'Bank');

@section('content')
<?php
if(isset($_GET['msg'])){
 echo "<script>alert('".$_GET['msg']."')</script>";
}        
?>
  <form id="addStudentForm" action="{{ url("/bank-update") }}" method="post">

       
       <?php 
        $data = $data[0];
        ?>
        @csrf
        <h1>Bank Info</h1>
        <hr>

        <div class="row">
            <div class="col-md-4">
                <label>Bank Name</label>
            <input type="text" name="name" value="{{ $data->name}}" required>
            </div>
            <div class="col-md-4">
                    <label>Bank Branch</label>
                    <input type="text" name="branch" value="{{ $data->branch}}" required>
            </div>
        </div>

 

        <div class="row">
                <div class="col-md-4">
                    <label>Account No</label>
                    <input type="text" name="accno" value="{{ $data->accno}}" required>
                </div>
                <div class="col-md-4">
                        <label>City</label>
                        <input type="text" name="city" value="{{ $data->city}}" required>
                </div>
        </div>

       

        <div class="row">
                <div class="col-md-4">
                    <input class ="btn btn-info" type="Submit" name="submit" Value="Save">
                </div>
                <div class="col-md-4">
                        <input class ="btn btn-danger" type="reset"  Value="Reset">
                </div>
        </div>

  </form>
@endsection