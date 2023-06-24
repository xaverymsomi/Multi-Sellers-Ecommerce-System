 @php
          $sliders = App\Models\Slider::orderBy('slider_title','ASC')->get();
        @endphp
        <div id="hero">
            <div id="owl-main" class="owl-carousel owl-inner-nav owl-ui-sm">

              @foreach ($sliders as $slider)

              <div class="item" style="background-image: url({{ $slider->slider_image }});">
                <div class="container-fluid">
                  <div class="caption bg-color vertical-center text-left">
                    <div class="slider-header fadeInDown-1">{{ $slider->created_at }}</div>
                    <div class="big-text fadeInDown-1"> {{ $slider->slider_title }} </div>
                    <div class="excerpt fadeInDown-2 hidden-xs"> <span>{{ $slider->slider_short_title }}</span> </div>
                    
                  </div>

                </div>

              </div>

              @endforeach
              
            </div>

          </div>