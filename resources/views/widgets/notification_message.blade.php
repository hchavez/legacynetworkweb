


<input type="hidden" name="notif" id="notif"  value="<?php echo count($notifications); ?>">
@if(count($notifications)>0)
<div class="sddddac" style=" padding-top: 50px !important;" style="width:100% !important;">  

&nbsp; &nbsp; <span style="color: #5c5a5a;"> <strong> YOU HAVE NEW NOTIFICATION(S)! </strong></span>


@foreach($notifications as $notification)

<div class="notification-container" data-id="{{ $notification->id }}">
    <p class="site_notification" > &nbsp; &nbsp; &nbsp; &nbsp;
        <?php
		echo strip_tags(str_limit($notification->message, 420));
        //echo $notification->message;
		?> ... &nbsp; <a href="{{ url('distributor/settings/notifications') }}" class="close-notification"> read more</a> 
		&nbsp;  &nbsp; &nbsp; &nbsp; <a href="{{ url('distributor/settings/notifications') }}" class="close-notification" style="color: red; text-decoration: none;"> <i class="fa fa-times fa-1x" aria-hidden="false" ></i></a>
        <span class="col-md-1 text-center align-vcenter2 close-notification" id="<?php echo $notification->id; ?>" style="top: 75% !important;">
        </span> 
    </p>
</div>


@endforeach

</div> 

@endif


<!-- Modal -->


<style>

    
    
.notification-container {
	width:162% !important;
    padding-bottom: 4px !important; 

}
.site_notification{
    width:100% !important;
	margin: 0 0 2px 17px !important; 
	padding-top: 10px !important;
	padding-right: 10px !important;
	padding-bottom: 0px !important;
    background-color: #F4F8FA !important; 
    border-color: #00759E !important;
    border-left: 5px solid #00759E !important;
}

.modal-backdrop {
    position: fixed;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    z-index: 10 !important;
    background-color: #000;
}


</style>




