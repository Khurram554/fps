<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Student;
use App\Bank;

class PrintController extends Controller
{

    public function showAll(){
        $data = Student::paginate(15);
       // $data = $std->all();
        
        return  View("print",["data" => $data] );
    }

    public function printAll(Request $request){
        $data = json_decode($request['data']);
        $bank = Bank::all();
        $bank = $bank[0];
        $arr  = array(
            
            'name' => $bank->name,
            'branch' => $bank->branch,
            'accno' => $bank->accno,
            'city' => $bank->city
    
    );

        return  View("printAll",["data" => $data, "bank" =>  $arr ] );
    }

    public function print($id){
          $data = Student::where('id', $id)->get();
          $bank = Bank::all();
         
        return  View("printSingle",["data" => $data, "bank" => $bank] );
    }

    public function printSearch(Request $request){
        $request = $request->all();
        
       

        switch( $request["searchType"]){
            case "byname":
                $data = Student::where("name", $request["name"])->paginate(15);
                $data->withPath('?searchType=byname&&name='.$request["name"]);
                return  View("print",["data" => $data] );
                break;

                case "byreg":
                $data = Student::where("regno", $request["regno"])->paginate(15);
                $data->withPath('?searchType=byreg&&regno='.$request["regno"]);
                return  View("print",["data" => $data] );
                break; 
                
                case "byclass":
                $data = Student::where("class", $request["class"])->paginate(15);
                $data->withPath('?searchType=byclass&&class='.$request["class"]);
                return  View("print",["data" => $data] );
                break;
                
                case "byall":
                return redirect('/printpage');
                break;


        }
    }


}
