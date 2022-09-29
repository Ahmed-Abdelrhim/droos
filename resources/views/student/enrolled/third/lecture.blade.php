@extends('layouts.student')
@section('content')

<section class="watch-video">

   <div class="video-container">
      <div class="video">
         <video src="{{asset('lectures/third/'.$lec->lec)}}" controls poster="{{asset('images/courses_third_year/'.$lec['course']->cover)}}"
                id="video"></video>
      </div>
      <h3 class="title">فيديو : {{$lec->name}}</h3>
      <div class="info">
         <p class="date"><i class="fas fa-calendar"></i><span>22-10-2022</span></p>
         <p class="date"><i class="fas fa-heart"></i><span>44 likes</span></p>
      </div>

      <form action="" method="post" class="flex">
         <a href="playlist.html" class="inline-btn">view playlist</a>
         <button><i class="far fa-heart"></i><span>like</span></button>
      </form>
   </div>
</section>

<section class="comments">


   <form action="" class="add-comment">
      <h3> اضافة تعليق</h3>
      <textarea name="comment_box" placeholder="اضف تعليقك" required maxlength="1000" cols="30" rows="10"></textarea>
      <input type="submit" value="اضافة" class="inline-btn" name="add_comment">
   </form>

   <h1 class="heading"> التعليقات</h1>

   <div class="box-container">

      <div class="box">
         <div class="user">
            <img src="images/pic-1.jpg" alt="">
            <div>
               <h3> anas</h3>
               <span>22-10-2022</span>
            </div>
         </div>
         <div class="comment-box">this is a comment form  anas</div>
         <form action="" class="flex-btn">
            <input type="submit" value="edit comment" name="edit_comment" class="inline-option-btn">
            <input type="submit" value="delete comment" name="delete_comment" class="inline-delete-btn">
         </form>
      </div>

      <div class="box">
         <div class="user">
            <img src="images/pic-2.jpg" alt="">
            <div>
               <h3>john deo</h3>
               <span>22-10-2022</span>
            </div>
         </div>
         <div class="comment-box">awesome tutorial!
            keep going!</div>
      </div>

      <div class="box">
         <div class="user">
            <img src="images/pic-3.jpg" alt="">
            <div>
               <h3>john deo</h3>
               <span>22-10-2022</span>
            </div>
         </div>
         <div class="comment-box">amazing way of teaching!
            thank you so much!
         </div>
      </div>

      <div class="box">
         <div class="user">
            <img src="images/pic-4.jpg" alt="">
            <div>
               <h3>john deo</h3>
               <span>22-10-2022</span>
            </div>
         </div>
         <div class="comment-box">loved it, thanks for the tutorial!</div>
      </div>

      <div class="box">
         <div class="user">
            <img src="images/pic-5.jpg" alt="">
            <div>
               <h3>john deo</h3>
               <span>22-10-2022</span>
            </div>
         </div>
         <div class="comment-box">this is what I have been looking for! thank you so much!</div>
      </div>

      <div class="box">
         <div class="user">
            <img src="images/pic-2.jpg" alt="">
            <div>
               <h3>john deo</h3>
               <span>22-10-2022</span>
            </div>
         </div>
         <div class="comment-box">thanks for the tutorial!

            how to download source code file?
         </div>
      </div>

   </div>

</section>


@endsection
@section('script')
    <script language=JavaScript>
        var message="This function has been disabled!";

        ///////////////////////////////////

        function clickIE4(){

            if (event.button==2){

                alert(message);

                return false;

            }

        }

        function clickNS4(e){

            if (document.layers||document.getElementById&&!document.all){

                if (e.which==2||e.which==3){

                    alert(message);

                    return false;

                }

            }

        }

        if (document.layers){

            document.captureEvents(Event.MOUSEDOWN);

            document.onmousedown=clickNS4;

        }

        else if (document.all&&!document.getElementById){

            document.onmousedown=clickIE4;

        }
        document.oncontextmenu=new Function("alert(message);return false")
    </script>
@endsection

