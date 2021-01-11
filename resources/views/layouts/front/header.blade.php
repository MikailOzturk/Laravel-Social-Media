<header class="header-desktop">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="header-wrap">
                <form class="form-header" action="{{route('search.results')}} " role="search">
                    <input class="au-input au-input--xl form-control" type="text" name="query"
                           placeholder="  Ara...">
                    <button class="au-btn--submit" type="submit">
                        <i class="zmdi zmdi-search"></i>
                    </button>
                </form>
                <div class="header-button">
                    <div class="noti-wrap">

                        <div class="noti__item " style="margin-right: 5px">
                            <div class="fa-hover col-lg-3 col-md-6">

                                <a href="http://127.0.0.1:8000/home">  <i class="fa fa-home"></i></a>
                            </div>
                        </div>

                        <div class="noti__item ">
                            <a href="http://127.0.0.1:8000/profil"> <i class="  fa fa-user"></i></a>

                        </div>
                        <div class="noti__item js-item-menu">
                            <i class="zmdi zmdi-comment-more"></i>

                            <div class="mess-dropdown js-dropdown">
                                @php
                                    $a=0
                                @endphp
                                @foreach($lastMessages as $last)
                                @php
                                    $a++
                                @endphp
                                @endforeach
                                <div class="mess__title">
                                    <p>{{$a}} mesajınız var</p>
                                </div>

                                    @php
                                        $i=0
                                    @endphp
                                @foreach($lastMessages as $last)
                                    <form action="{{url('message')}}">
                                        <input name="userId" type="hidden" value="{{$userArray[$i]->id}}"/>
                                    <div class="mess__item">
                                      <div class="image img-cir img-40">
                                        <img  src="uploads/images/profile_images/{{$userArray[$i]->image_url}}"
                                              alt="sunil">
                                      </div>
                                      <div class="content">
                                        <h6>{{$userArray[$i]->name}}</h6>
                                        <input type="submit" value="{{$last[0]->message}}" style="background: transparent">
                                        <span class="time">3 min ago</span>
                                      </div>
                                    </div>


                                    </form>

                                    @php
                                        $i++
                                    @endphp
                                @endforeach

                                <div class="mess__footer">
                                    <a href="/message">View all messages</a>
                                </div>
                            </div>
                        </div>

                        <div class="noti__item js-item-menu">
                            <i class="zmdi zmdi-notifications"></i>

                            <div class="notifi-dropdown js-dropdown">
                                <div class="notifi__title">
                                    <p>You have 3 Notifications</p>
                                </div>
                                <div class="notifi__item">
                                    <div class="bg-c1 img-cir img-40">
                                        <i class="zmdi zmdi-email-open"></i>
                                    </div>
                                    <div class="content">
                                        <p>You got a email notification</p>
                                        <span class="date">April 12, 2018 06:50</span>
                                    </div>
                                </div>
                                <div class="notifi__item">
                                    <div class="bg-c2 img-cir img-40">
                                        <i class="zmdi zmdi-account-box"></i>
                                    </div>
                                    <div class="content">
                                        <p>Your account has been blocked</p>
                                        <span class="date">April 12, 2018 06:50</span>
                                    </div>
                                </div>
                                <div class="notifi__item">
                                    <div class="bg-c3 img-cir img-40">
                                        <i class="zmdi zmdi-file-text"></i>
                                    </div>
                                    <div class="content">
                                        <p>You got a new file</p>
                                        <span class="date">April 12, 2018 06:50</span>
                                    </div>
                                </div>
                                <div class="notifi__footer">
                                    <a href="#">All notifications</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="account-wrap">
                        <div class="account-item clearfix js-item-menu">
                            <div class="image">
                                @if($user->image_url==null)
                                    <img src="uploads/images/profile_images/default.jpg"
                                         alt="AdminBSB - Profile Image" style="width: 104px;height: 104px;"/>
                                @else
                                    <img src="uploads/images/profile_images/{!! $user->image_url !!}"
                                         alt="AdminBSB - Profile Image"/>
                                @endif
                            </div>
                            <div class="content">
                                <a class="js-acc-btn" href="#">{!! $user->name !!} {!! $user->surname !!}</a>
                            </div>
                            <div class="account-dropdown js-dropdown">
                                <div class="info clearfix">
                                    <div class="image">
                                        <a href="#">
                                            @if($user->image_url==null)
                                                <img src="uploads/images/profile_images/default.jpg"
                                                     alt="AdminBSB - Profile Image"
                                                     style="width: 104px;height: 104px;"/>
                                            @else
                                                <img src="uploads/images/profile_images/{!! $user->image_url !!}"
                                                     alt="AdminBSB - Profile Image"/>
                                            @endif
                                        </a>
                                    </div>
                                    <div class="content">
                                        <h5 class="name">
                                            <a href="http://127.0.0.1:8000/profil">{!! $user->name !!} {!! $user->surname !!}</a>
                                        </h5>
                                        <a href="http://127.0.0.1:8000/profil"> <span class="email">{!! $user->email !!} </span></a>
                                    </div>
                                </div>
                                <div class="account-dropdown__body">
                                    <div class="account-dropdown__item">
                                        <a href="http://127.0.0.1:8000/home">
                                            <i class="zmdi zmdi-account"></i>Anasayfa</a>
                                    </div>
                                    <div class="account-dropdown__item">
                                        <a href="#">
                                            <i class="zmdi zmdi-settings"></i>Ayarlar</a>
                                    </div>




                                </div>
                                <div class="account-dropdown__footer">
                                    <a href="{{url('logout')}}">
                                        <i class="zmdi zmdi-power"></i>Çıkış yap</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>