<?php

namespace App\Http\Controllers;
use App\pertanyaan;
use App\jawaban;
use App\User;
use App\vote;
use App\vote_answer;
use App\komentar_jawaban;
use App\komentar_pertanyaan;
use Illuminate\Http\Request;
use Auth;

class PertanyaanController extends Controller
{
        public function __construct()
        {
            $this->middleware('auth')->except('index');
        }

    function index($id=0){
        if($id==0){
            $listask = pertanyaan::all();
        }else{
            $listask = pertanyaan::where('id',$id)->get();
        }
        $countask = count($listask);
        for($x=0;$x<count($listask);$x++){
            $c = jawaban::where('id_pertanyaan',$listask[$x]["id"])->count();
            $listask[$x]["jmlh_jawaban"]=$c;
            $penulis = User::find((int)$listask[$x]["id_user"]);
            $listask[$x]["penulis"]=$penulis['name'];
        }
        return view('frontview',[
            'listask'=>$listask,
            'countask'=>$countask
            ]);
        
    }

    function modify($id){
        $pertanyaanku = pertanyaan::find($id);
        return view('editform',[
            'pertanyaanku'=>$pertanyaanku
        ]);
    }

    function onModify(Request $request,$id){
        pertanyaan::where('id',$id)->update([
           'judul'=>$request->input('judul'),
           'isi'=>$request->input('isi') 
        ]);

        $listask = pertanyaan::where('id',$id)->get();
        $countask = count($listask);
        for($x=0;$x<count($listask);$x++){
            $c = jawaban::where('id_pertanyaan',$listask[$x]["id"])->count();
            $listask[$x]["jmlh_jawaban"]=$c;
            $penulis = User::find((int)$listask[$x]["id_user"]);
            $listask[$x]["penulis"]=$penulis['name'];
        }
        return view('frontview',[
            'listask'=>$listask,
            'countask'=>$countask
            ]);

    }

    function create(){
        return view('formquestion');
    }

    function store(Request $request){
        $newask = new pertanyaan;
        $newask ->judul = $request->input('judul');
        $newask ->isi = $request->input('isi');
        $newask ->id_user = (int) Auth::user()->id;
        $newask ->save();
        $listask = pertanyaan::all();
        $countask = count($listask);
        return view('frontview',[
            'listask'=>$listask,
            'countask'=>$countask
            ]);
    }
    function komentar(Request $request) {
        // var_dump($request);
        $date = date('Y-m-d');
        $komentar = new komentar_pertanyaan;
        $komentar -> isi = $request->input('isi');
        $komentar -> id_user = (int) Auth::user()->id;
        $komentar -> created_at = $date;
        $komentar -> updated_at = $date;
        $komentar -> id_pertanyaan = $request->input('id_pertanyaan');
        $komentar -> save();
        $listask = pertanyaan::all();
        $countask = count($listask);
        return view('frontview',[
            'listask'=>$listask,
            'countask'=>$countask
            ]);
    }
    function komentarJawab(Request $request) {
        // var_dump($request);
        $date = date('Y-m-d');
        // echo $id;
        $komentar = new komentar_jawaban();
        $komentar->isi = $request->input('isi');
        $komentar->id_jawaban = $request->input('id_jawaban');
        $komentar->created_at = $date;
        $komentar->updated_at = $date;
        $komentar -> id_user = (int) Auth::user()->id;
        $komentar -> save();
        return redirect('');
    }

    public static function getpostscore($id){
        $pertanyaan = pertanyaan::find($id);
        $positif = vote::where('id_pertanyaan',$pertanyaan->id)->where('score','1')->count();
        $negatip = vote::where('id_pertanyaan',$pertanyaan->id)->where('score','-1')->count();
        return $positif-$negatip;
    }

    public static function givescore($idpost,$iduser,$score){
        if(vote::where('id_pertanyaan',$idpost)->where('id_user',$iduser)->count()==0){
            $v = new vote;
            $v-> id_pertanyaan = (int) $idpost;
            $v-> id_user = (int)$iduser;
            $v-> score = (int)$score;
            $v->save();

        }else if(vote::where('id_pertanyaan',$idpost)->where('id_user',$iduser)->count()>0){
            $a = vote::where('id_pertanyaan',$idpost)->where('id_user',$iduser)->first();
            vote::find($a->id)->delete();
        }

        return redirect('');
    }

    function scoreYuk(Request $request){
        if(vote::where('id_pertanyaan',$request->postid)->where('id_user',$request->userid)->count()==0){
            $v = new vote;
            $v-> id_pertanyaan = (int) $request->postid;
            $v-> id_user = (int)$request->userid;
            $v-> score = (int)$request->score;
            $v->save();
        }else if(vote::where('id_pertanyaan',$request->postid)->where('id_user',$request->userid)->where('score',$request->score)->count()>0){
            vote::where('id_pertanyaan',$request->postid)->where('id_user',$request->userid)->delete();
        }else{
            $a = vote::where('id_pertanyaan',$request->postid)->where('id_user',$request->userid)->first();
            $a->score= (int) -1;
            $a->save();
        }
        

        return redirect('');
    }

    
}
