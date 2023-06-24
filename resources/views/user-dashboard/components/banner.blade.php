@php
$banner = App\Models\Banner::orderBy('banner_title','ASC')->limit(4)->get();
@endphp

<div class="row">
    <div class="col-md-12">
      <div class="wide-banners outer-bottom-xs">
        <div class="row">
        @foreach ($banner as $item)
        <div class="col-md-3 col-sm-3">
          <div class="card">
            <div class="wide-banner cnt-strip">
              <div class="image">
                <img class="img-responsive" src="{{ asset($item->banner_image) }}" alt="">
              </div>
            </div>
          </div>
        </div>
        @endforeach
          
         
        </div>
        <!-- /.row --> 
        </div>
    </div>
  </div>