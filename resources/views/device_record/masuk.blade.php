@extends('dashboard.template')

@section('content')
  <!-- Begin Page Content -->
  <div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Data Baru Masuk</h1>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Tabel data baru masuk</h6>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>No</th>
                <th>Text</th>
                <th>Audio</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tfoot>
              <tr>
                <th>No</th>
                <th>Text</th>
                <th>Audio</th>
                <th>Aksi</th>
              </tr>
            </tfoot>
            <tbody>
              @foreach ($data_in as $data)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $data->text }}</td>
                  <td></td>
                  <td>
                    <form action="" class="d-none" id="data_verify_{{ $loop->iteration }}"></form>
                    <form action="" class="d-none" id="data_reject_{{ $loop->iteration }}"></form>
                    <button onclick="" class="btn btn-success"><i class="fas fa-check fa-sm"></i></button>
                    <button onclick="" class="btn btn-danger"><i class="fas fa-times fa-sm"></i></button>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('js')
  <script>
    // Call the dataTables jQuery plugin
    $(document).ready(function() {
      $('#dataTable').DataTable({
        language: {
          url: '//cdn.datatables.net/plug-ins/1.13.5/i18n/id.json'
        }
      });
    });
  </script>
@endsection
