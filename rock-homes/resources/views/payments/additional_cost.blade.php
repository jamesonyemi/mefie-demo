@include('partials.master_header')
        <!-- Start -->
        <div class="card mb-30 mt-3">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h3>Additonal Cost Info</h3>
            </div>
            <hr>
            <div class="card-body">
                <form class="mt-5" action="{{route('process-additional-cost') }}"  method="POST">
                    {{ csrf_field() }}
                    <div class="form-row">
                        <div class="col-1"></div>
                        <div class="form-group col-md-4">
                            <label for="client">Client</label>
                                @include('partials.client_to_auth_user.dropdown')       
                        </div>
                        <div class="form-group col-md-2"></div>

                        <div class="form-group col-md-4">
                            <label for="pid">Project:</label>
                            <select id="pid" name="pid" class="required form-control" required></select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-1"></div>
                        <div class="form-group col-md-4">
                            <label for="amt_add_on">Extra Expenses 
                               @include("partials.user_currency_symbol")
                            </label>
                            <input type="number" step="0.1" id="amt_add_on" name="amt_add_on" class="form-control" required>
                        </div>
                        <div class="form-group col-md-2"></div>

                        <div class="form-group col-md-4">
                            <label for="cheque-no">Type of Cost:</label>
                           <select name="cost_type_id" id="cost_type_id" class=" form-control custom-select">
                            <option value="">-- select --</option>
                               @foreach ($costType as $key => $type)
                           <option value="{{ $key }}"> {{ $type }}</option>
                               @endforeach
                           </select>
                        </div>
                    </div>
                    <div class="form-row mb-5">
                        <div class="col-1"></div>
                        <div class="form-group col-md-10">
                            <label for="reason">Brief Explanation:</label>
                            <textarea name="reason" id="reason"  class="form-control h-100" required></textarea>
                        </div>
                        <div class="form-group col-md-1"></div>
                    </div>
                     <hr style="background-color:fuchsia; opacity:0.1">
                      <div class="container">
                          <div class="row">
                        <div class="col-2"></div>
                              <div class="col text-center">
                                  <button type="submit" class="btn btn-lg btn-primary col-sm-12 col-lg-6 col-md-6"><i data-feather="database"></i>
                                   Save</button>
                                </div>
                                <div class="form-group col-md-2"></div>
                        </div>
                      </div>
                </form>

            </div>
        </div>
 <br><br>
        <!-- End -->
 @include('partials.footer')
 @include('partials.onsite_dynamic_dropdown')
