@extends('web.layouts.app' , ['title' => 'Media' , 'activePage' => 'gallery'])
@section('content')
<!-- breadcrum -->
<section class="w3l-skill-breadcrum">
  <div class="breadcrum">
    <div class="container">
      <p><a href="index.html">Home</a> &nbsp; / &nbsp; Gallery</p>
    </div>
  </div>
</section>
<!-- //breadcrum -->

<div style="margin: 8px auto; display: block; text-align:center;">
  <!---728x90--->

</div>

<!--  gallery section -->
  <div class="w3l-gallery" id="gallery">
    <div class="insta-picks py-5">
      <div class="container py-lg-3">
        <div class="row no-gutters masonry">
          <div class="col-md-4 col-sm-6 brick">
            <a href="{{ $web_source }}/images/g1.jpg" class="js-img-viwer d-block" data-caption="There are many variations of popular graphic Institute"
              data-id="lion">
              <img src="{{ $web_source }}/images/g1.jpg" class="img-fluid insta-pic" alt="insta-pic" />
              <div class="content-overlay"></div>
              <div class="content-details fadeIn-left">
                <h4>Gallery title here</h4>
                <p>Institute</p>
              </div>
            </a>
          </div>
          <div class="col-md-4 col-sm-6 brick">
            <a href="{{ $web_source }}/images/g2.jpg" class="js-img-viwer d-block" data-caption="There are many variations of popular graphic Institute"
              data-id="camel">
              <img src="{{ $web_source }}/images/g2.jpg" class="img-fluid insta-pic" alt="insta-pic" />
              <div class="content-overlay"></div>
              <div class="content-details fadeIn-top">
                <h4>Gallery title here</h4>
                <p>Institute</p>
              </div>
            </a>
          </div>
          <div class="col-md-4 col-sm-6 brick">
            <a href="{{ $web_source }}/images/g3.jpg" class="js-img-viwer d-block" data-caption="There are many variations of popular graphic Institute"
              data-id="hippopotamus">
              <img src="{{ $web_source }}/images/g3.jpg" class="img-fluid insta-pic" alt="insta-pic" />
              <div class="content-overlay"></div>
              <div class="content-details fadeIn-bottom">
                <h4>Gallery title here</h4>
                <p>Institute</p>
              </div>
            </a>
          </div>
          <div class="col-md-4 col-sm-6 brick">
            <a href="{{ $web_source }}/images/g4.jpg" class="js-img-viwer d-block" data-caption="There are many variations of popular graphic Institute"
              data-id="koala">
              <img src="{{ $web_source }}/images/g4.jpg" class="img-fluid insta-pic" alt="insta-pic" />
              <div class="content-overlay"></div>
              <div class="content-details fadeIn-left">
                <h4>Gallery title here</h4>
                <p>Institute</p>
              </div>
            </a>
          </div>
          <div class="col-md-4 col-sm-6 brick">
            <a href="{{ $web_source }}/images/g5.jpg" class="js-img-viwer d-block" data-caption="There are many variations of popular graphic Institute"
              data-id="bear">
              <img src="{{ $web_source }}/images/g5.jpg" class="img-fluid insta-pic" alt="insta-pic" />
              <div class="content-overlay"></div>
              <div class="content-details fadeIn-top">
                <h4>Gallery title here</h4>
                <p>Institute</p>
              </div>
            </a>
          </div>
          <div class="col-md-4 col-sm-6 brick">
            <a href="{{ $web_source }}/images/g6.jpg" class="js-img-viwer d-block" data-caption="There are many variations of popular graphic Institute"
              data-id="rhinoceros">
              <img src="{{ $web_source }}/images/g6.jpg" class="img-fluid insta-pic" alt="insta-pic" />
              <div class="content-overlay"></div>
              <div class="content-details fadeIn-bottom">
                <h4>Gallery title here</h4>
                <p>Institute</p>
              </div>
            </a>
          </div>
          <div class="col-md-4 col-sm-6 brick">
            <a href="{{ $web_source }}/images/g7.jpg" class="js-img-viwer d-block" data-caption="There are many variations of popular graphic Institute"
              data-id="hippopotamus">
              <img src="{{ $web_source }}/images/g7.jpg" class="img-fluid insta-pic" alt="insta-pic" />
              <div class="content-overlay"></div>
              <div class="content-details fadeIn-left">
                <h4>Gallery title here</h4>
                <p>Institute</p>
              </div>
            </a>
          </div>
          <div class="col-md-4 col-sm-6 brick">
            <a href="{{ $web_source }}/images/g8.jpg" class="js-img-viwer d-block" data-caption="There are many variations of popular graphic Institute"
              data-id="koala">
              <img src="{{ $web_source }}/images/g8.jpg" class="img-fluid insta-pic" alt="insta-pic" />
              <div class="content-overlay"></div>
              <div class="content-details fadeIn-top">
                <h4>Gallery title here</h4>
                <p>Institute</p>
              </div>
            </a>
          </div>
          <div class="col-md-4 col-sm-6 brick">
            <a href="{{ $web_source }}/images/g9.jpg" class="js-img-viwer d-block" data-caption="There are many variations of popular graphic Institute"
              data-id="hippopotamus">
              <img src="{{ $web_source }}/images/g9.jpg" class="img-fluid insta-pic" alt="insta-pic" />
              <div class="content-overlay"></div>
              <div class="content-details fadeIn-bottom">
                <h4>Gallery title here</h4>
                <p>Institute</p>
              </div>
            </a>
          </div>
        </div>
        <div class="text-center">
          <a href="#url" class="follow-insta-button btn btn-secondary p-3 mt-5" target="_blank">
            Follow us on Instagram
          </a>
        </div>
      </div>
    </div>
  </div>
  <!--  //gallery section -->

<div style="margin: 8px auto; display: block; text-align:center;">
  <!---728x90--->
</div>

 @stop