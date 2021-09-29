@include('partials.master_header')
 
 <!-- Start -->
 <div class="card-deck mt-5">
  <div class="card bg-success">
    <div class="card-body">
      <h5 class="card-title"><i class="text-center badge badge-light bx-sm ">{{ __('Project Owner') }} </i> </h5>
      <p class="card-text text-uppercase text-white">{{ array_flatten($getAllVisit)[0]->full_name }}</p>
    </div>
    <div class="card-footer">
      <small class="text-muted"></small>
    </div>
  </div>
  
  <div class="card bg-secondary">
    <div class="card-body">
      <h5 class="card-title"><i class="badge badge-light bx-sm"> {{ __('Project Budget') }}</i></h5>
      <p class="card-text text-uppercase text-white">{{ array_flatten($getAllVisit)[0]->budget }}</p>
    </div>
    <div class="card-footer">
      <small class="text-muted"></small>
    </div>
  </div>
  
  <div class="card bg-info">
    <div class="card-body">
      <h5 class="card-title"><i class="badge badge-light bx-sm"> {{ __('Project Status') }}</i></h5>
      <p class="card-text text-uppercase text-white">{{ array_flatten($getAllVisit)[0]->status }}</p>
    </div>
    <div class="card-footer">
      <small class="text-muted"></small>
    </div>
  </div>
</div>
        <div class="mt-5 ">
            @include("partials.previous_page_optional_title", ["page_title" => "View Onsite Details"])         
         </div>
        <div class="card mb-30 mb-5">
            
        <hr style="background-color:fuchsia; opacity:0.1" class="mt-1">
    <div class="card-body">
        @foreach ($getAllVisit as $visit)
            <?php $encryptId = Crypt::encrypt($visit->vid) ?>
            <form class="mt-5" action="{{ route('onsite-visit.update', $encryptId) }}" method="POST">
                    {{ csrf_field() }}
                    <div class="form-row">
                        <div class="form-group col-md-1"></div>
                        <div class="form-group col-md-4">
                            <label for="title">Date of Visit </label>
                            <div class="list-group-item">
                                {{ old('vdate', date("l, jS F, Y", strtotime($visit->date_of_visit) )) }}
                            </div>
                        </div>
                        <div class="form-group col-md-2"></div>
                        <div class="form-group col-md-4">
                            <label for="bank-brank">Project</label>
                            <div class="list-group-item">
                                @foreach ($projects as $key => $value )
                                    @if ( in_array($visit->pid,[$value->pid]) )
                                    {{ old("pid", ucwords($value->title) ) }}
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group col-md-1"></div>
                        <div class="form-group col-md-10" >
                            <label for="project_state">Comments</label>
                            <div class="list-group-item h-100 w-100">
                                {{ ( ($visit->comments) ) }}
                            </div>
                        </div>
                    </div>
                    <hr style="background-color:fuchsia; opacity:0.1" class="mt-5">
                    @endforeach
                </form>
            </div>
        </div>

        <!-- End -->
 @include('partials.footer')

