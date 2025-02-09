<?php

if (!function_exists('renderRiwayatTable')) {
    function renderRiwayatTable($riwayat, &$counter) {
        $output = '';
        foreach ($riwayat as $item) {
            $statusClass = ($item['status'] === 'sudah_verifikasi') ? 'status-sudah' :
                (($item['status'] === 'belum_valid') ? 'status-belum' : 'status-sedang');
            $statusText = ucwords(str_replace('_', ' ', $item['status']));
            $createdDate = date('d-m-Y H:i', strtotime($item['created_at']));

            $output .= "
                <tr id=\"row_{$item['pendaftaran_id']}\">
                    <td>{$counter}</td>
                    <td>" . esc($item['nama']) . "</td>
                    <td>" . esc($item['email']) . "</td>
                    <td>" . esc($item['nomor_hp']) . "</td>
                    <td>" . esc($item['package_name']) . "</td>
                    <td>" . esc($item['package_price']) . "</td>
                    <td>" . esc($item['bukti_pembayaran']) . "</td>
                    <td id=\"status_{$item['pendaftaran_id']}\" class=\"{$statusClass}\">{$statusText}</td>
                    <td>{$createdDate}</td>
                    <td><a href=\"" . base_url('/pendaftaran/detailRiwayat/' . $item['pendaftaran_id']) . "\">Invoice</a></td>
                </tr>
            ";

            $counter++;
        }
        return $output;
    }
}
