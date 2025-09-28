@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4 text-center">Edit User</h1>

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
            <strong>Form Edit User</strong>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
                @csrf
                @method('PUT')
                <table class="table table-bordered table-hover align-middle">
                    <tbody>
                        <tr>
                            <th class="table-custom text-center" style="width: 200px;">Nama</th>
                            <td>
                                <input type="text" class="form-control" name="name" 
                                    value="{{ old('name', $user->name) }}" required>
                            </td>
                        </tr>
                        <tr>
                            <th class="table-custom text-center">Email</th>
                            <td>
                                <input type="email" class="form-control" name="email" 
                                    value="{{ old('email', $user->email) }}" required>
                            </td>
                        </tr>
                        <tr>
                            <th class="table-custom text-center">Password (Opsional)</th>
                            <td>
                                <div class="input-group">
                                    <input type="password" class="form-control" id="password" 
                                        name="password" placeholder="Kosongkan jika tidak diganti">
                                    <span class="input-group-text" onclick="togglePassword('password')">
                                        <i class="bi bi-eye" id="togglePasswordIcon"></i>
                                    </span>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th class="table-custom text-center">Konfirmasi Password</th>
                            <td>
                                <div class="input-group">
                                    <input type="password" class="form-control" id="password_confirmation" 
                                        name="password_confirmation" placeholder="Ulangi password">
                                    <span class="input-group-text" onclick="togglePassword('password_confirmation')">
                                        <i class="bi bi-eye" id="togglePasswordIconConfirm"></i>
                                    </span>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th class="table-custom text-center">Role</th>
                            <td>
                                <select name="role" class="form-select" required>
                                    <option value="guru" {{ old('role', $user->role) == 'guru' ? 'selected' : '' }}>Guru</option>
                                    <option value="admin" {{ old('role', $user->role) == 'admin' ? 'selected' : '' }}>Admin</option>
                                </select>
                            </td>
                        </tr>
                    </tbody>
                </table>

                <div class="text-end mt-3">
                    <button type="submit" class="btn btn-success">
                        <i class="bi bi-save"></i> Update
                    </button>
                    <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">
                        <i class="bi bi-arrow-left-circle"></i> Kembali
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- Script untuk toggle password --}}
<script>
    function togglePassword(fieldId) {
        const input = document.getElementById(fieldId);
        const icon = fieldId === 'password' 
            ? document.getElementById('togglePasswordIcon') 
            : document.getElementById('togglePasswordIconConfirm');

        if (input.type === "password") {
            input.type = "text";
            icon.classList.remove("bi-eye");
            icon.classList.add("bi-eye-slash");
        } else {
            input.type = "password";
            icon.classList.remove("bi-eye-slash");
            icon.classList.add("bi-eye");
        }
    }
</script>
@endsection
