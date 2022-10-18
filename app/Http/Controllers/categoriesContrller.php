<?php

namespace App\Http\Controllers;

use App\Models\categories;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;


class categoriesContrller extends Controller
{
    //
    function index(){

        $category = categories::all();
        return view('database' , ['categories' => $category]);
    }

    function create_db(Request $req){

        $category = categories::where('title', '=', $req->dbName)->first();
        if ($category === null) {
            // user doesn't exist

            $addcategory = new categories;
            $addcategory->title = $req->dbName;
            $addcategory->save();
            return redirect()->back()->with('message', 'تم الاضافة بنجاح');

        } else {
            return redirect()->back()->with('error', 'هذا الاسم موجود');
        }

    }

    function active($id){



        DB::table('categories')->update(array('status' => 0));
        // $affected->save();

        $cate = categories::find($id);
        $cate->status = 1;
        $cate->save();

        return redirect()->back()->with('message', 'تم تغيير قاعدة البيانات');
    //     DB::table('categories')->where('status', 1)
    // ->chunkById(100, function ($users) {
    //     foreach ($users as $user) {
    //         DB::table('categories')
    //             ->where('id', $user->id)
    //             ->update(['status' => 1]);
    //     }
    // });

    }
}
