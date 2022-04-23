<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Comment;
use App\Models\Food;
use App\Models\FoodCategory;
use App\Models\Image;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PageController extends Controller
{
    public function index()
    {
        $images = Image::all();
        $food_categories = FoodCategory::all();
        $foods = Food::paginate(8);
        $user = Auth::guard('admin')->user();
        if ($user)
        {
            return view('user.pages.index', compact('user','foods', 'food_categories' , 'images'));
        }
        else{
            return view('guest.pages.index', compact('foods', 'food_categories' , 'images'));
        }

    }

    public function show()
    {
        $food_categories = FoodCategory::all();
        $foods=Food::all();
        $images = Image::all();
        $user = Auth::guard('admin')->user();
        if ($user)
        {
            return view('user.pages.show', compact('user','foods', 'food_categories' , 'images'));
        }
        else{
            return view('guest.pages.show', compact('foods', 'food_categories', 'images'));
        }


    }

    public function detail($id)
    {
        $food = Food::find($id);
        $food_categories = FoodCategory::all();
        $images = Image::where('food_id', $id)->get();
        $user = Auth::guard('admin')->user();
        if ($user)
        {
            return view('user.pages.detail', compact('user','food', 'food_categories' , 'images'));
        }
        else{
            return view('guest.pages.detail', compact('food','food_categories', 'images'));
        }

    }

    public function send_comment(Request $request)
    {

        $comment = new Comment();
        $comment->name = $request['name'];
        $comment->content = $request['content'];
        $comment->food_id = $request['food_id'];
        $comment->date = now();
        $comment->status = 0;
        $comment->comment_parent_id= 0;
        $comment->save();
    }


    public function load_comment(Request $request)
    {
//        dd($request);
        $food_id = $request->food_id;
        $comments = Comment::where('food_id', $food_id)->where('status', 1)->where('comment_parent_id','=',0)->get();
        $cmt_reps = Comment::with('food')->where('comment_parent_id','>',0)->get();
//        dd($food_id);
        $output='';
        foreach ($comments as $key => $comment){
            $output.= '<div class="d-flex flex-row user-info" style="padding: 0px 10px; border-radius: 15px; margin-top: 40px;"><img class="rounded-circle" src="/images/avatar-cmt.jpg" width="60">
                                                <div class="d-flex flex-column justify-content-start ml-2"><span class="d-block font-weight-bold name"></span><span class="d-block font-weight-bold name">'.$comment->name.'</span><span class="date text-black-50">'.$comment->date.'</span></div>
                                            </div>

                                            <div class="mt-2">
                                                <p class="comment-text">'.$comment->content.'</p>
                                            </div>
 ';
            foreach ($cmt_reps as $key => $reply_cmt){
                if($reply_cmt->comment_parent_id==$comment->id)
                {
                                $output.= '
                                            <div style="margin: 5px 40px; height: 60%"><div class="d-flex flex-row reply-cmt" style="margin-left: 20px;margin-top: 20px; padding: 8px 10px; border-radius: 15px;" ><img class="rounded-circle" src="/images/avt-admin.png") width="50" height="80%">
                                                <div class="d-flex flex-column justify-content-start ml-2"><span class="d-block font-weight-bold name"></span><span class="d-block font-weight-bold name">@Admin</span><span class="date text-black-50">'.$reply_cmt->date.'</span></div>
                                            </div>

                                            <div class="mt-2">
                                                <p class="comment-text" style="font-size: 14px">'.$reply_cmt->content.'</p>
                                            </div>
                                            </div>

                                            ';
                }
            }
        }
        echo $output;

    }

    public function show_category($id)
    {
        $food_selected = DB::select(
            'SELECT * FROM foods WHERE foods.food_category_id IN
            (SELECT category.id FROM food_categories as category WHERE (category.parent_category_id = ? ) OR (category.id=?))',[$id, $id]);

        for($i = 0 ; $i <count($food_selected);$i++){
            $food_selected[$i] = [$food_selected[$i]->id];
            // dd($test);
        }

        $foods = Food::whereIn('id',$food_selected)->paginate(8);

        $category = FoodCategory::find($id);
        $food_categories = FoodCategory::all();
        $images = Image::all();

        $user = Auth::guard('admin')->user();
        if ($user)
        {
            return view('user.pages.show_category', compact('user','foods', 'food_categories' , 'images', 'food_selected'));
        }
        else{
            return view(
                'guest.pages.show_category', compact('foods', 'food_selected', 'food_categories', 'images'));
        }

    }

    public function search(Request $request)
    {
        $key_search = $request->get('key_search');
        $food_categories = FoodCategory::all();
        $images = Image::all();

        $foods = Food::select('foods.*')
            ->join('food_categories', 'food_categories.id', '=', 'foods.food_category_id')
            ->where('food_categories.name','like','%'.$key_search.'%')->orWhere('foods.name','like','%'.$key_search.'%')
            ->paginate(12);
        $foods->appends(['$key_search' => $key_search]);
//        dd($foods);
        $user = Auth::guard('admin')->user();
        if($user){
            if($foods->count()==0)
                return view('user.pages.not_found',compact('user','foods','food_categories', 'images') );
            else
                return view('user.pages.show_category',compact('user','foods','food_categories', 'images'));
        }
        else{
            if($foods->count()==0)
                return view('guest.pages.not_found',compact('foods','food_categories', 'images') );
            else
                return view('guest.pages.show_category',compact('foods','food_categories', 'images'));
        }
    }

}
