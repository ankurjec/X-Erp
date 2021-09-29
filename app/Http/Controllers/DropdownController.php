<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Redirect,Response;
 
class DropdownController extends Controller
{
    function index()
    {
        $data['states'] = DB::table('states')->get();
 
        return view("dropdown",$data);
    }
    function getDetail(Request $request)
    {
        $id = $request->myID;
        $res = DB::table('customers')
        //->join('city','states.id','=','city.state_id')
        ->where('customer.id', $id)
        ->get();
        return Response::json($res);
 
    }
    function getStadiumDetail()
    {
        $id = $_GET['id'];
         $res = DB::table('city')
        ->join('stadium','city.id','=','stadium.city_id')
        ->join('address','city.id','=','address.city_id')
        ->join('details','city.id','=','details.stadium_id')
        ->where('city.id', $id)
        ->get();
        return Response::json($res);
    }
}