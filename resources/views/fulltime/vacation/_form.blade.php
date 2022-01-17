
<div class="form-group">
    <label for="">Date</label>
    <input type="text" class="form-control " name="date" value="{{ old('date', $vacation->date) }}">
</div>


<div class="form-group">
    <label for="">Reason</label>
    <input type="text" class="form-control " name="reason" value="{{ old('hours_amounts', $vacation->reason) }}">
</div>


<div class="form-group">
    <button type="submit" class="btn btn-primary">{{ $button }}</button>
</div>
