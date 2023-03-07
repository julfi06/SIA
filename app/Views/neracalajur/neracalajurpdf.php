<html>
    <head>
        <style>
            .aturangka{
                text-align: right;
            }
            .judul{
                text-align: center;
                font-style: bold;
                font-size: 20px;
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
        <p class="judul">Neraca Lajur</p>
        <p class="periode">Periode : <?= date('d F Y', strtotime($tglawal)) . " - " . date('d F Y', strtotime($tglakhir)) ?></p>
        <br />
        <br />
                    <table border="0.1px" class="table table-striped table-md">
                        <thead class="judul">
                            <tr>
                                <td class="aturtengah" rowspan="2" width="50px">Kode Akun</td>
                                <td class="aturtengah" rowspan="2" width="100px">Deskripsi</td>
                                <td class="aturtengah" colspan="2" width="100px">Neraca Saldo</td>
                                <td class="aturtengah" colspan="2" width="100px">Jurnal Penyesuaian</td>
                                <td class="aturtengah" colspan="2" width="100px">NS yang Disesuaikan</td>
                                <td class="aturtengah" colspan="2" width="100px">Laba Rugi</td>
                                <td class="aturtengah" colspan="2" width="100px">Neraca</td>
                          </tr>
                          <tr>
                                <td class="aturtengah" width="50px">Debit</td>
                                <td class="aturtengah" width="50px">Kredit</td>
                                <td class="aturtengah" width="50px">Debit</td>
                                <td class="aturtengah" width="50px">Kredit</td>
                                <td class="aturtengah" width="50px">Debit</td>
                                <td class="aturtengah" width="50px">Kredit</td>
                                <td class="aturtengah" width="50px">Debit</td>
                                <td class="aturtengah" width="50px">Kredit</td>
                                <td class="aturtengah" width="50px">Debit</td>
                                <td class="aturtengah" width="50px">Kredit</td>
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

                            $totns = 0;
                            $totkd = 0;
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
                                    <td class="aturtengah" width="50px"><?= $value->kode_akun3 ?></td>
                                    <td class="aturkiri" width="100px"><?= $value->nama_akun3 ?></td>
                                    <td class="aturkanan" width="50px"><?= number_format($debitnew, 0, ",", ",") ?></td>
                                    <td class="aturkanan" width="50px"><?= number_format($kreditnew, 0, ",", ",") ?></td>
                                    <td class="aturkanan" width="50px"><?= number_format($debitnewjp, 0, ",", ",") ?></td>
                                    <td class="aturkanan" width="50px"><?= number_format($kreditnewjp, 0, ",", ",") ?></td>
                                    <td class="aturkanan" width="50px"><?= number_format($debs, 0, ",", ",") ?></td>
                                    <td class="aturkanan" width="50px"><?= number_format($kres, 0, ",", ",") ?></td>
                                    <td class="aturkanan" width="50px"><?= number_format($lb_kr, 0, ",", ",") ?></td>
                                    <td class="aturkanan" width="50px"><?= number_format($lb_db, 0, ",", ",") ?></td>
                                    <td class="aturkanan" width="50px"><?= number_format($nrbs, 0, ",", ",") ?></td>
                                    <td class="aturkanan" width="50px"><?= number_format($nrkd, 0, ",", ",") ?></td>
                                </tr>
                          <?php endforeach; ?>
                        </tbody>
                        <tfoot class="judul">
                            <tr>
                                <td class="text-center"></td>
                                <td class="text-center"></td>
                                <td class="aturkanan" width="50px"><?= number_format($td, 0, ",", ",") ?></td>
                                <td class="aturkanan" width="50px"><?= number_format($tk, 0, ",", ",") ?></td>
                                <td class="aturkanan" width="50px"><?= number_format($tdjp, 0, ",", ",") ?></td>
                                <td class="aturkanan" width="50px"><?= number_format($tkjp, 0, ",", ",") ?></td>
                                <td class="aturkanan" width="50px"><?= number_format($totd, 0, ",", ",") ?></td>
                                <td class="aturkanan" width="50px"><?= number_format($totk, 0, ",", ",") ?></td>
                                <td class="aturkanan" width="50px"><?= number_format($lb_tk, 0, ",", ",") ?></td>
                                <td class="aturkanan" width="50px"><?= number_format($lb_td, 0, ",", ",") ?></td>
                                <td class="aturkanan" width="50px"><?= number_format($totns, 0, ",", ",") ?></td>
                                <td class="aturkanan" width="50px"><?= number_format($totkd, 0, ",", ",") ?></td>
                            </tr>
                            <tr>
                                <td class="text-center"></td>
                                <td class="text-left">Laba Bersih</td>
                                <td class="text-right"></td>
                                <td class="text-right"></td>
                                <td class="text-right"></td>
                                <td class="text-right"></td>
                                <td class="text-right"></td>
                                <td class="text-right"></td>
                                <td class="text-right"><?= number_format(($lb_td-$lb_tk), 0, ",", ",") ?></td>
                                <td class="text-right"></td>
                                <td class="text-right"></td>
                                <td class="text-right"><?= number_format(($totns-$totkd), 0, ",", ",") ?></td>
                            </tr>
                            <tr>
                                <td class="text-center"></td>
                                <td class="text-left">Total</td>
                                <td class="text-right"></td>
                                <td class="text-right"></td>
                                <td class="text-right"></td>
                                <td class="text-right"></td>
                                <td class="text-right"></td>
                                <td class="text-right"></td>
                                <td class="text-right"><?= number_format(($lb_bersih + $lb_tk), 0, ",", ",") ?></td>
                                <td class="text-right"><?= number_format($lb_td, 0, ",", ",") ?></td>
                                <td class="text-right"><?= number_format($totns, 0, ",", ",") ?></td>
                                <td class="text-right"><?= number_format(($totns-$totkd)+$totkd, 0, ",", ",") ?></td>
                            </tr>
                        </tfoot>
                    </table>
                    <br />
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