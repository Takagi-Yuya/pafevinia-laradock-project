<?php
$limit = 7;
$now_seconds = time();
$part_seconds = time() - strtotime($part->created_at);
$days = $part_seconds / 86400;
if ($days < $limit) {
  $tag = "New !!";
};
?>
@if($tag != null)
<span class="badge badge-warning">{{$tag}}</span>
@endif
