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
                        <th>Kode Kelas</th>
                        <th>Jenjang Kelas</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $no = 1;
                    @endphp

                    @forelse ($kelas as $k)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $k->kode_kelas }}</td>
                            <td>{{ $k->jenjang_kelas }}</td>
                            <td>
                                <a href="#modalEdit{{ $k->id }}" data-bs-toggle="modal" title="Edit"
                                    class="btn btn-secondary btn-sm"><i class="fa-solid fa-pencil"></i></a>
                                <a href="#modalLihat{{ $k->id }}" data-bs-toggle="modal" title="Lihat"
                                    class="btn btn-primary btn-sm"><i class="fa-solid fa-eye"></i></a>
                                <a href="#modalHapus{{ $k->id }}" data-bs-toggle="modal" title="Hapus"
                                    class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i></a>
                            </td>
                        </tr>
                    @empty
                        <div class="alert alert-danger" role="alert">
                            Data Belum Tersedia
                        </div>
                    @endforelse

                </tbody>
            </table>
        </div>
    </div>
@endsection

@push('modalLihat')
    @foreach ($kelas as $k)
        <div class="modal fade" id="modalLihat{{ $k->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-floating mb-3">
                            <input class="form-control" type="text" name="kode_kelas" placeholder="Masukan Nama Kalian"
                                value="{{ $k->kode_kelas }}" />
                            <label>Kode Kelas</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input class="form-control" type="number" name="jenjang_kelas"
                                placeholder="Masukan NISN Kalian" value="{{ $k->jenjang_kelas }}" />
                            <label>Jenjang Kelas</label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endpush

@push('modalEdit')
    @foreach ($kelas as $k)
        <div class="modal fade" id="modalEdit{{ $k->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('prosesEditDataKelas', $k->id) }}" method="POST">
                            @csrf
                            @method('put')
                            <div class="form-floating mb-3">
                                <input class="form-control @error('kode_kelas') is-invalid @enderror" type="text"
                                    name="kode_kelas" placeholder="Masukan Nama Kalian" value="{{ $k->kode_kelas }}" />
                                <label>Kode Kelas</label>
                                @error('kode_kelas')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-floating mb-3">
                                <input class="form-control @error('jenjang_kelas') is-invalid @enderror" type="number"
                                    name="jenjang_kelas" placeholder="Masukan NISN Kalian"
                                    value="{{ $k->jenjang_kelas }}" />
                                <label>Jenjang Kelas</label>
                                @error('jenjang_kelas')
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
    @endforeach
@endpush

@push('modalHapus')
    @foreach ($kelas as $k)
        <div class="modal fade" id="modalHapus{{ $k->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Apakah anda yakin ingin menghapus data : <b>{{ $k->jenjang_kelas }}</b></p>
                    </div>
                    <div class="modal-footer">
                        <form action="{{ route('deleteDataKelas', $k->id) }}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endpush

@push('modalTambah')
    <div class="modal fade" id="modalTambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('prosesTambahDataKelas') }}" method="POST">
                        @csrf
                        <div class="form-floating mb-3">
                            <input class="form-control @error('kode_kelas') is-invalid @enderror" type="text"
                                name="kode_kelas" placeholder="Masukan Nama Kalian" />
                            <label>Kode Kelas</label>
                            @error('kode_kelas')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input class="form-control @error('jenjang_kelas') is-invalid @enderror" type="number"
                                name="jenjang_kelas" placeholder="Masukan NISN Kalian" />
                            <label>Jenjang Kelas</label>
                            @error('jenjang_kelas')
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
