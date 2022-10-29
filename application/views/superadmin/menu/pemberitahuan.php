<div class="content-wrapper">
    <section class="content">
        <?php
        $query = $this->db->query("SELECT * FROM ukm");
        foreach ($query->result() as $ukm) { ?>

            <div class="container-fluid">
                <h3><?= $ukm->nama ?></h3>
                <?php

                $xquery = $this->db->query("SELECT * FROM pemberitahuan WHERE id_ukm = '$ukm->id'");
                foreach ($xquery->result() as $data) { ?>
                    <p style="border-bottom: 1px solid grey; padding-bottom: 5px; width: 50%"><b><?= $data->judul; ?></b> <small><i>(<?= $data->waktu; ?>)</i></small></p>
                    <p><?= $data->isi; ?></p>
                    <hr class="bg-primary">
                    <br /><br /><br /><br />
                <?php    }
                ?>
            </div>

        <?php
        }
        ?>
    </section>
</div>