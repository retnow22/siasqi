<table>
    <thead>
    <tr>
        <th>NIS</th>
        <th>Nama</th>
        <th>Prodi</th>
        <th>Angkatan</th>
        <th>Semester</th>
        <th>Nominal</th>
        <th>Tanggal Pembayaran</th>
        <th>Keterangan</th>
    </tr>
    </thead>
    <tbody>
    @foreach($pembayaran as $pembayaran)
        <tr>
            <td> {{ $pembayaran->peserta -> nomor_induk }} </td>
            <td> {{ $pembayaran->peserta -> nama }} </td>
            <td> {{ $pembayaran->peserta -> prodi }} </td>
            <td> {{ $pembayaran->peserta -> angkatan }} </td>
            <td> {{ $pembayaran -> semester }} </td>
            <td> {{ $pembayaran -> nominal }} </td>
            <td> {{ $pembayaran -> tgl_pembayaran }} </td>
            <td> {{ $pembayaran -> keterangan }} </td>
        </tr>
    @endforeach
    </tbody>
</table>