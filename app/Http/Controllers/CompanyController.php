<?php

namespace App\Http\Controllers;

use App\model\company;

use App\model\company_comment;
use App\Model\follower;
use App\model\posts;
use Symfony\Component\HttpFoundation\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Auth;
use Validator;


class CompanyController extends Controller
{
    public function createCompany(Request $request)
    {


        $destinationPath = 'uploads/images/company_images';
        $image = $request->image;
        $file_name = md5(uniqid()) . "." . "jpeg";
        $image->move($destinationPath, $file_name);


        $request->merge(['image_url' => $file_name]);


        $company = company::create($request->all());

        if ($company) {

            $company->id;
            $company->company_name;
            $company->sector;
            $company->since;
            $company->description;
            $company->address;
            $company->status;

            return redirect('profil');
        }

        return redirect()->route('home');
    }


    public function show(Request $request)
    {

        $reciverId = $request->input("comId");
        $follcom = DB::table('follower')->where('userId', (new \Symfony\Component\HttpFoundation\Session\Session)
            ->get('user_id'))
            ->where('companyId',$reciverId)
            ->select("companyId")->get();
          //dd($follcom);
        $follower = count(DB::table('follower')->where('companyId', $reciverId)->get());
        $posting = count(DB::table('posts')->where('company_id', $reciverId)->get());

        $company = DB::table('company')->where('id', $reciverId)->first();
        $posts = posts::join('users', 'posts.user_id', 'users.id')
            ->join('company', 'posts.company_id', 'company.id')
            ->select('users.image_url as userImage', 'users.*', 'company.image_url as companyImage', 'company.*',
                'posts.created_at as postDate', 'posts.image_url as postImage', 'posts.*')
            ->where('company_id', $reciverId)
            ->orderBy('posts.id', 'desc')
            ->get();


        $comComment = company_comment::join('users', 'company_comment.userId', 'users.id')

                ->select('users.name','users.surname','users.image_url',  'company_comment.*')
                ->where('company_comment.companyId', $reciverId)
                ->orderBy('company_comment.id', 'desc')
                ->get();

          //dd($comComment);


        $like = array();
        $comment = array();
        $likeControl = array();

        $i = 0;

        foreach ($posts as $post) {


            $comment[$i] = count(DB::table('post_comment')->where('postId', $post->id)->get());
            $like[$i] = count(DB::table('post_like')->where('postId', $post->id)->get());


        }


        return view('layouts/front/profile/company')->with('company', $company)->with('posting', $posting)->with('follower', $follower)
            ->with('posts', $posts)->with('postLike', $like)->with('postComment', $comment)->with('follcom', $follcom)->with('likeControl', $likeControl)->with('receiverId', $reciverId)->with('comComment', $comComment);
    }

    public function deneme()
    {


        return view('layouts/front/company/company');


    }

    public function follow(int $id)
    {
        DB::table('follower')->insert(
            ['companyId' => $id, 'userId' => (new \Symfony\Component\HttpFoundation\Session\Session)->get('user_id')]
        );

        return redirect('home');
    }

    public function comComment(Request $request)
    {

        $users = DB::table('users')->where('id', (new \Symfony\Component\HttpFoundation\Session\Session)->get('user_id'))->first();

        $request->merge(['userId' => $users->id]);




        $comComment= company_comment::create($request->all());
        //dd($comComment);
        return redirect('home');
    }







}
