<?php

namespace App\Http\Controllers;

use App\Models\Crm;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\Http\Requests\CrmRequest;

class CrmController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $crm = Crm::all();
        return view('crm.index')->with(compact('crm'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create(Request $request)
    {
        // createメソッドにデータを送信するのでGET
        $method = 'GET';
        // (input type="search)のname属性で入力した値をzipcodeに代入
        $zipcode = $request->zipcode;
        // ZIP_URLの値を取得してURLを定義
        $url = 'https://zipcloud.ibsnet.co.jp/api/search?zipcode=' . $zipcode;

        // Client(接続する為のクラス)を生成
        $client = new Client();

        // try catchでエラー時の処理を書く
        try {
            // データを取得し、JSON形式からPHPの変数に変換
            $response = $client->request($method, $url);
            $body = $response->getBody();
            $crms = json_decode($body, false);
            // 郵便番号取得
            $results = $crms->results[0];
            // (都道府県名、市区町村名、町域名)を取得
            $address = $results->address1 . $results->address2 . $results->address3;
            // (都道府県名、市区町村名、町域名)のカタカナを取得
            $addressKana = $results->kana1 . $results->kana2 . $results->kana3;
        } catch (\Throwable $th) {
            // エラーメッセージ
            return back()->withErrors(['error' => '郵便番号が正しくありません！']);
        }
        // create.blade.phpに変数を送る
        return view('crm.create')->with(compact('zipcode', 'address', 'addressKana'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CrmRequest $request)
    {
        $crm = new Crm();
        $crm->fill($request->all());
        $crm->save();
        return redirect('/crm');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Crm  $crm
     * @return \Illuminate\Http\Response
     */
    public function show(Crm $crm)
    {
        return view('crm.show')->with(compact('crm'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Crm  $crm
     * @return \Illuminate\Http\Response
     */
    public function edit(Crm $crm)
    {
        return view('crm.edit')->with(compact('crm'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Crm  $crm
     * @return \Illuminate\Http\Response
     */
    public function update(CrmRequest $request, $id)
    {
        $crm = new Crm();
        $crm->fill($request->all());
        $crm->save();
        return view('crm.show')->with(compact('crm'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Crm  $crm
     * @return \Illuminate\Http\Response
     */
    public function destroy(Crm $crm)
    {
        $crm->delete();
        return redirect('/crm');
    }

    // 自作メソッド
    public function search()
    {
        return view('crm.search');
    }
}
