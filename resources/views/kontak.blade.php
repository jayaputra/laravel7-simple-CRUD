@extends('layout')
@section('title','Halaman About')

@section('content')
<section class="breadcrumbs">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center">
            <h2>Daftar Kontak</h2>
            <ol>
                <li><a href="/">Home</a></li>
            </ol>
        </div>
    </div>
</section>
<section class="blog aos-init aos-animate">
    <div class="container">
        <a href="{{route('tambah.kontak')}}" class="mb-3 btn btn-lg btn-primary">Tambah Kontak</a>
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <tr>
                    <th class="text-center">
                        No
                    </th>
                    <th class="text-center">
                        Nama
                    </th>
                    <th class="text-center">
                        Alamat
                    </th>
                    <th class="text-center">
                        Telp
                    </th>
                    <th class="text-center">
                        Aksi
                    </th>
                </tr>
                @php /*$i = ($kontakas->currentpage()-1)* $kontakas->perpage() + 1;*/ @endphp
                @foreach ($kontakas as $index=>$kontak)
                <tr>
                    <td>
                        {{-- $index +1 --}}
                        {{-- $i --}}
                        {{ ($kontakas->currentPage() - 1) * $kontakas->perPage() + $loop->iteration }}
                    </td>
                    <td>
                        {{$kontak->nama}}
                    </td>
                    <td>
                        {{$kontak->alamat}}
                    </td>
                    <td>
                        {{$kontak->telp}}
                    </td>
                    <td>
                        <ul class="list-inline mb-0">
                            <li class="list-inline-item"><a href="{{ route('edit.kontak', $kontak->id) }}"
                                    class="btn btn-warning">Edit</a></li>
                            <li class="list-inline-item"><button onclick="handleDelete({{ $kontak }})"
                                    class="btn btn-danger">Delete</button>
                            </li>
                        </ul>
                    </td>
                </tr>
                @php  /*$i += 1;*/ @endphp
                @endforeach
            </table>
        </div>
        {{$kontakas->links()}}
    </div>
</section>
<div class="modal" id="modalDelete" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <form id="formDelete" method="POST" action="">
            @csrf
            @method('DELETE')
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Konfirmasi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Apakah Anda ingin menghapus? <span class="font-weight-bold" id="namaorang"></span></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <input type="submit" class="btn btn-danger" value="Oke Delete">
                </div>
            </div>
        </form>
    </div>
</div>

@endsection

@section('script')

<script>
    function handleDelete(kontak) {
        var {
            id,
            nama
        } = kontak

        $('#modalDelete').modal('show');
        //$('#formDelete').attr('action', 'deletecontact/'+id)
        $('#formDelete').attr('action', `deletecontact/${id}`)
        $('#namaorang').html(nama);
    }
</script>
@endsection