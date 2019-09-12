@extends('layout.main')

@section('title', 'Dashboard')

@section('content')
<?php
if(isset($_GET['msg'])){
 echo "<script>alert('".$_GET['msg']."')</script>";
}        
?>
  <form id="addStudentForm" action="{{ url("/insertStudent") }}" method="post">

       
       
        @csrf
        <h1>Add Individual Student</h1>
        <hr>

        <div class="row">
            <div class="col-md-4">
                <label>Name</label>
                <input type="text" name="name" Placeholder="Student Name" required>
            </div>
            <div class="col-md-4">
                    <label>Admission Fee</label>
                    <input type="text" name="addmissionFee" Placeholder="Admission Fee">
            </div>
        </div>

        <div class="row">
                <div class="col-md-4">
                    <label>Class</label>
                    <select name="class" required>
                        <option value="Pre Nursery">Pre Nursery</option>
                        <option value="Nursery">Nursery</option>
                        <option value="Prep">Prep</option>
                        <option value="One">One</option>
                        <option value="Two">Two</option>
                        <option value="Three">Three</option>
                        <option value="Four">Four</option>
                        <option value="Five">Five</option>
                        <option value="Six">Six</option>
                        <option value="Seven">Seven</option>
                        <option value="Eight">Eight</option>
                    </select>
                </div>
                <div class="col-md-4">
                        <label>Stationery Charges</label>
                        <input type="text" name="stationery" Placeholder="Stationery Charges">
                </div>
        </div>

        <div class="row">
                <div class="col-md-4">
                    <label>Registration No</label>
                    <input type="text" name="regno" Placeholder="Registration No" required>
                </div>
                <div class="col-md-4">
                        <label>Annual Charges</label>
                        <input type="text" name="annual" Placeholder="Annual Charges<">
                </div>
        </div>

        <div class="row">
                <div class="col-md-4">
                    <label>Roll No</label>
                    <input type="text" name="rollno" Placeholder="Roll No">
                </div>
                <div class="col-md-4">
                        <label>Sports Fund</label>
                        <input type="text" name="sports" Placeholder="Sports Fund">
                </div>
        </div>

        <div class="row">
                <div class="col-md-4">
                    <label>Section</label>
                    <input type="text" name="section" Placeholder="Section Name">
                </div>
                <div class="col-md-4">
                        <label>Annual Function Charges</label>
                        <input type="text" name="annualFunction" Placeholder="Annual Function Charges">
                </div>
        </div>

        <div class="row">
                <div class="col-md-4">
                    <label>Tution fee</label>
                    <input type="text" name="tutionFee" Placeholder="Tution fee" required>
                </div>
                <div class="col-md-4">
                        <label>Notebook Charges</label>
                        <input type="text" name="notebook" Placeholder="Notebook Charges">
                </div>
        </div>

        <div class="row">
                <div class="col-md-4">
                    <label>Arrears</label>
                    <input type="text" name="arrears" Placeholder="Student Name">
                </div>
                <div class="col-md-4">
                        <label>Transport Charges</label>
                        <input type="text" name="transport" Placeholder="Arrears">
                </div>
        </div>

        <div class="row">
                <div class="col-md-4">
                    <label>Fine</label>
                    <input type="text" name="fine" Placeholder="Fine">
                </div>
                <div class="col-md-4">
                        <label>Computer Fee</label>
                        <input type="text" name="computerFee" Placeholder="Computer fee">
                </div>
        </div>

        <div class="row">
                <div class="col-md-4">
                    <label>Registration Fee</label>
                    <input type="text" name="registrationFee" Placeholder="Registration Fee">
                </div>
                <div class="col-md-4">
                        <label>Examination Fee</label>
                        <input type="text" name="ExaminationFee" Placeholder="Examination Fee">
                </div>
        </div>

        <div class="row">
                <div class="col-md-4">
                    <label>Photo Copies Charges</label>
                    <input type="text" name="photocopies" Placeholder="Photo Copies Charges">
                </div>
                <div class="col-md-4">
                        <label>Lab Fee</label>
                        <input type="text" name="labFee" Placeholder="Lab Fee">
                </div>
        </div>

        <div class="row">
                <div class="col-md-4">
                    <label>Book Charges</label>
                    <input type="text" name="books" Placeholder="Book Charges">
                </div>
                <div class="col-md-4">
                        <label>ID Card Charges</label>
                        <input type="text" name="idCard" Placeholder="ID Card Charges">
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