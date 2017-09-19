<div class="dropdown-item">
    <div>
        <strong class="text-danger"><span class="fa fa-ban"></span> Sale Cancelled!</strong>
        <small class="text-danger">{{ Carbon\Carbon::parse($notif->data['saleCanceled']['date'])->diffForHumans() }}</small>
    </div>
    <div style="white-space: normal;">
        <small><strong>{{ $notif->data['farmerfName'].' '.$notif->data['farmermiddleName'].'. '.$notif->data['farmerlName']}}</strong> canceled a sale you bid on.</small>
    </div>

</div>
<hr>