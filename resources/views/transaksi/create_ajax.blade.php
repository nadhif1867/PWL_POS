<form action="{{ url('/transaksi/ajax') }}" method="POST" id="form-tambah">
    @csrf
    <div id="modal-master" class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Transaksi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label>User</label>
                    <select name="user_id" id="user_id" class="form-control" required>
                        <option value="">- Pilih User -</option>
                        @foreach ($user as $l)
                        <option value="{{ $l->user_id }}">{{ $l->nama }}</option>
                        @endforeach
                    </select>
                    <small id="error-user_id" class="error-text form-text text-danger"></small>
                </div>
                <div class="form-group">
                    <label>Pembeli</label>
                    <input value="" type="text" name="pembeli" id="pembeli" class="form-control" required>
                    <small id="error-pembeli" class="error-text form-text text-danger"></small>
                </div>
                <div class="form-group">
                    <label>Penjualan kode</label>
                    <input value="" type="text" name="penjualan_kode" id="penjualan_kode" class="form-control"
                        required>
                    <small id="error-penjualan_kode" class="error-text form-text text-danger"></small>
                </div>
                <div class="form-group">
                    <label>Penjualan Tanggal</label>
                    <input value="" type="date" name="penjualan_tanggal" id="penjualan_tanggal"
                        class="form-control" required>
                    <small id="error-penjualan_tanggal" class="error-text form-text text-danger"></small>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="ion ion-clipboard mr-1"></i>
                            Detail Transaksi
                        </h3>
                    </div>
                    <div class="card-body">
                        <ul class="todo-list" data-widget="todo-list">
                            <!-- List of transaction details will go here -->
                        </ul>
                    </div>
                    <div class="card-footer clearfix">
                        <button type="button" id="add-barang" class="btn btn-primary float-right"><i
                                class="fas fa-plus"></i> Add
                            Barang</button>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" data-dismiss="modal" class="btn btn-warning">Batal</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </div>
    </div>

    <!-- Modal for adding a new transaction detail (barang) -->
    <div id="modal-tambah-barang" class="modal fade animate shake" tabindex="-1"
        data-backdrop="static" data-keyboard="false" data-width="25%">
        <div id="modal-tambah" class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Barang</h5>
                    <button type="button" class="close" id="close-tambah" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="barang_id">Barang</label>
                        <select name="barang_id" id="barang_id" class="form-control">
                            <option value="">- Pilih Barang -</option>
                            @foreach ($barang as $b)
                            <option value="{{ $b->barang_id }}">{{ $b->barang_nama }}</option>
                            @endforeach
                        </select>
                        <small id="error-barang_id" class="error-text form-text text-danger"></small>
                    </div>
                    <div class="form-group">
                        <label for="jumlah">Jumlah</label>
                        <input type="number" name="jumlah" id="jumlah" class="form-control">
                        <small id="error-jumlah" class="error-text form-text text-danger"></small>
                    </div>
                    <div class="form-group">
                        <label for="harga">Harga</label>
                        <input type="number" name="harga" id="harga" class="form-control">
                        <small id="error-harga" class="error-text form-text text-danger"></small>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="save-barang">Simpan</button>
                </div>
            </div>
        </div>
    </div>
</form>

<script>
    let transaksiDetails = [];

    $(document).ready(function() {
        // Adjust z-index for multiple modals
        // $('#modal-tambah-barang').on('show.bs.modal', function() {
        //     var zIndex = 1060 + ($('#modal-tambah-barang').data('bs.modal') || 0);
        //     $(this).css('z-index', zIndex);
        //     setTimeout(function() {
        //         $('.modal-backdrop').last().css('z-index', zIndex - 1);
        //     }, 0);
        // });

        // Add listener for the third modal
        $(document).on('click', '#close-tambah', function() {
            // Show the edit modal
            $("#modal-tambah-barang").modal('hide');
        });

        // Add listener for the third modal
        $(document).on('click', '#add-barang', function() {
            // Show the edit modal
            $("#modal-tambah-barang").modal('show');
        });


        // Save the barang and append it to the todo list
        $("#save-barang").on("click", function() {
            let barang_id = $("#barang_id").val();
            let barang_text = $("#barang_id option:selected").text();
            let jumlah = $("#jumlah").val();
            let harga = $("#harga").val();

            if (!barang_id || !jumlah || !harga) {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Pastikan semua field telah diisi.'
                });
                return;
            }

            let detailId = Date.now(); // Unique ID for each entry
            let detailItem = `
            <li id="detail-${detailId}">
                <span class="text">${barang_text}</span>
                <small class="badge badge-secondary">Jumlah ${jumlah}</small>
                <small class="badge badge-success">Harga Rp${Number(harga).toLocaleString()}</small>
                <button type="button" class="btn btn-danger btn-sm float-right remove-detail" data-id="${detailId}">Remove</button>
                <input type="hidden" name="transaksi_details[${detailId}][barang_id]" value="${barang_id}">
                <input type="hidden" name="transaksi_details[${detailId}][jumlah]" value="${jumlah}">
                <input type="hidden" name="transaksi_details[${detailId}][harga]" value="${harga}">
            </li>`;

            $(".todo-list").append(detailItem);

            // Reset modal form fields
            $("#barang_id").val('');
            $("#jumlah").val('');
            $("#harga").val('');

            $("#modal-tambah-barang").modal("hide");
        });

        // Remove item from the todo list
        $(document).on("click", ".remove-detail", function() {
            let detailId = $(this).data('id');
            $("#detail-" + detailId).remove();
        });

        $("#form-tambah").submit(function(e) {
            e.preventDefault();

            let form = $(this);
            $.ajax({
                url: form.attr('action'),
                type: form.attr('method'),
                data: form.serialize(), // Includes transaction details appended above
                success: function(response) {
                    if (response.status) {
                        $('#myModal').modal('hide');
                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil',
                            text: response.message
                        });
                        dataTransaksi.ajax.reload();
                    } else {
                        $('.error-text').text('');
                        $.each(response.msgField, function(prefix, val) {
                            $('#error-' + prefix).text(val[0]);
                        });
                        Swal.fire({
                            icon: 'error',
                            title: 'Terjadi Kesalahan',
                            text: response.message
                        });
                    }
                }
            });
        });
    });
</script>