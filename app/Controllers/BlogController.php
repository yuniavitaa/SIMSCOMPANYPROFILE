<?php

namespace App\Controllers;

use App\Models\BlogModel;

class BlogController extends BaseController
{
    protected $blogModel;

    public function __construct()
    {
        $this->blogModel = new BlogModel(); // Model tetap mengarah ke tabel 'posting'
    }
    public function index()
    {
        $data['blogs'] = $this->blogModel->orderBy('created_at', 'DESC')->findAll();
        return view('frontend_blog', $data); // Ganti dengan file view yang ada
    }

    public function detail($id = null)
    {
        if (!$id) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $blog = $this->blogModel->find($id);
        if (!$blog) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $data['blog'] = $blog;

        return view('frontend_blog_item', $data);
    }


    public function insertData()
    {
        $data = [
            [
                'title' => 'Judul Artikel 1',
                'content' => 'Ini adalah isi dari artikel pertama.',
                'image' => 'assets/img/Blog/Media 3.png',
                'category' => 'Teknologi',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'title' => 'Judul Artikel 2',
                'content' => 'Ini adalah isi dari artikel kedua.',
                'image' => 'uploads/images/image2.jpg',
                'category' => 'Kesehatan',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'title' => 'Judul Artikel 3',
                'content' => 'Ini adalah isi dari artikel ketiga.',
                'image' => 'uploads/images/image3.jpg',
                'category' => 'Bisnis',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]
        ];

        // Gunakan BlogModel untuk menyisipkan data
        $this->blogModel->insertBatch($data); // Untuk menyisipkan banyak data sekaligus

        return "Data berhasil disisipkan!";
    }

    public function adminIndex()
    {
        $data['blogs'] = $this->blogModel->orderBy('created_at', 'DESC')->findAll();
        return view('admin/blog_list', $data); // Menampilkan daftar blog di Admin
    }

    public function create()
    {
        return view('admin/blog_create'); // View untuk form tambah blog
    }

    public function store()
    {
        $data = $this->request->getPost();

        // Upload dan simpan path gambar
        if ($this->request->getFile('image')->isValid()) {
            $file = $this->request->getFile('image');
            $fileName = $file->getRandomName();
            $file->move('assets/img/Blog/', $fileName);
            $data['image'] = 'assets/img/Blog/' . $fileName;
        }

        $this->blogModel->insert($data);

        return redirect()->to('/admin/blog')->with('success', 'Blog berhasil ditambahkan.');
    }


    public function edit($id)
    {
        $data['blog'] = $this->blogModel->find($id);

        if (!$data['blog']) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Blog tidak ditemukan');
        }

        return view('admin/blog_edit', $data); // View untuk form edit blog
    }

    public function update($id)
    {
        // Validasi input
        $validation = $this->validate([
            'title' => 'required|min_length[3]|max_length[255]',
            'content' => 'required',
            'category' => 'required',
            'image' => 'is_image[image]|max_size[image,2048]',
        ]);

        if (!$validation) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Ambil data lama
        $blog = $this->blogModel->find($id);

        if (!$blog) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Blog tidak ditemukan');
        }

        // Upload gambar baru (jika ada)
        $file = $this->request->getFile('image');
        $imageName = $blog['image']; // Default ke gambar lama

        if ($file->isValid() && !$file->hasMoved()) {
            $imageName = $file->getRandomName();
            $file->move('uploads/images', $imageName);
            unlink($blog['image']); // Hapus gambar lama
            $imageName = 'uploads/images/' . $imageName;
        }

        // Update data
        $this->blogModel->update($id, [
            'title' => $this->request->getPost('title'),
            'content' => $this->request->getPost('content'),
            'category' => $this->request->getPost('category'),
            'image' => $imageName,
        ]);

        return redirect()->to('/admin/blog')->with('success', 'Blog berhasil diperbarui.');
    }


    public function deleteBlog($id)
    {
        if ($this->blogModel->delete($id)) {
            return redirect()->to('/admin/blog')->with('success', 'Blog berhasil dihapus!');
        } else {
            return redirect()->to('/admin/blog')->with('error', 'Gagal menghapus blog.');
        }
    }



}
