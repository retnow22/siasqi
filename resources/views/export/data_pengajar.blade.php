<table>
    <thead>
    <tr>
        <th>No</th>
        <th>NIP</th>
        <th>Nama</th>
        <th>Prodi</th>
        <th>Fakultas</th>
        <th>Instansi</th>
        <th>Angkatan</th>
        <th>Nomor HP</th>
        <th>Jenis Kelamin</th>
        <th>Level</th>
        <th>Kode Pengajar</th>
        <th>email</th>
    </tr>
    </thead>
    <tbody>
    @foreach($data_pengajar as $key => $pengajar)
        <tr>
            <td>{{ $key + 1}}</td>
            <td> {{ $pengajar -> nomor_induk }} </td>
            <td> {{ $pengajar -> nama }} </td>
            <td> {{ $pengajar -> prodi }} </td>
            <td> {{ $pengajar -> fakultas }} </td>
            <td> {{ $pengajar -> instansi }} </td>
            <td> {{ $pengajar -> angkatan }} </td>
            <td> {{ $pengajar -> no_hp }} </td>
            <td> {{ $pengajar -> jenis_kelamin }} </td>
            <td> {{ $pengajar -> level }} </td>
            <td> {{ $pengajar -> kode_pengajar }} </td>
            <td> {{ $pengajar->user -> email }} </td>
        </tr>
    @endforeach
    </tbody>
</table>