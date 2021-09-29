@include('partials.master_header')
        <!-- Start -->
        <h3>Stage of Completion </h3>
        <div class="card mb-30">
            <div class="card-header d-flex justify-content-between align-items-center">
                <div class="row">
                    <div >
                        <span>
                            <i class="badge badge-default">Project Name:</i>
                               <i class="badge badge-primary"> {{ ($stageOfCompletion->project_name) ?? $stageOfCompletion->project_name }} </i>
                        </span>
                    </div>

                    <div >
                        <span>
                            <i class="badge badge-default">Project Owner:</i>
                               <i class="badge badge-primary"> {{ ($stageOfCompletion->full_name) ?? $stageOfCompletion->full_name }} </i>
                        </span>
                    </div>
                    <div>
                        <span>
                            <i class="badge badge-default">Project Budget:</i>
                            <i class="badge badge-primary">{{ !empty($stageOfCompletion->project_budget) ? ('GH₵ ' . $stageOfCompletion->project_budget ) : 'Not Specified yet'  }} </i>
                        </span>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="row">
                        <div class="col-4"></div>
                        <div class="col-md-6 col-lg-12">
                            <label for="" style="float: right; clear: both;"> image preview</label>
                        </div>
                        <div class="col-3"></div>
                        <div class="col-md-6 col-lg-12">
                            @include('stage_completion.gallery_modal')
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="card-body">
            <form method="POST" action="{{ route('stage-of-completion.update', Crypt::encrypt($stageOfCompletion->stage_id))}}" enctype="multipart/form-data" class="mt-5">
                {{ csrf_field() }}
                <input name="_method" type="hidden" value="PUT">

                        <div class="form-row">
                            <div class="col-1"></div>
                            <div class="form-group col-md-4">
                                <label for="amount_spent">Amount Spent <i class=""id=currency> (GH₵)</i> </label>
                            <input type="number" step="0.1" value="{{ $stageOfCompletion->nf_amtspent }}" 
                            class="form-control" id="amtspent"  name="amtspent" required>
                            <div class="row">
                                <div class="ml-4 mb-2 justify-content-between" 
                                    data-toggle="tooltip" 
                                    data-placement="left" 
                                    title="Initial Expenditure">
                                    <span class="badge badge-success" id="initial_exp">GH₵ {{ $stageOfCompletion->amtspent }}</span>
                                </div>
                                 <div class="ml-4 mb-2 justify-content-between"
                                    data-toggle="tooltip" 
                                    data-placement="bottom" 
                                    title="New Expenditure" >
                                    <span class="badge badge-info"
                                    id="num_separator"></span> 
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-2">  </div>
                            <div class="form-group col-md-4">
                                <label for="status">Status of Completion</label>
                                <select id="status_id" name="status_id" class="form-control custom-select" required>
                                    @if ( empty($stageOfCompletion->status_id) )
                                        <option value="">--No status yet--</option>
                                    @endif
                                    @foreach ($project_status as $key => $status)
                                        @if ( !empty($stageOfCompletion->status_id) )
                                            <option value="{{ $key }}" {{ old('status_id', in_array($stageOfCompletion->status_id, [$key]) ? $stageOfCompletion->status_id : 'null') == $key ?
                                        'selected' : '' }}> {{ ucwords($status) }} </option>
                                        @else
                                    @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-1"></div>
                            <div class="form-group col-md-4">
                            <label for="phase">Project Phase</label>
                            <select id="phase_id" name="phase_id" class="form-control custom-select" required>
                                @if ( empty($stageOfCompletion->phase_id) )
                                    <option>-- select --</option>
                                @endif
                                @foreach ($project_phase as $key => $phase)
                                    @if ( !empty($stageOfCompletion->phase_id) )
                                        <option value="{{ $key }}" {{ old('phase_id', in_array($stageOfCompletion->phase_id, [$key]) ? $stageOfCompletion->phase_id : 'null') == $key ?
                                        'selected' : '' }}> {{ ucwords($phase) }} </option>
                                    @else
                                @endif
                                @endforeach
                            </select>
                            </div>

                            <div class="form-group col-md-2"></div>
                            <div class="form-group col-md-4">
                                <label for="img_name">Photos of Work Done</label>
                                <input type="file" class="form-control" id="img_name" name="img_name[]" multiple >
                          </div>
                        </div>
                        <br>

                    <div class="form-row mb-5">
                        <div class="col-1"></div>
                        <div class="form-group col-md-10 col-lg-10 col-sm-10">
                            <label for="comment">Materials Purchased</label>
                                <textarea name="matpurchased" id="matpurchased" required class="form-control h-100">
                                    {{ strip_tags($stageOfCompletion->matpurchased) }}
                                </textarea>
                        </div>
                    </div>        
                     <div class="form-row mt-5">
                         <div class="col-1"></div>
                            <div class="form-group col-md-10 col-lg-10 col-sm-10 mb-5">
                                <label for="comment" class="mt-3">Details of Amount Spent</label>
                                    <textarea name="amtdetails" id="amtdetails"  required  class="form-control h-100">
                                        {{ strip_tags($stageOfCompletion->amtdetails) }}
                                    </textarea>
                                </div>
                        </div>
                    <hr style="background-color:fuchsia; opacity:0.1" class="mt-2">
                    <div class="container mt-2">
                        <div class="row">
                            <div class="col-2"></div>
                            <div class="col text-center">
                                <button type="submit" class="btn btn-lg btn-primary"><i data-feather="database"></i> Update Info</button>
                            </div>
                        <div class="form-group col-md-2"></div>
                      </div>
                    </div>
                </form>
            </div>
        </div>
        <br><br>
     <!-- End -->
<!-- End Main Content Wrapper -->
 @include('clients.remove_modal_form')
 @include('partials.footer')
 @include('clients.delete_action_modal')

<script>

    let appendCur = 'GH₵';    
  
    function numberWithCommas(x) {
        return x.toString().replace(/\B(?<!\.\d*)(?=(\d{3})+(?!\d))/g, ",");
    }
    
    document.getElementById("amtspent").addEventListener('focusout', (e) => {
        let fd = document.getElementById("amtspent").value
        document.getElementById("num_separator").textContent = appendCur + ' ' + numberWithCommas(fd)

    })
</script>