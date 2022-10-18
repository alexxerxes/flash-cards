<?php

namespace App\Http\Controllers;

use App\Models\cards;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CardsController extends Controller
{
    //
    function index()
    {

        $cards = DB::select('select * from tags t
        inner join categories c on t.id_category = c.id
		inner join cards ca on ca.type = id_tag
        where c.status = 1');

        $tags = DB::select('select * from tags t
        inner join categories c on t.id_category = c.id
        where c.status = 1');

        // $cards = cards::all();

        return view('cards.show', ['cards' => $cards, 'tags' => $tags]);
    }

    function tags()
    {
        $tags = DB::select('select * from tags t
        inner join categories c on t.id_category = c.id where c.status = 1;');
        return view('cards.card', ['tag' => $tags]);
    }

    function add_Card(Request $req)
    {

        $user = cards::where('front', '=', $req->front)->first();
        if ($user === null) {
            // user doesn't exist

            $addcard = new cards;
            $addcard->type = $req->type;
            $addcard->front = $req->front;
            $addcard->back = $req->back;
            $addcard->save();
            // return view('card');
            // return redirect('cards');
            return redirect()->back()->with('message', 'تم الاضافة بنجاح');

        } else {
            return redirect()->back()->with('error', 'هذا الاسم موجود');
        }
    }

    function edit($id){
        $tags = DB::select('select * from tags t
        inner join categories c on t.id_category = c.id where c.status = 1;');
        // return view('cards.editCard', ['tag' => $tags]);

        $Editcards = cards::find($id);
        return view('cards.editCard' , ['EditCard' => $Editcards, 'tag' => $tags]);
    }

    function delete($id){
        $data = cards::find($id);
        $data->delete();
        return redirect('show')->with('message', 'تم الحذف بنجاح');

    }

    function update(Request $req){

        $updateCard = cards::find($req->card_id);
        $updateCard->front = $req->front;
        $updateCard->back = $req->back;
        $updateCard->type = $req->type;
        $updateCard->save();
        return redirect('show')->with('message', 'تم التعديل بنجاح');
    }

    function filter($id){

        $tags = DB::select('select * from tags t
        inner join categories c on t.id_category = c.id
        where c.status = 1');

        // $collection = cards::all();
        // $filterCard = cards::where('type', '=', $id)->get();
        // $filterCard = DB::table('cards')->where('type', '=', $id)->get();
        $filterCard = DB::table('tags')
        ->join('categories' , 'tags.id_category', '=' , 'categories.id')
        ->join('cards' , 'cards.type', '=' , 'tags.id_tag')
        ->where('type', '=', $id)->get();
        return view('cards.show' , ['cards' => $filterCard, 'tags' =>$tags]);

    }

}
