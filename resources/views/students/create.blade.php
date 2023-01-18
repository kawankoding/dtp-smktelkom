@extends('templates.default')

@php
    $title = 'Data Siswa';
    $preTitle = 'Tambah Data Data';
@endphp

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('students.store') }}" class="" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Nama</label>
                    <input type="text" name="name"
                        class="form-control
                        @error('name')
                            is-invalid
                        @enderror"
                        name="example-text-input" placeholder="Tulis namamu" value="{{ old('name') }}">
                    @error('name')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Alamat</label>
                    <input type="text" name="address"
                        class="form-control @error('address')
                            is-invalid
                        @enderror"
                        name="example-text-input" placeholder="Tulisa alamat lengkapmu" value="{{ old('address') }}">
                    @error('address')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Nomer Telpon</label>
                    <input type="text" name="phone_number"
                        class="form-control @error('phone_number')
                            is-invalid
                        @enderror"
                        name="example-text-input" placeholder="Tulis nomer telpon" value="{{ old('phone_number') }}">
                    @error('phone_number')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Kelas</label>
                    <select name="student_class_id" id="" class="form-control">
                        @foreach ($classes as $class)
                            <option value="{{ $class->id }}">{{ $class->name }}</option>
                        @endforeach
                    </select>
                    @error('student_class_id')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Foto</label>
                    <input type="file" name="photo" class="form-control @error('photo') is-invalid @enderror"
                        name="example-text-input" placeholder="Foto" value="{{ old('photo') }}">
                    @error('photo')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <input type="submit" value="Simpan" class="btn btn-primary">
                </div>
            </form>
        </div>
    </div>
@endsection
