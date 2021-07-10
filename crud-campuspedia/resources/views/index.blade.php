<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>CRUD</title>
        <link rel="icon" href="https://i.ibb.co/3TbqpHs/university-solid.png">
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.css"
        integrity="sha256-pODNVtK3uOhL8FUNWWvFQK0QoQoV3YA9wGGng6mbZ0E=" crossorigin="anonymous" />
        <link rel="stylesheet" href="assets/style/index.css">
    </head>
    <body>
        <div class="navbar-head fixed-top d-flex flex-column flex-md-row align-items-center px-md-4 mb-3 bg-black">
            <h5 class="my-0 mr-md-auto"><i class="fas fa-university"></i> Data Universitas</h5>
            <nav class="my-2 my-md-0 ">
                <a class="p-2 text-material" href="#">Laravel</a>
                <a class="p-2 text-material" href="#">Ajax</a>
            </nav>
            <a class="btn icon" target="_blank" href="https://github.com/mhmdfaishal?tab=repositories"><i class="fab fa-github"></i></a>
        </div>
        <div class="container">
            <div class="card-body">
                <a href="javascript:void(0)" class="btn btn-info" id="tombol-tambah"><i class="fas fa-plus"></i> Tambah Kampus</a>
                <br><br>
                <table id="tablecampus" class="table table-striped table-lg table-bordered text-center">
                    <thead>
                        <tr>
                            <th>Kode Universitas</th>
                            <th>Logo</th>
                            <th>Nama</th>
                            <th>Tahun</th>
                            <th>Akreditasi</th>
                            <th>Status</th>
                            <th>Alamat</th>
                            <th>Peringkat Lokal</th>
                            <th>Contact</th>
                            <th class="action-column">Action</th>
                        </tr>
                    </thead>
                    
                </table>
            </div>
        </div>
        <div class="modal fade" id="tambah-edit-modal" aria-hidden="true">
            <div class="modal-dialog ">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modal-judul"></h5>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <form id="form-tambah-edit" name="form-tambah-edit" class="form-horizontal" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-sm-12">                                    
                                    <div class="form-group">
                                        <label for="name" class="col-sm-12 control-label">Kode Universitas</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" id="kodeuniv" name="kodeuniv" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="name" class="col-sm-12 control-label">Logo Universitas</label>
                                        <div class="col-sm-12">
                                            <input type="file" class="form-control" id="logo" name="logo" accept="image/png, image/jpeg, image/jpg" >
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="name" class="col-sm-12 control-label">Nama Universitas</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" id="nama" name="nama" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="name" class="col-sm-12 control-label">Tahun Didirikan</label>
                                        <div class="col-sm-12">
                                            <input type="number" class="form-control" id="tahun" name="tahun" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="name" class="col-sm-12 control-label">Akreditasi</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" id="akreditasi" name="akreditasi" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="name" class="col-sm-12 control-label">Status</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" id="status" name="status" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="name" class="col-sm-12 control-label">Alamat</label>
                                        <div class="col-sm-12">
                                            <textarea class="form-control" name="alamat" id="alamat" required></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="name" class="col-sm-12 control-label">Peringkat Lokal</label>
                                        <div class="col-sm-12">
                                            <input type="number" class="form-control" id="peringkat_lokal" name="peringkat_lokal" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="name" class="col-sm-12 control-label">Contact</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" id="contact" name="contact" required>
                                        </div>
                                    </div>

                                </div>

                                <div class="col-sm-offset-2 col-sm-12">
                                    <button type="submit" class="btn btn-primary btn-block" id="tombol-simpan" value="create"><i class="far fa-save"></i> Simpan
                                    </button>
                                    
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" tabindex="-1" role="dialog" id="konfirmasi-modal" data-backdrop="false">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Warning</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p><b>Yakin ingin menghapus data?</b></p>
                    </div>
                    <div class="modal-footer bg-whitesmoke br">
                        <button type="button" class="btn btn-secondary tombol-batal" data-dismiss="modal">Batal</button>
                        <button type="button" class="btn btn-danger" name="tombol-hapus" id="tombol-hapus">Hapus Data</button>
                    </div>
                </div>
            </div>
        </div>
        <footer>
            <div class="footer">
                <h4 href="#" style="text-align: center;">&copy; 2021<br> <i> Muhammad Faishal Dienul Haq</i> - Intern Campuspedia</h4>
            </div>
        </footer>
    </body>
    <script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script type="text/javascript" language="javascript"
        src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>

    <script type="text/javascript" language="javascript"
        src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"
        integrity="sha256-sPB0F50YUDK0otDnsfNHawYmA5M0pjjUf4TvRJkGFrI=" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.js"
        integrity="sha256-siqh9650JHbYFKyZeTEAhq+3jvkFCG8Iz+MHdr9eKrw=" crossorigin="anonymous"></script>
    <script type="text/javascript">
        $(document).ready(function () {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
            });
        $('#tombol-tambah').click(function () {
            $('#button-simpan').val("create-post");
            $('#form-tambah-edit').trigger("reset");
            $('#modal-judul').html("Tambah Kampus Baru"); 
            $('#tambah-edit-modal').modal('show'); 
            
        });
        $(document).ready(function() {
            $('#tablecampus').DataTable({
                processing : true,
                serverSide : true,
                ajax : {
                    url : "{{ route('campus.index') }}",
                    type : "GET"
                },
                columns: [
                    {data:'kodeuniv',name:'kodeuniv'},
                    {data:'logo',name:'logo', 
                        render: function( data, type, full, meta ) {
                        return "<img src=\"/assets/img/" + data + "\" class=\"img-logo\"/>";}},
                    {data:'nama',name:'nama'},
                    {data:'tahun',name:'tahun'},
                    {data:'akreditasi',name:'akreditasi'},
                    {data:'status',name:'status'},
                    {data:'alamat',name:'alamat'},
                    {data:'peringkat_lokal',name:'peringkat_lokal'},
                    {data:'contact',name:'contact'},
                    {data: 'action',name: 'action'},
                ]
            });
        } );

        if ($("#form-tambah-edit").length > 0) {
            $("#form-tambah-edit").validate({
                submitHandler: function (form) {
                    var actionType = $('#tombol-simpan').val();
                    $('#tombol-simpan').html('Menyimpan..');
                    var data = $('#form-tambah-edit').serialize();
                    const gambar = $('#logo').prop('files')[0];
                    let formData = new FormData();
                    formData.append('kodeuniv', $('#kodeuniv').val());
                    formData.append('gambar', gambar);
                    formData.append('nama', $('#nama').val());
                    formData.append('tahun', $('#tahun').val());
                    formData.append('akreditasi', $('#akreditasi').val());
                    formData.append('status', $('#status').val());
                    formData.append('alamat', $('#alamat').val());
                    formData.append('peringkat_lokal', $('#peringkat_lokal').val());
                    formData.append('contact', $('#contact').val());
                    $.ajax({
                        url: "{{ route('campus.store') }}", 
                        data: formData, 
                        type: "POST", 
                        dataType: 'json', 
                        cache: false,
                        processData: false,
                        contentType: false,
                        success: function () { 
                            $('#form-tambah-edit').trigger("reset"); 
                            $('#tambah-edit-modal').modal('hide'); 
                            $('#tombol-simpan').html('Simpan'); 
                            var oTable = $('#tablecampus').dataTable(); 
                            oTable.fnDraw(false);
                            iziToast.success({
                                title: 'Data Saved',
                                message: '{{ Session('
                                success')}}',
                                position: 'topRight'
                            });
                        },
                        error: function (data) { le
                            console.log('Error:', data);
                            $('#tombol-simpan').html('Simpan');
                        }
                    });
                }
            })
        }

        $('body').on('click', '.edit-post', function () {
            var data_kode = $(this).data('id');
            $.get("campus/" + data_kode + "/edit", 
                function (data) {
                $('#modal-judul').html("Edit Post");
                $('#tombol-simpan').val("edit-post");
                $('#tambah-edit-modal').modal('show');
                $('#kodeuniv').val(data.kodeuniv);
                $('#logo').val(data.logo);
                $('#nama').val(data.nama);
                $('#tahun').val(data.tahun);
                $('#akreditasi').val(data.akreditasi);
                $('#status').val(data.status);
                $('#alamat').val(data.alamat);
                $('#peringkat_lokal').val(data.peringkat_lokal);
                $('#contact').val(data.contact);
               
            })
        });

        $(document).on('click', '.delete', function () {
            dataId = $(this).attr('id');
            $('#konfirmasi-modal').modal('show');
        });

        $('#tombol-hapus').click(function () {
            $.ajax({

                url: "campus/" + dataId,
                type: 'delete',
                beforeSend: function () {
                    $('#tombol-hapus').text('Hapus Data'); 
                },
                success: function (data) { 
                    setTimeout(function () {
                        $('#konfirmasi-modal').modal('hide'); 
                        var oTable = $('#tablecampus').dataTable();
                        oTable.fnDraw(false); 
                    });
                    iziToast.warning({ 
                        title: 'Delete Successfully',
                        message: '{{ Session('
                        delete')}}',
                        position: 'bottomRight'
                    });
                }
            })
        });
       

    </script>
</html>