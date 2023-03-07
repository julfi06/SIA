<html>
    <head>
        <style>
            .aturangka{
                text-align: right;
            }
            .judul{
                text-align: center;
                font-style: bold;
                font-size: 15px;
            }
            .aturtengah{
                text-align: center;
            }
            .aturkiri{
                text-align: left;
            }
            .aturkanan{
                text-align: right;
            }
            .periode{
                text-align: center;
            }
        </style>

    </head>
    <body>
    <p class="judul">Laba Rugi</p>
    <p class="periode">Periode : <?= date('d F Y', strtotime($tglawal)) . " - " . date('d F Y', strtotime($tglakhir)) ?></p>
    <br />
    <br />
    <br>
    <br>
    <br>

                    <table class="table tab-bordered">
                        <thead class="judul">
                            <tr>
                                <td class="text-center" rowspan="2"></td>
                                <td class="text-center" rowspan="2"></td>
                                <td class="aturkanan" rowspan="2"></td>
                                <td class="aturkanan" rowspan="2"></td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $td = 0;
                            $tk = 0;

                            $tdjp = 0;
                            $tkjp = 0;

                            $totk = 0;
                            $totd = 0;

                            $lb_td = 0;
                            $lb_tk = 0;
                            $lb_bersih = 0;

                            $totns = 0;
                            $totkd = 0;

                            $bbk = 0;
                            $ppk = 0;
                            ?>
                            <?php foreach ($dttransaksi as $key => $value) : ?>
                                <?php
                                $d = $value->jumdebit;
                                $k = $value->jumkredit;
                                $neraca = $d - $k;

                                //jurnal penyesuaian
                                $djp = $value->jumdebits;
                                $kjp = $value->jumkredits;
                                $neracajp = $djp - $kjp;

                                if ($neracajp < 0){
                                    $kreditnewjp = abs($neracajp);
                                    $tkjp = $tkjp + $kreditnewjp;
                                } else{
                                    $kreditnewjp = 0;
                                }

                                if ($neracajp > 0){
                                    $debitnewjp = ($neracajp);
                                    $tdjp = $tdjp + $debitnewjp;
                                } else{
                                    $debitnewjp = 0;
                                }

                                if ($neraca < 0){
                                    $kreditnew = abs($neraca);
                                    $tk = $tk + $kreditnew;
                                } else{
                                    $kreditnew = 0;
                                }

                                if ($neraca > 0){
                                    $debitnew = $neraca;
                                    $td = $td + $debitnew;
                                } else{
                                    $debitnew = 0;
                                }

                                //tambahan jurnal penyesuaian
                                $ns = $debitnew - $kreditnew + $value->jumdebits - $value->jumkredits;

                                if($ns > 0){
                                    $debs = $ns;
                                    $totd = $totd + $debs;
                                } else{
                                    $debs = 0;
                                }

                                if($ns < 0){
                                    $kres = abs($ns);
                                    $totk = $totk + $kres;
                                } else{
                                    $kres = 0;
                                }

                                //laba rugi
                                $kode_akun = $value->kode_akun3;
                                $kode = substr($kode_akun, 0, 1);

                                if ($value->kode_akun3 == 4101){
                                    $nama_akun4101 = $value->nama_akun3;
                                } else {
                                    $nama_akun4101 = '';
                                }
                                if ($value->kode_akun3 == 4201){
                                    $nama_akun4201 = $value->nama_akun3;
                                } else {
                                    $nama_akun4201 = '';
                                }
                                if ($value->kode_akun3 == 5101){
                                    $nama_akun5101 = $value->nama_akun3;
                                } else {
                                    $nama_akun5101 = '';
                                }

                                if ($value->kode_akun3 == 4101){
                                    $pendapatan1 = $kres;
                                    $ppk = $ppk + $pendapatan1;
                                } else{
                                    $pendapatan1 = 0;
                                }
                                if ($value->kode_akun3 == 4201){
                                    $pendapatan2 = $kres;
                                    $ppk = $ppk + $pendapatan2;
                                } else{
                                    $pendapatan2 = 0;
                                }
                                if ($value->kode_akun3 == 5101){
                                    $beban1 = $debs;
                                    $bbk = $bbk + $beban1;
                                } else{
                                    $beban1 = 0;
                                }
                                if ($value->kode_akun3 == 5102){
                                    $beban2 = $debs;
                                    $bbk = $bbk + $beban2;
                                } else{
                                    $beban2 = 0;
                                }
                                if ($value->kode_akun3 == 5103){
                                    $beban3 = $debs;
                                    $bbk = $bbk + $beban3;
                                } else{
                                    $beban3 = 0;
                                }
                                if ($value->kode_akun3 == 5104){
                                    $beban4 = $debs;
                                    $bbk = $bbk + $beban4;
                                } else{
                                    $beban4 = 0;
                                }
                                if ($value->kode_akun3 == 5105){
                                    $beban5 = $debs;
                                    $bbk = $bbk + $beban5;
                                } else{
                                    $beban5 = 0;
                                }
                                if ($value->kode_akun3 == 5106){
                                    $beban6 = $debs;
                                    $bbk = $bbk + $beban6;
                                } else{
                                    $beban6 = 0;
                                }
                                if ($value->kode_akun3 == 5107){
                                    $beban7 = $debs;
                                    $bbk = $bbk + $beban7;
                                } else{
                                    $beban7 = 0;
                                }
                                if ($value->kode_akun3 == 5108){
                                    $beban8 = $debs;
                                    $bbk = $bbk + $beban8;
                                } else{
                                    $beban8 = 0;
                                }

                                if ($kode == 4){
                                    $lb_db = $kres;
                                    $lb_td = $lb_td + $lb_db;
                                } else{
                                    $lb_db = 0;
                                }
                                if ($kode == 5){
                                    $lb_kr = $debs;
                                    $lb_tk = $lb_tk + $lb_kr;
                                } else{
                                    $lb_kr = 0;
                                }

                                $lb_bersih = $lb_td - $lb_tk;

                                //neraca
                                if ($kode <=3 and $ns > 0){
                                    $nrbs = $debs;
                                    $totns = $totns + $nrbs;
                                } else {
                                    $nrbs = 0;
                                }

                                if ($kode <=3 and $ns < 0){
                                    $nrkd = abs($ns);
                                    $totkd = $totkd + $nrkd;
                                } else {
                                    $nrkd = 0;
                                }

                                ?>
                                <tr>
                                    <td><?php if($kode == 4){ ?><?= $value->nama_akun3 ?><?php } ?></td>
                                    <td class="aturkanan"></td>
                                    <td class="aturtengah"><?= number_format($lb_db) ?></td>
                                    <td class="aturkanan"></td>
                                </tr>
                                <tr>
                                    <td class="aturkanan"></td>
                                    <td><?php if($kode == 5){ ?><?= $value->nama_akun3 ?><?php } ?></td>
                                    <td class="aturkanan"></td>
                                    <td class="aturtengah"><?= number_format($lb_kr) ?></td>
                                </tr>
                          <?php endforeach; ?>
                            <tr>
                                <td class="aturkanan"></td>
                                <td></td>
                                <td class="aturtengah">_________ +</td>
                                <td class="aturtengah">_________ +</td>
                            </tr>
                        </tbody>
                        <tfoot class="judul">
                            <tr>
                                <td class="aturkanan"></td>
                                <td>Total Beban</td>
                                <td class="aturkanan"></td>
                                <td class="aturtengah"><?= number_format($lb_tk, 0, ",", ",") ?></td>
                            </tr>
                            <tr>
                                <td class="aturkiri">Laba Kotor</td>
                                <td class="aturkanan"></td>
                                <td class="aturtengah"><?= number_format($lb_td, 0, ",", ",") ?></td>
                                <td class="aturkanan"></td>
                            </tr>
                            <tr>
                                <td class="aturkanan"></td>
                                <td></td>
                                <td class="aturtengah">_________ -</td>
                                <td class="aturkanan"></td>
                            </tr>
                            <tr class="khusus">
                                <td class="aturkiri">Laba Bersih</td>
                                <td class="aturkanan"></td>
                                <td class="aturtengah"><?= number_format($lb_bersih, 0, ",", ",") ?></td>
                                <td class="aturkanan"></td>
                            </tr>
                        </tfoot>
                    </table>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
        <?php
        $tgl = date('l, d-m-y');
        echo $tgl;
        ?>
        <br />
        <br />
        Kepala Keuangan
        <br />
        <br />
        _______________
        <br />
        Nonik
    </body>
</html>

