<table>
    <thead>
    <tr>
        <th>No</th>
        <th>NIS</th>
        <th>Nama</th>
        <th>Prodi</th>
        <th>Fakultas</th>
        <th>Instansi</th>
        <th>Angkatan</th>
        <th>Nomor HP</th>
        <th>Jenis Kelamin</th>
        <th>Level</th>
        <th>Semester Masuk</th>
        <th>Status</th>
    </tr>
    </thead>
    <tbody>
    @foreach($data_peserta as $key => $peserta)
        <tr>
            <td>{{ $key + 1}}</td>
            <td> {{ $peserta -> nomor_induk }} </td>
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
        </tr>
    @endforeach
    </tbody>
</table>