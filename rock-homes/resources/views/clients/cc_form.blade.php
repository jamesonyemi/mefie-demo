<hr style="background-color:fuchsia; opacity:0.1">
<form class="mt-5" action="{{route('corporate-client') }}"  method="POST">
    {{ csrf_field() }}
    <div class="form-row">
        <div class="col-1"></div>
        <div class="form-group col-md-4">
            <label for="c-name">Company Name</label>
            <input type="text" class="form-control " id="company_name" name="company_name" placeholder="" required>
        </div>
        <div class="form-group col-md-2">

        </div>
        <div class="form-group col-md-4">
            <label for="c-mobile">Mobile Number</label>
            <input type="text" maxLength="15" class="form-control " id="mobile" name="mobile" placeholder="" required>
        </div>
    </div>
    <div class="form-row">
        <div class="col-1"></div>
        <div class="form-group col-md-4">
            <label for="p-email">Primary Email</label>
            <input 
                type="email" 
                class="@error('primary_email') is-invalid @enderror form-control text-lowercase"  
                placeholder="" 
                id="primary_email" 
                name="primary_email" 
                required 
                >
                <span id="signal-message"></span>
                    @error('primary_email')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    @error('email')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                </div>
                <div class="form-group col-md-2"> </div>
        <div class="form-group col-md-4">
            <label for="s-email">Secondary Email</label>
            <input 
                type="email" 
                class="@error('secondary_email') is-invalid @enderror form-control text-lowercase" 
                placeholder="" 
                id="secondary_email" 
                name="secondary_email"
                >
                <span id="sec-message"></span>
                @error('secondary_email')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
        </div>
    </div>
    <div class="form-row">
        <div class="col-1"></div>
        <div class="form-group col-md-4">
            <label for="p-addr">Postal Address</label>
            <input type="text" class="form-control" id="postal_addr" name="postal_addr" required>
        </div>
        <div class="form-group col-md-2">

        </div>
        <div class="form-group col-md-4">
            <label for="fax">Fax</label>
            <input type="text" class="form-control" id="fax"name="fax">
        </div>
    </div>
    <div class="form-row">
        <div class="col-1"></div>
        <div class="form-group col-md-4">
              <label for="tel-no">Telephone Number</label>
              <input type="tel" maxLength="15" class="form-control" id="tel_no"name="tel_no">
          </div>
          <div class="form-group col-md-2"> </div>
          <div class="form-group col-md-4">
            <label for="res-addr">Residential Address</label>
            <input type="text" name="res_addr" class="form-control" id="res_addr" required>
        </div>
      </div>
      <hr style="background-color:fuchsia; opacity:0.1">
      <div class="container">
          <div class="row">
              <div class="form-group col-md-2"></div>
              <div class="text-center col">
                  <button type="submit" id="btn-save" class="btn btn-lg btn-primary"><i data-feather="database"></i>
                    Save</button>
                </div>
            <div class="form-group col-md-2"></div>
        </div>
      </div>
</form>
