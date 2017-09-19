<div class="dropdown-item">
    <div>
        <strong class="text-secondary"><span class="fa fa-pencil"></span> Sale Edited</strong>
        <small class="text-secondary">{{ Carbon\Carbon::parse($notif->data['saleEdited']['date'])->diffForHumans() }}</small>
    </div>
    <div style="padding:1; white-space: normal;">
        <small><strong>{{ $notif->data['farmerfName'].' '.$notif->data['farmermiddleName'].'. '.$notif->data['farmerlName']}}</strong> edited his/her sale detail(s).</small>
    </div>
</div>
<hr>