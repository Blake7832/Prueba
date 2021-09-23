<?php

namespace App\Http\Controllers;

use App\Http\Requests\ConsultaRequest;
use Illuminate\Http\Request;
use App\Models\User;

class UserLoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
        {
            $user = User::all();
            return $user;
        }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ConsultaRequest $request)
    {
     $arr=new User();
     $arr->name='pascual';
     $arr->email=$request->email;//me devuelve vacio
     $arr->password=$request->password;
     $emails=$arr->email;
     $passwords=$arr->password;
     //$arr->save();
     /*
     arr[null];
     */
        $bandera=false;
        $connection=pg_pconnect("dbname=login2 user=postgres password=postgres");
            if(!$connection)
            {
              echo "Error Ocurred.\n";
              exit;
            }else{
              $result=pg_query($connection,"SELECT email, password From users");
                if(!$result){
                  echo "Error Ocurred.\n";
                  exit;
                }else{                   
                    while (($row=pg_fetch_row($result)) && !$bandera){
                        $cadena1=$row[0];
                        $cadena2=$row[1];
                        if($emails==$cadena1){
                            if($passwords==$cadena2){
                              $bandera=true;

                            }
                        }else{
                          
                        }
                       //echo "Email:$cadena1 Password:$cadena2 \n";
                       //echo "\n";
                    }
                    if($bandera==true){
                      echo "email: $emails - password:$passwords \n";
                        echo "user logged";
                        echo "\n";
                        return response()->json([
                          'res'=>true,
                          'msg'=>'correct'
                        ],200);  
                    }else{
                      echo "email: $emails - password:$passwords \n";
                        echo "user not registrer";
                        echo "\n";
                        return response()->json([
                          'res'=>false,
                          'msg'=>'error has ocurred'
                        ],400);
                    }
                }
            }
               
    } 
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
