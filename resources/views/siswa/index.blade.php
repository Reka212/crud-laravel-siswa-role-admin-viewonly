@extends('layouts.app')
@section('content')
<div class="container mt-4">
      <h3 class="mb-4 fw-bold">Data Siswa</h3>
    <div class="row mb-3 align-items-center">
        <div class="col-md-6">
            <a href="{{ route('siswa.create') }}" class="btn btn-primary">
                + Tambah Siswa
            </a>
        </div>

        <div class="col-md-6">
            <form action="{{ route('siswa.index') }}" method="GET"
                  class="d-flex justify-content-end">
                <input type="text"
                       name="keyword"
                       class="form-control w-50 me-2"
                       placeholder="Cari nama / alamat / no hp"
                       value="{{ request('keyword') }}">
                <button class="btn btn-primary">Cari</button>
            </form>
        </div>
    </div>

    {{-- Alert sukses --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session('success') }}
            <button class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    {{-- Tabel --}}
    <div class="card shadow-sm">
        <div class="card-body p-0">
            <table class="table table-bordered table-striped mb-0 align-middle">
                <thead class="table-dark">
                    <tr>
                        <th width="60">No</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>No HP</th>
                        <th width="160" class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($siswa as $row)
                        <tr>
                            <td>
                                {{ ($siswa->currentPage() - 1) * $siswa->perPage() + $loop->iteration }}
                            </td>
                            <td>{{ $row->nama }}</td>
                            <td>{{ $row->alamat }}</td>
                            <td>{{ $row->no_hp }}</td>
                          <td class="text-center">
								@if(auth()->user()->role === 'admin')
									<a href="{{ route('siswa.edit', $row->id) }}"
									   class="btn btn-warning btn-sm me-1">
										Edit
									</a>

									<form action="{{ route('siswa.destroy', $row->id) }}"
										  method="POST"
										  class="d-inline"
										  onsubmit="return confirm('Yakin hapus data?')">
										@csrf
										@method('DELETE')
										<button class="btn btn-danger btn-sm">
											Delete
										</button>
									</form>
								@else
									<span class="badge bg-secondary">View Only</span>
								@endif
							</td>

                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center py-3">
                                Data tidak ditemukan
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    {{-- Pagination --}}
    <div class="d-flex justify-content-end mt-3">
        {{ $siswa->links() }}
    </div>

</div>
@endsection
