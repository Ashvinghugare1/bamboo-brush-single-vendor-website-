<!DOCTYPE html>
<html>
   <head>
      <!-- Basic -->
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <!-- Mobile Metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <!-- Site Metas -->
      <meta name="keywords" content="" />
      <meta name="description" content="" />
      <meta name="author" content="" />
      <link rel="shortcut icon" href="images/favicon.png" type="">
      <title>Famms - Fashion HTML Template</title>
      <!-- bootstrap core css -->
      <link rel="stylesheet" type="text/css" href="{{asset('home/css/bootstrap.css')}}" />
      <!-- font awesome style -->
      <link href="{{asset('home/css/font-awesome.min.css')}}" rel="stylesheet" />
      <!-- Custom styles for this template -->
      <link href="{{asset('home/css/style.css')}}" rel="stylesheet" />
      <!-- responsive style -->
      <link href="{{asset('home/css/responsive.css')}}" rel="stylesheet" />
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
   </head>
   <body>
      <div class="hero_area">
         <!-- header section strats -->
         @include('home.header')
         <!-- end header section -->
         <!-- slider section -->
        @include('home.slider')
         <!-- end slider section -->
      </div>
      <!-- why section -->
      @include('home.why')
      <!-- end why section -->
      
      <!-- arrival section -->
     @include('home.new_arrival')
      <!-- end arrival section -->
      
      <!-- product section -->
      @include('home.product')
      <!-- end product section -->

      <!-- comment and reply system start -->
      <section style="background-color:#d4ced0;">
         <div class="container my-5 py-5">
            <div class="row d-flex justify-content-center">
               <div class="col-md-12 col-lg-10 col-xl-8">
               <div class="card">
                  <div class="card-body">
                     
                  <div class="card-footer py-3 border-0" style="background-color: #f8f9fa;">
                     <form action="{{route('add-comment')}}" method="post">
                        @csrf
                        <div class="d-flex flex-start w-100">
                           <div class="form-outline w-100" >
                              <textarea class="form-control" id="textAreaExample" rows="4"
                                 style="background: #fff;" name="comment" placeholder="Comment Here .."></textarea>
                           </div>
                           </div>
                              <div class="float-end mt-2 pt-1">
                              <input type="submit" class="btn btn-primary btn-sm" value="Post comment">
                              <button type="button" class="btn btn-outline-primary btn-sm">Cancel</button>
                           </div>
                        </div>
                     </form>
                     @isset($comment)
                     @foreach($comment as $comment)
                     <div class="d-flex flex-start align-items-center mt-4">
                        <img class="rounded-circle shadow-1-strong me-3"
                           src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(19).webp" alt="avatar" width="50"
                           height="50" />
                        <div>
                           <h6 class="fw-bold text-primary ml-2 mb-1">{{$comment->name}}</h6>
                           <p class="text-muted small mb-0 ml-2">
                           {{$comment->created_at}}
                           </p>
                        </div>
                     </div>
                   
                        <p class="mt-3 mb-4 pb-2">
                       {{$comment->comment}}
                        </p>
                        <a type="submit" href="javascript::void(0);" onclick="reply(this)" data-Commentid="{{$comment->id}}">Reply</a>
                        @isset($reply)
                        @foreach($reply as $reply)
                        @if($reply->comment_id==$comment->id)
                        <div>
                        <h6 class="fw-bold text-primary ml-2 mb-1">{{$reply->name}}</h6>
                           <p class="text-muted small mb-0 ml-2">
                           {{$reply->created_at}}
                           </p>
                           <p class="mt-3 mb-4 pb-2">
                       {{$reply->reply}}
                        </p>
                        </div>
                        @endif
                        @endforeach
                        @endisset

                        @endforeach
                        @endisset
                     <div class="small d-flex justify-content-start" >
                        <form action="{{route('add-reply')}}" method="post">
                           @csrf
                           <a href="#!" style="display:none;" class=" align-items-center me-3 replyDiv">
                              <i class="far fa-comment-dots me-2"></i>
                              <input type="text" name="commentId" id="commentId" hidden="">
                              <textarea class="form-control " id="textAreaExample" 
                                 style="background: #fff;" name="reply" placeholder="reply to .."></textarea>
                           </a>
                              <button type="submit"  class="btn btn-primary btn-sm mt-1">Reply</button>
                              <a type="button" href="javascript::void(0);" onclick="reply_close(this)" class="btn btn-primary btn-sm mt-1">Close</a>                        
                        </form>
                     </div>
                  </div>
               </div>
               </div>
            </div>
         </div>
      </section>
      <!-- comment and reply system end-->

      <!-- subscribe section -->
     <!-- @include('home.subscribe') -->
      <!-- end subscribe section -->
      <!-- client section -->
      @include('home.testimonial')
      <!-- end client section -->
      <!-- footer start -->
      @include('home.footer')
      <!-- footer end -->
      <div class="cpy_">
      <p class="mx-auto">© 2023 All Rights Reserved By <a href="https://www.bamboobrush.com">bamboobrush.com</a><br></p>
      </div>
    @include('home.script')

    <script type="text/javascript">
         function reply(caller){
            document.getElementById('commentId').value=$(caller).attr('data-Commentid');
            $('.replyDiv').insertBefore($(caller));
            $('.replyDiv').show();
         }

         function reply_close(caller){
            $('.replyDiv').hide();
         }
    </script>
   </body>
</html>