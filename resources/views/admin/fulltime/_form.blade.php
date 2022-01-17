
<div class="form-group">
    <label for="">Employee Name</label>
    <input type="text" class="form-control " name="name" value="{{ old('name', $employee->name) }}">

</div>


<div class="form-group">
    <label for="">Email</label>
    <input type="email" class="form-control " name="email" value="{{ old('email', $employee->email) }}">
</div>
@if($employee->password == '')
<div class="form-group">
    <label for="">Password</label>
    <input type="text" class="form-control " name="password" value="{{ old('password', $employee->password) }}">
</div>
@endif


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
    <input type="text" class="form-control " name="specialization" value="{{ old('specialization', $fullTimeEmployee->specialization) }}">
</div>

<div class="form-group">
    <label for="">Graduation Year</label>
    <input type="text" class="form-control " name="graduation_year" value="{{ old('graduation_year', $fullTimeEmployee->graduation_year) }}">
</div>

<div class="form-group">
    <label for="">Year Of Appointment</label>
    <input type="text" class="form-control " name="year_of_appointment" value="{{ old('year_of_appointment', $fullTimeEmployee->year_of_appointment) }}">
</div>

<div class="form-group">
    <label for="">Salary Amount</label>
    <input type="text" class="form-control " name="salary_amount" value="{{ old('salary_amount', $fullTimeEmployee->salary_amount) }}">
</div>

<div class="form-group">
    <label for="">Number Of Vacations</label>
    <input type="text" class="form-control " name="number_of_vacations" value="{{ old('number_of_vacations', $fullTimeEmployee->number_of_vacations) }}">
</div>

<div class="form-group">
    <label for="">Bank account number</label>
    <input type="text" class="form-control " name="bank_account_number" value="{{ old('bank_account_number', $employee->bank_account_number) }}">
</div>
<div class="form-group">
    <label for="">Tax %</label>
    <input type="text" class="form-control " name="tax" value="{{ old('tax', $fullTimeEmployee->tax) }}">
</div>

<div class="form-group">
    <label for="payment_method">Payment Method</label>
    <div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="payment_method" id="status-active" value="check" @if(old('status', $fullTimeEmployee->payment_method) == 'check') checked @endif>
            <label class="form-check-label" for="status-active">
                Checks
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="payment_method" id="status-draft" value="transfer" @if(old('status', $fullTimeEmployee->payment_method) == 'transfer') checked @endif>
            <label class="form-check-label" for="status-draft">
                Bank transfer
            </label>
        </div>
    </div>

</div>
<div class="form-group">
    <button type="submit" class="btn btn-primary">{{ $button }}</button>
</div>
