<?php

namespace App\Http\Controllers;

use App\Models\tags;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;


class TagsController extends Controller
{
    //
    function index(){

        $tags =  DB::select('select * from tags t
        inner join categories c on t.id_category = c.id where c.status = 1;');
        // $category =  DB::select('select * from categories WHERE status > 0');
        $category = DB::select('select * from categories where status = 1;');
        return view('tags.tag' , ['tag' => $tags, 'category' => $category]);
        // return view('tag' , ['tag' => $tags]);
    }


    function add_Tag(Request $req){

        // التحقق من الاسم في الفئة المعينة
        $tags = tags::where('TagName', '=', $req->tagName)->
        where('id_category', '=', $req->idCategory)
        ->first();
        if ($tags === null) {
            // user doesn't exist

            $addTag = new tags;
            $addTag->id_category = $req->idCategory;
            $addTag->TagName = $req->tagName;
            $addTag->save();
            return redirect()->back()->with('message', 'تم الاضافة بنجاح');

        } else {
            return redirect()->back()->with('error', 'هذا الاسم موجود');
        }

    }

    function showData($id){
        $editTag = tags::find($id);
        return view('tags.editTag' , ['tagsEdit' => $editTag]);
    }


    function update(Request $req){

        // التحقق من الاسم في الفئة المعينة
        $tags = tags::where('TagName', '=', $req->tagName)->
        where('id_category', '=', $req->idCategory)
        ->first();
        if ($tags === null) {

        $updateTag = tags::find($req->tag_id);
        $updateTag->TagName = $req->tagName;
        $updateTag->save();
        return redirect('tags')->with('message', 'تم التعديل بنجاح');

    } else {
        return redirect()->back()->with('error', 'هذا الاسم موجود');
    }
    }
}
