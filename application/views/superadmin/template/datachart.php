<script>
    // verif
    new Chart(document.getElementById("verif-chart"), {
        type: 'doughnut',
        data: {
            labels: ["Sudah diverifikasi", "Belum diverifikasi", "Verifikasi ditolak"],
            datasets: [{
                label: "Population (millions)",
                backgroundColor: ["#3e95cd", "#8e5ea2", "#3cba9f", "#e8c3b9", "#c45850", "#ffc93c", "#dbf6e9", "#9ddfd3", "#31326f", "#31326f", "#e84545", "#903749", "#53354a", "#f39189", "#bb8082", "#6e7582", "#046582", "#f8f5f1", "#1f441e", "#cee6b4"],
                data: [
                    <?php
                    echo ($jumlah_verif21->num_rows() . ',');
                    echo ($jumlah_belumverif21->num_rows() . ',');
                    echo ($jumlah_nonverif21->num_rows() . ',');

                    ?>

                ]
            }]
        },
        options: {
            title: {
                display: true,
                text: 'Verifikasi Peserta BBMK 2021'
            }
        }
    });
</script>