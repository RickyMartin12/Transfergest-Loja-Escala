<div class="row">
<h2 style="text-align:center; margin-top: 10px;">Get An Instant Quote</h2>
</div>
<div class="row"> 
<div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-12">
<div class="col-xs-12">  
<label><h4><i class="fa fa-crosshairs" aria-hidden="true"></i> Location (From)</h4></label>
    <select onchange="getDestination(this.value)"  required style="width: 100%; display: inline-block;" id="location-1" class="form-control input-lg">
    </select>
</div>
<div class="col-xs-12">
    <label><h4><i class="fa fa-road" aria-hidden="true"></i> Destination (To)</h4></label>
    <select onchange="getPrices()" required style="width: 100%; display: inline-block;" id="location-2" class="form-control input-lg">
    </select>
</div>
<div class="col-xs-7">
    <label><h4><i class="fa fa-user" aria-hidden="true"></i> Passengers</h4></label>
    <select onchange="getPrices()" required style="width: 100%; display: inline-block;" id="total-pax" class="form-control input-lg">
        <option value="1">1 - 4 pax</option>
        <option value="2">5 - 8 Pax)</option>
        <option value="3">9 - 12 Pax</option>
        <option value="4">13 - 16 Pax </option>
    </select>
</div>
<div class="col-xs-5">
    <label><h4><i class="fa fa-retweet" aria-hidden="true"></i> Return</h4></label>
    <select onchange="getPrices()" style="width: 100%; display: inline-block;" name='return' id="return" class="form-control input-lg">
        <option value="0">No</option>
        <option value="1">Yes</option>
    </select>
  </div>
</div>
</div>
