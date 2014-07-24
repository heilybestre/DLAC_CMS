<?php 
$uid = $this->session->userdata('userid');
$notifs = $this->Notification_model->select_notifs($uid);
$notifcount = $this->Notification_model->select_count_unread($uid);
?>

<a id='notifbutton' class="btn dropdown-toggle" data-toggle="dropdown" href="index.html#">
  <i class="icon-warning-sign"></i>
  <?php
  if ($notifcount->count != 0)
    echo "<span class='notification red' style='padding:3px 5px 3px 5px; margin:10px; font-size:13px;'> $notifcount->count </span>";
  ?>
</a>
<ul class="dropdown-menu notifications" id="ulnotif">
  <li class="dropdown-menu-title">
    <span>
      <?php
      if ($notifcount->count == 1)
        echo "You have $notifcount->count new notification";
      else
        echo "You have $notifcount->count new notifications";
      ?>
    </span>
  </li>
  <?php foreach ($notifs as $notif) : ?>
    <li <?php if ($notif->status == 0) echo "style='background-color:#e8f1da'"; ?> onclick="notifclick(<?= $notif->notificationID ?>)">
      <a href="<?= base_url() . $notif->destination ?>">
        <?php
        //colors: blue, green, red, yellow, orange
        if ($notif->category == 'application')
          echo '<span class="icon blue"><i class="icon-inbox"></i></span>';
        else if ($notif->category == 'case')
          echo '<span class="icon orange"><i class="icon-folder-open"></i></span>';
        else if ($notif->category == 'calendar')
          echo '<span class="icon green"><i class="icon-calendar"></i></span>';
        else if ($notif->category == 'drafts')
          echo '<span class="icon yellow"><i class="icon-file"></i></span>';
        ?>
        <span class="message"><?= $notif->message ?></span>
        <span class="time"><?= date("n/d, h:i a", strtotime($notif->dateTime)) ?></span> 
      </a>
    </li><?php endforeach; ?>
</ul>