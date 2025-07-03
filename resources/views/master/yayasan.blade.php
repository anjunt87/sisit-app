@extends('layouts.app')

@section('title', 'Manajemen Yayasan')

@section('content')
    <section class="content-header">
        <div class="container-fluid d-flex justify-content-between align-items-center">
            <h3 class="card-title"><i class="fas fa-building mr-2"></i>Daftar Yayasan</h3>
            <button class="btn btn-sm btn-success" onclick="openYayasanModal()">+ Tambah</button>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="card mt-3">
                <div class="card-header">
                    <h3 class="card-title">Data Yayasan Terdaftar</h3>
                </div>
                <div class="card-body p-0">
                    <div id="scrollWrapper" style="max-height: 400px; overflow-y: auto;">
                        <table class="table table-bordered mb-0" id="yayasanTable">
                            <thead class="sticky-header">
                                <tr>
                                    <th>Nama</th>
                                    <th>Pimpinan</th>
                                    <th>Operator</th>
                                    <th>Telp</th>
                                    <th>Email</th>
                                    <th>No SK</th>
                                    <th>Tgl SK</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody id="yayasanBody">
                                <!-- Diisi oleh JS -->
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
    <div class="modal fade" id="yayasanModal" tabindex="-1">
        <div class="modal-dialog">
            <form id="yayasanForm">
                @csrf
                <input type="hidden" id="formMethod" value="POST">
                <input type="hidden" id="yayasanId">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Form Yayasan</h5>
                        <button type="button" class="close" onclick="$('#yayasanModal').modal('hide')">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Nama Yayasan</label>
                            <input type="text" id="nama" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Pimpinan</label>
                            <input type="text" id="pimpinan" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Operator</label>
                            <input type="text" id="operator" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" id="email" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Telepon</label>
                            <input type="text" id="telp" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>No SK Menkumham</label>
                            <input type="text" id="no_sk_menkumham" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Tanggal SK Menkumham</label>
                            <input type="date" id="tgl_sk_menkumham" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Status</label><br>
                            <input type="checkbox" id="is_active" checked> Aktif
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-secondary"
                            onclick="$('#yayasanModal').modal('hide')">Batal</button>
                        <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        const yayasanModal = $('#yayasanModal');
        const yayasanBody = document.getElementById('yayasanBody');
        const scrollWrapper = document.getElementById('scrollWrapper');
        const loadingRow = document.getElementById('loadingRow');

        let page = 1;
        let loading = false;
        let lastPage = false;

        async function loadYayasanLazy() {
            if (loading || lastPage) return;
            loading = true;
            loadingRow.classList.remove('d-none');

            try {
                const res = await fetch(`/api/master/yayasan?page=${page}`);
                const data = await res.json();

                (data.data || []).forEach(y => {
                    const statusBadge = y.is_active ?
                        '<span class="badge badge-success">Aktif</span>' :
                        '<span class="badge badge-danger">Nonaktif</span>';

                    const row = `
                    <tr>
                        <td><strong>${y.nama}</strong></td>
                        <td>${y.pimpinan || '-'}</td>
                        <td>${y.operator || '-'}</td>
                        <td>${y.telp || '-'}</td>
                        <td>${y.email || '-'}</td>
                        <td>${y.no_sk_menkumham || '-'}</td>
                        <td>${y.tgl_sk_menkumham || '-'}</td>
                        <td>${statusBadge}</td>
                        <td>
                            <button class="btn btn-sm btn-warning text-white" onclick='editYayasan(${JSON.stringify(y)})'><i class="fas fa-edit"></i></button>
                            <button class="btn btn-sm btn-danger" onclick="deleteYayasan(${y.id})"><i class="fas fa-trash"></i></button>
                        </td>
                    </tr>
                `;
                    yayasanBody.insertAdjacentHTML('beforeend', row);
                });

                if (!data.next_page_url) {
                    lastPage = true;
                    loadingRow.innerHTML = `<small class="text-muted">Semua data telah dimuat.</small>`;
                } else {
                    page++;
                    loadingRow.classList.add('d-none');
                }

            } catch (e) {
                console.error(e);
                toastr.error('Gagal memuat data yayasan');
            }

            loading = false;
        }

        function refreshYayasanList() {
            page = 1;
            loading = false;
            lastPage = false;
            yayasanBody.innerHTML = '';
            loadingRow.classList.add('d-none');
            loadYayasanLazy();
        }

        function openYayasanModal() {
            $('#yayasanForm')[0].reset();
            $('#formMethod').val('POST');
            $('#yayasanId').val('');
            $('#is_active').prop('checked', true);
            yayasanModal.modal('show');
        }

        function editYayasan(data) {
            $('#nama').val(data.nama);
            $('#pimpinan').val(data.pimpinan);
            $('#operator').val(data.operator);
            $('#email').val(data.email);
            $('#telp').val(data.telp);
            $('#no_sk_menkumham').val(data.no_sk_menkumham);
            $('#tgl_sk_menkumham').val(data.tgl_sk_menkumham);
            $('#yayasanId').val(data.id);
            $('#formMethod').val('PUT');
            $('#is_active').prop('checked', !!data.is_active);
            yayasanModal.modal('show');
        }

        async function deleteYayasan(id) {
            const confirmed = await Swal.fire({
                title: 'Yakin ingin menghapus?',
                text: "Data yayasan akan dihapus permanen!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            });

            if (!confirmed.isConfirmed) return;

            try {
                const res = await fetch(`/api/master/yayasan/${id}`, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                });

                const data = await res.json();

                if (res.ok) {
                    toastr.success(data.message || 'Yayasan berhasil dihapus');
                    refreshYayasanList();
                } else {
                    toastr.error(data.message || 'Gagal menghapus yayasan');
                }
            } catch (e) {
                toastr.error('Gagal menghubungi server');
                console.error(e);
            }
        }

        $('#yayasanForm').on('submit', async function(e) {
            e.preventDefault();

            const id = $('#yayasanId').val();
            const method = $('#formMethod').val();
            const url = method === 'POST' ? '/api/master/yayasan' : `/api/master/yayasan/${id}`;

            const payload = {
                nama: $('#nama').val(),
                pimpinan: $('#pimpinan').val(),
                operator: $('#operator').val(),
                email: $('#email').val(),
                telp: $('#telp').val(),
                no_sk_menkumham: $('#no_sk_menkumham').val(),
                tgl_sk_menkumham: $('#tgl_sk_menkumham').val(),
                is_active: $('#is_active').is(':checked') ? 1 : 0
            };

            try {
                const res = await fetch(url, {
                    method,
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Accept': 'application/json',
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify(payload)
                });

                const data = await res.json();
                if (res.ok) {
                    toastr.success(data.message || 'Yayasan berhasil disimpan');
                    yayasanModal.modal('hide');
                    refreshYayasanList();
                } else {
                    toastr.error(data.message || 'Gagal menyimpan data');
                }
            } catch (error) {
                console.error(error);
                toastr.error('Terjadi kesalahan saat menyimpan');
            }
        });

        scrollWrapper.addEventListener('scroll', function() {
            const threshold = 50;
            if (scrollWrapper.scrollTop + scrollWrapper.clientHeight >= scrollWrapper.scrollHeight - threshold) {
                loadYayasanLazy();
            }
        });

        document.addEventListener('DOMContentLoaded', function() {
            loadYayasanLazy();
        });
    </script>
@endpush
