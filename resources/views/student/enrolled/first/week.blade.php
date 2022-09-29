@extends('layouts.student')
@section('content')

<section class="playlist-details">

   <div class="row">

      <div class="column">
         <div class="thumb">
            <img src="{{asset('images/ph-18.jpg')}}" alt="">
            <span>10 videos</span>
         </div>
      </div>
      <div class="column">

          <div class="details">
              <h3>كورس الباب الأول</h3>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illum minus reiciendis, error sunt veritatis exercitationem deserunt velit doloribus itaque voluptate.</p>
            </div>
            <div class="tutor">
                <img src="{{asset('images/ph-18.jpg')}}" alt="">
                <div class="detales">
                    <span> <i class="fas fa-book"></i> + 299   سؤال </span>
                    <span> <i class="fas fa-clock"></i> + 15   ساعة </span>
                </div>
            </div>
            <a href="#" class="inline-btn"><i style="margin-left:15px;" class="fa-brands fa-youtube"></i>مشاهدة الفديوهات</a>
        </div>
   </div>
</section>

<section class="playlist-details">

   <h2 class="heading"> كورس الباب الأول </h2>

      <div class="select-box">

        <div class="selected"><i class="fa-solid fa-arrows-to-circle"></i>
           محتوى الكورس
          <span style="display:block; font-size: 14px; color:#eee; margin-top: 15px; margin-right:15px;">محتوى كورس الباب الأول</span>
        </div>

        <div class="options-container">
          <div class="option">
            <a><i class="fa-solid fa-video"></i><span> قائمة الفديوهات </span></a>
          </div>

          <div class="option">
            <a><i class="fa-solid fa-book"></i><span>قائمة الواجبات</span></a>
          </div>

          <div class="option">
            <a><i class="fa-solid fa-book-open"></i><span>حلول الواجب  </span></a>
          </div>

          <div class="option">
            <a><i class="fa-solid fa-chalkboard-user"></i><span> كويزات  </span></a>
          </div>

          <div class="option">
            <a><i class="fa-brands fa-leanpub"></i><span> حلول كويزات </span></a>
          </div>

          <div class="option">
            <a><i class="fa-solid fa-book-open-reader"></i><span> الملازم </span></a>
          </div>

        </div>

      </div>



</section>
@endsection

@section('script')
<script>
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
    } else if (document.all&&!document.getElementById){
    document.onmousedown=clickIE4;
}

document.oncontextmenu=new Function("alert(message);return false")

</script>

@endsection
