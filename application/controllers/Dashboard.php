<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		
		if (empty($_SESSION['user-log'][0])) {
			return redirect('welcome/index');
		}
		$this->load->database();
	}

	public function index()
	{
		$this->load->view('app',[
			'page' => 'pemesanan'
		]);
	}
	
	public function create()
	{
		$this->load->view('app',[
			'page' => 'create'
		]);
	}
	
	public function store()
	{
		$data = [
			'asal' 		=> $_POST['asal'],
			'tujuan' 	=> $_POST['tujuan'],
			'tglJadwal' => $_POST['jadwal'],
			'harga' 	=> $_POST['harga'],
			'seat' 		=> $_POST['kursi'],
			'jamKeberangkatan' => $_POST['jam']
		];
		
		$this->db->insert('penjualan_tiket', $data);
		
		
		return redirect('/dashboard');
	}
	
	public function edit($id = null)
	{
		if (!empty($id)) {
			
			$data = $this->db->get_where('penjualan_tiket',['id' => $id])->result();
			
			$this->load->view('app',[
				'page' => 'edit',
				'data' => $data[0]
			]);
		}
	}
	
	public function update($id)
	{
		if (!empty($id)) {
			
			$this->db->set('asal', $_POST['asal']);
			$this->db->set('tujuan', $_POST['tujuan']);
			$this->db->set('tglJadwal', $_POST['jadwal']);
			$this->db->set('harga', $_POST['harga']);
			$this->db->set('seat', $_POST['kursi']);
			$this->db->set('jamKeberangkatan', $_POST['jam']);
			$this->db->where('id', $id);
			$this->db->update('penjualan_tiket', $data);
		}
		
		return redirect('/dashboard');
	}
	
	public function delete($id)
	{
		if (!empty($id)) {
			$this->db->delete('penjualan_tiket',['id' => $id]);
		}
	}
	
	
	public function report()
	{
		$data['data'] = $this->db->query("SELECT * FROM penjualan_tiket")->result();
		$view = $this->load->view('report/tiket',$data,true);
		
		$this->load->helper('dompdf_helper');
		
		pdf_create($view, 'tiket-pemesanan', true, 'A4');
	}
	
	public function excel()
	{
		require('./application/third_party/vendor/autoload.php');
		
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="tiket-pemesanan.xlsx"');
		header('Cache-Control: max-age=0');
		
		$excel = new PhpOffice\PhpSpreadsheet\Spreadsheet();
		
		$sheet = $excel->getActiveSheet();
		
		$sheet->setCellValue('A1','#');
		$sheet->setCellValue('B1', 'Asal');
		$sheet->setCellValue('C1', 'Tujuan');
		$sheet->setCellValue('D1', 'tanggal');
		$sheet->setCellValue('E1', 'waktu');
		
		$no = 1;
		foreach ($this->db->query("SELECT * FROM penjualan_tiket")->result() as $row)
		{
			$sheet->setCellValue('A'.($no + 1), $no);
			$sheet->setCellValue('B'.($no + 1), $row->asal);
			$sheet->setCellValue('C'.($no + 1), $row->tujuan);
			$sheet->setCellValue('D'.($no + 1), $row->tglJadwal);
			$sheet->setCellValue('E'.($no + 1), $row->jamKeberangkatan);
			
			$no++;
		}
		
		$writer= new PhpOffice\PhpSpreadsheet\Writer\Xlsx($excel);
		$writer->save('php://output');
	}
	
	
	
	public function viewUser()
	{
		$this->load->view('app',[
			'page' => 'user/view'
		]);
	}
	
	public function addUser()
	{
		$this->load->view('app',[
			'page' => 'user/create'
		]);
	}
	
	public function storeUser()
	{
		$data = [
			'username' 	=> $_POST['username'],
			'password' 	=> md5($_POST['password']),
			'email' => $_POST['email'],
			'role' => $_POST['role']
		];
		
		$this->db->insert('user', $data);
		
		
		return redirect('/dashboard/viewUser');
	}
	
	public function editUser($id = null)
	{
		if (!empty($id)) {
			
			$data = $this->db->get_where('user',['username' => $id])->result();
			
			$this->load->view('app',[
				'page' => 'user/edit',
				'data' => $data[0]
			]);
		}
	}
	
	public function updateUser($id)
	{
		if (!empty($id)) {
			
			$this->db->set('username', $_POST['username']);
			$this->db->set('password', md5($_POST['password']));
			$this->db->set('email', $_POST['email']);
			$this->db->where('username', $id);
			$this->db->update('user');
		}
		
		return redirect('/dashboard/viewUser');
	}
	
	public function deleteUser($id)
	{
		if (!empty($id)) {
			$this->db->delete('user',['username' => $id]);
		}
	}
	
	public function logout()
	{
		unset($_SESSION['user-log']);
		
		return redirect('/');
	}
}
