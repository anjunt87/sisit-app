@extends('layouts.app')

@section('title', 'Manajemen Roles')

@section('content')
    <section class="content-header">
        <div class="container-fluid d-flex justify-content-between align-items-center">
            <h3 class="card-title"><i class="fas fa-user-shield mr-2"></i>Daftar Roles</h3>
            <button class="btn btn-sm btn-success" onclick="openRoleModal()">+ Tambah</button>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="card mt-3">
                <div class="card-header">
                    <h3 class="card-title">Data Roles</h3>
                </div>
                <div class="card-body p-0">
                    <div id="scrollWrapper" style="max-height: 400px; overflow-y: auto;">
                        <table class="table table-bordered mb-0" id="roleTable">
                            <thead class="sticky-header">
                                <tr>
                                    <th>Kode</th>
                                    <th>Nama Role</th>
                                    <th>Deskripsi</th>
                                    <th>Permissions</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody id="roleBody">
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
    <div class="modal fade" id="roleModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <form id="roleForm">
                @csrf
                <input type="hidden" id="formMethod" value="POST">
                <input type="hidden" id="roleId">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Form Role</h5>
                        <button type="button" class="close" onclick="$('#roleModal').modal('hide')">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Kode Role</label>
                            <input type="text" id="kode" class="form-control" placeholder="Contoh: ADM, GUR, STF"
                                required>
                        </div>
                        <div class="form-group">
                            <label>Nama Role</label>
                            <input type="text" id="nama" class="form-control" placeholder="Contoh: Administrator"
                                required>
                        </div>
                        <div class="form-group">
                            <label>Deskripsi</label>
                            <textarea id="deskripsi" class="form-control" rows="3" placeholder="Deskripsi role..."></textarea>
                        </div>
                        <div class="form-group">
                            <label>Permissions</label>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="perm_create" value="create">
                                        <label class="form-check-label" for="perm_create">Create</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="perm_read" value="read">
                                        <label class="form-check-label" for="perm_read">Read</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="perm_update" value="update">
                                        <label class="form-check-label" for="perm_update">Update</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="perm_delete" value="delete">
                                        <label class="form-check-label" for="perm_delete">Delete</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="perm_manage_users"
                                            value="manage_users">
                                        <label class="form-check-label" for="perm_manage_users">Manage Users</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="perm_manage_roles"
                                            value="manage_roles">
                                        <label class="form-check-label" for="perm_manage_roles">Manage Roles</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="perm_view_reports"
                                            value="view_reports">
                                        <label class="form-check-label" for="perm_view_reports">View Reports</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="perm_system_config"
                                            value="system_config">
                                        <label class="form-check-label" for="perm_system_config">System Config</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>
                                <input type="checkbox" id="is_active" value="1" checked> Aktif
                            </label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-xs btn-secondary"
                            onclick="$('#roleModal').modal('hide')">Batal</button>
                        <button type="submit" class="btn btn-xs btn-primary">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        async function deleteRole(id) {
            const confirmed = await Swal.fire({
                title: 'Yakin ingin menghapus?',
                text: "Data role akan dihapus permanen!",
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
                    const res = await fetch(`/api/master/roles/${id}`, {
                        method: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            'Accept': 'application/json'
                        }
                    });

                    const data = await res.json();

                    if (res.ok) {
                        Swal.fire('Berhasil!', data.message || 'Role dihapus.', 'success');
                        refreshRoleList();
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
        const modal = $('#roleModal');
        const scrollWrapper = document.getElementById('scrollWrapper');
        const roleBody = document.getElementById('roleBody');
        const loadingRow = document.getElementById('loadingRow');

        // Available permissions
        const availablePermissions = [
            'create', 'read', 'update', 'delete',
            'manage_users', 'manage_roles', 'view_reports', 'system_config'
        ];

        // Lazy loading function
        async function loadRolesLazy() {
            if (loading || lastPage) return;
            loading = true;
            loadingRow.classList.remove('d-none');

            try {
                const res = await fetch(`/api/master/roles?page=${page}`);
                if (!res.ok) {
                    throw new Error(`HTTP error! status: ${res.status}`);
                }

                const data = await res.json();

                // Handle data structure
                const roles = data.data || [];

                roles.forEach(role => {
                    const statusBadge = role.is_active ?
                        '<span class="badge badge-success">Aktif</span>' :
                        '<span class="badge badge-danger">Nonaktif</span>';

                    // Format permissions
                    const permissions = Array.isArray(role.permissions) ? role.permissions : [];
                    const permissionsHtml = permissions.length > 0 ?
                        permissions.map(perm => `<span class="badge badge-info mr-1">${perm}</span>`).join('') :
                        '<span class="text-muted">-</span>';

                    const row = `
                        <tr>
                            <td><strong>${role.kode || ''}</strong></td>
                            <td>${role.nama || ''}</td>
                            <td>${role.deskripsi || '-'}</td>
                            <td>${permissionsHtml}</td>
                            <td>${statusBadge}</td>
                            <td>
                                <button class="btn btn-sm btn-warning text-white" onclick='editRole(${JSON.stringify(role)})'>
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="btn btn-sm btn-danger" onclick="deleteRole(${role.id})">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                    `;
                    roleBody.insertAdjacentHTML('beforeend', row);
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
                console.error('Error loading roles:', error);
                toastr.error('Gagal memuat data roles');
                loadingRow.innerHTML =
                    `<small class="text-danger">Gagal memuat data. <button onclick="retryLoad()" class="btn btn-sm btn-link p-0">Coba lagi</button></small>`;
            }

            loading = false;
        }

        // Retry loading function
        function retryLoad() {
            loadingRow.classList.add('d-none');
            loadRolesLazy();
        }

        // Scroll event listener
        scrollWrapper.addEventListener('scroll', function() {
            const threshold = 50;
            if (scrollWrapper.scrollTop + scrollWrapper.clientHeight >= scrollWrapper.scrollHeight - threshold) {
                loadRolesLazy();
            }
        });

        // Modal functions
        function openRoleModal() {
            const form = $('#roleForm')[0];
            form.reset();

            $('#formMethod').val('POST');
            $('#roleId').val('');
            $('#is_active').prop('checked', true);

            // Clear all permission checkboxes
            availablePermissions.forEach(perm => {
                $(`#perm_${perm}`).prop('checked', false);
            });
            $('#roleModal').modal('dispose'); // reset pengaturan lama
            $('#roleModal').modal({
                backdrop: true, // klik luar bisa tutup
                keyboard: true // tombol ESC bisa tutup
            });

            $('#roleModal').modal('show');
        }

        function editRole(role) {
            $('#kode').val(role.kode);
            $('#nama').val(role.nama);
            $('#deskripsi').val(role.deskripsi || '');
            $('#is_active').prop('checked', !!role.is_active);
            $('#roleId').val(role.id);
            $('#formMethod').val('PUT');

            // Set permissions
            const permissions = Array.isArray(role.permissions) ? role.permissions : [];
            availablePermissions.forEach(perm => {
                $(`#perm_${perm}`).prop('checked', permissions.includes(perm));
            });

            modal.modal('show');
        }

        // Refresh role list
        function refreshRoleList() {
            page = 1;
            loading = false;
            lastPage = false;
            roleBody.innerHTML = '';
            loadingRow.classList.add('d-none');
            loadRolesLazy();
        }

        // Form submission
        document.getElementById('roleForm').addEventListener('submit', async function(e) {
            e.preventDefault();

            const id = $('#roleId').val();
            const method = $('#formMethod').val();
            const url = method === 'POST' ? '/api/master/roles' : `/api/master/roles/${id}`;

            // Collect selected permissions
            const selectedPermissions = [];
            availablePermissions.forEach(perm => {
                if ($(`#perm_${perm}`).is(':checked')) {
                    selectedPermissions.push(perm);
                }
            });

            const payload = {
                kode: $('#kode').val(),
                nama: $('#nama').val(),
                deskripsi: $('#deskripsi').val(),
                permissions: selectedPermissions,
                is_active: $('#is_active').is(':checked') ? 1 : 0
            };

            try {
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
                    toastr.success(data.message || 'Role berhasil disimpan');
                    modal.modal('hide');
                    refreshRoleList();
                } else {
                    if (data.errors) {
                        const errorMessages = Object.values(data.errors).flat();
                        toastr.error(errorMessages.join('<br>'));
                    } else {
                        toastr.error(data.message || 'Gagal menyimpan data');
                    }
                }
            } catch (error) {
                console.error('Error saving role:', error);
                toastr.error('Terjadi kesalahan saat menyimpan');
            }
        });

        // Initialize on page load
        document.addEventListener('DOMContentLoaded', function() {
            loadRolesLazy();
        });
    </script>
@endpush
{{-- 
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

        .btn-group-sm>.btn,
        .btn-sm {
            padding: 0.25rem 0.5rem;
            font-size: 0.875rem;
        }

        .form-check {
            margin-bottom: 0.5rem;
        }

        .form-check-label {
            font-size: 0.9rem;
        }

        .modal-lg {
            max-width: 800px;
        }
    </style>
@endpush --}}
