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
                <th>Nama Siswa</th>
                <th>NIS</th>
                <th>Kelas</th>
                <th>Jadwal</th>
                <th>Status</th>
                <th>Keterangan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->nama ?? '-' }}</td>
                    <td>{{ $item->nis ?? '-' }}</td>
                    <td>{{ $item->kelas ?? '-' }}</td>
                    <td>{{ $item->jadwal ?? '-' }}</td>
                    <td>{{ $item->status ?? '-' }}</td>
                    <td>{{ $item->note ?? '-' }}</td>

                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan="1"></td>
                <td align="left">Total</td>
                <td align="left" class="gray">{{ $data->count() }}</td>
            </tr>
        </tfoot>
    </table>

</body>

</html>
