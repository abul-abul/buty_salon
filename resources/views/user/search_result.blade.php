
    <div class="container">
    <h1>Search result</h1>
        @foreach($salons as $salon)

            <div style="float:left" class="category-boxes">
                <div class="row">
                    <div style='width:100%' class="category-box col-lg-3 col-md-3 col-sm-6">
                        <div class="wrapper">
                            <div class="picture">
                                <a href="{{action('UsersController@getSalonServiceCategory',$salon[0]->id)}}">
                                    <img style="width: 304px;" src="/assets/salon_images/{{$salon[0]->image}}" class="cover-me" alt="#">
                                </a>
                            </div><!-- /.picture -->

                            <div class="meta">
                                <div class="title">
                                    <a href="{{action('UsersController@getSalonServiceCategory',$salon[0]->id)}}">{{$salon[0]->name}}</a>
                                </div><!-- /.title -->
                            </div><!-- /.meta -->

                            <div class="options">
                                <ul>
                                    <li style="color:#fff;font-size:17px">{{$salon[0]->address1}}</li>
                                    <li style="color:#fff;font-size:17px">{{$salon[0]->salon_email}}</li>
                                    <li style="color:#fff;font-size:17px">{{$salon[0]->phonenumber}}</li>
                                    <li style="color:#fff;font-size:17px">{{$salon[0]->workings_time_days}}</li>
                                </ul>
                            </div><!-- /.options -->
                        </div><!-- /.wrapper -->
                    </div><!-- /.category-box -->
                </div><!-- /.row -->
            </div><!-- /.category-boxes-->
        @endforeach
    </div>    


