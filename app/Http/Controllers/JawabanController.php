<?php

namespace App\Http\Controllers;
use App\pertanyaan;
use App\jawaban;
use Illuminate\Http\Request;
use App\User;   


use Illuminate\Support\Facades\Route;
use Auth;

class JawabanController extends Controller
{
    //

    public function __construct()
        {
            $this->middleware('auth');
        }
    function index($pertanyaan_id){
        //$askid = Route::current()->parameter('pertanyaan_id');
        try{
            //$id = intval($pertanyaan_id);
            $listanswer = jawaban::where('id_pertanyaan',$pertanyaan_id)->get();
            $listask = pertanyaan::where('id',$pertanyaan_id)->get();
            $penulis = User::find((int)$listask[0]["id_user"]);
            $listask[0]["penulis"]=$penulis['name'];
            $countask = count($listanswer);
            return view('jawaban',[
            'listask'=>$listask,
            'countask'=>$countask,
            'listanswer' => $listanswer
            ]);

        }catch(Exception $e){
            return $e;
        }
    }

    function create(Request $request,$pertanyaan_id){
        // try{
            $newans = new jawaban;
            $newans ->judul = $request->input('judul');
            $newans ->isi = $request->input('isi');
            $newans ->id_pertanyaan = $pertanyaan_id;
            $newans->id_user = (int) Auth::user()->id;
            $newans -> save();
            
            $listanswer = jawaban::where('id_pertanyaan',$pertanyaan_id)->get();
            $listask = pertanyaan::where('id',$pertanyaan_id)->get();
            $countask = count($listanswer);
            return view('jawaban',[
            'listask'=>$listask,
            'countask'=>$countask,
            'listanswer' => $listanswer
            ]);                                                                                                    
        // }catch(Expection $e){
        //     return $e;
        // }
        
    }
    
}
