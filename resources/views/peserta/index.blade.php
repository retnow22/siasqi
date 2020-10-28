<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIASQI</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" 
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>
<body>

    <div class="container">
        <div class="row">
        <div class="col-6">
            <h1>Data Peserta</h1>
        </div>
        <div class="col-6">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
            Tambah Data Peserta
            </button>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
                </div>
            </div>
            </div>
        </div>
            <table class="table">
                <tr>
                    <th>NIS</th>
                    <th>NAMA</th>
                    <th>PRODI</th>
                    <th>FAKULTAS</th>
                    <th>INSTANSI</th>
                    <th>ANGKATAN</th>
                    <th>NO HP</th>
                    <th>JENIS KELAMIN</th>
                    <th>LEVEL</th>
                    <th>SEMESTER MASUK</th>
                    <th>STATUS</th>
                    <!-- <th>USER ID</th> -->
                </tr>
                @foreach($data_peserta as $peserta)
                <tr>
                    <td> {{ $peserta -> nis }} </td>
                    <td> {{ $peserta -> nama }} </td>
                    <td> {{ $peserta -> prodi }} </td>
                    <td> {{ $peserta -> fakultas }} </td>
                    <td> {{ $peserta -> instansi }} </td>
                    <td> {{ $peserta -> angkatan }} </td>
                    <td> {{ $peserta -> no_hp }} </td>
                    <td> {{ $peserta -> jenis_kelamin }} </td>
                    <td> {{ $peserta -> level }} </td>
                    <td> {{ $peserta -> semester_masuk }} </td>
                    <td> {{ $peserta -> status }} </td>
                    <!-- <td> {{ $peserta -> user_id }} </td> -->
                </tr>
                @endforeach
            </table>

        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>