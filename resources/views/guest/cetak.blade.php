<!DOCTYPE html>
<html>
<h3>
    <center>Laporan Daftar Hadir</center>
</h3>
<style>
    .signed {
        width: 30%;
    }
</style>
<table border="1" cellspacing="0" cellpadding="5" align="center">
    <tr>
        <th>NIP</th>
        <th>Nama</th>
        <th>Jenis Kelamin</th>
        <th>Nama Instansi(OPD)</th>
        <th>Jabatan</th>
        <th>No. Hp</th>
        <th>TTD</th>
    </tr>
    @foreach ($guest as $g)
        <tr>
            <td>{{ $g->nip }}</td>
            <td>{{ $g->nama }}</td>
            <td>{{ $g->jenis_kelamin }}</td>
            <td>{{ $g->opds->nama_opd }}</td>
            <td>{{ $g->jabatan }}</td>
            <td>{{ $g->no_hp }}</td>
            <td align="center"><img class="signed" src="{{ storage_path('app/' . $g->signed) }}" alt="user image"></td>
        </tr>
    @endforeach
</table>

</html>
