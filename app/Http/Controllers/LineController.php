<?php

namespace App\Http\Controllers;

use App\DBModel\Line;
use Illuminate\Http\Request;

class LineController extends Controller
{
    public function loadLines(){
        $lines = Line::getAll();
        return view('employee.line_details.main')-> with('lines',$lines);
    }
    
    public function submitLine(Request $request){
        
        $this->validate($request,[
           'name'=> 'required|max:255',
            'distance' => 'required|max:255',
        ]);
        
        $line = new Line();
        
        $line->name = $request['name'];
        $line->distance = $request['distance'];
        
        if($line->insert()){
            return redirect('/line-details');
        }
    }
    
    public function deleteLine(Request $request){
        
        $line = new Line();
        
        $line->line_no = $request['line_no'];
        if($line->remove()){
            return redirect('/line-details');
        }
    }
}
