@extends('belakang.layouts.main')

@section('isi')
    <div class="card mb-4">
        <div class="card-header">
            <a href="{{ route('tambahDataJurusan') }}" class="btn btn-outline-success"><i class="fas fa-plus me-1"></i> Tambah
                Data</a>
        </div>
        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode Jurusan</th>
                        <th>nama jurusan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $no = 1;
                    @endphp 

                    @forelse ($jurusan as $j)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $j->kode_jurusan }}</td>
                            <td>{{ $j->nama_jurusan }}</td>
                            <td>
                                <a href="" title="Edit" class="btn btn-secondary btn-sm"><i
                                        class="fa-solid fa-pencil"></i></a>
                                <a href="" title="Lihat" class="btn btn-primary btn-sm"><i
                                        class="fa-solid fa-eye"></i></a>
                                <a href="" title="Hapus" class="btn btn-danger btn-sm"><i
                                        class="fa-solid fa-trash"></i></a>
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
