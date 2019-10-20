<?php
class Muzakki extends CI_Controller{
     private $filename = "import_data"; // Kita tentukan nama filenya

    function __construct() {
        parent::__construct();
        $this->load->model('model_muzakki');
        $this->load->model('model_program');
        $this->load->model('model_jenis_donasi');
        $this->load->model('model_cara_donasi');
        $this->load->model('model_rekening');
        chek_session();
    }


    function index()
    {
        $data['record'] = $this->model_muzakki->tampilkan_data();
        $this->template->load('template','muzakki/lihat_data',$data);
    }

    function cari(){

      $key = $this->input->get('cari');
      $data['title'] = 'Cari Data Muzakki  "'.$key.'"';
      $data['hasil'] = $this->model_muzakki->cari_muzakki($key);

      $this->template->load('template','muzakki/cari',$data);
   }

    function detail($id)
    {
        $data['record'] = $this->model_muzakki->detail_data($id);                                                                                                                                   
        $data['jumlahMuzakki'] = $this->model_muzakki->total_rows();
        $data['detail_promuz'] = $this->model_muzakki->detail_promuz($id);
        // var_dump($data['record']);exit;
        $this->template->load('template','muzakki/detail_data',$data);
    }



    function post()
    {
        if(isset($_POST['submit'])){
          $nama = $this->input->post('nama');
          $alamat = $this->input->post('alamat');
          $no_hp = $this->input->post('no_hp');
          // $cara_donasi = $this->input->post('Cara_Donasi');
          $email = $this->input->post('email');
          $no_npwp = $this->input->post('no_npwp');
          // $program_donasi = $this->input->post('Program');
          // $tgl_transaksi = $this->input->post('tgl_transaksi');
          // $jenis_donasi = $this->input->post('Jenis_Donasi');



            $data           = array('nama_muz'=>$nama,
                                    'alamat_muz'=>$alamat,
                                    'no_hp'=>$no_hp,
                                    // 'cara_donasi'=>$cara_donasi,
                                    'email'=>$email,
                                    'no_npwp'=>$no_npwp,
                                    // 'program_donasi'=>$program_donasi,
                                    // 'tgl_transaksi'=>$tgl_transaksi,
                                    // 'jenis_donasi'=>$jenis_donasi


            );

            $this->model_muzakki->post($data);
            redirect('Muzakki');
        }
        else{
            //$this->load->view('uangkeluar/form_input');


            $this->template->load('template','muzakki/form_input');
        }
    }



    function edit()
    {
       if(isset($_POST['submit'])){
       		$id = $this->input->post('id_muzakki');
          $nama = $this->input->post('nama_muz');
          $alamat = $this->input->post('alamat_muz');
          $no_hp = $this->input->post('no_hp');
          // $cara_donasi = $this->input->post('Cara_Donasi');
          $email = $this->input->post('email');
          $no_npwp = $this->input->post('no_npwp');
          // $program_donasi = $this->input->post('Program');
          // $tgl_transaksi = $this->input->post('tgl_transaksi');
          // $jenis_donasi = $this->input->post('Jenis_Donasi');



            $data           = array('nama_muz'=>$nama,
                                    'alamat_muz'=>$alamat,
                                    'no_hp'=>$no_hp,
                                    // 'cara_donasi'=>$cara_donasi,
                                    'email'=>$email,
                                    'no_npwp'=>$no_npwp,
                                    // 'program_donasi'=>$program_donasi,
                                    // 'tgl_transaksi'=>$tgl_transaksi,
                                    // 'jenis_donasi'=>$jenis_donasi


            );
            $this->model_muzakki->edit($data,$id);
            redirect('Muzakki');
        }
        else{
            $id=  $this->uri->segment(3);
            $this->load->model('model_muzakki');
            $data['record']     =  $this->model_muzakki->get_one($id)->row_array();
            //$this->load->view('siswa/form_edit',$data);
            $this->template->load('template','muzakki/form_edit',$data);
        }
    }

    // function detailMuzakki()
    // {
    //     $idMuzakki = $this->uri->segment(3);
    //     $data['muzakki'] = $this->model_muzakki->get_detail_muzakki($idMuzakki);
    //     // $data['program']  = $this->model_program->tampilkan_data();
    //     // var_dump($data['mustahik']);exit;


    //     if (isset($_POST['program'])) {
    //       $program_mustahik = array(
    //         'id_mustahik' => $idMustahik,
    //         'id_program'  => $this->input->post('id_program'),
    //         'bulan'       => $this->input->post('bulan'),
    //         'jumlah'      => $this->input->post('jumlah')

    //       );

    //         $pesanSukses = "berhasil menambah program mustahik untuk ".$data['mustahik']['nama_mus'];
    //         $this->session->set_flashdata('sukses',$pesanSukses);

    //         $this->model_mustahik->tambah_data_program($program_mustahik);
    //         redirect('Mustahik');
    //     }else {
    //       $this->template->load('template','tambah_program/tambah_program',$data);
    //     }


    function delete()
    {
        $id=  $this->uri->segment(3);
        $this->model_muzakki->delete($id);
        redirect('Muzakki');
    }

    function lihatProgram()
    {
      $data['program_muzakki'] = $this->model_muzakki->get_program_muzakki();

      $this->template->load('template', 'program_muzakki/lihat_program_muzakki',$data);
    }




    function tambahProgram()
    {
        $idMuzakki = $this->uri->segment(3);
        $data['muzakki'] = $this->model_muzakki->get_tambah_muzakki($idMuzakki);
        $data['program']  = $this->model_program->tampilkan_data();
        $data['jenis_donasi']  = $this->model_jenis_donasi->tampilkan_data();
        $data['cara_donasi']  = $this->model_cara_donasi->tampilkan_data();
        $data['rekening']  = $this->model_rekening->tampilkan_data();
        
        

        // var_dump($data['mustahik']);exit;

        // var_dump($data['mustahik']);exit;

        if (isset($_POST['program'])) {

            $id_rek = $this->input->post('id_rek');
            $jumlah = $this->input->post('jumlah');

            $program_muzakki = array(
              'id_muzakki' => $idMuzakki,
              'id_cara'  => $this->input->post('id_cara'),
              'id_program'  => $this->input->post('id_program'),
              'id_jenis'  => $this->input->post('id_jenis'),
              'tgl_transaksi'  => $this->input->post('tgl_transaksi'),
              'jumlah'      => $jumlah

            );


            $cekTambah = $this->model_muzakki->tambah_data_program($program_muzakki);

            if ($cekTambah > 0) {

              $saldoRek = $this->model_rekening->get_saldo_rekening($id_rek);
              $saldo = (int)$saldoRek['saldo'];
              $jumlahTambah = intval($jumlah);

              $saldoTerbaru = $saldo+$jumlahTambah;

              $data  = array('saldo' => $saldoTerbaru );

              $this->model_rekening->tambah_saldo($data,$id_rek);

            }


            $pesanSukses = "berhasil menambah program mustahik untuk ".$data['muzakki']['nama_muz'];
            $this->session->set_flashdata('sukses',$pesanSukses);

            redirect('Muzakki/lihatProgram');
        }else {
          $this->template->load('template','tambah_program/tambah_program_muzakki',$data);
        }

    }

    function cetak_detail(){

      $data['title'] = 'Cetak Laporan Muzakki';
        $idMuzakki = $this->uri->segment(3);
        $data =  $this->model_muzakki->get_detail_muzakki($idMuzakki);
        $program = $this->model_muzakki->detail_promuz($idMuzakki);

        // echo $data['nama_mus'];exit;
        // echo "<pre>";var_dump($program);exit;
        $nama_muz = $data['nama_muz'];
        $alamat_muz = $data['alamat_muz'];
        $no_hp = $data['no_hp'];
        $email = $data['email'];
        $no_npwp = $data['no_npwp'];

        // $this->template->load('templates',$data);

        $this->load->library('cfpdf');

        $pdf = new FPDF('P','mm','A4');

        $logo1 = site_url().'assets/images/logo1.png';
        $logo2 = site_url().'assets/images/logo2.jpg';


        $pdf->AddPage();
          $pdf->Image($logo1, 10,10,25,30);
          $pdf->Image($logo2, 170,10,25,30);
          $pdf->SetFont('Arial','B',16);
      $pdf->Cell(190,7,'Lembaga Amil Zakat Nasional',0,1,'C');
      $pdf->SetFont('Arial','B',12);
      $pdf->Cell(190,7,'Karyawan Muslim Chevron Indonesia - Cabang Rumbai',0,1,'C');
      $pdf->SetFont('Arial','B',7);
      $pdf->Cell(190,7,'Alamat Kantor : Jl.Paus No.8A Limbungan Baru, Kecamatan Rumbai Pesisir, Kota Pekanbaru. Telp:0821 7461 7394',0,1,'C');
      $pdf->Cell(190,7,'Email:rumbai@laznaschevron.org. Rekening Zakat: 7020 977 919 An.LAZNas Chevron Rumbai',0,1,'C');
      $pdf->Ln(5);
      $pdf->Line(10,40,200,40);
      $pdf->SetFont('Arial','B',14);
      $pdf->Cell(190,14,'Laporan Data Muzakki',0,1,'C');

      $pdf->SetFont('Arial','L',10);
      $pdf->Cell(190,7,'Nama : '.$nama_muz,0,1,'L');
      $pdf->Cell(190,7,'Alamat : '.$alamat_muz,0,1,'L');
      $pdf->Cell(190,7,'Nomor Handphone : '.$no_hp,0,1,'L');
      $pdf->Cell(190,7,'Email : '.$email,0,1,'L');
      $pdf->Cell(190,7,'Nomor NPWP : '.$no_npwp,0,1,'L');
     

      $pdf->Cell(10,7,'',0,1,'C');


      $pdf->SetFont('Arial','B',9);
      $pdf->Cell(10,6,'NO.',1,0,'C');
      $pdf->Cell(65,6,'NAMA PROGRAM',1,0,'C');
      $pdf->Cell(27,6,'JENIS DONASI',1,0,'C');
      $pdf->Cell(33,6,'CARA DONASI',1,0,'C');
      $pdf->Cell(30,6,'TGL TRANSAKSI',1,0,'C');
      $pdf->Cell(28,6,'JUMLAH',1,0,'C');
      $pdf->Ln();

        // tampilkan dari database
        $pdf->SetFont('Arial','L',8);
        $no = 1;

        foreach ($program as $key => $r)
        {
          // $bulan = new DateTime($r['bulan']);
          $pdf->Cell(10, 5, $no, 1,0,'C');
          $pdf->Cell(65, 5,$r['nama_program'], 1,0);
          $pdf->Cell(27, 5, $r['jenis_donasi'], 1,0,'C');
          $pdf->Cell(33, 5, $r['cara_donasi'], 1,0,'C');
          $pdf->Cell(30, 5, $r['tgl_transaksi'], 1,0,'C');
          $pdf->Cell(28, 5, $r['jumlah'], 1,0,'C');
          $pdf->Ln();
          //$pdf->Cell(40, 7, $r->qty, 1,0);
          //$total = $r->harga*$r->qty;
          //$pdf->Cell(40, 7, $total, 1,1);
          $no++;
          //$totalall=$totalall+$total;
        }
        // end
        // $pdf->Cell(147,7,'Total',1,0,'R');
        // $pdf->Cell(40,7,$totalall,1,0);
        $pdf->Output();

    }



    function export(){
    // Load plugin PHPExcel nya
    include APPPATH.'third_party/PHPExcel/PHPExcel.php';
    
    // Panggil class PHPExcel nya
    $excel = new PHPExcel();
    // Settingan awal fil excel
    $excel->getProperties()->setCreator('Admin')
                 ->setLastModifiedBy('Admin')
                 ->setTitle("Data Muzakki")
                 ->setSubject("Muzakki")
                 ->setDescription("Laporan Data Muzakki")
                 ->setKeywords("Data Muzakki");
    // Buat sebuah variabel untuk menampung pengaturan style dari header tabel
    $style_col = array(
      'font' => array('bold' => true), // Set font nya jadi bold
      'alignment' => array(
        'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)
        'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
      ),
      'borders' => array(
        'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
        'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
        'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipisx
        'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
      )
    );
    // Buat sebuah variabel untuk menampung pengaturan style dari isi tabel
    $style_row = array(
      'alignment' => array(
        'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
      ),
      'borders' => array(
        'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
        'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
        'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
        'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
      )
    );
    $excel->setActiveSheetIndex(0)->setCellValue('A1', "Data Muzakki"); // Set kolom A1 dengan tulisan "DATA SISWA"
    $excel->getActiveSheet()->mergeCells('A1:E1'); // Set Merge Cell pada kolom A1 sampai E1
    $excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE); // Set bold kolom A1
    $excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(15); // Set font size 15 untuk kolom A1
    $excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom A1
    // Buat header tabel nya pada baris ke 3
    $excel->setActiveSheetIndex(0)->setCellValue('A3', "No."); // Set kolom A3 dengan tulisan "NO"
    $excel->setActiveSheetIndex(0)->setCellValue('B3', "Nama"); // Set kolom B3 dengan tulisan "NIS"
    $excel->setActiveSheetIndex(0)->setCellValue('C3', "Alamat"); // Set kolom C3 dengan tulisan "NAMA"
    $excel->setActiveSheetIndex(0)->setCellValue('D3', "No.hp"); // Set kolom D3 dengan tulisan "JENIS KELAMIN"
    $excel->setActiveSheetIndex(0)->setCellValue('E3', "Cara Donasi"); // Set kolom E3 dengan tulisan "ALAMAT"
    $excel->setActiveSheetIndex(0)->setCellValue('F3', "Email"); // Set kolom E3 dengan tulisan "ALAMAT"
    $excel->setActiveSheetIndex(0)->setCellValue('G3', "No.NPWP"); // Set kolom E3 dengan tulisan "ALAMAT"
    $excel->setActiveSheetIndex(0)->setCellValue('H3', "Program Donasi"); // Set kolom E3 dengan tulisan "ALAMAT"
    $excel->setActiveSheetIndex(0)->setCellValue('I3', "Tanggal Transaksi"); // Set kolom E3 dengan tulisan "ALAMAT"
    $excel->setActiveSheetIndex(0)->setCellValue('J3', "Jenis Donasi"); // Set kolom E3 dengan tulisan "ALAMAT"
    // Apply style header yang telah kita buat tadi ke masing-masing kolom header
    $excel->getActiveSheet()->getStyle('A3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('B3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('C3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('D3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('E3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('F3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('G3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('H3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('I3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('J3')->applyFromArray($style_col);
    // Panggil function view yang ada di SiswaModel untuk menampilkan semua data siswanya
    $siswa = $this->model_muzakki->export();
    $no = 1; // Untuk penomoran tabel, di awal set dengan 1
    $numrow = 4; // Set baris pertama untuk isi tabel adalah baris ke 4
    foreach($siswa as $data){ // Lakukan looping pada variabel siswa
      $excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $no);
      $excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $data->nama_muz);
      $excel->setActiveSheetIndex(0)->setCellValue('C'.$numrow, $data->alamat_muz);
      $excel->setActiveSheetIndex(0)->setCellValue('D'.$numrow, $data->no_hp);
      $excel->setActiveSheetIndex(0)->setCellValue('E'.$numrow, $data->cara_donasi);
      $excel->setActiveSheetIndex(0)->setCellValue('F'.$numrow, $data->email);
      $excel->setActiveSheetIndex(0)->setCellValue('G'.$numrow, $data->no_npwp);
      $excel->setActiveSheetIndex(0)->setCellValue('H'.$numrow, $data->program_donasi);
      $excel->setActiveSheetIndex(0)->setCellValue('I'.$numrow, $data->tgl_transaksi);
      $excel->setActiveSheetIndex(0)->setCellValue('J'.$numrow, $data->jenis_donasi);
      
      // Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
      $excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('C'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('D'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('E'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('F'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('G'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('H'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('I'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('J'.$numrow)->applyFromArray($style_row);
      
      $no++; // Tambah 1 setiap kali looping
      $numrow++; // Tambah 1 setiap kali looping
    }
    // Set width kolom
    $excel->getActiveSheet()->getColumnDimension('A')->setWidth(5); // Set width kolom A
    $excel->getActiveSheet()->getColumnDimension('B')->setWidth(15); // Set width kolom B
    $excel->getActiveSheet()->getColumnDimension('C')->setWidth(25); // Set width kolom C
    $excel->getActiveSheet()->getColumnDimension('D')->setWidth(20); // Set width kolom D
    $excel->getActiveSheet()->getColumnDimension('E')->setWidth(30); // Set width kolom E
    $excel->getActiveSheet()->getColumnDimension('F')->setWidth(30); // Set width kolom E
    $excel->getActiveSheet()->getColumnDimension('G')->setWidth(30); // Set width kolom E
    $excel->getActiveSheet()->getColumnDimension('H')->setWidth(30); // Set width kolom E
    $excel->getActiveSheet()->getColumnDimension('I')->setWidth(30); // Set width kolom E
    $excel->getActiveSheet()->getColumnDimension('J')->setWidth(30); // Set width kolom E
    
    // Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)
    $excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);
    // Set orientasi kertas jadi LANDSCAPE
    $excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
    // Set judul file excel nya
    $excel->getActiveSheet(0)->setTitle("Laporan Data Muzakki");
    $excel->setActiveSheetIndex(0);
    // Proses file excel
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment; filename="Data Muzakki.xlsx"'); // Set nama file excel nya
    header('Cache-Control: max-age=0');
    $write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
    $write->save('php://output');
  }

  function form(){
    $data = array(); // Buat variabel $data sebagai array
    
    if(isset($_POST['preview'])){ // Jika user menekan tombol Preview pada form
      // lakukan upload file dengan memanggil function upload yang ada di SiswaModel.php
      $upload = $this->model_muzakki->upload_file($this->filename);
      
      if($upload['result'] == "success"){ // Jika proses upload sukses
        // Load plugin PHPExcel nya
        include APPPATH.'third_party/PHPExcel/PHPExcel.php';
        
        $excelreader = new PHPExcel_Reader_Excel2007();
        $loadexcel = $excelreader->load('excel/'.$this->filename.'.xlsx'); // Load file yang tadi diupload ke folder excel
        $sheet = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);
        
        // Masukan variabel $sheet ke dalam array data yang nantinya akan di kirim ke file form.php
        // Variabel $sheet tersebut berisi data-data yang sudah diinput di dalam excel yang sudha di upload sebelumnya
        $data['sheet'] = $sheet; 
      }else{ // Jika proses upload gagal
        $data['upload_error'] = $upload['error']; // Ambil pesan error uploadnya untuk dikirim ke file form dan ditampilkan
      }
    }
    
    $this->load->view('muzakki/form', $data);
  }
  
  function import(){
    // Load plugin PHPExcel nya
    include APPPATH.'third_party/PHPExcel/PHPExcel.php';
    
    $excelreader = new PHPExcel_Reader_Excel2007();
    $loadexcel = $excelreader->load('excel/'.$this->filename.'.xlsx'); // Load file yang telah diupload ke folder excel
    $sheet = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);
    
    // Buat sebuah variabel array untuk menampung array data yg akan kita insert ke database
    $data = array();
    
    $numrow = 1;
    foreach($sheet as $row){
      // Cek $numrow apakah lebih dari 1
      // Artinya karena baris pertama adalah nama-nama kolom
      // Jadi dilewat saja, tidak usah diimport
      if($numrow > 1){
        // Kita push (add) array data ke variabel data
        array_push($data, array(
          'nama_muz'=>$row['A'], // Insert data nis dari kolom A di excel
          'alamat_muz'=>$row['B'], // Insert data nama dari kolom B di excel
          'no_hp'=>$row['C'], // Insert data jenis kelamin dari kolom C di excel
          'cara_donasi'=>$row['D'], // Insert data alamat dari kolom D di excel
          'email'=>$row['E'], // Insert data alamat dari kolom E di excel
          'no_npwp'=>$row['F'], // Insert data alamat dari kolom F di excel
          'program_donasi'=>$row['G'], // Insert data alamat dari kolom G di excel
          'tgl_transaksi'=>$row['H'], // Insert data alamat dari kolom H di excel
          'jenis_donasi'=>$row['I'], // Insert data alamat dari kolom I di excel
        ));
      }
      
      $numrow++; // Tambah 1 setiap kali looping
    }
    // Panggil fungsi insert_multiple yg telah kita buat sebelumnya di model
    $this->model_muzakki->insert_multiple($data);
    
    redirect("Muzakki"); // Redirect ke halaman awal (ke controller Muzakki fungsi index)
  }
  
}

