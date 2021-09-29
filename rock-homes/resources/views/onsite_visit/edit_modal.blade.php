<div>
    <input type="hidden" name="_method" id="" value="PUT">
    <div class="form-row">
        <div class="col-1"> </div>
        <div class="form-group col-md-12 col-sm-12">
            <label for="title">Change Date of Visit </label>
            <input type="text" id="vdate" name="vdate" class="form-control" data-toggle="modal" data-target=".bd-example-modal-sm"
            value="" required >
        </div>
        <div class="form-group col-md-12 col-sm-12">
            <label for="update-image">Update Photos</label>
            <input type="file" class="form-control" id="img_name" name="img_name[]" accept="image/*" multiple required>
        </div>

    </div>
    <div class="form-row">
         <div class="col-1"></div>
        <div class="form-group col-12 mt-4">
                <textarea name="comments" id="comments"  class="form-control h-100 text-left pt-3" required dir="ltr">
                </textarea>
            <label for="get-comment" class="float-right">Comments</label>
        </div>
         <div class="col-1"></div>
    </div>
    <hr style="background-color:fuchsia; opacity:0.1">
    <div class="container">
        <div class="row">
        <div class="col-2"> </div>
            <div class="col text-center">
                <button type="submit" class="btn btn-lg btn-primary"><i data-feather="database"></i>
                  Save Changes</button>
              </div>
              <div class="form-group col-md-2"></div>
      </div>
    </div>
</div>
    