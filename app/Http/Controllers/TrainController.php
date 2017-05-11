<?php

namespace App\Http\Controllers;

use App\DBModel\Train;
use Illuminate\Http\Request;

class TrainController extends Controller
{
    public function loadTrain(){
        $trains = Train::getAll();
        return view('employee.train_manager.main')->with('trains', $trains);
    }

    public function submitTrain(Request $request){
        $this->validate($request, [
            'train_no' => 'required|max:10',
            'name' => 'required|max:255',
            'type' => 'required|max:255',
            'source_station' => 'required|max:6',
            'departure_time' => 'required|max:6',
            'destination_station' => 'required|max:255',
            'arrival_time' => 'required|max:6',
            'classes' => 'required|max:255',
            'availability' => 'required|max:255'
        ]);

        $train = new Train();

        $train->train_no = $request['train_no'];
        $train->name = $request['name'];
        $train->type = $request['type'];
        $train->source_station = $request['source_station'];
        $train->departure_time = $request['departure_time'];
        $train->destination_station = $request['destination_station'];
        $train->arrival_time = $request['arrival_time'];
        $train->classes = $request['classes'];
        $train->availability = $request['availability'];

        if(isset($_POST['Add'])){
            $train->insert();
        }else if(isset($_POST['Update'])){
            $train->update();
        }
        return redirect('/train-manager');
    }

    public function deleteTrain(Request $request)
    {
        $train = new Train();

        $train->train_no= $request['train_no'];

        if ($train->remove()) {
            return redirect("/train-manager");
        };

    }
}
