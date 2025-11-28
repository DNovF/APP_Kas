<div class="container mt-4">
    <div class="row g-3">

        <div class="col-md-3">
            <div class="card border-0 shadow-sm rounded-4">
                <div class="card-body">
                    <p class="text-muted mb-1">Total Produk</p>
                    <h3 class="fw-bold">{{ $totalProduk }}</h3>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card border-0 shadow-sm rounded-4">
                <div class="card-body">
                    <p class="text-muted mb-1">Total Transaksi</p>
                    <h3 class="fw-bold">{{ $totalTransaksi }}</h3>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card border-0 shadow-sm rounded-4">
                <div class="card-body">
                    <p class="text-muted mb-1">Total Pendapatan</p>
                    <h3 class="fw-bold">Rp {{ number_format($totalPendapatan, 0, ',', '.') }}</h3>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card border-0 shadow-sm rounded-4">
                <div class="card-body">
                    <p class="text-muted mb-1">Total User</p>
                    <h3 class="fw-bold">{{ $totalUser }}</h3>
                </div>
            </div>
        </div>
    </div>

    <div class="card border-0 shadow-sm rounded-4 mt-4">
    <div class="card-body">
        <div class="d-flex justify-content-between">
            <h5 class="fw-bold">Analytics Transaksi</h5>
            <span class="badge bg-light text-dark border">Last 12 Months</span>
        </div>

        <h2 class="fw-bold mb-0">
            {{ $totalPendapatan ? 'Rp ' . number_format($totalPendapatan, 0, ',', '.') : 'Rp 0' }}
        </h2>
        <p class="text-success small mb-3">
            +{{ $totalTransaksi }} transaksi this year
        </p>

        <canvas id="chartAnalytic" height="100"></canvas>
    </div>
</div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
document.addEventListener("livewire:init", () => {

    const ctx = document.getElementById('chartAnalytic').getContext('2d');

    const gradient = ctx.createLinearGradient(0, 0, 0, 200);
    gradient.addColorStop(0, 'rgba(121, 80, 242, 0.4)');
    gradient.addColorStop(1, 'rgba(121, 80, 242, 0.0)');

    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: @json($grafikBulan),
            datasets: [
                {
                    label: "Pendapatan",
                    data: @json($grafikPendapatan),
                    backgroundColor: gradient,
                    borderColor: "#7950f2",
                    borderWidth: 2,
                    borderRadius: 6
                },
                {
                    label: "Transaksi",
                    data: @json($grafikTransaksi),
                    backgroundColor: "rgba(0, 0, 0, 0.05)",
                    borderColor: "#adb5bd",
                    borderWidth: 1,
                    borderRadius: 6
                }
            ]
        },
        options: {
            responsive: true,
            plugins: {
                legend: { display: false }
            },
            scales: {
                x: { grid: { display: false } },
                y: { grid: { color: "#f1f3f5" } }
            }
        }
    });
});
</script>

