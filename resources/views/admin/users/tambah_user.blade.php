@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4 text-center">Tambah User</h1>

    {{-- Error Alert --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card shadow">
        <div class="card-header text-white" style="background-color: #445ebf;">
            <strong>Form Tambah User</strong>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.users.store') }}" method="POST">
                @csrf
                <table class="table table-bordered table-hover align-middle">
                    <tbody>
                        <tr>
                            <th class="text-center" style="width: 200px;">Nama</th>
                            <td><input type="text" class="form-control" name="name" value="{{ old('name') }}" required></td>
                        </tr>
                        <tr>
                            <th class="text-center">Email</th>
                            <td><input type="email" class="form-control" name="email" value="{{ old('email') }}" required></td>
                        </tr>
                        <tr>
                            <th class="text-center">Password</th>
                            <td>
                                <div class="input-group">
                                    <input type="password" class="form-control" id="password" name="password" required>
                                    <span class="input-group-text" onclick="togglePassword('password', this)">
                                        <i class="bi bi-eye"></i>
                                    </span>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th class="text-center">Konfirmasi Password</th>
                            <td>
                                <div class="input-group">
                                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
                                    <span class="input-group-text" onclick="togglePassword('password_confirmation', this)">
                                        <i class="bi bi-eye"></i>
                                    </span>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th class="text-center">Role</th>
                            <td>
                                <select name="role" class="form-select" required>
                                    <option value="">-- Pilih --</option>
                                    <option value="guru" {{ old('role')=='guru' ? 'selected' : '' }}>Guru</option>
                                    <option value="admin" {{ old('role')=='admin' ? 'selected' : '' }}>Admin</option>
                                </select>
                            </td>
                        </tr>
                    </tbody>
                </table>

                <div class="text-end mt-3">
                    <button type="submit" class="btn btn-success">
                        <i class="bi bi-save"></i> Simpan
                    </button>
                    <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">
                        <i class="bi bi-arrow-left-circle"></i> Kembali
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- Script Toggle Password --}}
<script>
    function togglePassword(fieldId, el) {
        const field = document.getElementById(fieldId);
        const icon = el.querySelector('i');
        if (field.type === "password") {
            field.type = "text";
            icon.classList.remove("bi-eye");
            icon.classList.add("bi-eye-slash");
        } else {
            field.type = "password";
            icon.classList.remove("bi-eye-slash");
            icon.classList.add("bi-eye");
        }
    }
</script>
@endsection
