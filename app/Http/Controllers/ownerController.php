<?php

namespace App\Http\Controllers;

use Symfony\Component\HttpFoundation\StreamedResponse;
use Illuminate\Http\Request;
use App\User;


class OwnerController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->keyword;
        $user_list = User::search($keyword);

        return view('owner.top',['user_list'=>$user_list, 'keyword' => $keyword]);
    }

    public function export( Request $request )
    {
        $response = new StreamedResponse (function() use ($request){

            // キーワードで検索
            $keyword = $request->keyword;

            $stream = fopen('php://output', 'w');

            //　文字化け回避
            stream_filter_prepend($stream,'convert.iconv.utf-8/cp932//TRANSLIT');

            // タイトルを追加
            fputcsv($stream, ['id','name','email','password','created_at','updated_at']);

            User::where('name', 'LIKE', '%'.$keyword.'%')->chunk( 1000, function($results) use ($stream) {
                foreach ($results as $result) {
                    fputcsv($stream, [$result->id,$result->name,$result->email,$result->password,$result->created_at,$result->updated_at]);
                }
            });
            fclose($stream);
        });
        $response->headers->set('Content-Type', 'application/octet-stream');
        $response->headers->set('Content-Disposition', 'attachment; filename="UserList.csv"');

        return $response;
    }
}
