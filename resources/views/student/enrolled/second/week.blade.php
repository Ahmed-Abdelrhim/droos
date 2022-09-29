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
            <a href="#" class="inline-btn">مشاهدة الفديوهات</a>
        </div>
   </div>
</section>

<section class="playlist-details">

   <h2 class="heading">محتوى الكورس</h2>


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
