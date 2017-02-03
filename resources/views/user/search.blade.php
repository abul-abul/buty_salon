@extends('app-user')

@section('style')
@endsection

@section('user-content')

<div class="infobar">
</div><!-- /.infobar --> 

<div class="highlighted-wrapper gray">
    <div class="highlighted section">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-3">
                    <div id="overviews">
                        @if(count($slides) != 0)
                            @foreach($slides as $key => $salon)
                            @if($key == 0)
                            <div class="overview active">
                            @else
                            <div class="overview">
                            @endif
                                <div class="overview-table">
                                    <div class="item title">

                                        <a style="color:white" href="{{action('UsersController@getSalonServiceCategory',$salon['id'])}}">
                                            <h3>{{$salon['name']}}</h3>
                                        </a>
                                        <div class="subtitle">V8, TDi</div>
                                    </div><!-- /.item -->

                                    <div class="item tags">
                                        <div class="price">$7,999</div>
                                        <div class="type">Sale</div>
                                    </div><!-- /.item -->
                                    @if($salon['phonenumber'] != '')
                                    <div class="item line">
                                        <span class="property"><i class="icon icon-normal-mobile-phone"></i></span>
                                        <span class="value">{{$salon['phonenumber']}}</span>
                                    </div><!-- /.item -->
                                    @endif
                                    @if($salon['address1'] != '')
                                    <div class="item line">
                                        <span class="property"><i class="icon icon-normal-pointer"></i></span>
                                        <span class="value">{{$salon['address1']}}</span>
                                    </div><!-- /.item -->
                                    @endif
                                    @if($salon['salon_email'] != '')
                                    <div class="item line">
                                        <span class="property"><i class="icon icon-normal-mail"></i></span>
                                        <span class="value">{{$salon['salon_email']}}</span>
                                    </div><!-- /.item -->
                                    @endif
                                    @if($salon['workings_time_days'] != '')
                                    <div class="item line">
                                        <span class="property"><i class="icon icon-normal-clock"></i></span>
                                        <span class="value">{{$salon['workings_time_days']}}</span>
                                    </div><!-- /.item -->
                                    @endif
                                </div><!-- /.overview-table -->
                            </div><!-- /.overview -->
                            @endforeach
                        @endif

                        <div id="slider-navigation">
                            <div class="prev"></div><!-- /.prev -->
                            <div class="next"></div><!-- /.next -->
                        </div><!-- /.slider-navigation -->
                    </div><!-- /.overviews -->
                </div>

                <div class="col-md-7 col-sm-7"> 
                    <div id="slider"> 
                    @if(count($slides) != 0) 
                        @foreach($slides as $key => $salon)
                        @if($key == 0)
                        <div class="slide active">
                        @else
                        <div class="slide">
                        @endif
                            @if($salon->image == null)
                            <a href="detail.html"><img src="/assets/content/img/slides/toyota-1.png" alt="#"></a>
                            @else
                            <a href="detail.html"><img style="height:409px; width:652px" src="/assets/salon_images/{{$salon->image}}" alt="#"></a>
                            @endif
                            <div class="color-overlay"></div><!-- /.color-overlay -->
                        </div><!-- /.slide -->
                        @endforeach 
                    @endif
                    </div><!-- /#slider -->
                </div>
            </div><!-- /.row -->
        </div><!-- /.container -->
    </div><!-- /.highligted -->

    <div class="filter-wrapper">
        <div class="container">
            <div class="row">           
                <div class="col-md-3 col-xs-12 pull-right">
                    <div class="filter-block">
                        <div class="block">
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#search-sales" data-toggle="tab">Sales</a></li>
                                <li><a href="#search-rent" data-toggle="tab">Rent</a></li>
                            </ul><!-- /.nav -->
                            <div class="content">
                                <div class="inner">
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="search-sales">
                                            <form method="post" action="filter.html">
                                                <div class="row">
                                                    <div class="form-group col-lg-12 col-md-12 col-sm-6 col-xs-6">
                                                        <select name="maker" class="form-control">
                                                            <option>Audi</option>
                                                            <option>Toyota</option>
                                                            <option>BMW</option>
                                                        </select>
                                                    </div><!-- /.form-group -->

                                                    <div class="form-group col-lg-12 col-md-12 col-sm-6 col-xs-6">
                                                        <select name="model" class="form-control">
                                                            <option>Model 1</option>
                                                            <option>Model 2</option>
                                                            <option>Model 3</option>
                                                        </select>
                                                    </div><!-- /.form-group -->

                                                    <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-6 year-from">
                                                        <select name="year-from" class="form-control">
                                                            <option>2009</option>
                                                            <option>2010</option>
                                                            <option>2011</option>
                                                            <option>2012</option>
                                                            <option>2013</option>
                                                        </select>
                                                    </div><!-- /.form-group -->

                                                    <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-6 year-to">
                                                        <select name="year-to" class="form-control">
                                                            <option>2009</option>
                                                            <option>2010</option>
                                                            <option>2011</option>
                                                            <option>2012</option>
                                                            <option>2013</option>
                                                        </select>
                                                    </div><!-- /.form-group -->

                                                    <div class="form-group col-lg-12 col-md-12 col-sm-6 col-xs-6">
                                                        <select name="model" class="form-control">
                                                            <option>Model 1</option>
                                                            <option>Model 2</option>
                                                            <option>Model 3</option>
                                                        </select>
                                                    </div><!-- /.form-group -->

                                                    <div class="form-group col-lg-12 col-md-12 col-sm-6 col-xs-6">
                                                        <select name="model" class="form-control">
                                                            <option>Model 1</option>
                                                            <option>Model 2</option>
                                                            <option>Model 3</option>
                                                        </select>
                                                    </div><!-- /.form-group -->
                                                </div><!-- /.row -->

                                                <div class="form-group">
                                                    <button class="send btn btn-primary btn-primary-color">
                                                        Search sales <i class="icon icon-normal-right-arrow-small"></i>
                                                    </button>
                                                </div><!-- /.form-group -->
                                            </form>
                                        </div><!-- /.tab-pane -->

                                        <div class="tab-pane" id="search-rent">
                                            <form method="post" action="filter.html">
                                                <div class="row">
                                                    <div class="form-group col-lg-12 col-md-12 col-sm-6 col-xs-6">
                                                        <select name="maker" class="form-control">
                                                            <option>Audi</option>
                                                            <option>Toyota</option>
                                                            <option>BMW</option>
                                                        </select>
                                                    </div><!-- /.form-group -->

                                                    <div class="form-group col-lg-12 col-md-12 col-sm-6 col-xs-6">
                                                        <select name="model" class="form-control">
                                                            <option>Model 1</option>
                                                            <option>Model 2</option>
                                                            <option>Model 3</option>
                                                        </select>
                                                    </div><!-- /.form-group -->

                                                    <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-6 year-from">
                                                        <select name="year-from" class="form-control">
                                                            <option>2009</option>
                                                            <option>2010</option>
                                                            <option>2011</option>
                                                            <option>2012</option>
                                                            <option>2013</option>
                                                        </select>
                                                    </div><!-- /.form-group -->

                                                    <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-6 year-to">
                                                        <select name="year-to" class="form-control">
                                                            <option>2009</option>
                                                            <option>2010</option>
                                                            <option>2011</option>
                                                            <option>2012</option>
                                                            <option>2013</option>
                                                        </select>
                                                    </div><!-- /.form-group -->

                                                    <div class="form-group col-lg-12 col-md-12 col-sm-6 col-xs-6">
                                                        <select name="model" class="form-control">
                                                            <option>Model 1</option>
                                                            <option>Model 2</option>
                                                            <option>Model 3</option>
                                                        </select>
                                                    </div><!-- /.form-group -->

                                                    <div class="form-group col-lg-12 col-md-12 col-sm-6 col-xs-6">
                                                        <select name="model" class="form-control">
                                                            <option>Model 1</option>
                                                            <option>Model 2</option>
                                                            <option>Model 3</option>
                                                        </select>
                                                    </div><!-- /.form-group -->
                                                </div><!-- /.row -->
                                                <div class="form-group">
                                                    <button class="send btn btn-primary btn-primary-color">
                                                        Search rental <i class="icon icon-normal-right-arrow-small"></i>
                                                    </button>
                                                </div><!-- /.form-group -->
                                            </form>
                                        </div><!-- /.tab-pane -->
                                    </div><!-- /.tab-content -->
                                </div><!-- /.inner -->
                            </div><!-- /.content -->                                
                        </div><!-- /.block -->
                    </div><!-- /.filter-block -->
                </div><!-- /.col-md-3 -->
            </div><!-- /.row -->
        </div><!-- /.highlighted -->
    </div><!-- /.slider-filter -->
</div><!-- /.highlighted-wrapper -->


    <div class="section gray-light">
        <div class="container">
            <div class="row">
                <div class="col-md-9 col-sm-12">
                    <div id="main">
                        <div class="row-block block" id="best-deals">
                            <div class="page-header">
                                <div class="page-header-inner">
                                    <div class="heading">
                                        <h2>a</h2>
                                    </div><!-- /.heading -->

                                    <div class="line">
                                        <hr/>
                                    </div><!-- /.line -->
                                </div><!-- /.page-header-inner -->
                            </div><!-- /.page-header -->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="content white">
                                        <div class="inner catalog_list">
                                        @if(count($salons) != 0)
                                        @foreach($salons as $salon)
                                            <div class="row-item">
                                                <div class="inner">
                                                    <div class="row">
                                                        <div class="col-lg-4 col-md-5 col-sm-5">
                                                            <div class="picture">
                                                                <div class="image-slider">
                                                                    <a href="{{action('UsersController@getSalonServiceCategory',$salon->id)}}" class="slide">
                                                                        @if($salon->image== null)
                                                                            <img src="/assets/user/images/img1-md.jpg" style="height:191px" alt=""/>
                                                                        @else
                                                                            <img style="height:191px" src="/assets/salon_images/{{$salon->image}}">
                                                                        @endif  
                                                                    </a>
                                                                    <div class="cycle-pager"></div> 
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-8 col-md-7 col-sm-7">
                                                            <div class="content-inner offers_salon"  data-id="{{$salon->id}}">
                                                                <h3>
                                                                    <a href="{{action('UsersController@getSalonServiceCategory',$salon->id)}}">{{$salon->name}}</a>
                                                                </h3>
                                                                <div class="subtitle">DPF Active</div> 
                                                                <div class="price">$16,999</div>  
                                                                <div class="description">
                                                                <p>{{$salon->description}}</p>
                                                                </div><!-- /.description -->               
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                        @else
                                            <p>Not  salons</p>
                                        @endif 
                                        </div><!-- /.inner -->
                                    </div>
                                </div><!-- /.col-md-12 -->
                            </div><!-- /.row -->
                        </div><!-- /.block -->                
                    </div><!-- /#main -->
                </div><!-- /.col-md-9 -->

                <div class="col-md-3 col-sm-12">
                    <div class="sidebar"><br><br>
                        <div id="newsletter" class='block default'>
                            <div class="block-inner">
                                <div class="block-title">
                                    <h3>Subscribe to newsletter</h3>
                                </div>
                                <form>
                                    <div class="form-group">
                                        <input placeholder="Your e-mail" type="text" name="maker" class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <button class="send btn btn-primary btn-primary-color">Subscribe</button>
                                    </div>
                                </form>
                            </div>
                        </div>                        
                        <div class="latest-reviews block block-shadow white">
                            <div class="block-inner">
                                <div class="block-title">
                                    <h3>Latest Reviews</h3>
                                </div><!-- /.block-title -->
                                <div class="inner">
                                    <div class="row">
                                        <div class="item-wrapper col-lg-12 col-md-12 col-sm-4">
                                            <div class="item">
                                                <div class="picture hidden-sm">
                                                    <a href="detail.html">
                                                        <img src="/assets/content/img/review.png" alt="#">
                                                    </a>
                                                </div><!-- /.picture -->
                                                <div class="title">
                                                    <a href="detail.html">Toyota Landcruiser</a>
                                                </div><!-- /.title -->
                                                <div class="date">10/12/2013</div><!-- /.date -->
                                                <div class="description">
                                                    <p>
                                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent eu vulputate...
                                                    </p>
                                                </div><!-- /.description -->
                                            </div><!-- /.item -->
                                        </div><!-- /.item-wrapper -->

                                        <div class="item-wrapper col-lg-12 col-md-12 col-sm-4">
                                            <div class="item">
                                                <div class="title">
                                                    <a href="detail.html">Toyota RAV</a>
                                                </div><!-- /.title -->
                                                <div class="date">12/12/2013</div><!-- /.date -->
                                                <div class="description">
                                                    <p>
                                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent eu vulputate...
                                                    </p>
                                                </div><!-- /.description -->
                                            </div><!-- /.item -->   
                                        </div><!-- /.item-wrapper -->

                                        <div class="item-wrapper col-lg-12 col-md-12 col-sm-4">
                                            <div class="item">
                                                <div class="title">
                                                    <a href="detail.html">Toyota 4Runner</a>
                                                </div><!-- /.title -->
                                                <div class="date">20/12/2013</div><!-- /.date -->
                                                <div class="description">
                                                    <p>
                                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent eu vulputate...
                                                    </p>
                                                </div><!-- /.description -->
                                            </div><!-- /.item -->           
                                        </div><!-- /.item-wrapper -->
                                    </div><!-- /.row -->
                                </div><!-- /.inner -->
                            </div><!-- /.block-inner -->
                        </div><!-- /.block -->        
                        <div id="random-cars" class="random-cars block block-shadow white">
                            <div class="block-inner">
                                <div class="block-title">
                                    <h3>Recent Cars</h3>
                                </div><!-- /.block-title -->
                                <div class="row">
                                    <div class="teaser-item-wrapper col-lg-12 col-md-12 col-sm-4">
                                        <div class="teaser-item">
                                            <div class="title">
                                                <a href="detail.html">Toyota Verso</a>
                                            </div><!-- /.title -->
                                            <div class="subtitle">
                                                Valvematic Active   
                                            </div><!-- /.subtitle -->
                                            <div class="row">
                                                <div class="col-sm-5 col-md-5 picture-wrapper">
                                                    <div class="picture">
                                                        <a href="detail.html">
                                                            <span class="hover">
                                                                <span class="hover-inner">
                                                                    <i class="icon icon-normal-link"></i>
                                                                </span><!-- /.hover-inner -->
                                                            </span><!-- /.hover -->
                                                            <img src="/assets/content/img/content/toyota5.jpg" alt="#">
                                                        </a>
                                                    </div><!-- /.picture -->
                                                </div><!-- /.picture-wrapper -->
                                                <div class="col-sm-7 col-md-7 content-wrapper ">
                                                    <div class="price">$9,799</div>
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                                </div><!-- /.content-wrapper -->
                                            </div><!-- /.row -->
                                        </div><!-- /.teaser-item -->          
                                    </div><!-- /.teaser-item-wrapper -->
                                    <div class="teaser-item-wrapper col-lg-12 col-md-12 col-sm-4">
                                        <div class="teaser-item">
                                            <div class="title">
                                                <a href="detail.html">Toyota Verso</a>
                                            </div><!-- /.title -->
                                            <div class="subtitle">
                                                DPF Active   
                                            </div><!-- /.subtitle -->
                                            <div class="row">
                                                <div class="col-sm-5 col-md-5 picture-wrapper">
                                                    <div class="picture">
                                                        <a href="detail.html">
                                                            <span class="hover">
                                                                <span class="hover-inner">
                                                                    <i class="icon icon-normal-link"></i>
                                                                </span><!-- /.hover-inner -->
                                                            </span><!-- /.hover -->
                                                            <img src="/assets/content/img/content/toyota1.jpg" alt="#">
                                                        </a>
                                                    </div><!-- /.picture -->
                                                </div><!-- /.picture-wrapper -->
                                                <div class="col-sm-7 col-md-7 content-wrapper ">
                                                    <div class="price">$9,799</div>
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                                </div><!-- /.content-wrapper -->
                                            </div><!-- /.row -->
                                        </div><!-- /.teaser-item -->              
                                    </div><!-- /.teaser-item-wrapper -->
                                    <div class="teaser-item-wrapper col-lg-12 col-md-12 col-sm-4">
                                        <div class="teaser-item">
                                            <div class="title">
                                                <a href="detail.html">Toyota Landcruiser</a>
                                            </div><!-- /.title -->
                                            <div class="subtitle">
                                                MX 234  
                                            </div><!-- /.subtitle -->
                                            <div class="row">
                                                <div class="col-sm-5 col-md-5 picture-wrapper">
                                                    <div class="picture">
                                                        <a href="detail.html">
                                                            <span class="hover">
                                                                <span class="hover-inner">
                                                                    <i class="icon icon-normal-link"></i>
                                                                </span><!-- /.hover-inner -->
                                                            </span><!-- /.hover -->
                                                            <img src="/assets/content/img/content/toyota6.jpg" alt="#">
                                                        </a>
                                                    </div><!-- /.picture -->
                                                </div><!-- /.picture-wrapper -->
                                                <div class="col-sm-7 col-md-7 content-wrapper ">
                                                    <div class="price">$9,799</div>
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                                </div><!-- /.content-wrapper -->
                                            </div><!-- /.row -->
                                        </div><!-- /.teaser-item -->      
                                    </div><!-- /.teaser-item-wrapper -->
                                </div><!-- /.row -->
                            </div><!-- /.block-inner -->
                        </div><!-- /.block --> 
                    </div><!-- /.sidebar -->
                </div><!-- /.col-md-3 -->
            </div><!-- /.row -->

            <div id="content-bottom">
                <div class="row">
                    <div class="col-md-12">
                        <div class="testimonials-block block">
                            <div class="page-header center">
                                <div class="page-header-inner">
                                    <div class="line">
                                        <hr/>
                                    </div>
                                    <div class="heading">
                                        <h2>Our Satisfied Customers</h2>
                                    </div><!-- /.heading -->
                                    <div class="line">
                                        <hr/>
                                    </div><!-- /.line -->
                                </div><!-- /.page-header-inner -->
                            </div><!-- /.page-header -->

                            <div class="row">
                                <div class="col-sm-12 col-md-6">
                                    <div class="testimonial white">
                                        <div class="inner">
                                            <div class="row">
                                                <div class="col-sm-3 col-md-4">
                                                    <div class="picture">
                                                        <img src="/assets/content/img/testimonials-1.png" alt="#">
                                                    </div><!-- /.picture -->
                                                </div><!-- /.col-md-4 -->

                                                <div class="col-sm-9 col-md-8">
                                                    <div class="description quote">
                                                        <p>
                                                            <i>
                                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed ligula ipsum, ornare ac augue
                                                                in, suscipit pretium purus. Vestibulum turpis felis, gravida ac justo.
                                                            </i>
                                                        </p>
                                                    </div><!-- /.description -->

                                                    <div class="star-rating">
                                                        <input name="star0" type="radio" class="star icon-normal-star" checked="checked" disabled="disabled">
                                                        <input name="star0" type="radio" class="star icon-normal-star" checked="checked" disabled="disabled">
                                                        <input name="star0" type="radio" class="star icon-normal-star" checked="checked" disabled="disabled">
                                                        <input name="star0" type="radio" class="star icon-normal-star" checked="checked" disabled="disabled">
                                                        <input name="star0" type="radio" class="star icon-normal-star" checked="checked" disabled="disabled">
                                                    </div><!-- /.star-rating -->

                                                    <div class="author">
                                                        <strong>Fanny Harley</strong>
                                                    </div><!-- /.author -->
                                                </div><!-- /.col-md-8 -->
                                            </div><!-- /.row -->
                                        </div><!-- /.inner -->
                                    </div><!-- /.testimonial -->
                                </div><!-- /.col-md-6 -->

                                <div class="col-sm-12 col-md-6">
                                    <div class="testimonial white">
                                        <div class="inner">
                                            <div class="row">
                                                <div class="col-sm-3 col-md-4">
                                                    <div class="picture">
                                                        <img src="/assets/content/img/testimonials-2.png" alt="#">
                                                    </div><!-- /.picture -->
                                                </div><!-- /.col-md-4 -->

                                                <div class="col-sm-9 col-md-8">
                                                    <div class="description quote">
                                                        <p>
                                                            <i>
                                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed ligula ipsum, ornare ac augue
                                                                in, suscipit pretium purus. Vestibulum turpis felis, gravida ac justo.
                                                            </i>
                                                        </p>
                                                    </div><!-- /.description -->

                                                    <div class="star-rating">
                                                        <input name="star1" type="radio" class="star icon-normal-star" checked="checked" disabled="disabled">
                                                        <input name="star1" type="radio" class="star icon-normal-star" checked="checked" disabled="disabled">
                                                        <input name="star1" type="radio" class="star icon-normal-star" checked="checked" disabled="disabled">
                                                        <input name="star1" type="radio" class="star icon-normal-star" disabled="disabled">
                                                        <input name="star1" type="radio" class="star icon-normal-star" disabled="disabled">
                                                    </div><!-- /.star-rating -->

                                                    <div class="author">
                                                        <strong>Chavi Ernanéz</strong>
                                                    </div><!-- /.author -->
                                                </div><!-- /.col-md-8 -->
                                            </div><!-- /.row -->
                                        </div><!-- /.inner -->
                                    </div><!-- /.testimonial -->
                                </div><!-- /.col-md-6 -->
                            </div><!-- /.row -->
                        </div><!-- /.testimonials-block -->   
                    </div><!-- /.col-md-12 -->
                </div><!-- /.row -->

                <div class="row">
                    <div class="col-md-12">
                        <div class="features-block block">
                            <div class="row">
                                <div class="feature">
                                    <div class="col-xs-12 col-md-4 col-sm-4">
                                        <div class="row">
                                            <div class="col-xs-12 col-md-5">
                                                <div class="feature-icon">
                                                    <div class="feature-icon-inverse">
                                                        <i class="icon-outline-car"></i>
                                                    </div><!-- /.feature-icon-inverse -->

                                                    <div class="feature-icon-normal">
                                                        <i class="icon-normal-car"></i>
                                                    </div><!-- /.feature-icon-normal -->
                                                </div><!-- /.feature-icon -->
                                            </div><!-- /.col-md-5 -->

                                            <div class="col-xs-12 col-md-7">
                                                <h3>Great Prices</h3>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed neque dolor, placerat mattis justo id, convallis porta nulla</p>
                                            </div><!-- /.col-md-7 -->
                                        </div><!-- /.row -->
                                    </div><!-- /.col-md-4 -->
                                </div><!-- /.feature -->

                                <div class="feature">
                                    <div class="col-xs-12 col-md-4 col-sm-4">
                                        <div class="row">
                                            <div class="col-xs-12 col-md-5">
                                                <div class="feature-icon">
                                                    <div class="feature-icon-inverse">
                                                        <i class="icon-outline-currency-dollar"></i>
                                                    </div><!-- /.feature-icon-inverse -->

                                                    <div class="feature-icon-normal">
                                                        <i class="icon-normal-currency-dollar"></i>
                                                    </div><!-- /.feature-icon-normal -->
                                                </div><!-- /.feature-icon -->
                                            </div><!-- /.col-md-5 -->

                                            <div class="col-xs-12 col-md-7">
                                                <h3>Wide Selection</h3>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed neque dolor, placerat mattis justo id, convallis porta nulla</p>
                                            </div><!-- /.col-md-7 -->
                                        </div><!-- /.row -->
                                    </div><!-- /.col-md-4 -->
                                </div><!-- /.feature -->

                                <div class="feature">
                                    <div class="col-xs-12 col-md-4 col-sm-4">
                                        <div class="row">
                                            <div class="col-xs-12 col-md-5">
                                                <div class="feature-icon">
                                                    <div class="feature-icon-inverse">
                                                        <i class="icon-outline-car-door"></i>
                                                    </div><!-- /.feature-icon-inverse -->

                                                    <div class="feature-icon-normal">
                                                        <i class="icon-normal-car-door"></i>
                                                    </div><!-- /.feature-icon-normal -->
                                                </div><!-- /.feature-icon -->
                                            </div><!-- /.col-md-5 -->

                                            <div class="col-xs-12 col-md-7">
                                                <h3>24/7 Hotline</h3>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed neque dolor, placerat mattis justo id, convallis porta nulla</p>
                                            </div><!-- /.col-md-7 -->
                                        </div><!-- /.row -->
                                    </div><!-- /.col-md-4 -->
                                </div><!-- /.feature -->        
                            </div><!-- /.row -->
                        </div><!-- /.block -->    
                    </div><!-- /.col-md-12 -->
                </div><!-- /.row -->
            </div><!-- /#content-bottom -->
        </div><!-- /.container -->
    </div><!-- /.section -->

    <div class="section gray-light ">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="partners-block block">
                        <div class="page-header">
                            <div class="page-header-inner">
                                <div class="heading">
                                    <h2>Our Partners</h2>
                                </div><!-- /.heading -->
                                <div class="line">
                                    <hr/>
                                </div><!-- /.line -->
                            </div><!-- /.page-header-inner -->
                        </div><!-- /.page-header -->

                        <div class="inner-block white block-shadow">
                            <div class="row">
                                <div class="col-sm-2 col-md-2">
                                    <div class="partner">
                                        <a href="#">
                                            <img src="/assets/content/img/partners/volkswagen.png" alt="#">
                                        </a>
                                    </div><!-- /.partner -->
                                </div><!-- /.col-md-2 -->

                                <div class="col-sm-2 col-md-2">
                                    <div class="partner">
                                        <a href="#">
                                            <img src="/assets/content/img/partners/ford.png" alt="#">
                                        </a>
                                    </div><!-- /.partner -->
                                </div><!-- /.col-md-2 -->

                                <div class="col-sm-2 col-md-2">
                                    <div class="partner">
                                        <a href="#">
                                            <img src="/assets/content/img/partners/honda.png" alt="#">
                                        </a>
                                    </div><!-- /.partner -->
                                </div><!-- /.col-md-2 -->

                                <div class="col-sm-2 col-md-2">
                                    <div class="partner">
                                        <a href="#">
                                            <img src="/assets/content/img/partners/mercedes.png" alt="#">
                                        </a>
                                    </div><!-- /.partner -->
                                </div><!-- /.col-md-2 -->

                                <div class="col-sm-2 col-md-2">
                                    <div class="partner">
                                        <a href="#">
                                            <img src="/assets/content/img/partners/toyota.png" alt="#">
                                        </a>
                                    </div><!-- /.partner -->
                                </div><!-- /.col-md-2 -->

                                <div class="col-sm-2 col-md-2">
                                    <div class="partner">
                                        <a href="#">
                                            <img src="/assets/content/img/partners/bmw.png" alt="#">
                                        </a>
                                    </div><!-- /.partner -->
                                </div><!-- /.col-md-2 -->
                            </div><!-- /.row -->
                        </div><!-- /.inner-block -->
                    </div><!-- /.partners-block -->              
                </div><!-- /.col-md-12 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </div><!-- /.section -->
</div><!-- /#content -->  

@endsection

@section('scripts')
{!! HTML::script( asset('assets/user/plugins/js/jquery.min.js') ) !!} 
@endsection