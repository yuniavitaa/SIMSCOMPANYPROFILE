<?php

namespace App\Controllers;

use App\Models\M_User;

class User extends BaseController
{
    public function index()
    {
        $data = [
            'judul' => 'User',
            'page' => 'frontend_login',
            'menu' => 'user',
            'submenu' => '',
        ];
        return view('templates/admin_dashboard', $data);
    }


    public function login()
    {
        $data = [
            'title' => 'Form Login',
            'tampil' => 'frontend_login',
        ];
        echo view('templates/wrapper', $data);
    }

    public function register()
    {
        $data = [
            'title' => 'Form Register',
            'tampil' => 'frontend_register',
        ];
        echo view('templates/wrapper', $data);
    }

    public function regis()
    {
        $userData = new M_User();

        // Validasi input: Pastikan semua field terisi
        if (empty($_POST['fullname'])  || empty($_POST['email']) || empty($_POST['password'])) {
            // Set flashdata untuk menampilkan error jika ada field yang kosong
            session()->setFlashdata('error', 'Semua field harus diisi!');
            return redirect()->to('/register'); // Kembali ke halaman registrasi
        }

        // Validasi format email
        if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            session()->setFlashdata('error', 'Email tidak valid!');
            return redirect()->to('/register');
        }

        // Cek apakah email sudah terdaftar
        $existingUser = $userData->where('email', $_POST['email'])->first();
        if ($existingUser) {
            session()->setFlashdata('error', 'Email sudah terdaftar!');
            return redirect()->to('/register');
        }

        $_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);

        $_POST['role'] = 'member'; // Set role menjadi 'member'

        if (!$userData->insert($_POST)) {
            var_dump($userData->errors());
            exit;
        } else {
            // Set flashdata untuk notifikasi berhasil registrasi
            session()->setFlashdata('success', 'Registrasi berhasil! Silakan login.');
            return redirect()->to('/login'); // Arahkan ke halaman login
        }
    }




    public function loginProcess()
    {
        $userData = new M_User(); // Model user
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');

        $user = $userData->where('email', $email)->first();

        if ($user && password_verify($password, $user['password'])) {
            // Ambil fullname dari database
            session()->set([
                'email' => $user['email'],
                'fullname' => $user['fullname'], // Nama lengkap
                'role' => $user['role'],
                'logged_in' => true
            ]);

            // Flashdata untuk notifikasi berhasil login
            session()->setFlashdata('success', 'Login berhasil!');

            // Redirect berdasarkan peran
            if ($user['role'] === 'admin') {
                return redirect()->to('/dashboard');
            } else {
                return redirect()->to('/'); // Arahkan ke form pendaftaran
            }
        } else {
            // Jika gagal login
            session()->setFlashdata('error', 'Email atau password salah.');
            return redirect()->back();
        }
    }

    public function listUsers()
    {
        $model = new M_User();

        // Ambil semua data dari tabel user
        $data = [
            'judul' => 'Daftar User',
            'menu' => 'masterdata',
            'submenu' => 'user',
            'users' => $model->findAll() // Ambil data user
        ];

        // Tampilkan halaman daftar user
        return view('admin/user_list', $data);
    }

    public function createUser()
    {
        if ($this->request->getMethod() === 'post') {
            $model = new M_User();

            // Validasi data
            $data = [
                'fullname' => $this->request->getPost('fullname'),
                'email' => $this->request->getPost('email'),
                'password' => password_hash($this->request->getPost('password'), PASSWORD_BCRYPT), // Hash password
                'role' => $this->request->getPost('role'),
                'date_create' => date('Y-m-d H:i:s'),
                'date_update' => date('Y-m-d H:i:s'),
            ];

            $model->insert($data);

            return redirect()->to('/admin/user')->with('success', 'User berhasil ditambahkan!');
        }

        // Jika metode bukan POST, tampilkan form create
        return view('admin/user_create');
    }

    public function editUser($id = null)
    {
        if ($id === null) {
            // Jika tidak ada ID di URL, redirect ke halaman user
            return redirect()->to('/admin/user')->with('error', 'No ID provided.');
        }

        $model = new M_User();
        $user = $model->find($id); // Cari user berdasarkan ID

        if (!$user) {
            // Jika user tidak ditemukan, redirect dengan error message
            return redirect()->to('/admin/user')->with('error', 'User not found.');
        }

        // Jika ada method POST (update data)
        if ($this->request->getMethod() === 'post') {
            $data = [
                'fullname' => $this->request->getPost('fullname'),
                'email'    => $this->request->getPost('email'),
                'role'     => $this->request->getPost('role'),
                'date_update' => date('Y-m-d H:i:s'),
            ];

            if ($this->request->getPost('password')) {
                $data['password'] = password_hash($this->request->getPost('password'), PASSWORD_BCRYPT);
            }

            $model->update($id, $data);

            return redirect()->to('/admin/user')->with('success', 'User updated successfully.');
        }

        // Tampilkan view dengan data user
        return view('admin/user_edit', ['user' => $user]);
    }


    public function deleteUser($id = null)
    {
        if (!$id) {
            return redirect()->to('/admin/user')->with('error', 'ID pengguna tidak ditemukan.');
        }

        $model = new M_User();

        if ($model->delete($id)) {
            return redirect()->to('/admin/user')->with('success', 'Pengguna berhasil dihapus!');
        } else {
            return redirect()->to('/admin/user')->with('error', 'Gagal menghapus pengguna.');
        }
    }





    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}
