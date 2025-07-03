@extends('layouts.app')

@section('title', 'Manajemen Unit')

@section('content')
    <section class="content-header">
        <div class="container-fluid d-flex justify-content-between align-items-center">
            <h3 class="card-title"><i class="fas fa-school mr-2"></i>Daftar Unit</h3>
            <button class="btn btn-sm btn-success" onclick="openUnitModal()">+ Tambah</button>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="card mt-3">
                <div class="card-header">
                    <h3 class="card-title">Data Unit Sekolah</h3>
                </div>
                <div class="card-body p-0">
                    <div id="scrollWrapper" style="max-height: 400px; overflow-y: auto;">
                        <table class="table table-bordered mb-0" id="unitTable">
                            <thead class="sticky-header">
                                <tr>
                                    <th>Kode</th>
                                    <th>Nama Unit</th>
                                    <th>Jenjang</th>
                                    <th>Yayasan</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody id="unitBody">
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
    <div class="modal fade" id="unitModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <form id="unitForm">
                @csrf
                <input type="hidden" id="formMethod" value="POST">
                <input type="hidden" id="unitId">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Form Unit</h5>
                        <button type="button" class="close" onclick="$('#unitModal').modal('hide')">&times;</button>
                    </div>
                    <div class="modal-body row">
                        <div class="form-group col-md-6">
                            <label>Kode Unit</label>
                            <input type="text" id="kode" class="form-control" placeholder="Contoh: SDIT01" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Nama Unit</label>
                            <input type="text" id="nama" class="form-control" placeholder="Contoh: SDIT Al-Furqan"
                                required>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Jenjang</label>
                            <select id="jenjang" class="form-control" required>
                                <option value="">-- Pilih Jenjang --</option>
                                <option value="pg">Playgroup</option>
                                <option value="tk">TK</option>
                                <option value="sdit">SDIT</option>
                                <option value="smpit">SMPIT</option>
                                <option value="smait">SMAIT</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Yayasan</label>
                            <select id="yayasan_id" class="form-control" required>
                                <!-- Diisi JS -->
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Email</label>
                            <input type="email" id="email" class="form-control">
                        </div>
                        <div class="form-group col-md-6">
                            <label>No. HP</label>
                            <input type="text" id="no_hp" class="form-control">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Website</label>
                            <input type="text" id="website" class="form-control">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Kepala Unit</label>
                            <input type="text" id="kepala" class="form-control">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Status</label><br>
                            <input type="checkbox" id="is_active" value="1" checked> Aktif
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-xs btn-secondary"
                            onclick="$('#unitModal').modal('hide')">Batal</button>
                        <button type="submit" class="btn btn-xs btn-primary">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        const unitModal = $('#unitModal');
        const unitBody = document.getElementById('unitBody');
        const scrollWrapper = document.getElementById('scrollWrapper');
        const loadingRow = document.getElementById('loadingRow');

        let page = 1;
        let loading = false;
        let lastPage = false;

        async function loadUnitsLazy() {
            if (loading || lastPage) return;
            loading = true;
            loadingRow.classList.remove('d-none');

            try {
                const res = await fetch(`/api/master/units?page=${page}`);
                const data = await res.json();

                (data.data || []).forEach(unit => {
                    const statusBadge = unit.is_active ?
                        '<span class="badge badge-success">Aktif</span>' :
                        '<span class="badge badge-danger">Nonaktif</span>';

                    const row = `
                    <tr>
                        <td><strong>${unit.kode}</strong></td>
                        <td>${unit.nama}</td>
                        <td>${unit.jenjang.toUpperCase()}</td>
                        <td>${unit.yayasan || '-'}</td>
                        <td>${statusBadge}</td>
                        <td>
                            <button class="btn btn-sm btn-warning text-white" onclick='editUnit(${JSON.stringify(unit)})'><i class="fas fa-edit"></i></button>
                            <button class="btn btn-sm btn-danger" onclick="deleteUnit(${unit.id})"><i class="fas fa-trash"></i></button>
                        </td>
                    </tr>
                `;
                    unitBody.insertAdjacentHTML('beforeend', row);
                });

                if (!data.next_page_url) {
                    lastPage = true;
                    loadingRow.innerHTML = `<small class="text-muted">Semua data telah dimuat.</small>`;
                } else {
                    page++;
                    loadingRow.classList.add('d-none');
                }

            } catch (e) {
                console.error('Error loading units:', e);
                toastr.error('Gagal memuat data unit');
            }

            loading = false;
        }

        function refreshUnitList() {
            page = 1;
            loading = false;
            lastPage = false;
            unitBody.innerHTML = '';
            loadingRow.classList.add('d-none');
            loadUnitsLazy();
        }

        function openUnitModal() {
            $('#unitForm')[0].reset();
            $('#formMethod').val('POST');
            $('#unitId').val('');
            $('#is_active').prop('checked', true);
            unitModal.modal('show');
        }

        function editUnit(unit) {
            $('#kode').val(unit.kode);
            $('#nama').val(unit.nama);
            $('#jenjang').val(unit.jenjang);
            $('#email').val(unit.email);
            $('#no_hp').val(unit.no_hp);
            $('#website').val(unit.website);
            $('#kepala').val(unit.kepala);
            $('#yayasan_id').val(unit.yayasan_id);
            $('#unitId').val(unit.id);
            $('#formMethod').val('PUT');
            $('#is_active').prop('checked', !!unit.is_active);
            unitModal.modal('show');
        }

        async function deleteUnit(id) {
            const confirmed = await Swal.fire({
                title: 'Yakin ingin menghapus?',
                text: "Data unit akan dihapus permanen!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            });

            if (!confirmed.isConfirmed) return;

            try {
                const res = await fetch(`/api/master/units/${id}`, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                });

                const data = await res.json();

                if (res.ok) {
                    toastr.success(data.message || 'Unit berhasil dihapus');
                    refreshUnitList();
                } else {
                    toastr.error(data.message || 'Gagal menghapus unit');
                }
            } catch (error) {
                toastr.error('Gagal menghubungi server');
                console.error(error);
            }
        }

        // Load yayasan options
        async function loadYayasanOptions() {
            try {
                const res = await fetch('/api/master/units/dropdown/yayasan');
                const data = await res.json();
                const select = document.getElementById('yayasan_id');
                select.innerHTML = '<option value="">-- Pilih Yayasan --</option>';
                data.data.forEach(y => {
                    select.innerHTML += `<option value="${y.id}">${y.nama}</option>`;
                });
            } catch (e) {
                console.warn('Gagal memuat yayasan');
            }
        }

        $('#unitForm').on('submit', async function(e) {
            e.preventDefault();
            const id = $('#unitId').val();
            const method = $('#formMethod').val();
            const url = method === 'POST' ? '/api/master/units' : `/api/master/units/${id}`;

            const payload = {
                kode: $('#kode').val(),
                nama: $('#nama').val(),
                jenjang: $('#jenjang').val(),
                yayasan_id: $('#yayasan_id').val(),
                email: $('#email').val(),
                no_hp: $('#no_hp').val(),
                website: $('#website').val(),
                kepala: $('#kepala').val(),
                is_active: $('#is_active').is(':checked') ? 1 : 0
            };

            try {
                const res = await fetch(url, {
                    method,
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                    },
                    body: JSON.stringify(payload),
                });

                const data = await res.json();
                if (res.ok) {
                    toastr.success(data.message || 'Unit berhasil disimpan');
                    unitModal.modal('hide');
                    refreshUnitList();
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
                loadUnitsLazy();
            }
        });

        document.addEventListener('DOMContentLoaded', function() {
            loadYayasanOptions();
            loadUnitsLazy();
        });
    </script>
@endpush
