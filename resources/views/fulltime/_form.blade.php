
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
    <label for="">Specialization</label>
    <input type="text" class="form-control " name="specialization" value="{{ old('specialization', $fullTime->specialization) }}">
</div>

<div class="form-group">
    <label for="">Graduation Year</label>
    <input type="text" class="form-control " name="graduation_year" value="{{ old('graduation_year', $fullTime->graduation_year) }}">
</div>



<div class="form-group">
    <label for="">Bank account number</label>
    <input type="text" class="form-control " name="bank_account_number" value="{{ old('bank_account_number', $employee->bank_account_number) }}">
</div>

<div class="form-group">
    <label for="payment_method">Payment Method</label>
    <div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="payment_method" id="status-active" value="check" @if(old('status', $fullTime->payment_method) == 'check') checked @endif>
            <label class="form-check-label" for="status-active">
                Checks
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="payment_method" id="status-draft" value="transfer" @if(old('status', $fullTime->payment_method) == 'transfer') checked @endif>
            <label class="form-check-label" for="status-draft">
                Bank transfer
            </label>
        </div>
    </div>

</div>
<div class="form-group">
    <button type="submit" class="btn btn-primary">{{ $button }}</button>
</div>
