@extends('layouts.app')

@section('title', 'Edit Siswa')

@section('content')
<div class="container mt-4">

    <h3 class="mb-4 fw-bold">Edit Siswa</h3>

    <a href="{{ route('siswa.index') }}" class="btn btn-secondary mb-3">
        ← Kembali
    </a>

    <div class="card shadow-sm">
        <div class="card-body">

            <form action="{{ route('siswa.update', $siswa->id) }}" method="POST">
                @csrf
                @method('PUT')

                {{-- Nama --}}
                <div class="mb-3">
                    <label class="form-label fw-semibold">Nama</label>
                    <input type="text"
                           name="nama"
                           value="{{ old('nama', $siswa->nama) }}"
                           class="form-control @error('nama') is-invalid @enderror">

                    @error('nama')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Alamat --}}
                <div class="mb-3">
                    <label class="form-label fw-semibold">Alamat</label>
                    <textarea name="alamat"
                              rows="3"
                              class="form-control @error('alamat') is-invalid @enderror">{{ old('alamat', $siswa->alamat) }}</textarea>

                    @error('alamat')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- No HP --}}
                <div class="mb-3">
                    <label class="form-label fw-semibold">No HP</label>
                    <input type="text"
                           name="no_hp"
                           value="{{ old('no_hp', $siswa->no_hp) }}"
                           class="form-control @error('no_hp') is-invalid @enderror">

                    @error('no_hp')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Tombol --}}
                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-success">
                        Update
                    </button>
                    <a href="{{ route('siswa.index') }}" class="btn btn-outline-secondary">
                        Batal
                    </a>
                </div>

            </form>

        </div>
    </div>

</div>
@endsection
