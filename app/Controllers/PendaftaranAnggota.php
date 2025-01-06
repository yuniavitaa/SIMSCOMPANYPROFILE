<?php

namespace App\Controllers;

use App\Models\PendaftaranAnggotaModel;
use App\Models\BuktiPembayaranModel;
use App\Models\NotificationModel;

class PendaftaranAnggota extends BaseController
{
    public function index()
    {
        $userData = session()->get();

        if (!isset($userData['logged_in']) || !$userData['logged_in']) {
            return redirect()->to('/login');
        }

        // Ambil data paket dari session jika ada
        $package_name = session()->get('package_name') ?? '';
        $package_price = session()->get('package_price') ?? '';

        $data = [
            'title' => 'Form Pendaftaran Anggota',
            'email' => $userData['email'],
            'nama_lengkap' => $userData['fullname'] ?? '',
            'nomor_hp' => '',
            'domisili' => '',
            'package_name' => $package_name,
            'package_price' => $package_price,
            'payment_method' => $this->request->getPost('payment_method'),
        ];

        return view('pendaftaran_anggota', $data);
    }

    public function setPackage()
    {
        $package_name = $this->request->getPost('package_name');
        $package_price = $this->request->getPost('package_price');

        session()->set([
            'package_name' => $package_name,
            'package_price' => $package_price,
        ]);

        return redirect()->to('/pendaftaran');
    }

    public function kirim()
    {
        $validation = $this->validate([
            'fullname' => 'required',
            'email' => 'required|valid_email',
            'nomorHp' => 'required|numeric',
            'domisili' => 'required',
            'perusahaan' => 'permit_empty',
            'jabatan' => 'permit_empty',
            'alamatPerusahaan' => 'permit_empty',
            'id_type' => 'required|in_list[ktp,sims,pasport]',
            'nomor_id' => 'required',
            'gender' => 'required|in_list[laki-laki,perempuan]',
            'payment_method' => 'required|in_list[transfer,gopay,shoppepay,dana]',
        ]);

        if (!$validation) {
            return redirect()->back()->withInput()->with('gagal', 'Silakan periksa kembali isian Anda!');
        }


        // Ambil data dari input
        $payment_method = $this->request->getPost('payment_method');
        log_message('info', 'Payment Method: ' . $payment_method); // Log untuk memeriksa nilai

        $data = [
            'package_name' => $this->request->getPost('package_name'),
            'package_price' => session()->get('package_price'), // Ambil dari session
            'nama_lengkap' => $this->request->getPost('fullname'),
            'email' => $this->request->getPost('email'),
            'nomor_hp' => $this->request->getPost('nomorHp'),
            'domisili' => $this->request->getPost('domisili'),
            'perusahaan' => $this->request->getPost('perusahaan'),
            'jabatan' => $this->request->getPost('jabatan'),
            'alamat_perusahaan' => $this->request->getPost('alamatPerusahaan'),
            'id_type' => $this->request->getPost('id_type'),
            'nomor_id' => $this->request->getPost('nomor_id'),
            'gender' => $this->request->getPost('gender'),
            'payment_method' => $this->request->getPost('payment_method'),
        ];


        $model = new PendaftaranAnggotaModel();
        if ($model->save($data)) {
            $lastInsertId = $model->insertID();

            $buktiPembayaranModel = new BuktiPembayaranModel();
            $buktiPembayaranModel->save([
                'pendaftaran_id' => $lastInsertId,
                'nama' => $data['nama_lengkap'],
                'email' => $data['email'],
                'nomor_hp' => $data['nomor_hp'],
                'payment_method' => $data['payment_method'], // Tambahkan ini
                'status' => 'sedang_verifikasi',
                'package_name' => $data['package_name'], // Tambahkan ini
                'package_price' => $data['package_price'], // Tambahkan ini
            ]);

            session()->set('pendaftaran_id', $lastInsertId);

            return redirect()->to('/pendaftaran/uploadBukti/' . $lastInsertId)
                ->with('sukses', 'Data berhasil dikirim! Silakan unggah bukti pembayaran.');
            if (!$validation) {
                $errors = $this->validator->getErrors();
                foreach ($errors as $field => $error) {
                    log_message('error', "Validation failed for $field: $error");
                }
                return redirect()->back()->withInput()->with('gagal', 'Silakan periksa kembali isian Anda!');
            }
        }
    }

    public function uploadBukti($pendaftaran_id)
    {
        $model = new PendaftaranAnggotaModel();
        $dataPendaftaran = $model->find($pendaftaran_id);

        if (!$dataPendaftaran) {
            return redirect()->to('/pendaftaran')->with('gagal', 'Data pendaftaran tidak ditemukan.');
        }

        return view('upload_bukti_pembayaran', ['dataPendaftaran' => $dataPendaftaran]);
    }

    public function prosesUploadBukti()
    {
        $validation = $this->validate([
            'pendaftaran_id' => 'required|integer',
            'bukti_pembayaran' => 'uploaded[bukti_pembayaran]|max_size[bukti_pembayaran,2048]|mime_in[bukti_pembayaran,image/png,image/jpg,image/jpeg,application/pdf]',
        ]);

        if (!$validation) {
            return redirect()->back()->withInput()->with('gagal', 'Silakan periksa kembali isian Anda!');
        }

        $pendaftaranId = $this->request->getPost('pendaftaran_id');
        $pendaftaranModel = new PendaftaranAnggotaModel();
        $dataPendaftaran = $pendaftaranModel->find($pendaftaranId);

        if (!$dataPendaftaran) {
            return redirect()->back()->with('gagal', 'Data pendaftaran tidak ditemukan.');
        }

        $file = $this->request->getFile('bukti_pembayaran');
        if ($file->isValid() && !$file->hasMoved()) {
            $fileName = $file->getRandomName();
            $file->move(WRITEPATH . 'uploads', $fileName);

            $buktiPembayaranModel = new BuktiPembayaranModel();
            $buktiPembayaranModel->where('pendaftaran_id', $pendaftaranId)->set([
                'bukti_pembayaran' => $fileName,
                'status' => 'sedang_verifikasi',
            ])->update();

            session()->set('notifikasi', session()->get('notifikasi') + 1);

            return redirect()->back()->with('sukses', 'Bukti pembayaran berhasil diupload!');
        } else {
            return redirect()->back()->withInput()->with('gagal', 'Gagal mengupload bukti pembayaran.');
        }
    }

    public function riwayatPembelian()
    {
        $userData = session()->get();
        if (!isset($userData['logged_in']) || !$userData['logged_in']) {
            return redirect()->to('/login');
        }

        $email = $userData['email'];

        $buktiPembayaranModel = new BuktiPembayaranModel();
        $riwayatSedangVerifikasi = $buktiPembayaranModel->getRiwayatByEmail($email, 'sedang_verifikasi');
        $riwayatSudahVerifikasi = $buktiPembayaranModel->getRiwayatByEmail($email, 'sudah_verifikasi');
        $riwayatBelumValid = $buktiPembayaranModel->getRiwayatByEmail($email, 'belum_valid');
        $data = [
            'title' => 'Riwayat Pembelian',
            'riwayatSedangVerifikasi' => $riwayatSedangVerifikasi,
            'riwayatSudahVerifikasi' => $riwayatSudahVerifikasi,
            'riwayatBelumValid' => $riwayatBelumValid,
        ];

        return view('riwayat_pembelian', $data);
    }

    public function detailRiwayat($pendaftaran_id)
    {
        $pendaftaranModel = new PendaftaranAnggotaModel();
        $buktiPembayaranModel = new BuktiPembayaranModel();

        $dataPendaftaran = $pendaftaranModel->find($pendaftaran_id);
        $buktiPembayaran = $buktiPembayaranModel->where('pendaftaran_id', $pendaftaran_id)->first();

        if (!$dataPendaftaran) {
            return redirect()->to('/pendaftaran/riwayatPembelian')->with('gagal', 'Detail tidak ditemukan.');
        }

        return view('detail_riwayat', [
            'dataPendaftaran' => $dataPendaftaran,
            'buktiPembayaran' => $buktiPembayaran,
        ]);
    }

    public function resetNotifikasi()
    {
        // Reset notifikasi menjadi 0
        session()->set('notifikasi', 0);

        return redirect()->to('/pendaftaran/riwayatPembelian');
    }

    public function daftar()
    {
        $model = new PendaftaranAnggotaModel();
        $dataPendaftaran = $model->findAll(); // Ambil semua data dari tabel pendaftaran

        return view('admin/pendaftaran_list', [
            'title' => 'Daftar Pendaftaran Anggota',
            'dataPendaftaran' => $dataPendaftaran,
        ]);

    }



    public function detail($id)
    {
        $model = new PendaftaranAnggotaModel();
        $pendaftaran = $model->find($id);

        if (!$pendaftaran) {
            return redirect()->to('/pendaftaran/daftar')->with('gagal', 'Data tidak ditemukan.');
        }

        return view('pendaftaran/detail', [
            'title' => 'Detail Pendaftaran',
            'pendaftaran' => $pendaftaran,
        ]);
    }


    public function hapus($id)
    {
        $model = new PendaftaranAnggotaModel();
        $pendaftaran = $model->find($id);

        if (!$pendaftaran) {
            return redirect()->to('/pendaftaran/daftar')->with('gagal', 'Data tidak ditemukan.');
        }

        $model->delete($id);

        return redirect()->to('/pendaftaran/daftar')->with('sukses', 'Data berhasil dihapus.');
    }


    public function daftarPembayaran()
    {
        $model = new BuktiPembayaranModel();
        $data['pembayaran'] = $model->findAll(); // Mengambil semua riwayat pembayaran
        return view('admin/bukti_list', $data); // Menampilkan view admin
    }

    // Fungsi untuk verifikasi pembayaran (admin)
    public function verifikasiPembayaran($id)
    {
        $model = new BuktiPembayaranModel();

        $data = [
            'status' => 'verified', // Ubah status menjadi 'verified'
        ];

        // Update status pembayaran
        if ($model->update($id, $data)) {
            // Setelah status diperbarui, kirim notifikasi dan arahkan ke halaman daftar pembayaran
            return redirect()->to('/admin/pendaftaran/daftarPembayaran')->with('message', 'Pembayaran berhasil diverifikasi.');
        } else {
            return redirect()->to('/admin/pendaftaran/daftarPembayaran')->with('message', 'Gagal memverifikasi pembayaran.');
        }
    }


    public function updateStatusPembayaran($id)
    {
        // Ensure the request is valid (e.g., valid status)
        if ($this->request->getPost('status') != 'verified') {
            return $this->response->setStatusCode(400, 'Invalid status');
        }

        // Update status to 'verified' in the database
        $buktiPembayaranModel = new BuktiPembayaranModel();
        $buktiPembayaranModel->update($id, [
            'status' => 'verified', // Update status in the database
        ]);

        // Respond with success
        return $this->response->setJSON([
            'status' => 'verified'
        ]);
    }

    protected $buktiPembayaranModel;

    public function __construct()
    {
        $this->buktiPembayaranModel = new BuktiPembayaranModel();
    }


    public function riwayat()
    {
        $data = [
            'title' => 'Riwayat Pembelian',
            'riwayat' => $this->buktiPembayaranModel->findAll() // Ambil semua data pembelian
        ];

        return view('admin/riwayat_pembelian', $data);
    }

    public function updateStatus($id)
    {
        $status = $this->request->getPost('status'); // Ambil status dari dropdown
        $this->buktiPembayaranModel->update($id, ['status' => $status]);

        return redirect()->to('/admin/riwayat')->with('success', 'Status berhasil diperbarui.');
    }

    


}

