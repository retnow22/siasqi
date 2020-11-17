<table>
    <thead>
    <tr>
        <th>Semester</th>
        <th>NIP</th>
        <th>Nama</th>
        <th>Nominal</th>
        <th>Jumlah Mengajar</th>
        <th>Jumlah Membadalkan</th>
        <th>Total Pembayaran</th>
    </tr>
    </thead>
    <tbody>
    @foreach($kafalah as $key => $k)
        <tr>
            <td> {{ $k -> semester }} </td>
            <td> {{ $k->pengajar -> nomor_induk }} </td>
            <td> {{ $k->pengajar -> nama }} </td>
            <td> {{ $k -> nominal }} </td>
            <td> {{ $k -> jumlah_mengajar }} </td>
            <td> {{ $k -> badal }} </td>
            <td> {{ $k -> total_pembayaran }} </td>
        </tr>
    @endforeach
    </tbody>
</table>