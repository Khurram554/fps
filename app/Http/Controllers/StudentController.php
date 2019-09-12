<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;

use App\Student;

class StudentController extends Controller
{
    public function showAll(){
        $data = Student::paginate(15);
       // $data = $std->all();
        
        return  View("operation",["data" => $data] );
    }


    public function addStudent(){
        if(isset($_GET['msg'])){
            return  View("addStudent",["msg",$_GET['msg']]);
        }
        return  View("addStudent" );
    }

    public function insertStudent(Request $request){
         $req = $request->all();
         $std = new Student();
        
         $std->name = $req['name'];
         $std->class = $req['class'];
         $std->regno = $req['regno'];
         $std->rollno = $req['rollno'];
         $std->section = $req['section'];
         $std->tutionfee = $req['tutionFee'];
         $std->arrears = $req['arrears'];
         $std->fine = $req['fine'];
         $std->registration	 = $req['registrationFee'];
         $std->admission = $req['addmissionFee'];
         $std->stationery = $req['stationery'];
         $std->annual = $req['annual'];
         $std->ybook = $req['books'];
         $std->transport = $req['transport'];
         $std->computer = $req['computerFee'];
         $std->examination = $req['ExaminationFee'];

         $std->annualFunction = $req['annualFunction'];
         $std->sports = $req['sports'];
         $std->notebook = $req['notebook'];
         $std->photocopies = $req['photocopies'];
         $std->labFee = $req['labFee'];
         $std->idCard = $req['idCard'];

         $std->save();

         return redirect('/add-student?msg=Add 1 New Student');
         
    }

    public function search(Request $request){
        $request = $request->all();
        
       

        switch( $request["searchType"]){
            case "byname":
                $data = Student::where("name", $request["name"])->paginate(15);
                $data->withPath('?searchType=byname&&name='.$request["name"]);
                return  View("operation",["data" => $data] );
                break;

                case "byreg":
                $data = Student::where("regno", $request["regno"])->paginate(15);
                $data->withPath('?searchType=byreg&&regno='.$request["regno"]);
                return  View("operation",["data" => $data] );
                break; 
                
                case "byclass":
                $data = Student::where("class", $request["class"])->paginate(15);
                $data->withPath('?searchType=byclass&&class='.$request["class"]);
                return  View("operation",["data" => $data] );
                break;
                
                case "byall":
                return redirect('/operation');
                break;


        }
    }

    public function del($id){
        
        
         $std =  Student::find($id); 
         if($std->delete()){
            return redirect($_SERVER['HTTP_REFERER']."&&msg=Record Delected");
         }
    }

    public function update(Request $request){
    
             
            
           foreach($request->student as $req){
          
            $id = $req['id']; 
            $std =  Student::find($id);
            
           $std->name = $req['name'];
           $std->class = $req['class'];
         
           $std->tutionfee = $req['fee'];
           $std->arrears = $req['arrear'];
           $std->fine = $req['fine'];
    
           $std->stationery = $req['stationery'];
           $std->transport = $req['van'];
          
           $std->examination = $req['examination'];
   
  
         if( $std->save()){
            return "true";
         }else{
            return "false";
         } 

          
           
        }
    }

    public function test(){
        return Student::all();
    }
}
