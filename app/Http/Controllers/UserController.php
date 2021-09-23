<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Responses
     */
    public function index(String $emails,String $passwords)
    {
       // $user = User::all();
        //return $user;
        $i=0;
        $j=1;
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
                while ($row=pg_fetch_row($result)){
                    $cadena1=""+$row[$i];
                    $cadena2=""+$row[$j];
                   if($cadena1==$emails && $cadena2==$passwords){
                   echo "logged sucessful";
                   }else{
                   echo "not exist user";
                   
                   }

                   echo "Name: $row[0] E-mail: $row[1]";
                   echo "\n";
                   $i=$i+2;
                   $j=$j+2;
                }
            }
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
