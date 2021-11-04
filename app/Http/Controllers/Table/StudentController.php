<?php

namespace App\Http\Controllers\Table;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StudentController extends Controller
{
    //push data into db using API
    

    //!to create records
    public function create(Request $request){
        
        $student = new Student();
        $student->fname = $request->fname;
        $student->lname = $request->lname;
        $student->email = $request->email;
        $student->password = $request->password;
        $student->save();

        return response()->json($student); 
    }


    //!to fetch 
    public function index(){
        $student=Student::all();

        //API
        return response()->json(compact('student'), 200);
    }

    public function display($id){
        $student=Student::where('id',$id)->first();
        
        //find() is to find the variable
        $find = Student::find($id);
        if($find)
        {
        
            return response()->json(compact('student'), 200);
        } else {
            return response()->json(["message"=>"Nothing found"],404);
        }
        
    }

    //!update data
    public function update(Request $request, $id){
        $student=Student::find($id);
        if($student)
        {  
            $student->fname = $request->fname;
            $student->lname = $request->lname;
            $student->email = $request->email;
            $student->password = $request->password;
            $student->update();

            return response()->json(["message"=>'Product Successfully Updated']);
        }else {
            return response()->json(["message"=>"no record found"]);
        }
        
    }


    //!Delete data
    public function delete($id){
        $student = Student::find($id);
        // $student=Student::where('id',$id);
        if($student){
            $student->delete();
            return response()->json(['message'=>'record successfully deleted']);
        }else{
            return response()->json(['message'=>'record was not deleted']);
        }
    }



}
