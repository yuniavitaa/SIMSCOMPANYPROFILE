<?php

namespace App\Controllers;

class Service extends BaseController
{
    public function service(): string
    {
        $data = [
            'title' => 'Service'
        ];
        return view('frontend_services', $data);
    }

    


    public function pay_tv_services(): string
    {
        $data = [
            'title' => 'Pay TV Service'
        ];
        return view('frontend_pay_tv_services', $data);
    }


    public function high_speed_internet_access(): string
    {
        $data = [
            'title' => 'High Speed Internet Access'
        ];
        return view('frontend_high_speed_internet_access', $data);
    }

    public function vpn_services(): string
    {
        $data = [
            'title' => 'VPN Services'
        ];
        return view('frontend_vpn_services', $data);
    }

    public function data_center(): string
    {
        $data = [
            'title' => 'Data Center'
        ];
        return view('frontend_data_center', $data);
    }

    public function dark_viber_connection(): string
    {
        $data = [
            'title' => 'Dark Viber Connection'
        ];
        return view('frontend_dark_viber_connection', $data);
    }

    
    public function bts_hotel(): string
    {
        $data = [
            'title' => 'BTS  Hotel/Multimedia Micro Cell Pole'
        ];
        return view('frontend_bts_hotel', $data);
    }
    public function vpn_form(): string
    {
        $data = [
            'title' => 'Form Pembelian Paket VPN'
        ];
        return view('frontend_vpn_form', $data); // Pastikan view ini ada
    }
    public function vsat(): string
    {
        $data = [
            'title' => 'VSAT'
        ];
        return view('frontend_vsat', $data);
    }

    public function training(): string
    {
        $data = [
            'title' => 'Training'
        ];
        return view('frontend_training', $data);
    }
    public function submit()
{
    // Validasi input
    $validation = \Config\Services::validation();
    
    $validation->setRules([
        'region' => 'required',
        'address' => 'required',
        'fullname' => 'required',
        'phone' => 'required|numeric',
        'email' => 'required|valid_email'
    ]);
    
    if (!$this->validate($validation->getRules())) {
        // Kembali ke form dengan error
        return redirect()->back()->withInput()->with('errors', $validation->getErrors());
    }

    // Proses penyimpanan data di database atau tindakan lain yang diperlukan
    // Kirim email notifikasi
    // Tampilkan notifikasi kepada pengguna
    session()->setFlashdata('success', 'Info selengkapnya akan dikirim lewat email.');
    return redirect()->to('/vpn_services'); // Atau redirect ke halaman lain
}

}