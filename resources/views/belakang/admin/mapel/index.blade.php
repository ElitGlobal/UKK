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
                        <th>Kode Mapel</th>
                        <th>Nama Mapel</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $no = 1;
                    @endphp
                    @forelse ($mapel as $m)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $m->kode_mapel }}</td>
                            <td>{{ $m->nama_mapel }}</td>
                            <td>
                                <a href="#modalEdit{{ $m->id }}" title="Edit" data-bs-toggle="modal"
                                    class="btn btn-secondary btn-sm"><i class="fa-solid fa-pencil"></i></a>
                                <a href="#modalLihat{{ $m->id }}" title="Lihat" data-bs-toggle="modal"
                                    class="btn btn-primary btn-sm"><i class="fa-solid fa-eye"></i></a>
                                <a href="#modalHapus{{ $m->id }}" title="Hapus" data-bs-toggle="modal"
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
    @foreach ($mapel as $m)
        <div class="modal fade" id="modalLihat{{ $m->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-floating mb-3">
                            <input class="form-control" type="text" name="kode_mapel" value="{{ $m->kode_mapel }}"
                                readonly />
                            <label>Kode Mapel</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input class="form-control" type="text" name="nama_mapel" value="{{ $m->nama_mapel }}"
                                readonly />
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
    @foreach ($mapel as $m)
        <div class="modal fade" id="modalEdit{{ $m->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('prosesEditDataMapel', $m->id) }}" method="POST">
                            @csrf
                            @method('put')
                            <div class="form-floating mb-3">
                                <input class="form-control @error('kode_mapel') is-invalid @enderror" type="text"
                                    name="kode_mapel" value="{{ $m->kode_mapel }}" />
                                <label>Kode Mapel</label>
                                @error('kode_mapel')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-floating mb-3">
                                <input class="form-control @error('nama_mapel') is-invalid @enderror" type="text"
                                    name="nama_mapel" value="{{ $m->nama_mapel }}" />
                                <label>Nama Mapel</label>
                                @error('nama_mapel')
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
    @foreach ($mapel as $m)
        <div class="modal fade" id="modalHapus{{ $m->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Apakah anda yakin ingin menghapus data : <b>{{ $m->nama_mapel }}</b></p>
                    </div>
                    <div class="modal-footer">
                        <form action="{{ route('deleteDataMapel', $m->id) }}" method="post">
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
                    <form action="{{ route('prosesTambahDataMapel') }}" method="POST">
                        @csrf
                        <div class="form-floating mb-3">
                            <input class="form-control @error('kode_mapel') is-invalid @enderror" type="text"
                                name="kode_mapel" placeholder="Masukan kode mapel" />
                            <label>Kode Mapel</label>
                            @error('kode_mapel')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input class="form-control @error('nama_mapel') is-invalid @enderror" type="text"
                                name="nama_mapel" placeholder="Masukan nama mapel" />
                            <label>Nama Mapel</label>
                            @error('nama_mapel')
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
