<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml"
    xmlns:o="urn:schemas-microsoft-com:office:office">

<head>
    <meta charset="utf-8">

</head>

<body>

    <table class="table table-striped">
        <thead class="">
            <tr>
                <th>No</th>
                <th>Nama Pegawai</th>
                <th>Jabatan Pegawai</th>
                <th>Email</th>
                <th>Nama Atasan</th>
                <th>Jabatan Atasan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($employes as $row)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $row->nama_pegawai }}</td>
                    <td>{{ $row->jabatan_pegawai }}</td>
                    <td>{{ $row->email }}</td>
                    <td>{{ $row->nama_atasan }}</td>
                    <td>{{ $row->jabatan_atasan }}</td>

                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan="1"></td>
                <td align="left">Total</td>
                <td align="left" class="gray">{{ $employes->count() }}</td>
            </tr>
        </tfoot>
    </table>

</body>

</html>
