{{ csrf_field() }}
<div class="form-group">
    <label for="display_name" class="col-form-label">Role Name</label>
    <div>
        <input  type="text" name="display_name" class="form-control" id="display_name"
                required placeholder="Enter Role Name"  value="@if(isset($role)) {{$role->display_name}} @elseif(old('display_name')) {{old('display_name')}}@endif" />
    </div>
</div>
<div class="form-group">
    <label for="role_id" class="col-form-label">Select Level</label>

    <select class="form-control" name="level" required>

        @foreach($levels as $level )
            <option value="{{$level}}"
                    @if(isset($role))
                        @if($role->level == $level)
                            selected
                        @endif
                    @else
                        @if(old('level')==$level)
                            selected
                        @endif
                    @endif
            >{{getDigitName($level)}}</option>
        @endforeach
    </select>
</div>
<div class="form-group">
    <div>
        <button type="submit" class="btn btn-pink waves-effect waves-light confirm-submit">
            @if(isset($role)) Update @else Add @endif
        </button>
    </div>
</div>