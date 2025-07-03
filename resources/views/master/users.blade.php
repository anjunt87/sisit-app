@extends('layouts.app')

@section('title', 'Manajemen Pengguna')

@section('content')
    <section class="content-header">
        <div class="container-fluid d-flex justify-content-between align-items-center">
            <h3 class="card-title"><i class="fas fa-users mr-2"></i>Daftar Pengguna</h3>
            <button class="btn btn-sm btn-success" onclick="openUserModal()">+ Tambah</button>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="card mt-3">
                <div class="card-header">
                    <h3 class="card-title">Data Users</h3>
                </div>
                <div class="card-body p-0">
                    <div id="scrollWrapper" style="max-height: 400px; overflow-y: auto;">
                        <table class="table table-bordered mb-0" id="userTable">
                            <thead class="sticky-header">
                                <tr>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>Tipe User</th>
                                    <th>Role</th>
                                    <th>Unit</th>
                                    <th>Profil</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody id="userBody">
                                <!-- Data diisi JavaScript -->
                            </tbody>
                        </table>
                        <div id="loadingRow" class="text-center py-3 text-muted d-none">
                            <small><i class="fas fa-spinner fa-spin"></i> Memuat data...</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Modal -->
    <div class="modal fade" id="userModal" tabindex="-1">
        <div class="modal-dialog">
            <form id="userForm">
                @csrf
                <input type="hidden" id="formMethod" value="POST">
                <input type="hidden" id="userId">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Form User</h5>
                        <button type="button" class="close" onclick="$('#userModal').modal('hide')">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" id="username" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" id="email" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Tipe User</label>
                            <select id="tipe_user" class="form-control" required>
                                <option value="">Pilih Tipe User</option>
                                <option value="admin">Admin</option>
                                <option value="guru">Guru</option>
                                <option value="staff">Staff</option>
                                <option value="murid">Murid</option>
                                <option value="wali_murid">Wali Murid</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Role</label>
                            <select id="role_id" class="form-control" required>
                                <option value="">Pilih Role</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Unit</label>
                            <select id="unit_id" class="form-control" required>
                                <option value="">Pilih Unit</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Profil (Opsional)</label>
                            <select id="profil_id" class="form-control">
                                <option value="">Pilih Profil</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Nama Lengkap</label>
                            <input type="text" id="nama_lengkap" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>No HP</label>
                            <input type="text" id="no_hp" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>
                                <input type="checkbox" id="is_active" value="1" checked> Aktif
                            </label>
                        </div>
                        <div class="form-group password-field">
                            <label>Password</label>
                            <input type="password" id="password" class="form-control">
                        </div>
                        <div class="form-group password-field">
                            <label>Konfirmasi Password</label>
                            <input type="password" id="password_confirmation" class="form-control">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-xs btn-secondary"
                            onclick="$('#userModal').modal('hide')">Batal</button>
                        <button type="submit" class="btn btn-xs btn-primary">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        async function deleteUser(id) {
            const confirmed = await Swal.fire({
                title: 'Yakin ingin menghapus?',
                text: "Data pengguna akan dihapus permanen!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal',
                reverseButtons: true
            });

            if (confirmed.isConfirmed) {
                try {
                    const res = await fetch(`/api/master/users/${id}`, {
                        method: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            'Accept': 'application/json'
                        }
                    });

                    const data = await res.json();

                    if (res.ok) {
                        Swal.fire('Berhasil!', data.message || 'User dihapus.', 'success');
                        refreshUserList();
                    } else {
                        Swal.fire('Gagal!', data.message || 'Terjadi kesalahan saat menghapus.', 'error');
                    }
                } catch (error) {
                    console.error(error);
                    Swal.fire('Error!', 'Gagal menghubungi server.', 'error');
                }
            }
        }
    </script>
    <script>
        let page = 1;
        let loading = false;
        let lastPage = false;
        let roles = [];
        let units = [];
        let profils = [];
        const modal = $('#userModal');
        const scrollWrapper = document.getElementById('scrollWrapper');
        const userBody = document.getElementById('userBody');
        const loadingRow = document.getElementById('loadingRow');

        // Load roles, units, and profils for dropdown
        async function loadRolesAndUnits() {
            try {
                const res = await fetch('/api/master/users/roles-units');
                if (!res.ok) {
                    throw new Error(`HTTP error! status: ${res.status}`);
                }

                const data = await res.json();
                roles = data.roles || [];
                units = data.units || [];
                profils = data.profils || [];

                // Populate role dropdown
                const roleSelect = document.getElementById('role_id');
                roleSelect.innerHTML = '<option value="">Pilih Role</option>';
                roles.forEach(role => {
                    roleSelect.innerHTML += `<option value="${role.id}">${role.nama}</option>`;
                });

                // Populate unit dropdown
                const unitSelect = document.getElementById('unit_id');
                unitSelect.innerHTML = '<option value="">Pilih Unit</option>';
                units.forEach(unit => {
                    unitSelect.innerHTML += `<option value="${unit.id}">${unit.nama}</option>`;
                });

                // Populate profil dropdown
                const profilSelect = document.getElementById('profil_id');
                profilSelect.innerHTML = '<option value="">Pilih Profil</option>';
                profils.forEach(profil => {
                    profilSelect.innerHTML += `<option value="${profil.id}">${profil.nama_lengkap}</option>`;
                });

            } catch (error) {
                console.error('Error loading roles, units, and profils:', error);
                toastr.error('Gagal memuat data roles, units, dan profils');
            }
        }

        // Lazy loading function
        async function loadUsersLazy() {
            if (loading || lastPage) return;
            loading = true;
            loadingRow.classList.remove('d-none');

            try {
                const res = await fetch(`/api/master/users?page=${page}`);
                if (!res.ok) {
                    throw new Error(`HTTP error! status: ${res.status}`);
                }

                const data = await res.json();

                // Handle data structure
                const users = data.data || [];

                users.forEach(user => {
                    const statusBadge = user.is_active ?
                        '<span class="badge badge-success">Aktif</span>' :
                        '<span class="badge badge-danger">Nonaktif</span>';

                    const tipeUserBadge = getTipeUserBadge(user.tipe_user);

                    const row = `
                        <tr>
                            <td>${user.username || ''}</td>
                            <td>${user.email || ''}</td>
                            <td>${tipeUserBadge}</td>
                            <td>${user.role_name || '-'}</td>
                            <td>${user.unit_name || '-'}</td>
                            <td>${user.profil_name || '-'}</td>
                            <td>${statusBadge}</td>
                            <td>
                                <button class="btn btn-sm btn-warning text-white" onclick='editUser(${JSON.stringify(user)})'>
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="btn btn-sm btn-danger" onclick="deleteUser(${user.id})">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                    `;
                    userBody.insertAdjacentHTML('beforeend', row);
                });

                // Check pagination
                if (!data.next_page_url) {
                    lastPage = true;
                    loadingRow.innerHTML = `<small class="text-muted">Semua data telah dimuat.</small>`;
                } else {
                    page++;
                    loadingRow.classList.add('d-none');
                }

            } catch (error) {
                console.error('Error loading users:', error);
                toastr.error('Gagal memuat data pengguna');
                loadingRow.innerHTML =
                    `<small class="text-danger">Gagal memuat data. <button onclick="retryLoad()" class="btn btn-sm btn-link p-0">Coba lagi</button></small>`;
            }

            loading = false;
        }

        // Helper function for tipe user badge
        const tipeUserBadgeMap = {
            admin: {
                label: 'Admin',
                class: 'badge badge-primary'
            },
            guru: {
                label: 'Guru',
                class: 'badge badge-info'
            },
            staff: {
                label: 'Staff',
                class: 'badge badge-secondary'
            },
            murid: {
                label: 'Murid',
                class: 'badge badge-success'
            },
            wali_murid: {
                label: 'Wali Murid',
                class: 'badge badge-warning'
            },
        };

        function getTipeUserBadge(tipeUser) {
            const badge = tipeUserBadgeMap[tipeUser];
            if (badge) {
                return `<span class="${badge.class}">${badge.label}</span>`;
            }
            return `<span class="badge badge-light">-</span>`;
        }


        // Retry loading function
        function retryLoad() {
            loadingRow.classList.add('d-none');
            loadUsersLazy();
        }

        // Scroll event listener
        scrollWrapper.addEventListener('scroll', function() {
            const threshold = 50;
            if (scrollWrapper.scrollTop + scrollWrapper.clientHeight >= scrollWrapper.scrollHeight - threshold) {
                loadUsersLazy();
            }
        });

        // Modal functions
        function openUserModal() {
            const form = $('#userForm')[0];
            form.reset();

            $('#formMethod').val('POST');
            $('#userId').val('');
            $('#is_active').prop('checked', true);

            // Kosongkan semua input baru
            $('#nama_lengkap').val('');
            $('#no_hp').val('');

            $('.password-field').show();
            $('#password').val('');
            $('#password_confirmation').val('');
            $('#password').attr('required', true);
            $('#password_confirmation').attr('required', true);

            modal.modal('show');
        }


        function editUser(user) {
            $('#username').val(user.username);
            $('#email').val(user.email);
            $('#tipe_user').val(user.tipe_user);
            $('#role_id').val(user.role_id);
            $('#unit_id').val(user.unit_id);
            $('#profil_id').val(user.profil_id || '');
            $('#is_active').prop('checked', !!user.is_active);
            $('#userId').val(user.id);
            $('#formMethod').val('PUT');
            $('#nama_lengkap').val(user.profil_name || '');
            $('#no_hp').val(user.profil_no_hp || '');
            // Kosongkan field password agar tidak terisi otomatis
            $('#password').val('');
            $('#password_confirmation').val('');
            $('.password-field').hide();
            $('#password').removeAttr('required');
            $('#password_confirmation').removeAttr('required');

            modal.modal('show');
        }

        // Delete user function
        // async function deleteUser(id) {
        //     if (!confirm('Yakin ingin menghapus user ini?')) return;

        //     try {
        //         const res = await fetch(`/api/master/users/${id}`, {
        //             method: 'DELETE',
        //             headers: {
        //                 'X-CSRF-TOKEN': '{{ csrf_token() }}'
        //             }
        //         });

        //         if (!res.ok) {
        //             throw new Error(`HTTP error! status: ${res.status}`);
        //         }

        //         const data = await res.json();
        //         toastr.success(data.message || 'User berhasil dihapus');

        //         // Refresh data
        //         refreshUserList();
        //     } catch (error) {
        //         console.error('Error deleting user:', error);
        //         toastr.error('Gagal menghapus user');
        //     }
        // }

        // Refresh user list
        function refreshUserList() {
            page = 1;
            loading = false;
            lastPage = false;
            userBody.innerHTML = '';
            loadingRow.classList.add('d-none');
            loadUsersLazy();
        }

        // Form submission
        document.getElementById('userForm').addEventListener('submit', async function(e) {
            e.preventDefault();

            const id = $('#userId').val();
            const method = $('#formMethod').val();
            const url = method === 'POST' ? '/api/master/users' : `/api/master/users/${id}`;

            const payload = {
                username: $('#username').val(),
                email: $('#email').val(),
                nama_lengkap: $('#nama_lengkap').val(),
                no_hp: $('#no_hp').val(),
                tipe_user: $('#tipe_user').val(),
                role_id: $('#role_id').val(),
                unit_id: $('#unit_id').val(),
                profil_id: $('#profil_id').val() || null,
                is_active: $('#is_active').is(':checked') ? 1 : 0
            };

            // Kirim password hanya jika POST atau jika user isi field
            const password = $('#password').val();
            const passwordConfirmation = $('#password_confirmation').val();

            if (method === 'POST' || password) {
                payload.password = password;
                payload.password_confirmation = passwordConfirmation;
            }

            try {
                // const res = await fetch(url, {
                //     method: method,
                //     headers: {
                //         'Accept': 'application/json',
                //         'Content-Type': 'application/json',
                //         'X-CSRF-TOKEN': '{{ csrf_token() }}'
                //     },
                //     body: JSON.stringify(payload)
                // });

                const res = await fetch(url, {
                    method: method,
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute(
                            'content'),
                        'Accept': 'application/json',
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify(payload)
                });

                const data = await res.json();

                if (res.ok) {
                    toastr.success(data.message || 'Berhasil disimpan');
                    modal.modal('hide');
                    refreshUserList();
                } else {
                    if (data.errors) {
                        const errorMessages = Object.values(data.errors).flat();
                        toastr.error(errorMessages.join('<br>'));
                    } else {
                        toastr.error(data.message || 'Gagal menyimpan data');
                    }
                }
            } catch (error) {
                console.error('Error saving user:', error);
                toastr.error('Terjadi kesalahan saat menyimpan');
            }
        });

        // Initialize on page load
        document.addEventListener('DOMContentLoaded', function() {
            loadRolesAndUnits().then(() => {
                loadUsersLazy();
            });
        });
    </script>
@endpush

@push('styles')
    <style>
        .sticky-header {
            position: sticky;
            top: 0;
            background-color: #f8f9fa;
            z-index: 10;
        }

        #scrollWrapper {
            border: 1px solid #dee2e6;
            border-radius: 0.25rem;
        }

        .badge {
            font-size: 0.75em;
        }

        .password-field {
            display: block;
        }

        .btn-group-sm>.btn,
        .btn-sm {
            padding: 0.25rem 0.5rem;
            font-size: 0.875rem;
        }
    </style>
@endpush
