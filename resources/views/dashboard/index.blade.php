@extends('dashboard.template')

@section('content')
  <!-- Begin Page Content -->
  <div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
      {{-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
          class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> --}}
    </div>

    @foreach (session('alerts') ?? [] as $alert)
      <div class="alert alert-{{ $alert['mode'] }} alert-dismissible fade show" role="alert">
        {{ $alert->message }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    @endforeach

    <!-- Content Row -->
    <div class="row">

      <!-- Total data masuk -->
      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                  Total Data Masuk</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $tot_data_masuk }}</div>
              </div>
              <div class="col-auto">
                <i class="fas fa-database fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Total data terverifikasi -->
      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                  Total Data Terverifikasi</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $tot_data_terverifikasi }}</div>
              </div>
              <div class="col-auto">
                <i class="fas fa-check fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Total data ditolak -->
      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-danger shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                  Total Data Ditolak</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $tot_data_ditolak }}</div>
              </div>
              <div class="col-auto">
                <i class="fas fa-times fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Jumlah akun admin -->
      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                  Total data belum diproses</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $tot_data_belum_diproses }}</div>
              </div>
              <div class="col-auto">
                <i class="fas fa-exclamation fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Content Row -->

    <div class="row">

      <!-- Area Chart -->
      <div class="col-xl-8 col-lg-7">
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Sarung tangan Glo-Trans</h6>
          </div>
          <div class="card-body">
            <p>Sarung tangan ini dirancang dengan sensor flex dan gyroscope yang mampu menangkap gerakan tangan pengguna,
              dan data sensor tersebut akan diproses menggunakan algoritma Random Forest untuk mengenali gerakan tangan
              yang sesuai dengan bahasa isyarat SIBI. Gerakan tangan yang dikenali kemudian akan diterjemahkan menjadi
              teks atau suara yang dapat dimengerti oleh orang lain.</p>
            <p class="mb-0">Melalui pengembangan sarung tangan penerjemah bahasa
              isyarat SIBI ini, diharapkan penderita tuna rungu wicara dapat mengatasi hambatan komunikasi mereka dan
              lebih terlibat dalam kehidupan sehari-hari serta interaksi sosial.</p>
          </div>
        </div>
      </div>

      <!-- Pie Chart -->
      <div class="col-xl-4 col-lg-5">
        <div class="card shadow mb-4">
          <!-- Card Header - Dropdown -->
          <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Persentase Data</h6>
          </div>
          <!-- Card Body -->
          <div class="card-body">
            <div class="chart-pie pt-4 pb-2">
              <canvas id="persentasiDataPie"></canvas>
            </div>
            <div class="mt-4 text-center small">
              <span class="mr-2">
                <i class="fas fa-circle text-success"></i> Terverifikasi
              </span>
              <span class="mr-2">
                <i class="fas fa-circle text-danger"></i> Ditolak
              </span>
              <span class="mr-2">
                <i class="fas fa-circle text-warning"></i> Belum Diproses
              </span>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
  <!-- /.container-fluid -->
@endsection

@section('js')
  <script>
    // Set new default font family and font color to mimic Bootstrap's default styling
    Chart.defaults.global.defaultFontFamily = 'Nunito',
      '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
    Chart.defaults.global.defaultFontColor = '#858796';

    // Pie Chart Example
    var ctx = document.getElementById("persentasiDataPie");
    var myPieChart = new Chart(ctx, {
      type: 'doughnut',
      data: {
        labels: ["Terverifikasi", "Ditolak", "Belum diproses"],
        datasets: [{
          data: [{{ $tot_data_terverifikasi }}, {{ $tot_data_ditolak }}, {{ $tot_data_belum_diproses }}],
          backgroundColor: ['#28a745', '#dc3545', '#ffc107'],
        }],
      },
      options: {
        maintainAspectRatio: false,
        tooltips: {
          backgroundColor: "rgb(255,255,255)",
          bodyFontColor: "#858796",
          borderColor: '#dddfeb',
          borderWidth: 1,
          xPadding: 15,
          yPadding: 15,
          displayColors: false,
          caretPadding: 10,
        },
        legend: {
          display: false
        },
        cutoutPercentage: 80,
      },
    });
  </script>
@endsection
