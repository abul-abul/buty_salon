@extends('app-user')

@section('style')    
@endsection

@section('user-content')
<div class="infobar">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<ol class="breadcrumb pull-left">
		  			<li><a href="{{action('UsersController@getHome')}}">{{trans('common.home')}}</a></li>
		  			<li><a href="{{action('UsersController@getBlog')}}">{{trans('common.blog')}}</a></li>
		  			<li class="active">{{trans('common.article')}}</li>
				</ol>
			</div><!-- /.col-md-12 -->
		</div><!-- /.row -->
	</div><!-- /.container -->
</div><!-- /.infobar --> 
 <div id="content" class="article-page">
    <div class="section gray-light">
        <div class="container">
            <div class="row">
                <div class="col-sm-8 col-md-9">
                    <div id="main">
                        <div class="row">
                            <div class="col-md-12">
                                <article class="block white block-shadow">
                                    <div class="picture">
                                        @if($article['article_image'])
                                        <a href="{{action('UsersController@getArticle',$article->id)}}">
                                            <img src="/assets/admin/images/article-images/{{$article['article_image']}}" alt="#">
                                        </a>
                                        @else
                                            <a href="article.html">
                                                <img src="/assets/admin/images/article-images/article.jpg" alt="#">
                                            </a>
                                        @endif
                                    </div>

                                    <div class="block-inner">
                                        <div class="block-title">
                                            <h1>{{$article->title}}</h1>
                                        </div>

                                        <div class="meta">
                                            <ul class="clearfix">
                                                <li><i class="icon icon-normal-calendar-month"></i>{{$article['created_at']}}</li>
                                            </ul>
                                        </div>
                                        <div class="text">
                                            <p>
                                                {!! $article['description'] !!}
                                            </p>
                                        </div>
                                    </div><!-- /.block-inner -->
                                </article>
                            </div>
                        </div><!-- /.row -->
                    </div><!-- /#main -->
                </div>

                <div class="col-sm-4 col-md-3">
                    <div class="sidebar">
                        <div class="block block-shadow white block-margin">
                            <div class="block-inner">
                                <div class="block-title">
                                    <h3>{{trans('common.archive')}}</h3>
                                </div>
                                <!-- /.block-title -->
                                <ul class="archive">
                                    <li><span class="dot"></span><a href="{{action('UsersController@getMonthArticleList',array($year,1))}}">{{trans('common.january')}} {{$year}}</a></li>
                                    @if($month >= 2)
                                        <li><span class="dot"></span><a href="{{action('UsersController@getMonthArticleList',array($year,2))}}">{{trans('common.february')}} {{$year}}</a></li>
                                    @endif
                                    @if($month >= 3)
                                        <li><span class="dot"></span><a href="{{action('UsersController@getMonthArticleList',array($year,3))}}">{{trans('common.march')}} {{$year}}</a></li>
                                    @endif
                                    @if($month >= 4)
                                        <li><span class="dot"></span><a href="{{action('UsersController@getMonthArticleList',array($year,4))}}">{{trans('common.april')}} {{$year}}</a></li>
                                    @endif
                                    @if($month >= 5)
                                        <li><span class="dot"></span><a href="{{action('UsersController@getMonthArticleList',array($year,5))}}">{{trans('common.may')}} {{$year}}</a></li>
                                    @endif
                                    @if($month >= 6)
                                        <li><span class="dot"></span><a href="{{action('UsersController@getMonthArticleList',array($year,6))}}">{{trans('common.june')}} {{$year}}</a></li>
                                    @endif
                                    @if($month >= 7)
                                        <li><span class="dot"></span><a href="{{action('UsersController@getMonthArticleList',array($year,7))}}">{{trans('common.july')}} {{$year}}</a></li>
                                    @endif
                                    @if($month >= 8)
                                        <li><span class="dot"></span><a href="{{action('UsersController@getMonthArticleList',array($year,8))}}">{{trans('common.august')}} {{$year}}</a></li>
                                    @endif
                                    @if($month >= 9)
                                        <li><span class="dot"></span><a href="{{action('UsersController@getMonthArticleList',array($year,9))}}">{{trans('common.september')}} {{$year}}</a></li>
                                    @endif
                                    @if($month >= 10)
                                        <li><span class="dot"></span><a href="{{action('UsersController@getMonthArticleList',array($year,10))}}">{{trans('common.october')}} {{$year}}</a></li>
                                    @endif
                                    @if($month >= 11)
                                        <li><span class="dot"></span><a href="{{action('UsersController@getMonthArticleList',array($year,11))}}">{{trans('common.november')}} {{$year}}</a></li>
                                    @endif
                                    @if($month == 12)
                                        <li><span class="dot"></span><a href="{{action('UsersController@getMonthArticleList',array($year,12))}}">{{trans('common.december')}} {{$year}}</a></li>
                                    @endif
                                </ul><!-- /.categories -->
                            </div><!-- /.block-inner -->
                        </div><!-- /.block -->
                    </div>
                </div>
            </div><!-- /.row -->
        </div><!-- /.container -->
    </div><!-- /.section -->
</div><!-- /#content -->
@endsection

@section('scripts')
{!! HTML::script( asset('assets/user/plugins/js/jquery.min.js') ) !!} 

@endsection