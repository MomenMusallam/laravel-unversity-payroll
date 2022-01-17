
<div class="form-group">
    <label for="">Employee Name</label>
    <input type="text" class="form-control " name="name" value="{{ old('name', $employee->name) }}">
</div>

<div class="form-group">
    <label for="">Email</label>
    <input type="email" class="form-control " name="email" value="{{ old('email', $employee->email) }}">
</div>
    <div class="form-group">
        <label for="">Change Password</label>
        <input type="text" class="form-control " name="password" value="{{ old('password') }}">
    </div>


<div class="form-group">
    <label for="">Date Of Birth</label>
    <input type="text" class="form-control " name="date_of_birth" value="{{ old('date_of_birth', $employee->date_of_birth) }}">
</div>

<div class="form-group">
    <label for="">Phone Number</label>
    <input type="text" class="form-control " name="phone" value="{{ old('phone', $employee->phone) }}">
</div>

<div class="form-group">
    <label for="">Address</label>
    <input type="text" class="form-control " name="address" value="{{ old('address', $employee->address) }}">
</div>


<div class="form-group">
    <button type="submit" class="btn btn-primary">{{ $button }}</button>
</div>
