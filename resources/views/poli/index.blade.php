@extends('main')

@section('main')
<nav class="navbar bg-primary">
    <div class="container">
        <a class="navbar-brand" href="#">
            <h1>RS REKSA WALUYA</h1>
        </a>
    </div>
</nav>

<div class="container mt-5">
    <div class="row d-flex flex-row-reverse">
        <div class="col-4">
            <div class="input-group mb-3">
                <label class="input-group-text" for="inputGroupSelect01">Pilih Poli</label>
                <select class="form-select" id="inputGroupSelect01" name="poli">
                    <option selected disabled>Poli Nomor...</option>
                    @for ($i = 1; $i <= 12; $i++) <option value="{{ $i }}">{{ $i }}</option>
                        @endfor
                </select>
            </div>
        </div>
    </div>
</div>

<div class="container-lg mt-3">
    <div class="row">
        <div class="col">
            <table class="table table-bordered table-hover table-striped table-sm" id="myTable">
                <thead>
                    <tr>
                        <th>TANGGAL REGISTRASI</th>
                        <th>NO REKAM MEDIS</th>
                        <th>NAMA PASIEN</th>
                        <th>DOKTER</th>
                        <th>PILIHAN</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
    Launch demo modal
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered   modal-sm  ">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>

@endsection