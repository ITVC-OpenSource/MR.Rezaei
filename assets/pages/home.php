<?php
    include(__DIR__ . "/../php/config.php");
    $s = [];
    $res = $PDO->query("SELECT * FROM `scores` WHERE `status` = 2 AND `school` = '" . $user_data['school'] . "'");
    if ($res->rowCount() == 0) {
        ?>
            <body>
            <?php include(__DIR__ . "/menu.php"); ?>
            <div class="d-flex">
                <div class="text-success bg-white p-2 m-1" style="border-radius: 5px;width: 49.95%; min-width: 300px; border: 1px solid #eeeeee;">
                    <div style="display: inline-flex;">
                        <h4 class="bi bi-person-check-fill">&nbsp;<h6 class="mr-2">بیشترین امتیاز پرورشی متعلق است به:  </h6></h4>
                    </div>
                    <br>
                    <h4 class="text-center">درخواستی در سیستم وجود ندارد!</h4>
                </div>
                <div class="text-success bg-white p-2 m-1" style="border-radius: 5px;width: 49.95%; min-width: 300px; border: 1px solid #eeeeee;">
                    <div style="display: inline-flex;">
                        <h4 class="bi bi-person-check-fill">&nbsp;<h6 class="mr-2">بیشترین امتیاز آموزشی متعلق است به:  </h6></h4>
                    </div>
                    <br>
                    <h4 class="text-center">درخواستی در سیستم وجود ندارد!</h4>
                </div>
            </div>
            </body>
        <?php
    } else {
        foreach ($res as $row) {
            $a = ["number" => $row['number'] , "id" => $row['sender_id']];
            $j_r = json_encode($a);
            array_push($s , $j_r);
        }
        sort($s);
        $r = json_decode($s[0]);
        $uq = $PDO->query("SELECT * FROM `users` WHERE `id` = '" . $r->id . "'");
        $u = $uq->fetch(PDO::FETCH_ASSOC);
    ?>
    <body>
    <?php include(__DIR__ . "/menu.php"); ?>
    <div class="d-flex">
        <div class="text-success bg-white p-2 m-1" style="border-radius: 5px;width: 49.95%; min-width: 300px; border: 1px solid #eeeeee;">
            <div style="display: inline-flex;">
                <h4 class="bi bi-person-check-fill">&nbsp;<h6 class="mr-2">بیشترین امتیاز پرورشی متعلق است به:  </h6></h4>
            </div>
            <br>
            <h4 class="text-center"><?php echo $u['name']; ?></h4>
        </div>
        <div class="text-success bg-white p-2 m-1" style="border-radius: 5px;width: 49.95%; min-width: 300px; border: 1px solid #eeeeee;">
            <div style="display: inline-flex;">
                <h4 class="bi bi-person-check-fill">&nbsp;<h6 class="mr-2">بیشترین امتیاز آموزشی متعلق است به:  </h6></h4>
            </div>
            <br>
            <h4 class="text-center"><?php echo $u['name']; ?></h4>
        </div>
    </div>
    </body>
<?php } ?>