<div class="dropdown-item">
    <div>
        <strong class="text-success"><span class="fa fa-check"></span> Bid Accepted!</strong>
        <small class="text-success">{{ Carbon\Carbon::parse($notif->data['bidAccepted']['date'])->diffForHumans() }}</small>
    </div>
    <div style="white-space: normal;">
        <small><strong>{{ $notif->data['farmerfName'].' '.$notif->data['farmermiddleName'].'. '.$notif->data['farmerlName']}}</strong> accepted your bid request!</small>
    </div>
    
</div>
<hr>