<?php

namespace App\Http\Controllers\novel_frontend;

use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\Request;
use Validator;
use DB; 
use Storage;
class chapterController extends Controller
{
    public function chapter($creator,$name,$id)
    {  
        // $title = str_replace('-', ' ',$name);
        $title = str_replace('-', ' ',$name);

        $check_data = DB::table('d_mem')->where('m_username',$creator)->first();

        $chapter = DB::table('d_novel_chapter')
        				->join('d_mem','m_id','=','dnch_created_by')
        				->join('d_novel','d_novel.dn_id','=','d_novel_chapter.dnch_ref_id')
                        ->where('dnch_created_by',$check_data->m_id)
        				->where('dnch_id',$id)
        				->first();

        $check_next = DB::table('d_novel_chapter')
                        ->join('d_mem','m_id','=','dnch_created_by')
                        ->join('d_novel','d_novel.dn_id','=','d_novel_chapter.dnch_ref_id')
                        ->where('dnch_ref_id',$chapter->dn_id)
                        ->Where('dnch_id', '>', $chapter->dnch_id)
                        ->first();
        // $check_back = [];
        $check_back = DB::table('d_novel_chapter')
                        ->join('d_mem','m_id','=','dnch_created_by')
                        ->join('d_novel','d_novel.dn_id','=','d_novel_chapter.dnch_ref_id')
                        ->where('dnch_ref_id',$chapter->dn_id)
                        ->Where('dnch_id', '<', $chapter->dnch_id)
                        ->orderBy('dnch_id','DESC')
                        ->first();

        if (isset($check_back) != null) {
            $back_tittle = $check_back->dnch_title;
            $back_id = $check_back->dnch_id;
        }else{
            $back_tittle = null;
            $back_id = null;
        }
        if (isset($check_next) != null) {
            $next_tittle = $check_next->dnch_title;
            $next_id = $check_next->dnch_id;
        }else{
            $next_tittle = null;
            $next_id = null;
        }
        // return [$next_id,$back_id];
        $recent = $title;
        $chapter_comment = DB::table('d_novel_chapter_comment')
                            ->join('d_mem','m_id','=','dncc_comment_by')
                            ->where('dncc_ref_id',$chapter->dnch_ref_id)
                            ->orderBy('dncc_id','DESC')
                            ->get();
        for ($i=0; $i <count($chapter_comment) ; $i++) { 
            $chapter_reply = DB::table('d_novel_chapter_comment_dt')
                    ->join('d_mem','m_id','dnccdt_reply_by')
                    ->orderBy('dnccdt_id','ASC')
                    ->get();
        }
        $all_chapter = DB::table('d_novel_chapter')->where('dnch_status','publish')->where('dnch_ref_id',$chapter->dnch_ref_id)->get();
        return view('novel_frontend.detail_chapter.detail_chapter_build',compact('next_tittle','back_tittle','next_id','back_id','title','chapter','all_chapter','chapter_comment','chapter_reply','back','recent','next'));
    }
    public function subscribe(Request $request)
    {
        $check_data = DB::table('d_novel_subscribe')
                            ->where('dns_ref_id',$request->id)
                            ->where('dns_subscribe_by',Auth::user()->m_id)
                            ->get();
        $check_hitung = count($check_data);

        if ($check_hitung < 1) {
            $insert =  DB::table('d_novel_subscribe')
                        ->insert([
                            'dns_ref_id'=>$request->id,
                            'dns_subscribe_by'=>Auth::user()->m_id,
                            'dns_created_at'=>date('Y-m-d H:i:s')
                        ]);
        }else{
            $update =  DB::table('d_novel_subscribe')
                        ->where('dns_ref_id',$request->id)
                        ->where('dns_subscribe_by',Auth::user()->m_id)
                        ->delete();
        }
        $total_subscribe = DB::table('d_novel_subscribe')
                            ->where('dns_ref_id',$request->id)
                            ->count();
        return response()->json(['status'=>'sukses','total_subscribe'=>$total_subscribe]);
    }
    public function viewer(Request $request)
    {
        $chapter = DB::table('d_novel_chapter')
                        ->select('dnch_viewer')
                        ->where('dnch_id',$request->id)
                        ->first();
        $update_view = DB::table('d_novel_chapter')
                        ->where('dnch_id',$request->id)
                        ->update([
                            'dnch_viewer'=>$chapter->dnch_viewer+1
                        ]);
         return response()->json('sukses');                
    }
    public function chapter_novel_comment(Request $request)
    {

        $insert = DB::table('d_novel_chapter_comment')
                ->insert([
                    'dncc_ref_id'=>$request->id,
                    'dncc_ref_iddt'=>$request->iddt,
                    'dncc_message'=>$request->message,
                    'dncc_comment_by'=>$request->dncc_comment_by,
                    'dncc_creator'=>$request->dncc_creator,
                    'dncc_created_at'=>date('Y-m-d h:i:s')
                ]);

        $chapter_comment = DB::table('d_novel_chapter_comment')
                            ->join('d_mem','m_id','=','dncc_comment_by')
                            ->where('dncc_ref_id',$request->id)
                            ->where('dncc_ref_iddt',$request->iddt)
                            ->orderBy('dncc_id','DESC')
                            ->get();

        $chapter_reply = DB::table('d_novel_chapter_comment_dt')
                    ->join('d_mem','m_id','dnccdt_reply_by')
                    ->orderBy('dnccdt_id','ASC')
                    ->get();

        
        return view('novel_frontend.detail_chapter.comment_chapter',compact('chapter_comment','chapter_reply'));
        // return response()->json(['status'=>'sukses']);
    }
    public function chapter_novel_comment_delete(Request $req)
    {
        $delete = DB::table('d_novel_chapter_comment')->where('dncc_id',$req->id)->delete();
        $deletess = DB::table('d_novel_chapter_comment_dt')->where('dnccdt_comment_id',$req->id)->delete();
        return response()->json(['status'=>'sukses']);
    }
    public function chapter_novel_comment_reply_delete(Request $req)
    {
        $deletess = DB::table('d_novel_chapter_comment_dt')->where('dnccdt_id',$req->id)->delete();
        return response()->json(['status'=>'sukses']);
    }
    public function chapter_novel_comment_reply(Request $request)
    {

        $insert = DB::table('d_novel_chapter_comment_dt')
                ->insert([
                    'dnccdt_ref_id'=>$request->id,
                    'dnccdt_ref_iddt'=>$request->iddt,
                    'dnccdt_comment_id'=>$request->dncc_id,
                    'dnccdt_message'=>$request->message,
                    'dnccdt_reply_by'=>$request->dnccdt_comment_by,
                    'dnccdt_created_at'=>date('Y-m-d h:i:s')
                ]);

        $chapter_comment = DB::table('d_novel_chapter_comment')
                            ->join('d_mem','m_id','=','dncc_comment_by')
                            ->where('dncc_ref_id',$request->id)
                            ->where('dncc_ref_iddt',$request->iddt)
                            ->orderBy('dncc_id','DESC')
                            ->get();

        $chapter_reply = DB::table('d_novel_chapter_comment_dt')
                    ->join('d_mem','m_id','dnccdt_reply_by')
                    ->orderBy('dnccdt_id','ASC')
                    ->get();

        
        return view('novel_frontend.detail_chapter.comment_chapter',compact('chapter_comment','chapter_reply'));
    }
}
