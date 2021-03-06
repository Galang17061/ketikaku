@extends('layouts_frontend._main_frontend')

@section('extra_style')
<style type="text/css">
    .kuning{
      color: #ffd119;
      font-size: 14px;
    }
    .article .padding{
        padding: 10px 10px 50px !important;
    }
    .love i:before{
        font-size: 20px !important;
    }
    .love div{
        margin-top: 1px !important;
    }
</style>
@endsection

@section('content')
<section class="home">
            <div class="container">
                <div class="row">
                    <div class="col-md-9 col-sm-12 col-xs-12">
                        <div class="headline">
                           {{--  <div class="nav" id="headline-nav">
                                <a class="left carousel-control" role="button" data-slide="prev">
                                    <span class="ion-ios-arrow-left" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="right carousel-control" role="button" data-slide="next">
                                    <span class="ion-ios-arrow-right" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                            <div class="owl-carousel owl-theme" id="headline">                          
                                <div class="item">
                                    <a href="#"><div class="badge">Tip!</div> Vestibulum ante ipsum primis in faucibus orci</a>
                                </div>
                                <div class="item">
                                    <a href="#">Ut rutrum sodales mauris ut suscipit</a>
                                </div>
                            </div> --}}
                        </div>
                        <div class="owl-carousel owl-theme slide" id="featured">
                            <div class="item">
                                <article class="featured">
                                    <div class="overlay"></div>
                                    <figure>
                                        <img src="{{ asset('assets/images/banner/1.jpg') }}?{{ time() }}" alt="Sample Article">
                                    </figure>
                                   {{--  <div class="details">
                                        <div class="category"><a href="category.html">Welcome</a></div>
                                        <h1><a href="#">Selamat Datang Di KETIKAKU</a></h1>
                                        <div class="time">April 17, 2019</div>
                                    </div> --}}
                                </article>
                            </div>
                            <div class="item">
                                <article class="featured">
                                    <div class="overlay"></div>
                                    <figure>
                                        <img src="{{ asset('assets/images/banner/2.jpg') }}?{{ time() }}" alt="Sample Article">
                                    </figure>
                                    {{-- <div class="details">
                                        <div class="category"><a href="category.html">Travel</a></div>
                                        <h1><a href="#">Class aptent taciti sociosqu ad litora torquent per conubia nostra</a></h1>
                                        <div class="time">December 10, 2016</div>
                                    </div> --}}
                                </article>
                            </div>
                            <div class="item">
                                <article class="featured">
                                    <div class="overlay"></div>
                                    <figure>
                                        <img src="{{ asset('assets/images/banner/3.jpg') }}?{{ time() }}" alt="Sample Article">
                                    </figure>
                                    {{-- <div class="details">
                                        <div class="category"><a href="category.html">International</a></div>
                                        <h1><a href="#">Maecenas accumsan tortor ut velit pharetra mollis</a></h1>
                                        <div class="time">October 12, 2016</div>
                                    </div> --}}
                                </article>
                            </div>
                            <div class="item">
                                <article class="featured">
                                    <div class="overlay"></div>
                                    <figure>
                                        <img src="{{ asset('assets/images/banner/4.jpg') }}?{{ time() }}" alt="Sample Article">
                                    </figure>
                                    {{-- <div class="details">
                                        <div class="category"><a href="category.html">International</a></div>
                                        <h1><a href="#">Maecenas accumsan tortor ut velit pharetra mollis</a></h1>
                                        <div class="time">October 12, 2016</div>
                                    </div> --}}
                                </article>
                            </div>
                           {{--  <div class="item">
                                <article class="featured">
                                    <div class="overlay"></div>
                                    <figure>
                                        <img src="{{ asset('assets/images/news/img05.jpg') }}" alt="Sample Article">
                                    </figure>
                                    <div class="details">
                                        <div class="category"><a href="category.html">Lifestyle</a></div>
                                        <h1><a href="single.html">Mauris elementum libero at pharetra auctor Fusce ullamcorper elit</a></h1>
                                        <div class="time">November 27, 2016</div>
                                    </div>
                                </article>
                            </div> --}}
                        </div>
                        <div class="line">
                            <div>OFFICIAL</div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="row">
                                    @foreach ($data_official as $element)
                                    <article class="article col-md-3 col-xs-6">
                                        <div class="inner">
                                            <figure>
                                                <a href="{{ asset('/book/'.$element->dn_id.'/'.str_replace(" ","-",$element->dn_title)) }}">
                                                    @if ($element->dn_cover == null)
                                                        <img src="{{ asset('assets/images/noimage.jpg' ) }}?{{ time() }}" height="300px" alt="{{ $element->dn_title }}">
                                                    @else
                                                        <img src="{{ asset('storage/app/'.$element->dn_cover ) }}?{{ time() }}" height="300px" alt="{{ $element->dn_title }}">
                                                    @endif
                                                </a>
                                            </figure>
                                            <div class="padding">
                                                <h6 style="font-size: 12px"><a href="{{ asset('/book/'.$element->dn_id.'/'.str_replace(" ","-",$element->dn_title)) }}"><input type="text" readonly="" style="width: 100%;border: none;cursor: pointer;" value="{{ $element->dn_title }}" name=""></a></h6>
                                                <footer>
                                                    <span class="love active"><i class="ion-android-favorite"></i> <div class="liked">@if ($element->liked == null) 0 @else {{ $element->liked }} @endif</div></span>
                                                    <span class="love active"><i class="fas fa-users"></i> <div class="subscribed">@if ($element->subscribed == null) 0 @else {{ $element->subscribed }} @endif</div></span>
                                                    <span class="love active"><i class="fas fa-eye"></i> <div class="viewer">@if ($element->viewer == null) 0 @else 
                                                        @php
                                                        $n = $element->viewer;
                                                        $precision = 1; 
                                                        if ($n < 900) {
                                                            // 0 - 900
                                                            $n_format = number_format($n, $precision);
                                                            $suffix = '';
                                                        } else if ($n < 900000) {
                                                            // 0.9k-850k
                                                            $n_format = number_format($n / 1000, $precision);
                                                            $suffix = 'K';
                                                        } else if ($n < 900000000) {
                                                            // 0.9m-850m
                                                            $n_format = number_format($n / 1000000, $precision);
                                                            $suffix = 'M';
                                                        } else if ($n < 900000000000) {
                                                            // 0.9b-850b
                                                            $n_format = number_format($n / 1000000000, $precision);
                                                            $suffix = 'B';
                                                        } else {
                                                            // 0.9t+
                                                            $n_format = number_format($n / 1000000000000, $precision);
                                                            $suffix = 'T';
                                                        }

                                                        if ( $precision > 0 ) {
                                                            $dotzero = '.' . str_repeat( '0', $precision );
                                                            $n_format = str_replace( $dotzero, '', $n_format );
                                                        }
                                                        echo($n_format.$suffix);
                                                        @endphp
                                                        @endif</div></span>
                                                </footer>
                                            </div>
                                        </div>
                                    </article>
                                    @endforeach
                                    
                                </div>
                                @if (count($data_official) >= 8)
                                <div>
                                   <button class="btn btn-primary load_more_official"><i class="fas fa-arrow-right"></i>Load More</button>
                                </div>
                                @endif
                            </div>
                        </div>
                        <div class="line">
                            <div>POPULAR</div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="row">
                                    @foreach ($data_popular as $element)
                                    <article class="article col-md-3 col-xs-6">
                                        <div class="inner">
                                            <figure>
                                                <a href="{{ asset('/book/'.$element->dn_id.'/'.str_replace(" ","-",$element->dn_title)) }}">
                                                    @if ($element->dn_cover == null)
                                                        <img src="{{ asset('assets/images/noimage.jpg' ) }}?{{ time() }}" height="300px" alt="{{ $element->dn_title }}">
                                                    @else
                                                        <img src="{{ asset('storage/app/'.$element->dn_cover ) }}?{{ time() }}" height="300px" alt="{{ $element->dn_title }}">
                                                    @endif
                                                </a>
                                            </figure>
                                            <div class="padding">
                                                <h6 style="font-size: 12px"><a href="{{ asset('/book/'.$element->dn_id.'/'.str_replace(" ","-",$element->dn_title)) }}"><input type="text" readonly="" style="width: 100%;border: none;cursor: pointer;" value="{{ $element->dn_title }}" name=""></a></h6>
                                                <footer>
                                                    <span class="love active"><i class="ion-android-favorite"></i> <div>@if ($element->liked == null) 0 @else {{ $element->liked }} @endif</div></span>
                                                    <span class="love active"><i class="fas fa-users"></i> <div>@if ($element->liked == null) 0 @else {{ $element->subscribed }} @endif</div></span>
                                                    <span class="love active"><i class="fas fa-eye"></i> <div>@if ($element->liked == null) 0 @else {{ $element->viewer }} @endif</div></span>
                                                </footer>
                                            </div>
                                        </div>
                                    </article>
                                    @endforeach
                                </div>
                                @if (count($data_popular) >= 8)
                                <div>
                                   <button class="btn btn-primary load_more_popular"><i class="fas fa-arrow-right"></i>Load More</button>
                                </div>
                                @endif
                            </div>
                        </div>
                        <div class="line">
                            <div>LIKE</div>
                        </div>
                          <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="row">
                                    @foreach ($data_like as $element)
                                    <article class="article col-md-3 col-xs-6">
                                        <div class="inner">
                                            <figure>
                                                <a href="{{ asset('/book/'.$element->dn_id.'/'.str_replace(" ","-",$element->dn_title)) }}">
                                                    @if ($element->dn_cover == null)
                                                        <img src="{{ asset('assets/images/noimage.jpg' ) }}?{{ time() }}" height="300px" alt="{{ $element->dn_title }}">
                                                    @else
                                                        <img src="{{ asset('storage/app/'.$element->dn_cover ) }}?{{ time() }}" height="300px" alt="{{ $element->dn_title }}">
                                                    @endif
                                                </a>
                                            </figure>
                                            <div class="padding">
                                                <h6 style="font-size: 12px"><a href="{{ asset('/book/'.$element->dn_id.'/'.str_replace(" ","-",$element->dn_title)) }}">{{-- {{ substr(strip_tags($element->dn_title), 0,25) }}{{ strlen($element->dn_title) > 2 ?  ".." : "" }} --}}<input type="text" style="width: 100%;border: none;cursor: pointer;" value="{{ $element->dn_title }}" name=""></a></h6>
                                                <footer>
                                                    <span class="love active"><i class="ion-android-favorite"></i> <div class="liked">@if ($element->liked == null) 0 @else {{ $element->liked }} @endif</div></span>
                                                    <span class="love active"><i class="fas fa-users"></i> <div class="subscribed">@if ($element->subscribed == null) 0 @else {{ $element->subscribed }} @endif</div></span>
                                                    <span class="love active"><i class="fas fa-eye"></i> <div class="viewer">@if ($element->viewer == null) 0 @else {{ $element->viewer }} @endif</div></span>
                                                </footer>
                                            </div>
                                        </div>
                                    </article>
                                    @endforeach
                                </div>
                                @if (count($data_like) >= 8)
                                <div>
                                   <button class="btn btn-primary load_more_like"><i class="fas fa-arrow-right"></i>Load More</button>
                                </div>
                                @endif
                            </div>
                        <div class="line">
                            <div>LATEST</div>
                        </div>
                          <div>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="row">
                                    @foreach ($data_latest as $element)
                                    <article class="article col-md-3 col-xs-6">
                                        <div class="inner">
                                            <figure>
                                                <a href="{{ asset('/book/'.$element->dn_id.'/'.str_replace(" ","-",$element->dn_title)) }}">
                                                    @if ($element->dn_cover == null)
                                                        <img src="{{ asset('assets/images/noimage.jpg' ) }}?{{ time() }}" height="300px" alt="{{ $element->dn_title }}">
                                                    @else
                                                        <img src="{{ asset('storage/app/'.$element->dn_cover ) }}?{{ time() }}" height="300px" alt="{{ $element->dn_title }}">
                                                    @endif
                                                </a>
                                            </figure>
                                            <div class="padding">
                                                <h6 style="font-size: 12px"><a href="{{ asset('/book/'.$element->dn_id.'/'.str_replace(" ","-",$element->dn_title)) }}">{{-- {{ substr(strip_tags($element->dn_title), 0,25) }}{{ strlen($element->dn_title) > 2 ?  ".." : "" }} --}}<input type="text" style="width: 100%;border: none;cursor: pointer;" value="{{ $element->dn_title }}" name=""></a></h6>
                                                <footer>
                                                    <span class="love active"><i class="ion-android-favorite"></i> <div class="liked">@if ($element->liked == null) 0 @else {{ $element->liked }} @endif</div></span>
                                                    <span class="love active"><i class="fas fa-users"></i> <div class="subscribed">@if ($element->subscribed == null) 0 @else {{ $element->subscribed }} @endif</div></span>
                                                    <span class="love active"><i class="fas fa-eye"></i> <div class="viewer">@if ($element->viewer == null) 0 @else {{ $element->viewer }} @endif</div></span>
                                                </footer>
                                            </div>
                                        </div>
                                    </article>
                                    @endforeach
                                </div>
                                @if (count($data_latest) >= 8)
                                <div>
                                   <button class="btn btn-primary load_more_latest"><i class="fas fa-arrow-right"></i>Load More</button>
                                </div>
                                @endif
                            </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-6 col-md-3 sidebar" id="sidebar">
                        <div class="sidebar-title for-tablet">Sidebar</div>
                        
                        <aside>
                            <ul class="nav nav-tabs nav-justified" role="tablist">
                                <li class="active">
                                    <a href="#popular_writter" aria-controls="popular_writter" role="tab" data-toggle="tab">
                                        {{-- <i class="ion-android-star-outline"></i> --}} Popular Writer
                                    </a>
                                </li>
                                {{-- <li>
                                    <a href="#active_writter" aria-controls="active_writter" role="tab" data-toggle="tab">
                                        <i class="ion-ios-chatboxes-outline"></i> Active Writer
                                    </a>
                                </li> --}}
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="popular_writter">
                                    @foreach ($popular_writter as $index => $element)
                                        @if ($index == 0)
                                        <article class="article-fw">
                                            <div class="inner">
                                                <figure style="margin-left: 30px" >
                                                    <a href="{{ route('profile_frontend',['name'=>$popular_writter[0]->m_username]) }}">
                                                        @if ($popular_writter[0]->m_image == null)
                                                            <img style=" border-radius: 50%;height: 150px; width: 150px;" src="{{ asset('assets_backend/images/no_image.png') }}?{{ time() }}" />
                                                        @else
                                                            <img style=" border-radius: 50%;height: 150px; width: 150px;" src="{{ asset('/storage/app/'.$popular_writter[0]->m_image) }}?{{ time() }}" />
                                                        @endif
                                                    </a>
                                                </figure>
                                                <div class="details">
                                                    <div class="detail">
                                                        <div class="time">
                                                            @if ($popular_writter[0]->subscriber == null) 0 Subscriber 
                                                            @else {{ $popular_writter[0]->subscriber }} Subscriber @endif
                                                        </div>
                                                        {{-- <div class="category"><a href="category.html">Sport</a></div> --}}
                                                    </div>
                                                    <h1><a href="{{ route('profile_frontend',['name'=>$popular_writter[0]->m_username]) }}">{{ $popular_writter[0]->m_username }}</a></h1>
                                                    <p>
                                                        {{ $popular_writter[0]->m_desc_short }} 
                                                    </p>
                                                </div>
                                            </div>
                                        </article>
                                        <hr>
                                        {{-- <div class="line"></div> --}}
                                        @else
                                            <article class="article-mini">
                                                <div class="inner" style="width: 100%">
                                                    <figure >
                                                        <a href="{{ route('profile_frontend',['name'=>$popular_writter[$index]->m_username]) }}">
                                                            @if ($popular_writter[$index]->m_image == null)
                                                                <img style=" border-radius: 50%;height: 50px; width: 50px;" src="{{ asset('assets_backend/images/no_image.png') }}?{{ time() }}" />
                                                            @else
                                                                <img style=" border-radius: 50%;height: 50px; width: 50px;" src="{{ asset('/storage/app/'.$popular_writter[$index]->m_image) }}?{{ time() }}" />
                                                            @endif
                                                        </a>
                                                    </figure>
                                                    <div  style="margin-left: 55px" class="padding">
                                                        <h1 style="margin-top: 2px;"><a href="{{ route('profile_frontend',['name'=>$popular_writter[$index]->m_username]) }}">{{ $popular_writter[$index]->m_username }}</a></h1>
                                                        <div class="detail">
                                                            {{-- <div class="category"><a href="category.html">Lifestyle</a></div> --}}
                                                        <div class="time">
                                                            @if ($popular_writter[$index]->subscriber == null) 0 Subscriber 
                                                            @else {{ $popular_writter[$index]->subscriber }} Subscriber @endif
                                                        </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </article>
                                        @endif
                                    @endforeach
                                    </div>
                                </div>
                        </aside>


                        <aside>
                            <ul class="nav nav-tabs nav-justified" role="tablist">
                                <li class="active">
                                    <a href="#review" aria-controls="review" role="tab" data-toggle="tab">
                                        <i class="ion-android-star-outline"></i> Review
                                    </a>
                                </li>
                                <li>
                                    <a href="#comments" aria-controls="comments" role="tab" data-toggle="tab">
                                        <i class="ion-ios-chatboxes-outline"></i> Comments
                                    </a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active comments" id="review">
                                    <div class="comment-list sm">
                                        @foreach ($review as $element)
                                        <div class="item">
                                            <div class="user">                                
                                                <figure>
                                                    @if ($element->m_image != null)
                                                        <img src="{{ asset('/storage/app/'.$element->m_image) }}?{{ time() }}">
                                                    @else
                                                        <img src="{{ asset('assets_backend/images/no_image.png') }}?{{ time() }}" >
                                                    @endif
                                                </figure>
                                                <div class="details">
                                                    <h5 class="name">{{ $element->m_username }}
                                                        
                                                    </h5>
                                                    <p>
                                                        @if ($element->dr_rate == 1)
                                                            <i class="fas fa-star kuning"></i>
                                                            <i class="far fa-star kuning"></i>
                                                            <i class="far fa-star kuning"></i>
                                                            <i class="far fa-star kuning"></i>
                                                            <i class="far fa-star kuning"></i>
                                                        @elseif ($element->dr_rate == 2)
                                                            <i class="fas fa-star kuning"></i>
                                                            <i class="fas fa-star kuning"></i>
                                                            <i class="far fa-star kuning"></i>
                                                            <i class="far fa-star kuning"></i>
                                                            <i class="far fa-star kuning"></i>
                                                        @elseif ($element->dr_rate == 3)
                                                            <i class="fas fa-star kuning"></i>
                                                            <i class="fas fa-star kuning"></i>
                                                            <i class="fas fa-star kuning"></i>
                                                            <i class="far fa-star kuning"></i>
                                                            <i class="far fa-star kuning"></i>
                                                        @elseif ($element->dr_rate == 4)
                                                            <i class="fas fa-star kuning"></i>
                                                            <i class="fas fa-star kuning"></i>
                                                            <i class="fas fa-star kuning"></i>
                                                            <i class="fas fa-star kuning"></i>
                                                            <i class="far fa-star kuning"></i>
                                                        @elseif ($element->dr_rate == 5)
                                                            <i class="fas fa-star kuning"></i>
                                                            <i class="fas fa-star kuning"></i>
                                                            <i class="fas fa-star kuning"></i>
                                                            <i class="fas fa-star kuning"></i>
                                                            <i class="fas fa-star kuning"></i>
                                                        @endif
                                                    </p>
                                                    <div class="time">{{ date('d F Y',strtotime($element->dr_created_at)) }} <small>{{ date('h:i A',strtotime($element->dr_created_at)) }}</small></div>
                                                    <div class="description">
                                                        {{ $element->dr_message }}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="tab-pane comments" id="comments">
                                    <div class="comment-list sm">
                                        <div class="item">
                                            <div class="user">                                
                                                <figure>
                                                    <img src="{{ asset('assets/images/img01.jpg"') }} alt="User Picture">
                                                </figure>
                                                <div class="details">
                                                    <h5 class="name">Mark Otto</h5>
                                                    <div class="time">24 Hours</div>
                                                    <div class="description">
                                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </aside>


                        <aside>
                            <div class="aside-body">
                                <ul class="nav nav-tabs nav-justified" role="tablist">
                                <li class="active">
                                    <a href="#popular_writter" aria-controls="popular_writter" role="tab" data-toggle="tab">
                                        <i class="ion-android-star-outline"></i> Category
                                    </a>
                                </li>
                                
                            </ul>
                                <div class="tab-pane active comments" style="padding-top: 0px !important" id="review">
                                    
                                    {{-- <span class="badge badge-primary">Primary</span> --}}
                                    
                                        <h4>@foreach ($category_list as $element)<span class="badge badge-default">{{ $element->mc_name }}</span>&nbsp;@endforeach</h4>
                                    
                                </div>
                            </div>
                        </aside>
                        
                    </div>
        </div>
    </div>

        </section>
@endsection

@section('extra_scripts')

<!-- Global site tag (gtag.js) - Google Analytics -->

<script type="text/javascript">
    
    
    function link(response, urlPath) {
        // window.location.assign('www.esensicreative.com');
        // function processAjaxData(response, urlPath){

     // document.getElementById("content").innerHTML = response.html;
     // document.title = response.pageTitle;

 // }
    }
    // $(function(){
    //   $(window).scroll(function(){
    //     var aTop = 1;
    //     if($(this).scrollTop()>=aTop){
    //     window.history.pushState({"html":'gege',"pageTitle":'title'},"", 'gggg');
    //     }else{
    //     window.history.pushState({"html":'gege',"pageTitle":'title'},"", 'sssss');
            
    //     }
    //   });
    // });

    var owl = $('.owl-carousel');
    owl.owlCarousel({
        items:1,
        loop:true,
        // margin:10,
        autoplay:true,
        autoplayHoverPause:false
        // autoplayTimeout:200,
    });

    if (parseInt($('.viewer').text()) > 1) {
        var char = $('.viewer').text();
        console.log(char);
        console.log(char.charAt(0));
    }

    if ($(window).width() < 500) {
       $('.ion-android-favorite').css('padding-left','0px');
       $('.fa-users').css('padding-left','9px');
       $('.fa-eye').css('padding-left','9px');
    }
    else {
       $('.ion-android-favorite').css('padding-left','13px');
       $('.fa-users').css('padding-left','13px');
       $('.fa-eye').css('padding-left','13px');
    }

    $('.load_more_official').click(function(argument){
        window.location.href = baseUrl + '/novel_load_more/'+'official';
    })
    $('.load_more_popular').click(function(argument){
        window.location.href = baseUrl + '/novel_load_more/'+'popular';
    })
    $('.load_more_like').click(function(argument){
        window.location.href = baseUrl + '/novel_load_more/'+'like';
    })
    $('.load_more_latest').click(function(argument){
        window.location.href = baseUrl + '/novel_load_more/'+'latest';
    })
    

</script>


@endsection
