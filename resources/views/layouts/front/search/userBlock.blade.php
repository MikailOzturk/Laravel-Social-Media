<style>


    body {
        background-color: #ccc;
        font-family: 'Roboto', Helvetica Neue, sans-serif;
    }

    h2, p, div {
        margin: 0;
        padding: 0;
    }

    h2 {
        font-weight: bold;
    }

    div.more {
        display: none;
        margin: 10px 0 0 0;
        padding: 10px;
        background-color: #eee;
        position: relative;
    }



    li {
        list-style: none;
        line-height: 1.4em;
        font-size: 90%;
    }

    .close {
        position: absolute;
        top: 5px;
        right: 10px;
        color: rgb(192, 199, 212);
        cursor: pointer;
    }


    .search-result {
        background-color: #fff;
        border-radius: 5px;
        padding: 15px;
        display: flex;
        position: relative;
    }

    .new-job {
         border-left: 5px solid rgb(253, 137, 37);
     }
    .badge {
        position: absolute;
        top: 15px;
        right: 15px;
        padding: 5px 10px;
        border-radius: 15px;
        border: 2px solid rgb(253, 137, 37);
        background-color: rgba(253, 137, 37, 0.2);
        color: rgb(253, 137, 37);
    }


    h2 {
        color: rgb(40, 140, 252)
    }

    a {
        text-decoration: none;
        color: rgb(36, 138, 250)
    }

    .icon {
        margin: 0 15px 0 0;
    }

    .reviews {
        color: rgb(253, 137, 37);
    }

    .actions {
        color: rgb(192, 199, 212);
        margin-top: 10px;
        font-size: 90%;
    }

    span {
        margin-right: 10px;
    }

    div > div p {
        color: rgb(192, 199, 212);
        margin-top: 10px;
    }

    .company, .stars, .reviews {
        font-size: 110%;
        margin-right: 0 !important;
        margin-top: 5px !important;
    }

    .stars {
        position: relative;
        display: inline-block;
        height: 16px;
        width: 86px;
        background: url(https://www.indeed.com/cmp/_s/s/40b77a6/5stars_lg.png) 0px 33px;
        background-size: 85px 32px;
    }

    .stars-inner {
        display: inline-block;
        height: 16px;
        width: 86px;
        background: url(https://www.indeed.com/cmp/_s/s/40b77a6/5stars_lg.png) 0 17px;
        background-size: 85px 32px;
    }





</style>




<div class="search-result new-job">
    <div class="badge"><form action="{{url('message')}}">
            <input name="userId" type="hidden" value="{{$user->id}}"/>
            <input type="submit" value="Mesaj gönder" style="background: transparent">
        </form></div>
    <div class="icon">

        @if($user->image_url==null)
        <img src="uploads/images/profile_images/default.jpg" width="60" />
        @else
            <img src="uploads/images/profile_images/{!! $user->image_url !!}" width="60" />
        @endif
    </div>
    <div class="content">
        <form action="{{url('otherprofile')}}">
            <input name="profileId" type="hidden" value="{{$user->id}}"/>
            <h2><input type="submit" value="{{$user->name}} {{$user->surname}}" style="background: transparent"></h2>

        </form>

        <p>


        </p>
        <div>

        </div>


    </div>
</div>
<hr>