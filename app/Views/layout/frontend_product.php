<div class="container mt-5">
    <h1 class="text-center mb-4">LAYANAN PAKET</h1>

    <div class="row d-flex align-items-stretch">
        <!-- Paket Dasar -->
        <div class="col-md-4 mb-4">
            <div class="card">
                <div class="card-header text-center">
                    <h5 class="card-title">Paket Dasar</h5>
                </div>
                <div class="card-body">
                    <h6 class="card-subtitle mb-2 text-muted">Harga: <strong>Rp 1.500.000/bulan</strong></h6>
                    <ul class="list-group">
                        <li class="list-group-item">Koneksi: PTP</li>
                        <li class="list-group-item">Jarak: Hingga 5 km</li>
                        <li class="list-group-item">Bandwidth: 100 Mbps</li>
                        <li class="list-group-item">Dukungan: 8/5</li>
                    </ul>
                </div>
                <div class="card-footer text-center">
                    <button class="btn btn-primary mt-auto w-100" onclick="setPackage('Paket Dasar', 1500000)">Beli Paket</button>

                </div>
            </div>
        </div>

        <!-- Paket Menengah -->
        <div class="col-md-4 mb-4">
            <div class="card">
                <div class="card-header text-center">
                    <h5 class="card-title">Paket Menengah</h5>
                </div>
                <div class="card-body">
                    <h6 class="card-subtitle mb-2 text-muted">Harga: <strong>Rp 2.500.000/bulan</strong></h6>
                    <ul class="list-group">
                        <li class="list-group-item">Koneksi: PTP</li>
                        <li class="list-group-item">Jarak: Hingga 10 km</li>
                        <li class="list-group-item">Bandwidth: 500 Mbps</li>
                        <li class="list-group-item">Dukungan: 8/5</li>
                    </ul>
                </div>
                <div class="card-footer text-center">
                    <button class="btn btn-primary mt-auto w-100" onclick="setPackage('Paket Menengah', 2500000)">Beli Paket</button>
                </div>
            </div>
        </div>

        <!-- Paket Premium -->
        <div class="col-md-4 mb-4">
            <div class="card">
                <div class="card-header text-center">
                    <h5 class="card-title">Paket Premium</h5>
                </div>
                <div class="card-body">
                    <h6 class="card-subtitle mb-2 text-muted">Harga: <strong>Rp 4.000.000/bulan</strong></h6>
                    <ul class="list-group">
                        <li class="list-group-item">Koneksi: PTP</li>
                        <li class="list-group-item">Jarak: Hingga 20 km</li>
                        <li class="list-group-item">Bandwidth: 1 Gbps</li>
                        <li class="list-group-item">Dukungan: 24/7</li>
                    </ul>
                </div>
                <div class="card-footer text-center">
                    <button class="btn btn-primary mt-auto w-100" onclick="setPackage('Paket Premium', 4000000)">Beli Paket</button>
                </div>
            </div>
        </div>

    </div>
</div>
<script>
    function setPackage(packageName, packagePrice) {
        $.post('/pendaftaran/setPackage', {
            package_name: packageName,
            package_price: packagePrice
        }, function(response) {
            console.log(response); // Tambahkan ini untuk melihat respons
            window.location.href = '/pendaftaran';
        }).fail(function(jqXHR, textStatus, errorThrown) {
            console.error("Request failed: " + textStatus + ", " + errorThrown);
        });
    }
</script>