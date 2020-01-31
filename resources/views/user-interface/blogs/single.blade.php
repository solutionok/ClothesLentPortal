@extends('user-interface.layout')
@section('title' , $page_content->section_first[3]->content . ' - ' . $blog_data->self_data->title)
@section('content')
    <div class="dashboard blogs">
        <div class="section-1">
            <div class="mx-1254 clearfix">
                <div class="breadcrumbs">
                    <ul>
                        <li><a href="{!!URL('/')!!}">Home</a></li>
                        <li><a href="{!!URL('news')!!}">Blogs</a></li>
                        <li><span>{{$blog_data->self_data->title}}</span></li>
                    </ul>
                </div>
                <div class="header-title text-center">
                    <div class="bg">
                        {{$page_content->section_second[0]->content}}
                    </div>
                    <h1>{{$page_content->section_second[1]->content}} </h1>
                    <h2>{{$page_content->section_second[2]->content}}</h2>
                </div>
                <div class="dashboard-container clearfix">
                    <div class="col-md-9">
                        <div class="blog-listing">
                            <div class="blog-content clearfix">
                                <div class="blog-title">
                                    <h4>{{$blog_data->self_data->title}}</h4>
                                    <p>{{$blog_data->time_duration}}</p>
                                </div>
                                <div class="img-holder">
                                    <img src="{!!asset($blog_data->self_data->picture)!!}">
                                </div>
                                <p>{!!$blog_data->self_data->description!!}</p>
                            </div>
                            @if(count($related_blogs))
                                <div class="related-blog">
                                    <h2>Related Blogs</h2>
                                    @foreach($related_blogs as $value)
                                        <?php $blog_data = App\Models\Blog\Blog::getData($value->id); ?>
                                        <div class="single-blog">
                                            <div class="img-holder">
                                                <a href="{!!URL('news/'.$blog_data->self_data->seo_url)!!}">
                                                    <img src="{!!asset($blog_data->self_data->picture_custom_size)!!}">
                                                </a>
                                            </div>
                                            <div class="blog-details">
                                                <a href="{!!URL('news/'.$blog_data->self_data->seo_url)!!}">
                                                    {{ $blog_data->self_data->title }}
                                                </a>
                                                <p>Posted November 2016 | 3:45PM</p>
                                                <a href="{!!URL('news/'.$blog_data->self_data->seo_url)!!}" class="readmore">
                                                    Read More
                                                </a>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    </div>
                    @if(count($recent_post))
                        <div class="col-md-3">
                            <div class="page-sidebar blog-sidebar">
                                <h3>Recent Blogs</h3>
                                <ul>
                                    @foreach($recent_post as $value)
                                        <?php $blog_data = App\Models\Blog\Blog::getData($value->id); ?>
                                        <li>
                                            <a href="{!!URL('news/'.$blog_data->self_data->seo_url)!!}">
                                                {{ $blog_data->self_data->title }}
                                            </a>
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