<?php

namespace App\Http\Controllers;

use App\Starbucks;
use App\Customs;
use Illuminate\Http\Request;
use App\Coding;
use App\ToDo;
use Carbon\Carbon;
use Spatie\GoogleCalendar\Event;
use Storage;

class PostController extends Controller
{
    public function index(Starbucks $starbucks, Coding $coding, ToDo $to_do)
    {
        $events = [];
        //Event::get(); // 未来の全イベントを取得する
        
        return view('index')->with(['starbucks' => $starbucks->get(), 'coding' => $coding->get(), 'to_do' => $to_do->get(), 'events' => $events ]);  
    }
    
    public function show(Starbucks $starbucks)
    {
        return view('starbucks/show')->with(['starbucks' => $starbucks]);
    }
    
    public function create(Customs $customs)
    {
        return view('starbucks/create') ->with(['customs' => $customs->get()]);
    }
    
    public function store(Request $request, Starbucks $starbucks)
    {
        $input_starbucks = $request['starbucks'];
        $input_customs = $_POST['customs_array'];
        $starbucks->fill($input_starbucks)->save();
        $starbucks->customs()->attach($input_customs);
        return redirect('/starbucks/' . $starbucks->id);
    }
    
    public function edit(Starbucks $starbucks, Customs $customs)
    {
        $isChecked = ['','','','','','','',''];
        $CheckedCustoms = $starbucks->customs()->get(['id']);
        foreach($CheckedCustoms as $custom)
        {
            $isChecked[$custom->id] = 'checked';
        }
        return view('starbucks/edit')->with(['starbucks' => $starbucks,'customs' => $customs->get(), 'isChecked'=>$isChecked]);
    }
    
    public function update(Request $request, Starbucks $starbucks)
    {
        $input_starbucks = $request['starbucks'];
        $input_customs = $_POST['customs_array'];
        $starbucks->fill($input_starbucks)->save();
        $starbucks->customs()->sync($input_customs);
        return redirect('/starbucks/' . $starbucks->id);
    }
    
    public function delete(Starbucks $starbucks)
    {
        $starbucks->delete();
        return redirect('/');
    }
    
    public function codingShow(Coding $coding)
    {
        $explode = explode("```", $coding->body);
        return view('coding/show')->with(['coding' => $coding, 'explode' => $explode]);
    }
    
    Public function codingEdit(Coding $coding)
    {
        return view('coding/edit')->with(['coding' => $coding]);
    }
    
    public function codingUpdate(Request $request, Coding $coding)
    {
        $input_coding = $request['coding'];
        $coding->fill($input_coding)->save();

        return redirect('/coding/' . $coding->id);
    }
    
    public function codingCreate()
    {
        return view('coding/create');
    }
    
    public function codingStore(Request $request, Coding $coding)
    {
        $input_coding = $request['coding'];
        $coding->fill($input_coding)->save();
        return redirect('/coding/' . $coding->id);
    }
    
    public function codingDelete(Coding $coding)
    {
        $coding->delete();
        return redirect('/');
    }
    
    Public function toDoEdit($to_do)
    {
        $event = Event::find( $to_do );
        return view('to_do/edit')->with(['event' => $event]);
    }
    
    public function toDoUpdate(Request $request, $to_do)
    {
        $input_to_do = $request['to_do'];
        $dt1 = new Carbon( $input_to_do['startDateTime'] );
        $dt2 = new Carbon( $input_to_do['endDateTime'] );
        $event = Event::find($to_do);
        $event->name = $input_to_do['name'];
        $event->startDateTime = $dt1;
        $event->endDateTime = $dt2;
        $event->save();
        return redirect('/');
    }
    
    public function toDoCreate()
    {
        return view('to_do/create');
    }
    
    public function toDoStore(Request $request)
    {
        $input_to_do = $request['to_do'];
        
        $dt1 = new Carbon( $input_to_do['start_time'] );
        $dt2 = new Carbon( $input_to_do['end_time'] );
        $event = new Event;
        $event->name = $input_to_do['title'];
        $event->startDateTime = $dt1 ;
        $event->endDateTime = $dt2 ;
        $new_event = $event->save();

        return redirect('/');

    }
    
    public function toDoDelete($to_do)
    {
        $event = Event::find($to_do);
        $event->delete();
        return redirect('/');
    }
    
    
}
?>
