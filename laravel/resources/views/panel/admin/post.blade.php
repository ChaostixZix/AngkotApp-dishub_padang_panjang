@include('panel.headerPanel')
<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
@include('panel.navbarPanel')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
<link href="{{ url('/') }}/dashforge/lib/datatables.net-dt/css/jquery.dataTables.min.css" rel="stylesheet">
<link href="{{ url('/') }}/dashforge/lib/datatables.net-responsive-dt/css/responsive.dataTables.min.css"
      rel="stylesheet">
<link href="{{ url('/') }}/dashforge/lib/select2/css/select2.min.css" rel="stylesheet">
<div class="content content-fixed">
    <div class="container pd-x-0 pd-lg-x-10 pd-xl-x-0">
        {{--        <div class="row row-xs">--}}
        {{--            <div class="col-lg-12">--}}
        {{--                <div class="panel ht-100p">--}}
        {{--                    <div class="panel-header">--}}
        {{--                        <h6 class="mg-b-0">New Post</h6>--}}
        {{--                    </div>--}}
        {{--                    <div class="panel-body">--}}
        {{--                        <form>--}}
        {{--                            <div class="form-group">--}}
        {{--                                <label class="d-block">Judul</label>--}}
        {{--                                <input type="text" id="inputJudul" class="form-control" placeholder="Judul">--}}
        {{--                            </div>--}}
        {{--                            <div class="form-group">--}}
        {{--                                <label for="editor-container" class="d-block">Konten</label>--}}
        {{--                                <div id="editor-container" class="ht-200">--}}
        {{--                                </div>--}}
        {{--                            </div>--}}
        {{--                        </form>--}}
        {{--                    </div>--}}

        {{--                </div>--}}
        {{--            </div>--}}
        {{--        </div><!-- row -->--}}
        <div class="row row-xs">
            <div id="newPost" class="modal">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header pd-y-15 pd-x-20 bd-b-0">
                            <h6 class="modal-title">New Post</h6>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div><!-- modal-header -->
                        <div class="modal-body">
                            <div class="d-flex flex-column wt">
                                    <label class="d-block">Judul</label>
                                    <input type="text" id="inputJudul" class="form-control" placeholder="Judul">
                            </div>
                            <br>
                            <div class="d-flex flex-column wt">
                                    <label class="d-block">Gambar</label>
                                    <input type="file" id="inputGambar">
                            </div>
                            <br>
                            <div class="d-flex flex-column">
                                    <label class="d-block">Kategori</label>
                                    <select name="selectKategori" id="kategori">
                                        <option value="-">-</option>
                                        <option value="Anjay">Anjay</option>
                                        <option value="AA">AA</option>
                                    </select>
                                    <input type="text" id="inputKategori" class="form-control" placeholder="Tambah Kategori">
                            </div>
                            <hr>
                            <div class="d-flex flex-column ht-250">
                                <label class="d-block">Konten</label>
                                <div id="editor-container" class="flex-1 overflow-y-auto">
                                    ...
                                </div>
                            </div>
                        </div><!-- modal-body -->
                        <div class="modal-footer pd-y-15 pd-x-20 bd-t-0 tx-13">
                            <button type="button" id="post" class="btn btn-primary">Post</button>
                            <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
                        </div>
                    </div><!-- modal-content -->
                </div><!-- modal-dialog -->
            </div>
            <div id="editPost" class="modal">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header pd-y-15 pd-x-20 bd-b-0">
                            <h6 class="modal-title">Edit Post</h6>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div><!-- modal-header -->
                        <div class="modal-body pd-10">
                            <div class="d-flex flex-column wt">
                                <div class="form-group">
                                    <label class="d-block">Id</label>
                                    <input readonly type="text" id="inputEditId" class="form-control"
                                           placeholder="Judul">
                                </div>
                            </div>
                            <div class="d-flex flex-column wt-50">
                                <div class="form-group">
                                    <label class="d-block">Judul</label>
                                    <input type="text" id="inputEditJudul" class="form-control" placeholder="Judul">
                                </div>
                            </div>
                            <div class="d-flex flex-column ht-250">
                                <label class="d-block">Konten</label>
                                <div id="edit-editor-container" class="flex-1 overflow-y-auto">
                                    ...
                                </div>
                            </div>
                        </div><!-- modal-body -->
                        <div class="modal-footer pd-y-15 pd-x-20 bd-t-0 tx-13">
                            <button type="button" id="savePost" class="btn btn-primary">Save</button>
                            <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
                        </div>
                    </div><!-- modal-content -->
                </div><!-- modal-dialog -->
            </div>
            <div class="col-lg-12">
                <div class="panel ht-100p">
                    <div class="panel-header">
                        <h6 class="mg-b-0">Data Post</h6>
                    </div>
                    <div class="panel-body">
                        <table class="table" id="dataPost">
                            <thead>
                            <tr>
                                {{--                                <th scope="col">Id</th>--}}
                                <th scope="col">Judul</th>
                                <th scope="col">Konten</th>
                                <th scope="col">Author</th>
                                <th scope="col">Created</th>
                                <th scope="col">Updated</th>
                                <th scope="col">Aksi</th>
                            </tr>
                            </thead>-
                            <tbody>
                            @foreach($post as $p)
                                <tr>
                                    {{--                                    <th scope="row">{{ $p->id }}</th>--}}
                                    <td>{{ $p->judul }}</td>
                                    <td>{{ substr(strip_tags($p->konten), 0, 10) }} ...</td>
                                    <td>{{ $p->author }}</td>
                                    <td>{{ $p->created_at }}</td>
                                    <td>{{ $p->updated_at }}</td>
                                    <td>
                                        <a href="post.blade.php"><i class="fa fa-eye"></i></a>
                                        <a href="" data-toggle="modal" data-target="#editPost"
                                           onclick="editPost('{{ $p->id }}', '{{ $p->judul }}', '{{$p->konten}}')"><i
                                                    class="fa fa-edit"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div>
                        <div class="panel-footer text-center tx-13">
                            <button id="newPost" data-toggle="modal" data-target="#newPost" class="btn btn-primary"
                                    type="submit">New Post
                            </button>
                        </div><!-- card-footer -->
                    </div><!-- card -->
                </div>
            </div>
        </div><!-- row -->
    </div><!-- container -->
</div><!-- content -->
<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
@include('panel.scriptPanel')
<script src="{{ url('/') }}/dashforge/lib/select2/js/select2.min.js"></script>
<script src="{{ url('/') }}/dashforge/lib/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="{{ url('/') }}/dashforge/lib/datatables.net-dt/js/dataTables.dataTables.min.js"></script>
<script src="{{ url('/') }}/dashforge/lib/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script>
    var quill = new Quill('#editor-container', {
        placeholder: 'Masukkan konten',
        theme: 'snow'
    });
    var editKonten = new Quill('#edit-editor-container', {
        placeholder: 'Masukkan konten',
        theme: 'snow'
    });

    var dataPost = $('#dataPost').DataTable({
        order: [[3, "desc"]],
        language: {
            searchPlaceholder: 'Search...',
            sSearch: '',
            lengthMenu: '_MENU_',
        }
    });

    var kategoriNewPost = $('#kategori');
    var inputKategori = $('#inputKategori');

    kategoriNewPost.on('change', function () {
        inputKategori.val(kategoriNewPost.val());
    });

    inputKategori.on('keyup', function () {
        kategoriNewPost.val('');
    });

    function editPost(id, judul, konten) {
        $('#inputEditId').val(id);
        $('#inputEditJudul').val(judul);
        editKonten.container.innerHTML = konten;
    }

    $('#post').on('click', function () {
        var formdata = new FormData();

        var judul = $('#inputJudul').val();
        var kategori = $('#inputKategori').val();
        var gambar = $('#inputGambar').val();
        var konten = quill.container.innerHTML;
        var author = '{{ Session::get('username') }}';

        formdata.append('inputJudul', judul);
        formdata.append('inputKonten', konten);
        formdata.append('inputCategory', kategori);
        formdata.append('inputGambar', gambar);
        formdata.append('author', author);
        formdata.append('_token', '{{ csrf_token() }}');
        if (judul === '' || judul === null || kategori == null || konten === null || konten === '') {
            alert('Judul & Konten tidak boleh kosong!');
        } else {
            $.ajax({
                url: '{{ route('postNew') }}',
                type: 'post',
                processData: false,
                contentType: false,
                data: formdata,

                success: function (data) {
                    if (data === 'true') {
                        swal({title: 'Berhasil', text: 'Berhasil menambah post', type: 'success'}, function () {
                            location.reload();
                        })
                    } else {
                        swal('Gagal', 'Gagal menambah post', 'error');
                    }
                }
            });
        }
    });

    $('#savePost').on('click', function () {
        console.log('babi');
        var id = $('#inputEditId').val();
        var judul = $('#inputEditJudul').val();
        var konten = editKonten.container.innerHTML;
        var author = '{{ Session::get('username') }}';
        if (judul === '' || judul === null || konten === null || konten === '') {
            alert('Judul & Konten tidak boleh kosong!');
        } else {
            $.ajax({
                url: '{{ route('postEdit') }}',
                type: 'post',
                data: {id: id, inputJudul: judul, inputKonten: konten, author: author, _token: '{{ csrf_token()  }}'},

                success: function (data) {
                    if (data === 'true') {
                        swal({title: 'Berhasil', text: 'Berhasil mengedit post', type: 'success'}, function () {
                            location.reload();
                        })
                    } else {
                        swal('Gagal', 'Gagal mengedit post', 'error');
                    }
                }
            });
        }
    });
</script>

@include('panel.footerPanel')