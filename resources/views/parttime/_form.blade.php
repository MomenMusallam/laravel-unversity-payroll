
<div class="form-group">
    <label for="">Employee Name</label>
    <input type="text" class="form-control " name="name" value="{{ old('name', $partTime->name) }}">

</div>


<div class="form-group">
    <label for="">Email</label>
    <input type="email" class="form-control " name="email" value="{{ old('email', $partTime->email) }}">
</div>
    <div class="form-group">
        <label for="">Change Password</label>
        <input type="text" class="form-control " name="password" value="{{ old('password') }}">
    </div>


<div class="form-group">
    <label for="">Date Of Birth</label>
    <input type="text" class="form-control " name="date_of_birth" value="{{ old('date_of_birth', $partTime->date_of_birth) }}">
</div>

<div class="form-group">
    <label for="">Phone Number</label>
    <input type="text" class="form-control " name="phone" value="{{ old('phone', $partTime->phone) }}">
</div>

<div class="form-group">
    <label for="">Specialization</label>
    <input type="text" class="form-control " name="specialization" value="{{ old('specialization', $partTime->specialization) }}">
</div>

<div class="form-group">
    <label for="">Graduation Year</label>
    <input type="text" class="form-control " name="graduation_year" value="{{ old('graduation_year', $partTime->graduation_year) }}">
</div>


<div class="form-group">
    <label for="">Tax % (you can lit it empty to stop tax from us)</label>
    <input type="text" class="form-control " name="tax" value="{{ old('name', $partTime->tax) }}">
</div>

<div class="form-group">
    <label for="payment_method">Payment Method</label>
    <div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="payment_method" id="status-Checks" value="check" @if(old('status', $partTime->payment_method) == 'check') checked @endif>
            <label class="form-check-label" for="status-Checks">
                Checks
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="payment_method" id="status-transfer" value="transfer" @if(old('status', $partTime->payment_method) == 'transfer') checked @endif>
            <label class="form-check-label" for="status-transfer">
                Bank transfer
            </label>
        </div>
    </div>

</div>
<div class="form-group">
    <button type="submit" class="btn btn-primary">{{ $button }}</button>
</div>
