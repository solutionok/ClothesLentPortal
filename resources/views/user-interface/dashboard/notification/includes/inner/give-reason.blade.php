<div id="give-reasons" class="white-popup-block mfp-hide reasons-popup" style="background-image: url('img/pop-bg.jpg');">
    <div class="text-center">
        <div class="title-holder">
            <h3>Select your Reason</h3>
        </div>
    </div>
    <form action="{!! URL('notification/decline-request') !!}" method="POST">
        <div class="radio">
          <label><input type="radio" name="optReason" value="1">Bad Review on Costumer</label>
        </div>
        <div class="radio">
          <label><input type="radio" name="optReason" value="2">Change my mind</label>
        </div>
        <div class="radio">
          <label><input type="radio" name="optReason" value="3">Item is not Available</label>
        </div>
        <div class="radio">
          <label><input type="radio" name="optReason" value="4" class="Others">others</label>
          <div class="shows">
              <textarea name="reason"></textarea>
          </div>
        </div>
        <div class="form-group">
            <input type="hidden" name="rentID" value="{{ $rented->id }}">
            <input type="hidden" name="notificationID" value="{{ $notification->id }}">
            <input type="submit" name="" value="SUBMIT">
        </div>
    {!! csrf_field() !!}    
    </form>
</div>