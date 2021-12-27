<?php

namespace App\Http\Controllers;

use App\Starbucks;
use App\Customs;
use Illuminate\Http\Request;
use App\Coding;
use App\ToDo;

class PostController extends Controller
{
    public function index(Starbucks $starbucks, Coding $coding, ToDo $to_do)
    {
        return view('index')->with(['starbucks' => $starbucks->get(), 'coding' => $coding->get(), 'to_do' => $to_do->get()]);  
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
        return view('coding/show')->with(['coding' => $coding]);
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
    
    Public function toDoEdit(ToDo $to_do)
    {
        return view('to_do/edit')->with(['to_do' => $to_do]);
    }
    
    public function toDoUpdate(Request $request, ToDo $to_do)
    {
        $input_to_do = $request['to_do'];
        $to_do->fill($input_to_do)->save();
        return redirect('/');
    }
    
    public function toDoCreate()
    {
        return view('to_do/create');
    }
    
    public function toDoStore(Request $request, ToDo $to_do)
    {
        $input_to_do = $request['to_do'];
        $to_do->fill($input_to_do)->save();
        return redirect('/');
    }
    
    public function toDoDelete(ToDo $to_do)
    {
        $to_do->delete();
        return redirect('/');
    }
}
?>
