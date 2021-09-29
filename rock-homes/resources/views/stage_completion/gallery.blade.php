
{{-- WORK-TO-DO for, DELETE SPECIFIC IMAGE FROM ARRAY LIST AND DATABASE ON CLICK --}}
<div class="gallery-area">
<div class="row">
  @php
    $couter = 1;
    @endphp

  @if ( empty( json_decode($gallery->img_name)) )
  <div class="col-lg-4 col-sm-6 col-md-6">
      <div class="single-gallery-image mb-30">
          <p>No Image Available</p>
      </div>
  </div>

  @else

 @foreach ( json_decode($gallery->img_name)  as $key => $img)
        @if ( !empty($img) )
        <div class="col-lg-4 col-sm-6 col-md-6 card-group">
            <div class="single-gallery-image mb-30">
              <div class="row">
                <div class="col-2" >
                    <a  href="{{ route('remove-unlink-image', [$stageOfCompletion->stage_id, $img]) }}" 
                        class="btn btn-danger rounded-left rounded-right active btn-sm"
                        id="show-modal"
                        role="button" 
                        data-toggle="modal" data-target=".bd-example-modal-sm"
                        >
                    <i class='bx bx-trash' id="trash" ></i>
                  
                </a>
            </div>
            <div class="col-9">
              <img id="image" class="img-thumbnail rounded" src="{{  asset('/rock-homes/public/stage_of_completion_img/'.$img) }}" alt="Gallery Image" data-original="{{  asset('/rock-homes/public/stage_of_completion_img/'.$img) }}">
            </div>
              </div>
            </div>
        </div>
        @endif
        @endforeach
   @endif
</div>
</div>
