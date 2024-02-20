<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml"
    xmlns:o="urn:schemas-microsoft-com:office:office">

<head>
    <meta charset="utf-8">
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th,
        td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>

    <table class="table table-striped">
        <thead class="">
            <tr>
                <th>No</th>
                <th>Nama Siswa</th>
                <th>NISN</th>
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

    </table>

</body>

</html>
