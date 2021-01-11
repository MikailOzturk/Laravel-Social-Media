<li class="has-sub">
    <a class="js-arrow" href="#">
        <i class="fas fa-copy"></i>Takip Edilen Şirketler</a>
    <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">

        @foreach($company as $com)

            <li>
                <div class="leftMydiv"><img src="uploads/images/company_images/{{$com->image_url}}" width="32"
                                            height="32"
                                            style="border-radius: 100%;float: left"/>

                    <form action="{{url('showCompany')}}">
                        <input name="comId" type="hidden" value="{{$com->id}}"/>
                        <p> <input type="submit" value="{{$com->company_name}}" style="background: transparent"></p>

                    </form>

                </div>
            </li><br>
            <div class="clearfix"></div>
        @endforeach


    </ul>
</li>