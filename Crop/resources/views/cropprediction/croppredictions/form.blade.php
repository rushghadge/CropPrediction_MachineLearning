<form class="form-horizontal" method="post" action="/croppredictions">

<div class="form-group">
    <label for="name" class="col-lg-2 control-label">
        pH
    </label>
    <div class="col-lg-10">
        <input type="text" class="form-control" id="ph" name="ph" >
    </div>
</div>
<div class="form-group">
    <label for="email" class="col-lg-2 control-label">
        Temperature
    </label>
    <div class="col-lg-10">
        <input type="text" class="form-control" id="temperature" name="temperature"  >
    </div>
</div>
<div class="form-group">
    <label for="month" class="col-lg-2 control-label">
        Month8
    </label>
    <div class="col-lg-10">
        <input type="text" class="form-control" id="month" name="month">
    </div>
</div>
<div class="form-group">
    <div class="col-lg-10 col-lg-offset-2">
        <button type="reset" class="btn btn-default">Cancel</button>
        <button type="submit" class="btn btn-primary">Create</button>
        <button type="submit" class="btn btn-primary">Predict</button>

    </div>
</div>
</form>