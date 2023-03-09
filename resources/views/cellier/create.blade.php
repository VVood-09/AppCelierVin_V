<form action="" method="post">
          @csrf
          <div class="card-body">
            <div class="control-group col-12">
              <label for="nom">Nom</label>
              <input type="text" id="nom" name="nom" class="form-control" value="{{old('nom')}}">
            </div>

          
          </div>

          <div class="card-footer d-flex justify-content-between">
            <input type="submit" name="" id="" value="@lang('lang.save')" class="btn btn-success">
            <a href="{{ route ('dashboard')}}" class="btn btn-danger">@lang('lang.btn_cancel')</a>

          </div>

        </form>