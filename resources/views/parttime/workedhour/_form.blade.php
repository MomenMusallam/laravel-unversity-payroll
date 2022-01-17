
<div class="form-group">
    <label for="">Date</label>
    <input type="text" class="form-control " name="date" value="{{ old('date', $task->date) }}">
</div>


<div class="form-group">
    <label for="">Number Of Hours</label>
    <input type="text" class="form-control " name="hours_amounts" value="{{ old('hours_amounts', $task->hours_amounts) }}">
</div>


<div class="form-group">
    <button type="submit" class="btn btn-primary">{{ $button }}</button>
</div>
