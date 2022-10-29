        <?php
        $xquery = $this->db->query("SELECT * FROM peserta WHERE nobp = '" . $this->session->userdata("userBBMK19") . "'");
        $row = $xquery->row();

        $zquery = $this->db->query("SELECT * FROM ukm WHERE id = '" . $row->id_ukm . "'");
        $row2 = $zquery->row();


        ?>

        <!-- ===== PAGE CONTENT ===== -->
        <img src="<?= base_url(); ?>assets3/img/bg.png" alt="" class="bg-content" />
        <div class="container-fluid">
            <div class="col-md-6 offset-md-3 form-regis text-center edit-profile">
                <div class="">
                    <div class="d-flex justify-content-center">
                        <div class="profile-photo mt-5">
                            <img src="<?= base_url() ?>assets/img/logo/<?= $row2->logo ?>" width="300" alt="" srcset="" />
                            <h2><?= $row2->nama ?></h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6 mt-5 me-auto ms-auto text-center mb-5">
                <div class="row row-cols-2">
                    <?php
                    if ($row2->timeline1) { ?>
                        <div class="col cal-col">
                            <img src="<?= base_url(); ?>assets3/img/calendar.png" class="calender-icon" alt="" />
                            <h3>Day 1</h3>
                            <p><?= $row2->timeline1; ?></p>
                        </div>
                    <?php
                    }
                    ?>
                    <?php
                    if ($row2->timeline2) { ?>
                        <div class="col cal-col">
                            <img src="<?= base_url(); ?>assets3/img/calendar.png" class="calender-icon" alt="" />
                            <h3>Day 2</h3>
                            <p><?= $row2->timeline2; ?></p>
                        </div>
                    <?php
                    }
                    ?>
                    <?php
                    if ($row2->timeline3) { ?>
                        <div class="col cal-col">
                            <img src="<?= base_url(); ?>assets3/img/calendar.png" class="calender-icon" alt="" />
                            <h3>Day 3</h3>
                            <p><?= $row2->timeline3; ?></p>
                        </div>
                    <?php
                    }
                    ?>
                    <?php
                    if ($row2->timeline4) { ?>
                        <div class="col cal-col">
                            <img src="<?= base_url(); ?>assets3/img/calendar.png" class="calender-icon" alt="" />
                            <h3>Day 4</h3>
                            <p><?= $row2->timeline4;    ?></p>
                        </div>
                    <?php
                    }
                    ?>


                </div>
            </div>
        </div>
        </div>
        </div>