<?php

namespace App\Http\Controllers;


use App\Follow;

use App\Notify;
use App\Model\Users;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;

use App\Http\Requests\SearchUsersGet;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{

    public  function getResults(Request $request){

        $query=$request->input('query');
        //dd($query);

        if (!$query){
            return redirect()->route('home');
        }
        $users = DB::table('users')->orWhere('name','LIKE', "%{$query}%")->get();

        $company= DB::table('company')->orWhere('company_name', 'LIKE', "%{$query}%")->get();
       //$user =  DB::table('users')->DB::raw("CONCAT(name, ' ', surname)")->where('name','LIKE',"%{$query}%")->get();

      //dd($company);

        $reciverId = $request->input("comId");
        $profileId = $request->input("profileId");


        return view('layouts/front/search/search')->with('users',$users)->with('company',$company)
            ->with('receiverId', $reciverId)->with('profileId', $profileId);
    }

    public function follow(int $id)
    {
        DB::table('follower')->insert(
            ['companyId' => $id, 'userId' => Session::get('user_id')]
        );

        return redirect('home');
    }


    public function index(SearchUsersGet $request)
    {
        $aranan = Session::get('user_id');

        $searchResult = array();

        $users = User::where([
                            ['name', 'LIKE', $request->term . "%"],
                            ['provider', '=', null],
                            ['id', '<>', $aranan->id]
                        ])->get();

        if (count($users) > 0) {

            $notify = Notify::where('to', $aranan->id)->first();

            foreach ($users as $user) {

                if (!is_null($notify)) {
                    $follow = 2;
                }else{
                    $follow = check_follower_or_not($user->id, $aranan->id);
                    $follow = (is_null($follow)) ? 0 : 1;
                }

                $user_avatar = generate_avatar($user);

                $searchResult[] = [
                    'id'     => $user->id,
                    'value'  => $user->name,
                    'follow' => $follow,
                    'avatar' => $user_avatar
                ];
            }
        }else{
            $searchResult[] = "Users not found.";
        }

        return response($searchResult, 200);
    }


    public function searchFollowers(SearchUsersGet $request){

        $auth_id = Session::get('user_id');
        $term = $request->term;
        $searchResult = array();

        $followers = Follow::where('user_id', $auth_id)
                            ->orWhere('follower_id', $auth_id)->get();


        if(count($followers) > 0){

            foreach ($followers as $follower) {

                if($follower->userRight->id == $auth_id){

                    $follower_info = $this->searchUser($follower,'userLeft', $term);
                }else{

                    $follower_info = $this->searchUser($follower,'userRight', $term);
                }
                if(!is_null($follower_info)){
                    $searchResult[] = [
                        'value' => $follower_info->name,
                        'id' => $follower_info->id
                    ];
                }
            }
        }

        if(count($searchResult) > 0){

            return response($searchResult, 200);
        }

        return response(['Users not found.'], 200);
    }


    public function searchUser($user, $method, $term){

        return $user->$method()
                        ->where('name','LIKE',"{$term}%")
                        ->first();

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
