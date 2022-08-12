<?php
$koneksi = new mysqli("localhost", "root", "", "shoponline");
?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js"></script>

<body>
    <h2 style="text-align: center;">Selamat Datang di Halaman Administrator</h2>
    <br>

    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <h3 style="margin-left: 100px">Data Jumlah Kategori</h3>
                <canvas id="myChart"></canvas>
            </div>
            <div class="col-md-7">
                <h2 style="margin-left: 100px">SUIT STORE</h2>
            </div>
        </div>
    </div>

    <script>
    // donat diagram
    const data = {
        labels: [
            'Atasan',
            'Bawahan',
            'Luaran',
            'Daleman',
            'Aksesoris'
        ],
        datasets: [{
            label: 'My First Dataset',
            data: [
                // atasan
                <?php
                $query = mysqli_query($koneksi, "SELECT * FROM produk WHERE id_kategori='1'");
                $jumlah = mysqli_num_rows($query);
                echo $jumlah;
                ?>,
                // bawahan
                <?php
                $query = mysqli_query($koneksi, "SELECT * FROM produk WHERE id_kategori='2'");
                $jumlah = mysqli_num_rows($query);
                echo $jumlah;
                ?>,
                // luaran
                <?php
                $query = mysqli_query($koneksi, "SELECT * FROM produk WHERE id_kategori='3'");
                $jumlah = mysqli_num_rows($query);
                echo $jumlah;
                ?>,
                // daleman
                <?php
                $query = mysqli_query($koneksi, "SELECT * FROM produk WHERE id_kategori='4'");
                $jumlah = mysqli_num_rows($query);
                echo $jumlah;
                ?>,
                // aksesoris
                <?php
                $query = mysqli_query($koneksi, "SELECT * FROM produk WHERE id_kategori='5'");
                $jumlah = mysqli_num_rows($query);
                echo $jumlah;
                ?>
            ],
            backgroundColor: [
                'rgb(255, 99, 132)',
                'rgb(54, 162, 235)',
                'rgb(255, 205, 86)',
                'rgb(75, 192, 192)',
                'rgb(153, 102, 255)',
            ],
            hoverOffset: 5
        }]
    };
    const config = {
        type: 'pie',
        data: data,
    };


    const myChart = new Chart(document.getElementById('myChart'), config);
    </script>
</body>


<!-- <pre> -->
<?php // print_r($_SESSION); ?>
<!-- </pre> -->