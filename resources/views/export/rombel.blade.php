<table>
    <thead>
    <tr>
        <th>Kode MP</th>
        <th>Mata Pelajaran</th>
        <th>Semester</th>
        <th>Kode Pengajar</th>
        <th>Pengajar</th>
        <th>Nama Peserta</th>
        <th>Prodi/Angkatan</th>
    </tr>
    </thead>
    <tbody>
    @foreach($rombel as $rombel)
        <tr>
            <td> {{ $rombel->matpel -> kode }} </td>
            <td> {{ $rombel->matpel -> nama }} </td>
            <td> {{ $rombel->matpel -> semester }} </td>
            <td> {{ $rombel->matpel->pengajar-> kode_pengajar }} </td>
            <td> {{ $rombel->matpel->pengajar-> nama }} </td>
            <td> {{ $rombel->peserta -> nama }} </td>
            <td> {{ $rombel->peserta -> prodi }}/{{ $rombel->peserta -> angkatan }} </td>
        </tr>
    @endforeach
    </tbody>
</table>