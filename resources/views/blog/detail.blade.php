<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <title>Budinir - Profesional blog and articles</title>
    @include('layouts.header')
</head>

<body class="home-page-1">
    <div class="scroll-progress bg-grey-900"></div>
    <!-- Start Preloader -->
    <div class="preloader text-center">
        <div class="loader"></div>
    </div>
    @include('layouts.navbar')
    <div class="bg-square"></div>
    @include('layouts.search')
    <!-- Start Main content -->
    <main>
        <div class="container single-content">
            <div class="entry-header entry-header-style-1 mb-50 pt-50">
                <div class="post-meta-1 mb-20">
                    @php
                    $tags = explode(',', $Form->tags);
                    @endphp
                    @foreach ($tags as $tag)
                    <a href="{{ route('search.tag', $tag) }}" class="tag-category bg-brand-1 shadown-1 text-white button-shadow hover-up-3">{{ $tag }}</a>
                    @endforeach
                    <span class="post-date text-muted font-md">{{ $Form->time }}</span>
                </div>
                <h1 class="entry-title mb-50 fw-700">
                    {{ $Form->title }}
                </h1>
                <div class="row align-self-center">
                    <div class="col-md-6 text-right d-none d-md-inline">
                        <div class="single-social-share clearfix wow fadeIn animated font-sm">
                            <div class="entry-meta meta-1 font-small color-grey float-left mt-10">
                                <span class="hit-count mr-15"><i class="elegant-icon icon_comment_alt mr-5"></i>{{ $Form->comment->count() }} komentar</span>
                                <span class="hit-count mr-15"><i class="elegant-icon icon_like mr-5"></i>{{ $Form->likes->count() }} suka</span>
                                <span class="hit-count"><i class="elegant-icon icon_star-half_alt mr-5"></i>{{ $Form->views }} dilihat</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end single header-->
            <figure class="image mb-30 m-auto text-center border-radius-10 hover-up-3">
                <img class="border-radius-10" src={{ asset('assets/photo/' . $Form->photo) }} alt="{{ $Form->title }}" />
            </figure>
            <!--figure-->
            <article class="entry-wraper mb-50">
                <div class="excerpt mb-30">
                    <p>{!! $Form->description !!}</p>
                </div>
                <div class="entry-bottom mt-50 mb-30 wow fadeIn animated">
                    <div class="tags w-50 w-sm-100">
                        <h5 class="mb-15">Tags: </h5>
                        @php
                            $tags = explode(',', $Form->tags);
                        @endphp
                        @foreach ($tags as $tag)
                            <a href="{{ route('search.tag', $tag) }}" class="tag-category bg-brand-1 shadown-1 text-white button-shadow hover-up-3">{{ $tag }}</a>
                        @endforeach
                    </div>
                    <div class="single-social-share clearfix wow fadeIn animated mb-15 w-50 w-sm-100">
                        <ul class="header-social-network d-inline-block list-inline float-md-right mt-md-0 mt-4">
                            <li class="list-inline-item text-muted"><span>Share this: </span></li>
                            <li class="list-inline-item"><a class="social-icon fb text-xs-center" target="_blank" href="#"><i class="elegant-icon social_facebook"></i></a></li>
                            <li class="list-inline-item"><a class="social-icon tw text-xs-center" target="_blank" href="#"><i class="elegant-icon social_twitter "></i></a></li>
                            <li class="list-inline-item"><a class="social-icon pt text-xs-center" target="_blank" href="#"><i class="elegant-icon social_pinterest "></i></a></li>
                            <li class="list-inline-item">
                                <form action="{{ route('likes.store', $Form->slug) }}" method="POST" class="d-inline">
                                    @csrf
                                    <button type="submit" class="social-icon pt text-xs-center" style="padding: 5px 8px; border-radius: 5px; cursor: pointer; {{ $liked ? 'color: red;' : '' }}">
                                        <i class="elegant-icon icon_like"></i> {{ $liked ? 'Unlike' : 'Like' }}
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
                <!--Comments-->
                <div class="comments-area wow fadeIn animated">
                    <div class="widget-header-2 position-relative mb-30">
                        <h3 class="mt-5 mb-30 font-heading">Comments</h3>
                    </div>
                    @foreach ($Form->comment as $comment)
                    <div class="comment-list wow fadeIn animated">
                            <div class="single-comment justify-content-between d-flex">
                                <div class="user justify-content-between d-flex">
                                    <div class="thumb">
                                        <img src="assets/imgs/authors/author-4.jpg" alt="">
                                    </div>
                                    <div class="desc">
                                        <p class="comment">{{ $comment->comment }}</p>
                                        <div class="d-flex justify-content-between">
                                            <div class="d-flex align-items-center" style="margin-right: 30px">
                                                <h5>
                                                    <a href="#">{{ $comment->user->name }}</a>
                                                </h5>
                                                <p class="date">{{ $comment->created_at->diffForHumans() }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                </div>
                <!--comment form-->
                <div class="comment-form wow fadeIn animated pb-35">
                    <div class="widget-header-2 position-relative mb-30">
                        <h3 class="mt-5 mb-30 font-heading">Leave a Reply</h3>
                    </div>
                    <form class="form-contact comment_form" action="{{ route('comments.store', $Form->slug) }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <textarea class="form-control w-100" name="comment" id="comment" cols="30" rows="9" placeholder="Write Comment" required></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-lg bg-dark text-white d-inline-block">Post Comment</button>
                        </div>
                    </form>
                </div>
                <!--More posts-->
                {{-- <div class="single-more-articles border-radius-10">
                    <div class="widget-header-2 position-relative mb-30">
                        <h5 class="mb-30 font-heading">Related posts</h5>
                        <button class="single-more-articles-close"><i class="elegant-icon icon_close"></i></button>
                    </div>
                    <div class="post-block-list post-module-1">
                        <ul class="list-post">
                            @foreach($form2 as $article)
                            <li class="mb-30 wow fadeInUp  animated">
                                <div class="d-flex transition-normal">
                                    <div class="post-thumb post-thumb-88 d-flex mr-15 border-radius-5 img-hover-scale overflow-hidden">
                                        <a class="color-white" href="{{ route('comments.store', $Form->slug) }}">
                                            <img src="{{ asset('assets/photo/' . $Form->photo) }}" alt="">
                                        </a>
                                    </div>
                                    <div class="post-content media-body">
                                        <h5 class="post-title mb-15 text-limit-2-row font-medium"><a href="{{ route('comments.store', $Form->slug) }}">{{ $article->title }}</a></h5>
                                        <div class="entry-meta meta-1 float-left font-x-small text-uppercase">
                                            <span class="post-on">{{ $article->created_at->format('d M Y') }}</span>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div> --}}
            </article>
        </div>
        <!--container-->
    </main>
    <!-- End Main content -->
    <!-- End Main content -->
    <!--end site-bottom-->
    @include('layouts.footer')
    <div class="dark-mark"></div>
    @include('layouts.script')
</body>

</html>
