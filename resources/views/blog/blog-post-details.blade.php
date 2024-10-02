@extends('blog.components.base')
@section('title', 'Patrick Solutions | Blog Post Details')
@section('blog-active', 'active')
@section('content')

<section>
     <div class="container">
          <h2>{{ $blog->blog_title}}</h2>

          <p class="lead">
               <i class="fa fa-user"></i> {{$blog->blog_author}} &nbsp;&nbsp;&nbsp;
               <i class="fa fa-calendar"></i> {{$blog->created_at}} 10:30 &nbsp;&nbsp;&nbsp;
               <i class="fa fa-eye"></i> {{$blog->blog_view}}
          </p>

          <img src="{{asset('storage/'.$blog->blog_thumbnail) }}" width="100%" style="cover" height="500px" class="img-fluid"alt="">

          {!! $blog->blog_content !!}
          <div class="row">
               <div class="col-md-4 col-xs-12 pull-right">
                    <h4>Social share</h4>

                    <p>
                         <a href="#" target="_blank"><i class="fa fa-facebook"></i></a> &nbsp;&nbsp;&nbsp;

                         <a href="#" target="_blank"><i class="fa fa-twitter"></i></a> &nbsp;&nbsp;&nbsp;

                         <a href="#" target="_blank"><i class="fa fa-linkedin"></i></a>
                    </p>

                    <br>


                    <h4>Other posts</h4>

                    <ul class="list">
                         <li><a href="blog-post-details.html">Lorem ipsum dolor sit amet, consectetur adipisicing.</a></li>
                         <li><a href="blog-post-details.html">Et animi voluptatem, assumenda enim, consectetur quaerat!</a></li>
                         <li><a href="blog-post-details.html">Ducimus magni eveniet sit doloremque molestiae alias mollitia vitae.</a></li>
                    </ul>
               </div>

               <div class="col-md-8 col-xs-12">
                    <h4>Comments</h4>

                    <p>No comments found.</p>

                    <br>
                    
                    <h4>Leave a Comment</h4>

                    <form action="#" class="form">

                         <div class="row">
                              <div class="col-sm-6 col-xs-6">
                                   <div class="form-group">
                                        <label class="control-label">Name</label>

                                        <input type="text" name="name" class="form-control">
                                   </div>
                              </div>

                              <div class="col-sm-6 col-xs-6">
                                   <div class="form-group">
                                        <label class="control-label">Email</label>

                                        <input type="email" name="email" class="form-control">
                                   </div>
                              </div>
                         </div>

                         <div class="form-group">
                              <label class="control-label">Message</label>

                              <textarea name="comment" class="form-control" rows="10" autocomplete="off"></textarea>
                         </div>

                         <button type="submit" class="section-btn btn btn-primary">Submit</button>
                    </form>
               </div>
          </div>
     </div>
</section>

@endsection

