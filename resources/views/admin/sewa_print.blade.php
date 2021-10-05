<style>
    table,
    th,
    td {
        border: 1px solid black;
        border-collapse: collapse;
    }

    th,
    td {
        padding: 1em, 1em, 1em;
    }

    h2 {
        text-align: center;
    }

    small {
        font-size: .8em;
        color: #525252;
    }

    #total-text {
        text-align: right;
    }

    #total-numb {
        text-align: left;
    }

</style>
<table>
    <thead>
        <tr>
            <th colspan="8">

                <h2>
                    Data Penyewaan Studio Jalanan <br>
                    <small><i>per {{ tglindo(date('Y-m-d')) }}</i></small>
                </h2>
            </th>
        </tr>
        <tr>
            <th>#</th>
            <th>Tanggal Sewa</th>
            <th>Barang</th>
            <th>Harga</th>
            <th>Customer</th>
            <th>Kasir</th>
            <th>Tanggal Kembali</th>
            <th>Denda</th>
        </tr>
    </thead>
    <tbody>
        @foreach($sewa as $m)
            <tr>
                <td>{{ @$loop->iteration }}</td>
                <td>{{ tglindo($m->tanggal_sewa) }}</td>
                <td>{{ namakamera($m->kamera_id)}}</td>
                <td>{{ rupiah($m->harga) }}</td>
                <td>{{ namacust($m->cust_id)}}</td>
                <td>{{ namaadmin($m->admin_id)}}</td>
                <td>{{ tglindo($m->waktu_kembali) }}</td>
                <td>{{ viewdenda($m->sewa_id) }}</td>
                
            </tr>
        @endforeach
    </tbody>
</table>
