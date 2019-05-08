{{ csrf_field() }}
<div class="form-group">
    <label for="display_name" class="col-form-label">Role Name</label>
    <div>
        <input  type="text" name="display_name" class="form-control" id="display_name"
                required placeholder="Enter Role Name"  value="@if(isset($role)) {{$role->display_name}} @elseif(old('display_name')) {{old('display_name')}}@endif" />
    </div>
</div>
<div class="form-group">
    <div>
        <button type="submit" class="btn btn-pink waves-effect waves-light confirm-submit">
            @if(isset($role)) Update @else Add @endif
        </button>
    </div>
</div>