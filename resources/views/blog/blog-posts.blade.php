@extends('blog.components.base')
@section('title', 'Patrick Solutions | Blog Post')
@section('blog-active', 'active')
@section('content')

<section>
     <div class="container">
          <div class="text-center">
               <h1>Our Blog</h1>

               <br>

               <p class="lead">Read through some of the intresting topics on financial freedom from Patrik Barfi</p>
          </div>
     </div>
</section>

<section class="section-background">
     <div class="container">
          <div class="row">
               <div class="col-lg-3 pull-right col-xs-12">
                    <div class="form">
                         <form action="#">
                              <div class="form-group">
                                   <label class="control-label">Blog Search</label>

                                   <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Search for...">
                                        <span class="input-group-btn">
                                             <button class="btn btn-default" type="button">Go!</button>
                                        </span>
                                   </div>
                              </div>
                         </form>
                    </div>

                    <br>

                    <label class="control-label">Lorem ipsum dolor sit amet</label>

                    <ul class="list">
                         @foreach($blogs as $blog)
                         <li><a href="{{ route('blog-details', $blog->id)}}">{{$blog->blog_title}}</a></li>
                         @endforeach
                    </ul>
               </div>

               <div class="col-lg-9 col-xs-12">
                    <div class="row">

                         {{-- the for Loop --}}
                         @foreach($blogs as $blog)
                         <div class="col-sm-6">
                              <div class="courses-thumb courses-thumb-secondary">
                                   <div class="courses-top">
                                        <div class="courses-image">
                                             <img src="{{asset('storage/'.$blog->blog_thumbnail) }}" class="img-responsive" alt="">
                                        </div>
                                        <div class="courses-date">
                                             <span title="Author"><i class="fa fa-user"></i> {{$blog->blog_author}}</span>
                                             <span title="Date"><i class="fa fa-calendar"></i> {{$blog->created_at}}</span> 
                                             <span title="Views"><i class="fa fa-eye"></i> {{$blog->blog_view}}</span>
                                        </div>
                                   </div>

                                   <div class="courses-detail">
                                        <h3><a href="{{ route('blog-details', $blog->id)}}">{{$blog->blog_title}}</a></h3>
                                   </div>

                                   <div class="courses-info">
                                        <a href="{{ route('blog-details', $blog->id)}}" class="section-btn btn btn-primary btn-block">Read More</a>
                                   </div>
                              </div>
                         </div>
                         @endforeach
                         {{-- the for Loop --}}
                         
                         {{-- <div class="col-sm-6">
                              <div class="courses-thumb courses-thumb-secondary">
                                   <div class="courses-top">
                                        <div class="courses-image">
                                             <img src="images/product-6-720x480.jpg" class="img-responsive" alt="">
                                        </div>
                                        <div class="courses-date">
                                             <span title="Author"><i class="fa fa-user"></i> John Doe</span>
                                             <span title="Date"><i class="fa fa-calendar"></i> 12/06/2020 10:30</span>
                                             <span title="Views"><i class="fa fa-eye"></i> 114</span>
                                        </div>
                                   </div>

                                   <div class="courses-detail">
                                        <h3><a href="blog-post-details.html">A voluptas ratione, error provident distinctio, eaque id officia?</a></h3>
                                   </div>

                                   <div class="courses-info">
                                        <a href="blog-post-details.html" class="section-btn btn btn-primary btn-block">Read More</a>
                                   </div>
                              </div>
                         </div> --}}
                    </div>
               </div>
          </div>
     </div>
</section>

@endsection