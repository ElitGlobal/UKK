@extends('belakang.admin.layouts.main')

@section('isi')
    <div class="card mb-4">
        <div class="card-header">
            <i class="fa-solid fa-chart-simple"></i> Daftar Edit Kelas
        </div>
        <div class="card-body">
            <form action="{{ route('prosesEditDataJurusan', $kelas->id) }}" method="POST">
                @csrf
                @method('put')
                <div class="form-floating mb-3">
                    <input class="form-control @error('kode_kelas') is-invalid @enderror" type="text" name="kode_kelas"
                        placeholder="Masukan Nama Kalian" value="{{ $kelas->kode_kelas }}" />
                    <label>Kode Kelas</label>
                    @error('kode_kelas')
                        <div class="alert alert-danger mt-2">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-floating mb-3">
                    <input class="form-control @error('jenjang_kelas') is-invalid @enderror" type="number"
                        name="jenjang_kelas" placeholder="Masukan NISN Kalian" value="{{ $kelas->jenjang_kelas }}" />
                    <label>Jenjang Kelas</label>
                    @error('jenjang_kelas')
                        <div class="alert alert-danger mt-2">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                    <button class="btn btn-primary" type="submit"><i class="fa-regular fa-paper-plane"></i> Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection
