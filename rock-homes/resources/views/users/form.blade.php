@include('partials.master_header')
    <br><br><br>
        <!-- Start -->
        <div class="card mb-30">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h3>New User</h3>
            </div>
            <hr>
            <div class="card-body">
            <form class="mt-5" action="{{ route('verified-users.store') }}" method="POST">
                    {{ csrf_field() }}
                    <div class="form-row">
                        <div class="form-group col-md-1"> </div>
                        <div class="form-group col-md-4 {{ $errors->has('first_name') ? ' has-error' : '' }}">
                            <label for="first_name">First Name</label>
                        <input type="text" class="form-control" name="first_name" id="first_name" required>
                            @if ($errors->has('first_name'))
                            <span class="help-block"><strong>{{ $errors->first('first_name') }}</strong></span>
                            @endif
                        </div>
                        <div class="form-group col-md-1"> </div>
                        <div class="form-group col-md-4">
                            <label for="middle_name">Middle Name</label>
                        <input type="text" class="form-control" name="middle_name" id="middle_name" >
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-1"> </div>
                        <div class="form-group col-md-4 {{ $errors->has('last_name') ? ' has-error' : '' }} ">
                            <label for="last_name">Last Name</label>
                        <input type="text" class="form-control" name="last_name" id="last_name" required>
                                 @if ($errors->has('last_name'))
                                    <span class="help-block"><strong>{{ $errors->first('last_name') }}</strong></span>
                                 @endif
                        </div>
                        <div class="form-group col-md-1"> </div>
                        <div class="form-group col-md-4 {{ $errors->has('email') ? ' has-error' : '' }} ">
                            <label for="email">Email</label>
                        <input type="email" class="form-control" name="email" id="email"  autocomplete="off"
                        required placeholder="Enter email" >
                            @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                            @endif
                            <span id="signal-message"></span>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-1"> </div>
                        <div class="form-group col-md-4" >
                            <label for="pwd">Password</label>
                            <input type="password" class="form-control" name="password" id="password" placeholder="Password" required autocomplete="off">
                            <span class="badge badge-pill badge-danger" id="error-msg" style="display:none; float:right; margin-top: 2.5px;" value="" ></span>
                            <span class="badge badge-pill badge-success" id="success-msg" style="display:none; float:right; margin-top: 2.5px;" value="" ></span>
                        </div>
                        <div class="form-group col-md-1"> </div>
                        <div class="form-group col-md-4">
                            <label for="email">Comfirm Password</label>
                            <input type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password" required autocomplete="off">
                            <span class="badge badge-pill badge-danger" id="error-msg" style="display:none; float:right; margin-top: 2.5px;" value="" ></span>
                            <span class="badge badge-pill badge-success" id="success-msg" style="display:none; float:right; margin-top: 2.5px;" value="" ></span>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-1"> </div>
                        <div class="form-group col-md-4" >
                            <label for="pwd">Choose User Dept.</label>
                            <div class="row">
                            <div class="col-12">
                            <select id="user_department" name="role_id" class="form-control custom-select" required>
                                <option value="">----Select Role----</option>
                                @foreach ($roles as $key => $role)
                                <option value="{{ $role }}" class="">{{ ucwords($key)  }}</option>
                                @endforeach
                            </select>

                            </div>
                            </div>
                        </div>
                        <div class="form-group col-md-1"> </div>
                        <div class="form-group col-md-4">

                        </div>
                    </div>
                    <hr style="background-color:fuchsia; opacity:0.1">
                      <div class="container">
                          <div class="row">
                              <div class="col-1"></div>
                              <div class="col text-center">
                                  <button type="submit" id="btn-save" class="btn btn-lg btn-primary"><i data-feather="database"></i>
                                   Save</button>
                                </div>
                                <div class="form-group col-md-2"></div>
                        </div>
                      </div>
                </form>
            </div>
        </div>
        <!-- End -->
  <div class="flex-grow-1"></div>
</div>
@include('partials.footer')
@include('clients.check_email.email_exist')
