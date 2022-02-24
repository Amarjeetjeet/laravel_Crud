<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\support\facades\DB;
use App\Models\Data;
use App\Models\User;
use App\Models\State;
use App\Models\detail;
use App\Models\City;
use Alert;
use Illuminate\Support\Facades\Hash;
use App\Person;
use Image;
use Yajra\datatables\datatables;


class CrudOperation extends Controller
{

    // getdata function for showing view index
    function getData(){
        return view('index');
    }

    // Getdatatable for return data to datatable in json format
    function getDatatable(){
        $users = Data::all();
        return Datatables::of($users)->addColumn('action', function ($users){
                return '<button class="Edit_data show_confirm btn  btn-danger btn-flat" data-id="'.$users->id.'">EDIT</button>
                  <button class="deleteRecord show_confirm btn  btn-danger btn-flat" data-id="'.$users->id.'">Delete</button>';
            })
            ->make(true);
    }

    //delete data function
    function delete($id)
    {
        Data::where('id', $id)->delete();
        return json_encode(array("statusCode"=>200));
    }

    // add data function
    function addData(Request $req){
            $data = new Data;
            $data->data = $req->data;
            $data->save();
            return json_encode(array("statusCode"=>200));
    }

    // edit data function with id
    function edit($id){
        $data = Data::find($id);
        if($data){
            return response()->json([
                'status' => 200,
                'data' => $data,
            ]);
        }
        else{
            return response()->json([
                'status' => 404,
                'data' => "Data Not found",
            ]);
        }
    }

    //update data function
    function update(Request $req,$id){
        // return $req->input('data');
        $data = Data::find($id);
        $data->data = $req->input('data');
        $data->update();
        if($data){
            return response()->json([
                'status' => 200,
                'data' => $data,
            ]);
        }
        else{
            return response()->json([
                'status' => 404,
                'data' => "Data Not found",
            ]);
    }
}

// search data function with ajax
    Public function search(Request $req)
    {
        if($req->ajax()){
            $data = Data::WHERE('data','like','%'.$req->search.'%')
            ->orWhere('id','like','%'.$req->search.'%')->get();

        }

        $output = "";
        if(count($data)>0){

        foreach($data as $d){
            $output .='<tr>
            <td>'.$d->id.'</td>
            <td>'.$d->data.'</td>
            </tr>';
        }
    }
    else{
        $output .= "No result found";
    }
    return response($output);
}



    function signupdata(Request $req){

        $password = Hash::make($req->password);
        $user = new User;
        $user->firstname = $req->username;
        $user->lastname = $req->lastname;
        $user->email = $req->email;
        $user->hobbie = $req->username;
        $user->gender = $req->username;
        $user->city = $req->username;
        $user->password = $password;

        $imageName = time().'.'.$req->image->getClientOriginalExtension();

        $req->image->move(public_path('images'), $imageName);

        $user->img = $imageName;
        $user->mobile = $req->number;
        $user->save();
        return json_encode(array("statusCode"=>200));
    }

    // function joinData(){
    //     $data = DB::table('details')
    //         ->join('states', 'states.detail_id', '=', 'details.user_State')
    //         ->join('cities','cities.state_id', '=' , 'states.detail_id')
    //         ->select('details.*', 'states.state','details.user_name','cities.city_name')
    //         ->get();

    //         // return $data;
    //     return view('home', compact('data'));

    // }

    function getJoin(){

        $user = Detail::find(3);
        $state = $user->state;
        $city = State::find(3)->city;
        return $city;

        // $detail = City::find(1)->detail;
        // $city =  State::find(1)->city;

        // $obj = json_encode($user,true);
        // return $obj;

        // $city = $user->state->City::find(1);

        // return $city;

        return view('home', compact('user'));
    }
}
