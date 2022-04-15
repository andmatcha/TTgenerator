<?php

require('../app/db-settings.php');

// live_idを取得して表示するライブを特定
$live_id = filter_input(INPUT_GET, 'live_id');
print_r($live_id);

//対象のライブの時間枠を取得
$timeframes_stmt = $db->prepare("select * from timeframes where live_id = ?");
$timeframes_stmt->execute([$live_id]);
$timeframes = $timeframes_stmt->fetchAll();

// 対象のライブのバンド情報を取得
//バンドメンバーを取得
$bandname_stmt = $db->prepare("select * from bands left join band_members on bands.id = band_members.band_id where live_id = ?");
$bandname_stmt->execute([$live_id]);
$badnames = $bandname_stmt->fetchall();

//メンバーごとに参加できない時間枠を取得


//バンドごとに時間枠




foreach ($badnames as $b_index => $b_name) :
  $stmt = $db->prepare("
    with t as (
      select
        *
      from
        band_members
      where
        band_id = ?
    )
    select
      timeframe_id,
      count(*) as c
    from
      not_attend
      left join t on not_attend.member_id = t.member_id
    where
      not_attend.member_id = t.member_id
    group by
      timeframe_id
    order by
      timeframe_id;
  ");

  $stmt->execute([$b_index + 1]);
  $arr = $stmt->fetchall();

?>
  <h2><?= $b_name['name'] ?></h2>
  <?php
  foreach ($arr as $index => $value) :
  ?>

    <div>(<?= $index + 1 ?>) <?= $date[$index]['start_time'] ?>: 欠席者<?= $value['c']; ?>人</div>

<?php endforeach;
endforeach;
