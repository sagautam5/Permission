{{ csrf_field() }}
<div class="form-group">
    <label for="name" class="col-form-label">Name</label>
    <div>
        <input  type="text" name="name" class="form-control"
                required placeholder="Enter Name of the User"  value="@if(isset($user)) {{$user->name}} @else {{old('name')}}@endif" />
    </div>
</div>

<div class="form-group">
    <label for="role_id" class="col-form-label">Select Role</label>

    <select class="form-control" name="role_id" required>
        @foreach($roles as $role )
            <option value="{{$role->id}}"
                    @if(isset($user))
                    @if($user->role_id == $role->id)
                    selected
                    @endif
                    @else
                    @if(old('role_id')==$role->id)
                    selected
                    @endif
                    @endif
            >{{$role->display_name}}</option>
        @endforeach
    </select>
</div>

<div class="form-group">
    <label for="email" class="col-form-label">E-Mail</label>
    <div>
        <input  type="email" name="email" class="form-control"
                required data-parsley-type="email" placeholder="Enter a valid e-mail" value="@if(isset($user)) {{$user->email}} @else {{old('email')}} @endif" />
    </div>
</div>
@if(!isset($user))
    <div class="form-group">
        <label for="password" class="col-form-label">Password</label>
        <div>
            <input type="password" name="password" id="password" data-parsley-minlength="6"
                   class="form-control" required
                   placeholder="Enter at least 6 Character"/>
        </div>
    </div>
    <div class="form-group">
        <label for="password" class="col-form-label">Confirm Password</label>
        <div>
            <input type="password" name="password_confirmation"
                   class="form-control" required
                   data-parsley-equalto="#password" placeholder="Confirm Password" />
        </div>
    </div>
@endif

<div class="form-group">
    <div>
        <button type="submit" class="btn btn-pink waves-effect waves-light confirm-submit">
            @if(isset($user)) Update @else Add @endif
        </button>
        <button type="reset" class="btn btn-secondary waves-effect m-l-5">
            Cancel
        </button>
    </div>
</div>