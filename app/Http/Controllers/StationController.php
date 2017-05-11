<?php

namespace App\Http\Controllers;

use App\DBModel\Station;
use App\DBModel\Line;
use Illuminate\Http\Request;

class StationController extends Controller
{
    public function loadStation(){
        $stations = Station::getAll();
        $lines = Line::getAll();
        return view('employee.station_manager.main')-> with ('stations', $stations)->with('lines',$lines);
    }

    public function submitStation(Request $request){
        $this->validate($request, [
            'station_code' => 'required|max:10',
            'name' => 'required|max:255',
            'type' => 'required|max:255',
            'line_no' => 'required|max:6',
            'district' => 'required|max:255',
            'province' => 'required|max:255'
        ]);

        $station = new Station();

        $station->station_code = $request['station_code'];
        $station->name = $request['name'];
        $station->type = $request['type'];
        $station->line_no = $request['line_no'];
        $station->district = $request['district'];
        $station->province = $request['province'];

        if(isset($_POST['Add'])){
            $station->insert();
        }else if(isset($_POST['Update'])){
            $station->update();
        }
        return redirect('/station-manager');
    }

    public function deleteStation(Request $request)
    {
        $station = new Station();

        $station->station_code= $request['station_code'];

        if ($station->remove()) {
            return redirect("/station-manager");
        };

    }
    
}
