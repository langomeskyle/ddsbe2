<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\User;
use App\Traits\ApiResponser;
Use DB;

Class StudentController extends Controller 
{
    use ApiResponser;
   
    private $request;
    
    public function __construct(Request $request){
    
        $this->request = $request;
}
    public function info(){
        $users = User::all();
        //return response()->json($users, 200);
        //return $this->successResponse($users);
        return response()->json(['data' => $users], 200);
    }
    public function show($id)
    {
        //
        //return User::where('studid','like','%'.$id.'%')->get();
        //return $this->successResponse($user);
        //return response()->json(['data' => $users], 200);
        $users = User::findOrFail($id);
       
       

    }
    public function addstudent(Request $request ){
        $rules = [
        'studid' => 'required|max:20',
        'lastname' => 'required|alpha|max:20',
        'firstname' => 'required|alpha|max:20',
        'middlename' => 'required|alpha|max:20',
        'bday' => 'required|max:20',
        'age' => 'required|max:20',
        ];
        $this->validate($request,$rules);

        $user = User::create($request->all());
        //return $user;

      return response()->json(['data' => $users], 200);
        //return $this->successResponse($user, Response::HTTP_CREATED);
       
}
    public function update(Request $request,$id)
    {
    $rules = [
        'studid' => 'required|max:20',
        'lastname' => 'required|max:20',
        'firstname' => 'required|max:20',
        'middlename' => 'required|max:20',
        'bday' => 'required|max:20',
        'age' => 'required|max:20',
    ];
    $this->validate($request, $rules);
    $user = User::findOrFail($id);
    $user->fill($request->all());

    if ($user->isClean()) {
        return $this->errorResponse('At least one value must change', Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $user->save();
        return $this->successResponse($user);
        //return $user;
}
    public function delete($id)
    {
    $user = User::findOrFail($id);
    $user->delete();
    return response()->json(['data deleted' => $users], 200);

    }


    //public function index()
    //{
       // $users = User::all();

       // return $this->successResponse($users);
    //}
}

    