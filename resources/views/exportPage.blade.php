@extends('layout.main')

@section('title', 'Export')

@section('content')

<div class="searchform">

        <div class="row" id="searchType">
            <div class="col-md-12">
                <label> <input type="radio" name="searchType" id="byclass" value="byclass"> Class </label>
                <label> <input type="radio" name="searchType" id="byall" value="byall" checked> All </label>
            </div>
        </div>

        <div class="row" id="classInput">
                <select class="classname" name="class">
                        <option value="Pre Nursery" selected>Pre Nursery</option>
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
               <button class="btn btn-info" onclick="exportclassbtn()"> Export</button>
               <script>
                   function exportclassbtn(){
                       window.open('{{ url("/export/byclass") }}/' +$('.classname').val() );
                   }
               </script>
        </div>

        <div class="row" id="allInput">
              <span>Export All Students Data</span> <button class="btn btn-info" onclick=window.open("{{ url('/export/all') }}")> Export</button>
        </div>

       


</div>


    <script>
     

        $(document).ready(function(){
            $("#byclass").change(function(){
                $("#regInput").hide();
                $("#classInput").show();
                $("#nameInput").hide();
                $("#allInput").hide();
            });
        });

       

        $(document).ready(function(){
            $("#byall").change(function(){
                $("#regInput").hide();
                $("#classInput").hide();
                $("#nameInput").hide();
                $("#allInput").show();
            });
            
        });
    </script>




@endsection


