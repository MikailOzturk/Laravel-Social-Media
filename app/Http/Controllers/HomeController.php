<?php

namespace App\Http\Controllers;

use App\model\company;
use App\model\company_comment;
use App\Model\follower;
use App\model\post_comment;
use App\model\post_like;
use App\model\Posts;
use App\Model\Users;
use Auth;
use Validator;

use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class HomeController extends Controller
{

    public function get_form()
    {
        return view('form');
    }

    public function get_girisform()
    {
        return view('giris');
    }


    public function post_login(Request $request)
    {

        $users = DB::table('users')->where('email', $request->get('email'))->first();
        if ($users) {
            $password = $users->password;
            if (password_verify($request->get("password"), $password)) {
                $id = $users->id;
                $name = $users->name;
                $surname = $users->surname;
                $email = $users->email;
                $image = $users->image_url;


                Session::put('user_id', $id);
                Session::put('user_name', $name);
                Session::put('user_surname', $surname);
                Session::put('user_email', $email);
                Session::put('image', $image);


                return redirect('home');

            }
        }
        return view('giris');
    }


    public function post_signup(Request $request)
    {

        $password = $request->get('password');
        $cpassword = $request->get('cpassword');


        if ($password == $cpassword) {


            $hashpassword = Hash::make($request->get('password'));

            $request->merge(['password' => $hashpassword]);


            $users = Users::create($request->all());

            if ($users) {
                $id = $users->id;
                $name = $users->name;
                $surname = $users->surname;
                $email = $users->email;
                $image = $users->image_url;


                Session::put('user_id', $id);
                Session::put('user_name', $name);
                Session::put('user_surname', $surname);
                Session::put('user_email', $email);
                Session::put('image', $image);

                return redirect('profil');
            }
        }

        return view('/form');
    }

    public function logout()
    {
        Session::flush();

        return redirect('/');
    }


    public function home(Request $request)
    {
        $users = DB::table('users')->where('id', Session::get('user_id'))->first();

        $following = count(DB::table('follower')->where('userId', Session::get('user_id'))->get());
        $posting = count(DB::table('posts')->where('user_id', Session::get('user_id'))->get());


        $follcom = DB::table('follower')->where('userId', Session::get('user_id'))->select("companyId")->get();


        $posts = follower::join('company', 'follower.companyId', 'company.id')
            ->join('posts', 'company.id', 'posts.company_id')
            ->join('users', 'users.id', 'posts.user_id')
            ->select('company.company_name as companyName', 'company.id as companyId', 'company.image_url as companyImage',
                'users.name as username', 'users.surname as usersurname', 'users.image_url as userImage', 'users.id as userId',
                'posts.id as postId', 'posts.image_url as postImage', 'posts.content as content', 'posts.created_at as date')
            ->where('follower.userId', Session::get('user_id'))
            ->orderBy('posts.id', 'desc')
            ->get();


        $comments = post_comment::join('users', 'post_comment.userId', 'users.id')
            ->get();

        $likers = posts::join('post_like', 'posts.id', 'post_like.postId')
            ->join('users', 'users.id', 'post_like.userId')
            ->select('users.image_url as userImage','users.name','users.surname','users.id as userId','posts.id as postId')
            ->get();




        $company = DB::table('company')->where('id', 'posts.company_id')->get();


        $like = array();
        $comment = array();
        $likeControl = array();

        $i = 0;
        foreach ($posts as $post) {

            $comment[$i] = count(DB::table('post_comment')->where('postId', $post->postId)->get());
            $like[$i] = count(DB::table('post_like')->where('postId', $post->postId)->get());

            $control = count(DB::table('post_like')->where('postId', $post->postId)
                ->where('userId', Session::get('user_id'))->get());


            if ($control > 0) {
                $likeControl[$i] = "true";
            } else {
                $likeControl[$i] = "false";
            }

            $i++;


        }
        $reciverId = $request->input("comId");

        return view('layouts/front/home/home')->with('user', $users)->with('following', $following)->with('posting', $posting)
            ->with('posts', $posts)->with('postLike', $like)->with('postComment', $comment)
            ->with('likeControl', $likeControl)->with('company', $company)->with('comments', $comments)->with('follcom', $follcom)
            ->with('likers', $likers)->with('receiverId', $reciverId);
    }


    public function profil()
    {
        $users = DB::table('users')->where('id', Session::get('user_id'))->first();
        $following = count(DB::table('follower')->where('userId', Session::get('user_id'))->get());
        $posting = count(DB::table('posts')->where('user_id', Session::get('user_id'))->get());

        $posts = posts::join('users', 'posts.user_id', 'users.id')
            ->join('company', 'posts.company_id', 'company.id')
            ->select('users.image_url as userImage', 'users.*', 'company.image_url as companyImage', 'company.*',
                'posts.created_at as postDate', 'posts.image_url as postImage', 'posts.*', 'posts.id as postId')
            ->where('user_id', Session::get('user_id'))
            ->orderBy('posts.id', 'desc')
            ->get();


        $comments = post_comment::join('users', 'post_comment.userId', 'users.id')
            ->get();


        $likers = post_like::join('users', 'post_like.userId', 'users.id')
            ->join('posts', 'post_like.postId', 'posts.id')
            ->select('users.image_url as userImage', 'users.*', 'posts.*', 'posts.id as postId')
            ->get();


        $like = array();
        $comment = array();
        $likeControl = array();

        $i = 0;
        foreach ($posts as $post) {


            $comment[$i] = count(DB::table('post_comment')->where('postId', $post->id)->get());
            $like[$i] = count(DB::table('post_like')->where('postId', $post->id)->get());

            $control = count(DB::table('post_like')->where('postId', $post->id)->where('userId', Session::get('user_id'))->get());


            if ($control > 0) {
                $likeControl[$i] = "true";
            } else {
                $likeControl[$i] = "false";
            }

            $i++;


        }


        return view('layouts/front/profile/profil')->with('user', $users)->with('following', $following)->with('posting', $posting)
            ->with('posts', $posts)->with('postLike', $like)->with('postComment', $comment)->with('likeControl', $likeControl)
            ->with('comments', $comments)->with('likers', $likers);


    }

    public function otherProfile(Request $request)
    {
        $profileId = $request->input("profileId");

        $users = DB::table('users')->where('id', $profileId)->first();
        $following = count(DB::table('follower')->where('userId', $profileId)->get());
        $posting = count(DB::table('posts')->where('user_id', $profileId)->get());

        $posts = posts::join('users', 'posts.user_id', 'users.id')
            ->join('company', 'posts.company_id', 'company.id')
            ->select('users.image_url as userImage', 'users.*', 'company.image_url as companyImage',
                'company.*', 'posts.created_at as postDate', 'posts.image_url as postImage', 'posts.*')
            ->where('user_id', $profileId)
            ->orderBy('posts.id', 'desc')
            ->get();


        $like = array();
        $comment = array();
        $likeControl = array();

        $i = 0;
        foreach ($posts as $post) {


            $comment[$i] = count(DB::table('post_comment')->where('postId', $post->id)->get());
            $like[$i] = count(DB::table('post_like')->where('postId', $post->id)->get());

            $control = count(DB::table('post_like')->where('postId', $post->id)->where('userId', Session::get('user_id'))->get());


            if ($control > 0) {
                $likeControl[$i] = "true";
            } else {
                $likeControl[$i] = "false";
            }

            $i++;


        }


        return view('layouts/front/profile/otherProfile')->with('user', $users)->with('following', $following)->with('posting', $posting)
            ->with('posts', $posts)->with('postLike', $like)->with('postComment', $comment)->with('likeControl', $likeControl)->with('profileId', $profileId);


    }


    public function post_changePassword(Request $request)
    {
        if (Auth::Check()) {
            $request_data = $request->All();
            $validator = $this->admin_credential_rules($request_data);
            if ($validator->fails()) {
                return response()->json(array('error' => $validator->getMessageBag()->toArray()), 400);
            } else {
                $current_password = Auth::User()->password;
                if (Hash::check($request_data['current-password'], $current_password)) {
                    $user_id = Auth::User()->id;
                    $obj_user = User::find($user_id);
                    $obj_user->password = Hash::make($request_data['password']);;
                    $obj_user->save();
                    return "ok";
                } else {
                    $error = array('current-password' => 'Please enter correct current password');
                    return response()->json(array('error' => $error), 400);
                }
            }
        } else {
            return redirect()->to('/form');
        }
    }


    public function post_profileSettings(Request $request)
    {

        $users = DB::table('users')->where('email', $request->get('email'))->first();

        $destinationPath = 'uploads/images/company_images';
        $image = $request->image;
        $file_name = md5(uniqid()) . "." . "jpeg";
        $image->move($destinationPath, $file_name);

        DB::table('users')
            ->where('id', Session::get('user_id'))
            ->update(['image_url' => $image]);


        $request->merge(['image_url' => $file_name]);
        if ($users) {
            $users = Users::updating($request->all());


            if ($users) {
                $id = $users->id;
                $name = $users->name;
                $surname = $users->surname;
                $email = $users->email;
                $birthday = $users->birthday;
                $education = $users->education;
                $phone = $users->phone;
                $website = $users->website;


                return redirect('profil');
            }
        }
        return view('layouts/front/profile/profil');
    }


    public function post_like(int $id)
    {
        DB::table('post_like')->insert(
            ['postId' => $id, 'userId' => Session::get('user_id')]
        );

        return redirect('home');
    }

    public function post_unlike(int $id)
    {
        $like = DB::table('post_like')->where('postId', $id)
            ->where('userId', Session::get('user_id'))
            ->delete();

        return redirect('home');
    }


    public function get_comment(Request $request)
    {
        $request->merge(['userId' => Session::get('user_id')]);

        $comment = post_comment::create($request->all());

        return redirect("home");
    }


    public static function sideFollowing()
    {


        $company = follower::join('users', 'follower.userId', 'users.id')
            ->join('company', 'follower.companyId', 'company.id')
            ->select('company.*')
            ->where('follower.userId', Session::get('user_id'))
            ->get();


        return view('layouts/front/side_following')->with('company', $company);

    }


    public function createPost(Request $request)
    {

        $destinationPath = 'uploads/images/post_images';
        $image = $request->image;
        $file_name = md5(uniqid()) . "." . "jpeg";
        $image->move($destinationPath, $file_name);


        $users = DB::table('users')->where('id', Session::get('user_id'))->first();


        $request->merge(['user_id' => $users->id]);
        $request->merge(['company_id' => $users->companyId]);
        $request->merge(['image_url' => $file_name]);

        $posts = posts::create($request->all());

        if ($posts) {


            return redirect('profil');
        }

        return redirect('home');
    }

    public function postCreatePost(Request $request)
    {


        $request->merge(['userId' => Session::get('user_id')]);


        $posts = new posts();
        $posts->$request['content'];
        $request->users()->posts()->save($posts);

        return redirect()->route('home');
    }

    public function follow(int $id)
    {
        DB::table('follower')->insert(
            ['companyId' => $id, 'userId' => Session::get('user_id')]
        );


        //$users = DB::table('users')->where('id', Session::get('user_id'))->first();

        //$request->merge(['userId' => $users->id]);

        //$follow= follower::create($request->all());

        return redirect('home');
    }

    public function unfollow(int $id)
    {
        $follow = DB::table('follower')->where('companyId', $id)
            ->where('userId', Session::get('user_id'))->delete();


        return redirect('home');
    }

    public function join(int $id)
    {

        DB::table('users')
            ->where('id', Session::get('user_id'))
            ->update(['companyId' => $id]);

        return redirect('home');
    }

    public function changeFoto(Request $request)
    {

        $destinationPath = 'uploads/images/profile_images';
        $image = $request->image;
        $file_name = md5(uniqid()) . "." . "jpeg";
        $image->move($destinationPath, $file_name);

        DB::table('users')
            ->where('id', Session::get('user_id'))
            ->update(['image_url' => $image]);

        return redirect('profil');
    }

    public function comComment(Request $request)
    {
        $users = DB::table('users')->where('id', Session::get('user_id'))->first();

        $request->merge(['userId' => $users->id]);


        $comComment = company_comment::create($request->all());
        //dd($comComment);
        return redirect('profil');
    }


    public function ajaxRequest()

    {

        return view('ajaxRequest');

    }


    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function ajaxRequestPost(Request $request)

    {

        $input = $request->all();

        return response()->json(['success' => 'Got Simple Ajax Request.']);

    }
}


