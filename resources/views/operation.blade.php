@extends('layout.main')

@section('title', 'Operation')

@section('content')

<?php

if(isset($_GET['msg'])){
 echo "<script>alert('".$_GET['msg']."')</script>";
}  

?>

<div class="searchform">
<form action="{{ url('/search') }}" method="get">
        <div class="row" id="searchType">
            <div class="col-md-12">
                <label> <input type="radio" name="searchType" id="byname" value="byname" > Name </label>
                <label> <input type="radio" name="searchType" id="byreg" value="byreg"> Reg# </label>
                <label> <input type="radio" name="searchType" id="byclass" value="byclass"> Class </label>
                <label> <input type="radio" name="searchType" id="byall" value="byall" checked> All </label>
            </div>
        </div>

        <div class="row" id="nameInput">
            <input list="names" class="searchinput" type="text" name="name" Placeholder="Enter Name">
            <datalist id="names">
                
            </datalist>

     
        </div>

        <div class="row" id="regInput">
                <input list="regnos" class="searchinput" type="text" name="regno" Placeholder="Enter Reg#">
                <datalist id="regnos">
                
                </datalist>
        </div>

        <script>
                $(document).ready(function(){
                    $.ajax({
                        url: "/get-student-data",
                        dataType: "json",
                        success: function(e){
                           for(std in e){
                              var name = e[std].name;
                              var regno = e[std].regno;
                              $("#names").append("<option>"+name+"</option>");
                              $("#regnos").append("<option>"+regno+"</option>");
                           }
                        }
                    });
                });
            </script>

        <div class="row" id="classInput">
                <select class="searchinput" name="class">
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
                <input class="searchinput" type="text" name="section" Placeholder="Section Name ">
        </div>

        <div class="row">
            <input type="submit" value="Search">
        </div>


    </form>
</div>


    <script>
        $(document).ready(function(){
            $("#byname").change(function(){
                $("#regInput").hide();
                $("#classInput").hide();
                $("#nameInput").show();
               
            
            });
        });

        $(document).ready(function(){
            $("#byclass").change(function(){
                $("#regInput").hide();
                $("#classInput").show();
                $("#nameInput").hide();
            });
        });

        $(document).ready(function(){
            $("#byreg").change(function(){
                $("#regInput").show();
                $("#classInput").hide();
                $("#nameInput").hide();
            });
        });

        $(document).ready(function(){
            $("#byall").change(function(){
                $("#regInput").hide();
                $("#classInput").hide();
                $("#nameInput").hide();
            });
        });
    </script>


<div class="row">
    <div class="col-md-12">
            Shown {{ $data->count() * $data->currentPage() }} of {{$data->total() }} 
        <button class="btn btn-info studentSave" style="float:right">Save</button>
        <table id="studentTable" class="table">
            <tr>
                    <th>Reg#</th>
                    <th>Name</th>
                    <th>Class</th>
                    <th>Fee</th>
                    <th>Van</th>
                    <th>Arrears</th>
                    <th>Fine</th>
                    <th>Stationery</th>
                    <th>Examination</th>
                    <th>Action</th>
            </tr>
            
            @foreach ($data as $student)
         
           
            <tr>
                <td style="display:none;" > {{ $student->id}}</td>
                <td class="editMe" > {{ $student->regno}}</td>
                <td class="editMe" > {{ $student->name}}</td>
                <td class="editClass" > {{ $student->class}}</td>
                <td class="numericEdit" > {{ $student->tutionfee}}</td>
                <td class="numericEdit" > {{ $student->transport}}</td>
                <td class="numericEdit" > {{ $student->arrears}}</td>
                <td class="numericEdit" > {{ $student->fine}}</td>
                <td class="numericEdit" > {{ $student->stationery}}</td>
                <td class="numericEdit" > {{ $student->examination}}</td>
                <td>   
                   
                    <a href=" {{ url("/print/$student->id") }}">Print</a> | 
                    <a href="{{ url("/student-del/$student->id") }}">Delete</a>
                </td>
            </tr>
            @endforeach
            
        </table>
        <button class="btn btn-info studentSave" style="float:right">Save</button>
        
                <div class="pagination">
                        {{ $data->links() }}
                </div>
    </div>
</div>






<script src="{{ asset('/js/SimpleTableCellEditor.es6.min.js') }}"></script>

    <script>
        $(document).ready(function () {

            
            //Advanced editor
            var advancedEditor = new SimpleTableCellEditor("studentTable");
            
            advancedEditor.SetEditableClass("editMe");
            advancedEditor.SetEditableClass("numericEdit", { validation: $.isNumeric });

            advancedEditor.SetEditableClass("editClass", {
                internals: {
                    renderEditor: (elem, oldVal) => {
                        $(elem).html(`<select>
                                <option>Pre Nursery</option>
                        <option>Nursery</option>
                        <option>Prep</option>
                        <option>One</option>
                        <option>Two</option>
                        <option>Three</option>
                        <option>Four</option>
                        <option>Five</option>
                        <option>Six</option>
                        <option>Seven</option>
                        <option>Eight</option>
                                    </select>`);

                        $("select option").filter(function () {
                            return $(this).val() == oldVal;
                        }).prop('selected', true);
                    
                    },
                    extractEditorValue: (elem) => { return $(elem).find('select').val(); },

                }
            });

           
            $("#studentTable").on("cell:onEditEnter", function (element, oldValue) {             
                $('.studentSave').removeAttr("disabled");
                $('.studentSave').text("Save");
            });

            // save btn
            students = {};

            
           
            $(".studentSave").click(function(){

                $('.studentSave').attr("disabled","disabled");
                $('.studentSave').text("Saving..");
                var data = [];
                var tr  = $("#studentTable").find("tr");
                
                tr.each(function(){
                    if($(this).index() != "0"){
                        
                       
                        $(this).children().each(function(e){
                            std= {};
                            td = $(this);
                            
                            if(td.index() == 0){
                                id = td.text();
                            }

                            if(td.index() == 1){
                                sreg = td.text();
                            }

                            if(td.index() == 2){
                                sname = td.text();
                            }

                            if(td.index() == 3){
                                sclass = td.text();
                            }

                            if(td.index() == 4){
                                sfee = td.text();
                            }

                            if(td.index() == 5){
                                svan = td.text();
                            }

                            if(td.index() == 6){
                                sarrear = td.text();
                            }


                            if(td.index() == 7){
                                sfine = td.text();
                            }

                            if(td.index() == 8){
                                sstationery = td.text();
                            }

                            if(td.index() == 9){
                                sexamination = td.text();
                            }

                        });
                                                  
                        std.id = id;
                        std.regno = sreg;
                        std.name = sname;
                        std.class = sclass;
                        std.fee = sfee;
                        std.van = svan;
                        std.arrear = sarrear;
                        std.fine = sfine;
                        std.stationery = sstationery;
                        std.examination = sexamination;
                        data.push(std);

                        
                    }

                   
                    
                });
                
               
                
                students.student = data;
                
                $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                  }
              });
               jQuery.ajax({
                  url: "{{ url('/student-update') }}",
                  method: 'post',
                  data: students,
                  success: function(result){
                     if(result == "true"){
                        $('.studentSave').text("Saved");
                     }
                  }});
                

            }); //end of save click
            

        });
    </script>


@endsection


