<!DOCTYPE html>
<html>
<head>
	<title>KHS {{$nilai->matpel->semester}} ({{$peserta->nomor_induk}}-{{$peserta->nama}})</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<style type="text/css">
		table tr td,
		table tr th{
			font-size: 9pt;
		}

        p{
            font-size: 10pt;
        }

    </style>
<br>
<br>
<br>
<br>    
	<center>
		<h5>Kartu Hasil Studi</h4>
    </center>
 <br>
 <br>
 <br> 
 <table width="700px">
        <tr>
            <td width="100px">
                <strong>
                    <p>
                    Nama <br>
                    Nomor Induk<br>
                    Prodi/Angkatan<br>
                    Level<br>
                    Semester<br>
                    Mata Pelajaran
                    </p>
                </strong>
            </td>
            <td class="text-left"> 
                <p>
                : {{auth()->user()->peserta->nama}} <br>
                : {{auth()->user()->peserta->nomor_induk}} <br>
                : {{auth()->user()->peserta->prodi}}/{{auth()->user()->peserta->angkatan}} <br>
                :  @php $level = auth()->user()->peserta->level @endphp
                    @if ($level == 1)
                        Pra Tahsin 1
                    @elseif($level == 2)
                        Pra Tahsin 2
                    @elseif($level == 3)
                        Tahsin 1
                    @elseif($level == 4)
                        Tahsin 2
                    @elseif($level == 5)
                        Tahsin 3
                    @elseif($level == 6)
                        Tahsin 4
                    @endif<br>
                : {{$nilai->matpel->semester}} <br>
                : {{$nilai->matpel->kode}}-{{$nilai->matpel->nama}}
                </p>    
            </td>
            <td width="50px"></td>        
        </tr>
    </table>
 
<br>
	<table class='table table-bordered' width="300px">
		<tbody>
        <tr>
            <td width="150px">Nilai Lisan </td>
            <td class="text-center"> {{ $nilai ->nilai_lisan  }} </td>        
        </tr>
        <tr>
            <td width="150px">Nilai Teori </td>
            <td class="text-center"> {{ $nilai ->nilai_teori  }} </td>        
        </tr>
        <tr>
            <td width="150px">Nilai Akhir </td>
            <td class="text-center"> {{ $nilai ->nilai_akhir  }} </td>        
        </tr>
        <tr>
            <td width="150px">KKM </td>
            <td class="text-center"> {{ $nilai ->kkm  }} </td>        
        </tr>
        <tr>
            <td width="150px">Keterangan </td>
            <td class="text-center"><strong> "{{ $nilai ->keterangan  }}" </strong></td>        
        </tr>
		</tbody>
    </table>
    <br>
    <br>
    <br>
    <table width="700px">
        <tr>
            <td width="50px"></td>
            <td>
                <p>
                Mudir Quran Institute UNJ
                <br>
                <br>
                <br>
                <br>
                <br>
                Mahbub Al Haqi <br>
                NIM. XXXXXXXXX
                </p>
            </td>
            <td class="text-right"> 
                <p>
                Kepala Quran Learning Center <br>
                Quran Institute UNJ
                <br>
                <br>
                <br>
                <br>
                Farhan Hanafi <br>
                NIM. XXXXXXXXX
                </p>    
            </td>
            <td width="50px"></td>        
        </tr>
    </table>


</body>
</html>