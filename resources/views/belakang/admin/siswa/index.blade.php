@extends('belakang.admin.layouts.main')

@section('isi')
    <div class="card mb-4">
        <div class="card-header">
            <a href="#modalTambah" data-bs-toggle="modal" class="btn btn-outline-success"><i class="fas fa-plus me-1"></i>
                Tambah
                Data</a>
        </div>
        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>NISN</th>
                        <th>Kelas</th>
                        <th>Jurusan</th>
                        <th>Alamat</th>
                        <th>Moto</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Tiger Nixon</td>
                        <td>System Architect</td>
                        <td>Edinburgh</td>
                        <td>61</td>
                        <td>2011/04/25</td>
                        <td>$320,800</td>
                        <td>$320,800</td>
                        <td>
                            <a href="" title="Edit" class="btn btn-secondary btn-sm"><i
                                    class="fa-solid fa-pencil"></i></a>
                            <a href="" title="Lihat" class="btn btn-primary btn-sm"><i
                                    class="fa-solid fa-eye"></i></a>
                            <a href="" title="Hapus" class="btn btn-danger btn-sm"><i
                                    class="fa-solid fa-trash"></i></a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection

@push('modalTambah')
    <div class="modal fade" id="modalTambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('prosesTambahDataSiswa') }}" method="POST">
                        @csrf
                        <div class="form-floating mb-3">
                            <input class="form-control @error('nama') is-invalid @enderror" type="text" name="nama"
                                placeholder="Masukan Nama Kalian" />
                            <label>Nama Lengkap</label>
                            @error('nama')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input class="form-control @error('nisn') is-invalid @enderror" type="number" name="nisn"
                                placeholder="Masukan NISN Kalian" />
                            <label>Masukan NISN</label>
                            @error('nisn')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <select class="form-select" aria-label="Default select example">
                                <option selected>Pilih Kelas</option>
                                @forelse ($kelas as $k)
                                    <option value="{{ $k->jenjang_kelas }}">{{ $k->jenjang_kelas }}</option>
                                @empty
                                    <option selected>Belum Tersedia Data Kelas</option>
                                @endforelse
                            </select>
                            <label>Kelas</label>
                        </div>
                        <div class="form-floating mb-3">
                            <select class="form-select" aria-label="Default select example">
                                <option selected>Pilih Jurusan</option>
                                @forelse ($jurusan as $j)
                                    <option value="{{ $j->nama_jurusan }}">{{ $j->nama_jurusan }}</option>
                                @empty
                                    <option selected>Belum Tersedia Data Jurusan</option>
                                @endforelse
                            </select>
                            <label>Kelas</label>
                        </div>
                        <div class="form-floating mb-3">
                            <textarea class="form-control @error('alamat') is-invalid @enderror" name="alamat"></textarea>
                            <label for="floatingTextarea">Alamat</label>
                            @error('alamat')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <textarea class="form-control @error('moto') is-invalid @enderror" name="moto"></textarea>
                            <label for="floatingTextarea">Moto</label>
                            @error('moto')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                            <button class="btn btn-primary" type="submit"><i class="fa-regular fa-paper-plane"></i>
                                Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endpush
