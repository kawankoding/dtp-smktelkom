@extends('templates.default')

@php
    $title = 'Data Siswa';
    $preTitle = 'Tambah Data Data';
@endphp

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('students.store') }}" class="" method="post">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Nama</label>
                    <input type="text" name="name" class="form-control" name="example-text-input"
                        placeholder="Tulis namamu">
                </div>

                <div class="mb-3">
                    <label class="form-label">Alamat</label>
                    <input type="text" name="address" class="form-control" name="example-text-input"
                        placeholder="Tulisa alamat lengkapmu">
                </div>
                <div class="mb-3">
                    <label class="form-label">Nomer Telpon</label>
                    <input type="text" name="phone_number" class="form-control" name="example-text-input"
                        placeholder="Tulis nomer telpon">
                </div>

                <div class="mb-3">
                    <label class="form-label">Kelas</label>
                    <input type="text" name="class" class="form-control" name="example-text-input"
                        placeholder="Tulis Kelas">
                </div>

                <div class="mb-3">
                    <input type="submit" value="Simpan" class="btn btn-primary">
                </div>
            </form>
        </div>
    </div>
@endsection
