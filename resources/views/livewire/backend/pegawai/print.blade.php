<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cetak Data User</title>
    <style>
        .title-table {
            font-weight: bold; 
            margin-top:20px; 
            margin-bottom:3px;
        };
    </style>
</head>
<body>
    @foreach ($users as $user)
        <div style="width: 1vh; padding:0px; margin:0px;page-break-after: always;">
            <div>
                <img src="{{ $user->pegawai->avatar ? public_path('storage/'.$user->pegawai->avatar) : public_path('image/avatar-default.png') }}" alt="avatar" height="70" style="float:left;margin:0 8px 4px 0;" >
                <p style="font-size: 17px;margin-bottom:0px;font-weight:bold;">{{ $user->pegawai->nama_lengkap }}</p>
                <small>Sebagai {{ $user->roles()->first() ? $user->roles()->first()->name : "" }} di {{ $user->pegawai->unit->nama }}</small>
            </div>
            <p style="font-weight: bold; margin-top:30px">Informasi Akun</p>
            <table width="100%">
                <tr>
                    <td style="width: 40%">Email</td>
                    <td>Username</td>
                    <td>Waktu Verifikasi Email</td>
                </tr>
                <tr>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->username ?? "Belum Disetting" }}</td>
                    <td>{{ $user->email_verified_at ?? "Belum Diverifikasi" }}</td>
                </tr>
            </table>
            <p style="font-weight: bold; margin-top:30px">Informasi Pegawai</p>
            <table width="100%">
                <tr>
                    <td style="width: 40%">Nama</td>
                    <td>Nip</td>
                    <td>Unit</td>
                </tr>
                <tr>
                    <td>{{ $user->pegawai->nama_lengkap ?? "Belum Disetting" }}</td>
                    <td>{{ $user->pegawai->nip ?? "Belum Disetting" }}</td>
                    <td>{{ $user->pegawai->unit->nama }}</td>
                </tr>
                <tr>
                    <td colspan="3"><br></td>
                </tr>
                <tr>
                    <td>No Hp</td>
                    <td>Jenis Kelamin</td>
                    <td>Tempat, Tanggal Lahir</td>
                </tr>
                <tr>
                    <td>{{ $user->pegawai->no_hp ?? "000 000 0000" }}</td>
                    <td>{{ $user->pegawai->jenis_kelamin_text }}</td>
                    <td>{{ $user->pegawai->tempat_lahir. ", ".$user->pegawai->tgl_lahir }}</td>
                </tr>
                <tr>
                    <td colspan="3"><br></td>
                </tr>
                <tr>
                    <td>NIDN</td>
                    <td>NPWP</td>
                    <td>Tipe</td>
                </tr>
                <tr>
                    <td>{{ $user->pegawai->nidn ?? "Belum Disetting" }}</td>
                    <td>{{ $user->pegawai->npwp ?? "Belum Disetting" }}</td>
                    <td>{{ $user->pegawai->tipe ? $user->pegawai->tipe_pegawai_text : "Belum Disetting" }}</td>
                </tr>
                <tr>
                    <td colspan="3"><br></td>
                </tr>
                <tr>
                    <td>Ikatan Kerja</td>
                    <td>Tanggal Pensiun</td>
                    <td>Status</td>
                </tr>
                <tr>
                    <td>{{ $user->pegawai->ikatan_kerja_pegawai_text ?? "Belum Disetting" }}</td>
                    <td>{{ $user->pegawai->tgl_pensiun ?? "Belum Disetting" }}</td>
                    <td>{{ $user->pegawai->status ?? "Belum Disetting" }}</td>
                </tr>
                <tr>
                    <td colspan="3"><br></td>
                </tr>
                <tr>
                    <td colspan="3">Alamat</td>
                </tr>
                <tr>
                    <td colspan="3">{{ $user->pegawai->alamat ?? "Belum Disetting" }}</td>
                </tr>
            </table>
            <p class="title-table">Riwayat Fungsional</p>
            <table width="100%" border="1">
                <tr>
                    <th style="width: 60%">Fungsional</th>
                    <th style="width: 30%">Tanggal</th>
                    <th style="width: 10%">Validiasi</th>
                </tr>
                @forelse ($user->pegawai->fungsionals as $data)
                    <tr>
                        <td>{{ $data->fungsional->nama }}</td>
                        <td style="text-align: center">{{ $data->tmt }}</td>
                        <td style="text-align: center">{{ $data->status ? "ya" : "Tidak" }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" style="text-align: center">Tidak Ada Data</td>
                    </tr>
                @endforelse
            </table>
            <p class="title-table">Riwayat Jabatan</p>
            <table width="100%" border="1">
                <tr>
                    <th style="">Nama</th>
                    <th style="">Unit</th>
                    <th style="">Tanggal Mulai</th>
                    <th style="">Tanggal Selesai</th>
                    <th style="width: 10%">Validiasi</th>
                </tr>
                @forelse ($user->pegawai->jabatans as $data)
                    <tr>
                        <td>{{ $data->jabatan->nama }}</td>
                        <td style="text-align: center">{{ $data->jabatan->unit->nama }}</td>
                        <td style="text-align: center">{{ $data->tgl_mulai }}</td>
                        <td style="text-align: center">{{ $data->tgl_selesai }}</td>
                        <td style="text-align: center">{{ $data->status ? "ya" : "Tidak" }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" style="text-align: center">Tidak Ada Data</td>
                    </tr>
                @endforelse
            </table>
            <p class="title-table">Riwayat Pangkat</p>
            <table width="100%" border="1">
                <tr>
                    <th style="width: 60%">Pangkat</th>
                    <th style="width: 30%">Tanggal</th>
                    <th style="width: 10%">Validiasi</th>
                </tr>
                @forelse ($user->pegawai->pangkats as $data)
                    <tr>
                        <td>{{ $data->pangkatGolongan->nama }}</td>
                        <td style="text-align: center">{{ $data->tmt }}</td>
                        <td style="text-align: center">{{ $data->status ? "ya" : "Tidak" }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" style="text-align: center">Tidak Ada Data</td>
                    </tr>
                @endforelse
            </table>
            <p class="title-table">Riwayat Mutasi</p>
            <table width="100%" border="1">
                <tr>
                    <th style="width: 60%">Mutasi</th>
                    <th style="width: 30%">Tanggal</th>
                    <th style="width: 10%">Validiasi</th>
                </tr>
                @forelse ($user->pegawai->mutasis as $data)
                    <tr>
                        <td>{{ $data->unit->nama }}</td>
                        <td style="text-align: center">{{ $data->tgl_mutasi }}</td>
                        <td style="text-align: center">{{ $data->status ? "ya" : "Tidak" }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" style="text-align: center">Tidak Ada Data</td>
                    </tr>
                @endforelse
            </table>
        </div>
    @endforeach
</body>
</html>