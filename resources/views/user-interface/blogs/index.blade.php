@extends('user-interface.layout')
@section('title' , $page_content->section_first[3]->content)
@section('content')
    <div class="dashboard blogs">
        <div class="section-1">
            <div class="mx-1254 clearfix">
                <div class="breadcrumbs">
                    <ul>
                        <li><a href="{!!URL('/')!!}">Home</a></li>
                        <li><span>news</span></li>
                    </ul>
                </div>
                <div class="header-title text-center">
                    <div class="bg">
                        {!! $page_content->section_first[0]->content !!}
                    </div>
                    <h1>{!! $page_content->section_first[1]->content !!}</h1>
                    <h2>{!! $page_content->section_first[2]->content !!}</h2>
                </div>
                <div class="dashboard-container clearfix">
                    <div class="col-md-9">
                        <div class="blog-listing">
                            @foreach($blog as $key => $value)
                                <?php $blog_data = App\Models\Blog\Blog::getData($value->id); ?>
                                <div class="single-blog {!! $key == 0 ? 'front-page clearfix' : '' !!}">
                                    <div class="img-holder">
                                        <a href="{!!URL('news/'.$blog_data->self_data->seo_url)!!}">
                                            <img src="{!!asset($blog_data->self_data->picture_custom_size)!!}">
                                        </a>
                                    </div>
                                    <div class="blog-details">
                                        <div class="{!! $key == 0 ? 'center-div center_div' : '' !!}">
                                            <a href="{!!URL('news/'.$blog_data->self_data->seo_url)!!}">
                                                {{ $blog_data->self_data->title }}
                                            </a>
                                            <p>Posted {!! $blog_data->time_duration !!}</p>
                                            <a href="{!!URL('news/'.$blog_data->self_data->seo_url)!!}" class="readmore">Read More</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="text-right">
                            <!-- <ul class="pagination">
                                <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" href="#">Next</a></li>
                            </ul> -->
                            {!! $blog->appends(Request::input())->render() !!}
                        </div>
                    </div>
                    @if(count($categories))
                        <div class="col-md-3">
                            <div class="page-sidebar blog-sidebar">
                                <h3>Categories</h3>
                                <ul>
                                    <li class="{!! Request::input('category') == NULL ? 'active' : '' !!}">
                                        <a href="{!!URL('news')!!}">All</a>
                                    </li>
                                    @foreach($categories as $value)
                                        <li class="{!! Request::input('category') == $value->seo_url ? 'active' : '' !!}">
                                            <a href="{!!URL('news?category='.$value->seo_url)!!}">{!! $value->name !!}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@stop