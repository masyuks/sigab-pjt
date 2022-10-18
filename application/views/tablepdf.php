
<img src="./assets/img/headerx.png" alt="jasa-tirta-logo" style="width:100%" title="" />

<div style="margin:0 35px">
<hr>
</div>
<div style="margin:0 35px">
<p style="font-size:14px !important;line-height:20px !important;margin:0">Stasiun <b><?php echo $table[0]['nama_station']?></b></p>
<p style="font-size:14px !important;line-height:20px !important;margin:0">Terakhir Diupdate <b><?php echo $table[0]['DATETIME']?></b></p>
<p style="font-size:14px !important;line-height:20px !important;margin:0">Status Siaga <b><?php echo $table[0]['wl_siaga'];echo $table[0]['siaga']?></b></p>
</div>
<div style="margin:0 35px">
<hr>
</div>
<div class="alert alert-info" style="height:100%;margin:0 5px;">
  <div class="table-responsive" style="width:100%;margin:0 5px;">
    <table class="table" style="width:100%">
      <!-- AWLR -->
      <!-- 2 TIPE -->
      <?php if($type_table=='awlr') {?>

        <?php if($detail[0]['objecttype']=='RIVER'){ ?>
          <thead>
            <tr>
              <th>Waktu</th>
              <th>Jam</th>
              <th>TMA</th>
              <th>Debit (m3/s)</th>
            </tr>
          </thead>
          <tbody>

            <?php for($i=0;$i<count($table);$i++) { ?>
              <tr>
                <td style="text-align:center;width:25%;"><?php echo $table[$i]['DATETIME'] ?></td>
                <td style="text-align:center;width:25%;"><?php echo $time[$i] ?></td>
                <td style="text-align:center;width:25%;"><?php echo $table[$i]['tma'] ?></td>
                <td style="text-align:center;width:25%;"><?php echo sprintf("%.2f",$table[$i]['discharge']) ?></td>
              </tr>
            <?php }  ?>
          </tbody>

        <?php }else{  ?>

          <thead style="width:100%">
            <tr style="width:100%">
              <th style="width:20%">Waktu</th>
              <th style="width:25%">Jam</th>
              <th style="width:25%">Tma</th>
              <th style="width:25%">Inflow (m3/s)</th>
              <th style="width:25%">Outflow (m3/s)</th>
            </tr>
          </thead>
          <tbody style="width:100%">
            <?php for($i=0;$i<count($table);$i++) { ?>
              <tr style="width:100%">
                <td style="text-align:center;width:25%;"><?php echo $table[$i]['DATETIME'] ?></td>
                <td style="text-align:center;width:25%;"><?php echo $time[$i] ?></td>
                <td style="text-align:center;width:25%;"><?php echo $table[$i]['tma'] ?></td>
                <td style="text-align:center;width:25%;"><?php echo $table[$i]['discharge_inflow'] ?></td>
                <td style="text-align:center;width:25%;"><?php echo sprintf("%.2f",$table[$i]['discharge']) ?></td>
              </tr>
            <?php }  ?>
          </tbody>

        <?php } ?>
      <!-- ARR -->
      <?php }else{  ?>

        <thead>
          <tr>
            <th>Waktu</th>
            <th>Jam</th>
            <th>Curah Hujan (mm)</th>
            <th>Kumulatif (mm) </th>
          </tr>
        </thead>
        <tbody>
          <?php for($i=0;$i<count($table);$i++) { ?>
            <tr>
              <td style="text-align:center;width:25%;"><?php echo $table[$i]['DATETIME'] ?></td>
              <td style="text-align:center;width:25%;"><?php echo $time[$i] ?></td>
              <td style="text-align:center;width:25%;"><?php echo $table[$i]['hourly_rf'] ?></td>
              <td style="text-align:center;width:25%;"><?php echo $table[$i]['cumulative'] ?></td>

            </tr>
          <?php }  ?>
        </tbody>

      <?php } ?>

    </table>
  </div>
  </div>
  <div style="width:100%;position:absolute;bottom:0">
    <div style="margin:0 35px">
    <hr>
    </div>
    <img src="./assets/img/footerx.png" alt="jasa-tirta-logo" style="width:100%" title="" />
  </div>
