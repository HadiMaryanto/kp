<?php
class Mustahik extends CI_Controller{

    function __construct() {
        parent::__construct();
        $this->load->model('model_mustahik');
        $this->load->model('model_program');
        $this->load->model('model_peta');
        $this->load->model('model_rekening');
        $this->load->model('model_kecamatan');
        $this->load->model('model_kelurahan');
        $this->load->library('excel');
        chek_session();
    }


    function index()
    {
        $data['record'] = $this->model_mustahik->tampilkan_data();
        $this->template->load('template','mustahik/lihat_data',$data);
    }
    function import(){
      if (isset($_FILES["file"]["name"]))
      {
        $path = $_FILES["file"]["tmp_name"];
        $object = PHPExcel_IOFactory::load($path);
        foreach ($object->getWorksheetIterator() as $key => $worksheet)
        {
          $highestRow = $worksheet->getHighestRow();
          $highestColumn = $worksheet->getHighestColumn();

          for ($row=2; $row <=$highestRow ; $row++)
          {
            $nama_mus = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
            $no_ktp = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
            $alamat_mus = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
            $waktu_survey = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
            $kategori_asnaf = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
            $no_hp = $worksheet->getCellByColumnAndRow(5, $row)->getValue();
            $no_registrasi = $worksheet->getCellByColumnAndRow(6, $row)->getValue();
            $tgl_registrasi = $worksheet->getCellByColumnAndRow(7, $row)->getValue();
            $tempat_lahir = $worksheet->getCellByColumnAndRow(8, $row)->getValue();
            $tgl_lahir = $worksheet->getCellByColumnAndRow(9, $row)->getValue();
            $usia = $worksheet->getCellByColumnAndRow(10, $row)->getValue();
            $pekerjaan = $worksheet->getCellByColumnAndRow(11, $row)->getValue();
            $rt_rw = $worksheet->getCellByColumnAndRow(12, $row)->getValue();
            $kelurahan = $worksheet->getCellByColumnAndRow(13, $row)->getValue();
            $kecamatan = $worksheet->getCellByColumnAndRow(14, $row)->getValue();
            $masjid_musholla = $worksheet->getCellByColumnAndRow(15, $row)->getValue();
            $surveyor = $worksheet->getCellByColumnAndRow(16, $row)->getValue();
            $tgl_verifikasi = $worksheet->getCellByColumnAndRow(17, $row)->getValue();
            $tgl_persetujuan = $worksheet->getCellByColumnAndRow(18, $row)->getValue();
            $status_persetujuan = $worksheet->getCellByColumnAndRow(19, $row)->getValue();
            $keterangan = $worksheet->getCellByColumnAndRow(20, $row)->getValue();
            $latitude = $worksheet->getCellByColumnAndRow(21, $row)->getValue();
            $longitude = $worksheet->getCellByColumnAndRow(22, $row)->getValue();
            $data[] = array(
              'nama_mus'              => $nama_mus,
              'no_ktp'                => $no_hp,
              'alamat_mus'            => $alamat_mus,
              'waktu_survey'          => $waktu_survey,
              'kategori_asnaf'        => $kategori_asnaf,
              'no_hp'                 => $no_hp,
              'no_registrasi'         => $no_registrasi,
              'tgl_registrasi'        => $tgl_registrasi,
              'tempat_lahir'          => $tempat_lahir,
              'tgl_lahir'             => $tgl_lahir,
              'usia'                  => $usia,
              'pekerjaan'             => $pekerjaan,
              'rt_rw'                 => $rt_rw,
              'kelurahan'             => $kelurahan,
              'kecamatan'             => $kecamatan,
              'masjid_musholla'       => $masjid_musholla,
              'surveyor'              => $surveyor,
              'tgl_verifikasi'        => $tgl_verifikasi,
              '$tgl_persetujuan'      => $tgl_persetujuan,
              'status_persetujuan'    => $status_persetujuan,
              'keterangan'            => $keterangan,
              'latitude'              => $latitude,
              'longitude'             => $longitude
            );
          }
        }
        $this->model_peta->insertdata($data);
        $status = $this->session->set_flashdata('success','<strong> Import</strong>');
      }
    }

    function detail($id)
    {
        $data['record'] = $this->model_mustahik->detail_data($id);
        $data['jumlahMustahik'] = $this->model_mustahik->total_rows();
        $data['detail_promus'] = $this->model_mustahik->detail_promus($id);
        // var_dump($data['record']);exit;
        $this->template->load('template','mustahik/detail_data',$data);
    }
    function verifikasi(){
      if (isset($_POST['setuju'])) {
        $status = "DISETUJUI";
        $id = $this->input->post('id');

        $data = array('status_persetujuan' => $status );


        $this->model_mustahik->edit($data,$id);
        redirect('Mustahik');
      }
      else if (isset($_POST['tolak'])) {
        $status = "DITOLAK";
        $id = $this->input->post('id');

        $data = array('status_persetujuan' => $status );


        $this->model_mustahik->edit($data,$id);
        redirect('Mustahik');
      }
    }
function post()
    {
        if(isset($_POST['submit'])){
          $no_registrasi = $this->input->post('no_registrasi');
          $tgl_registrasi = $this->input->post('tgl_registrasi');
          $nama = $this->input->post('nama');
          $no_ktp = $this->input->post('no_ktp');
          $alamat = $this->input->post('alamat');
          $waktu_survey = $this->input->post('waktu_survey');
          $kategori_asnaf = $this->input->post('Asnaf');
          // $program = $this->input->post('Program');
          $no_hp = $this->input->post('no_hp');
          $tempat_lahir = $this->input->post('tempat_lahir');
          $tgl_lahir = $this->input->post('tgl_lahir');
          $usia = $this->input->post('usia');
          $pekerjaan = $this->input->post('pekerjaan');
          $rt_rw = $this->input->post('rt_rw');
          $kelurahan = $this->input->post('kelurahan');
          $kecamatan = $this->input->post('kecamatan');
          $masjid_musholla = $this->input->post('masjid_musholla');
          $surveyor = $this->input->post('petugas_survey');
          $tgl_verifikasi = $this->input->post('tgl_verifikasi');
          $tgl_persetujuan = $this->input->post('tgl_persetujuan');
          $status_persetujuan = "BELUM DISETUJUI";
          // $tgl_penyaluran = $this->input->post('tgl_penyaluran');
          // $penyalur = $this->input->post('penyalur');
          $keterangan = $this->input->post('keterangan');
          $latitude = $this->input->post('latitude');
          $longitude = $this->input->post('longitude');

            $data           = array('no_registrasi'=>$no_registrasi,
                                    'tgl_registrasi'=>$tgl_registrasi,
                                    'nama_mus'=>$nama,
                                    'no_ktp'=>$no_ktp,
                                    'alamat_mus'=>$alamat,
                                    'waktu_survey'=>$waktu_survey,
                                    'kategori_asnaf'=>$kategori_asnaf,
                                    // 'program'=>$program,
                                    'no_hp'=>$no_hp,
                                    'tempat_lahir'=>$tempat_lahir,
                                    'tgl_lahir'=>$tgl_lahir,
                                    'usia'=>$usia,
                                    'pekerjaan'=>$pekerjaan,
                                    'rt_rw'=>$rt_rw,
                                    'kelurahan'=>$kelurahan,
                                    'kecamatan'=>$kecamatan,
                                    'masjid_musholla'=>$masjid_musholla,
                                    'surveyor'=>$surveyor,
                                    'tgl_verifikasi'=>$tgl_verifikasi,
                                    'tgl_persetujuan'=>$tgl_persetujuan,
                                    'status_persetujuan'=>$status_persetujuan,
                                    // 'tgl_penyaluran'=>$tgl_penyaluran,
                                    // 'penyalur'=>$penyalur,
                                    'keterangan'=>$keterangan,
                                    'latitude'=>$latitude,
                                    'longitude'=>$longitude

            );

            $this->model_mustahik->post($data);
            redirect('Mustahik');
        }
        else{


            $this->template->load('template','mustahik/form_input');
        }
    }

    public function update() {
    $id = trim($_POST['id']);

    $data['dataMustahik'] = $this->M_pegawai->get_one($id);

    $data['userdata'] = $this->userdata;

    echo show_my_modal('mustahik/modal', 'update-mustahik', $data);
  }


    function edit()
    {
       if(isset($_POST['submit'])){
       		$id = $this->input->post('id_mustahik');
          $no_registrasi = $this->input->post('no_registrasi');
          $tgl_registrasi = $this->input->post('tgl_registrasi');
          $nama_mus = $this->input->post('nama_mus');
          $no_ktp = $this->input->post('no_ktp');
          $alamat_mus = $this->input->post('alamat_mus');
          $waktu_survey = $this->input->post('waktu_survey');
          $kategori_asnaf = $this->input->post('Asnaf');
          $program = $this->input->post('Program');
          $no_hp = $this->input->post('no_hp');
          $tempat_lahir = $this->input->post('tempat_lahir');
          $tgl_lahir = $this->input->post('tgl_lahir');
          $usia = $this->input->post('usia');
          $pekerjaan = $this->input->post('pekerjaan');
          $rt_rw = $this->input->post('rt_rw');
          $kelurahan = $this->input->post('Kelurahan');
          $kecamatan = $this->input->post('Kecamatan');
          $masjid_musholla = $this->input->post('masjid_musholla');
          $surveyor = $this->input->post('surveyor');
          $tgl_verifikasi = $this->input->post('tgl_verifikasi');
          $tgl_persetujuan = $this->input->post('tgl_persetujuan');
          // $status_persetujuan = $this->input->post('status_persetujuan');
          // $tgl_penyaluran = $this->input->post('tgl_penyaluran');
          // $penyalur = $this->input->post('penyalur');
          $keterangan = $this->input->post('keterangan');
          $latitude = $this->input->post('latitude');
          $longitude = $this->input->post('longitude');



            $data           = array('no_registrasi'=>$no_registrasi,
                                    'tgl_registrasi'=>$tgl_registrasi,
                                    'nama_mus'=>$nama_mus,
                                    'no_ktp'=>$no_ktp,
                                    'alamat_mus'=>$alamat_mus,
                                    'waktu_survey'=>$waktu_survey,
                                    'kategori_asnaf'=>$kategori_asnaf,
                                    'program'=>$program,
                                    'no_hp'=>$no_hp,
                                    'tempat_lahir'=>$tempat_lahir,
                                    'tgl_lahir'=>$tgl_lahir,
                                    'usia'=>$usia,
                                    'pekerjaan'=>$pekerjaan,
                                    'rt_rw'=>$rt_rw,
                                    'kelurahan'=>$kelurahan,
                                    'kecamatan'=>$kecamatan,
                                    'masjid_musholla'=>$masjid_musholla,
                                    'surveyor'=>$surveyor,
                                    'tgl_verifikasi'=>$tgl_verifikasi,
                                    'tgl_persetujuan'=>$tgl_persetujuan,
                                    // 'tgl_penyaluran'=>$tgl_penyaluran,
                                    // 'penyalur'=>$penyalur,
                                    'keterangan'=>$keterangan,
                                    'latitude'=>$latitude,
                                    'longitude'=>$longitude

            );

            $this->model_mustahik->edit($data,$id);
            redirect('Mustahik');
        }
        else{
            $id=  $this->uri->segment(3);
            $this->load->model('model_mustahik');
            $data['record']     =  $this->model_mustahik->get_one($id)->row_array();
            //$this->load->view('siswa/form_edit',$data);
            $this->template->load('template','mustahik/form_edit',$data);
        }
    }

    function delete()
    {
        $id=  $this->uri->segment(3);
        $this->model_mustahik->delete($id);
        redirect('Mustahik');
    }

    function deletePromus()
    {
        $id=  $this->uri->segment(3);
        $this->model_mustahik->deletePromus($id);
        redirect('Mustahik/lihatProgram');
    }

    function deleteProgram()
    {
        $id=  $this->uri->segment(3);
        $this->model_mustahik->delete($id);
        redirect('Mustahik/lihatProgram');
    }

    function lihatProgram()
    {
      $data['program_mustahik'] = $this->model_mustahik->get_program_mustahik();

      $this->template->load('template', 'tambah_program/lihat_program',$data);
    }

    function tambahProgram()
    {
        $idMustahik = $this->uri->segment(3);
        $data['mustahik'] = $this->model_mustahik->get_tambah_mustahik($idMustahik);
        $data['program']  = $this->model_program->tampilkan_data();
        $data['rekening']  = $this->model_mustahik->tampilkan_rekening();
        $data['petugas']  = $this->model_mustahik->tampilkan_petugas();

      $id_rek = $this->input->post('id_rek');
      $id_petugas = $this->input->post('id_petugas');
      $jumlah = $this->input->post('jumlah');
       $saldoRek = $this->model_rekening->get_saldo_rekening($id_rek);

        if (isset($_POST['program'])) {
          $program_mustahik = array(
            'id_mustahik' => $idMustahik,
            'id_program'  => $this->input->post('id_program'),
            'bulan'       => $this->input->post('bulan'),
            'jumlah'      => $this->input->post('jumlah'),
            'penyalur'    => $this->input->post('penyalur')

          );
          $saldo = (int)$saldoRek['saldo'];
          $jumlahTambah = intval($jumlah);
          $saldoTerbaru = $saldo-$jumlahTambah;

          $data  = array('saldo' => $saldoTerbaru );

          // if ($saldoTerbaru < $saldo) {
          //    $pesanError = "Saldo di Rekening Kurang dari Jumlah Yang Anda Masukkan!";
          //   $this->session->set_flashdata('error',$pesanError);
          // redirect('Mustahik');
          // }
          // else if ($saldoTerbaru > $saldo)
          {

            $pesanSukses = "Berhasil Menambahkan Data Mustahik.".$data['mustahik']['nama_mus'];
            $this->session->set_flashdata('sukses',$pesanSukses);


            $this->model_mustahik->kurangSaldo($id_rek,$data);
            $this->model_mustahik->tambah_data_program($program_mustahik);
            redirect('Mustahik/lihatProgram');
          }

        }else {
          $this->template->load('template','tambah_program/tambah_program',$data);
        }

    }

    function cetak_detail(){

      $data['title'] = 'Cetak Laporan Mustahik';
        $idMustahik = $this->uri->segment(3);
        $data =  $this->model_mustahik->get_detail_mustahik($idMustahik);
        $program = $this->model_mustahik->detail_promus($idMustahik);

        // echo $data['nama_mus'];exit;
        // echo "<pre>";var_dump($program);exit;
        $no_registrasi = $data['no_registrasi'];
        $tgl_registrasi = $data['tgl_registrasi'];
        $nama_mus = $data['nama_mus'];
        $tempat_lahir = $data['tempat_lahir'];
        $tgl_lahir = $data['tgl_lahir'];
        $usia = $data['usia'];
        $pekerjaan = $data['pekerjaan'];
        $alamat_mus = $data['alamat_mus'];
        $rt_rw = $data['rt_rw'];
        $kelurahan = $data['kelurahan'];
        $kecamatan = $data['kecamatan'];
        $masjid_musholla = $data['masjid_musholla'];
        $kategori_asnaf = $data['kategori_asnaf'];
        $tgl = $data['tgl_registrasi'];
        $waktu_survey = $data['waktu_survey'];
        $surveyor = $data['surveyor'];
        $status_persetujuan = $data['status_persetujuan'];
        $keterangan = $data['keterangan'];



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
      $pdf->Cell(190,14,'Laporan Data Mustahik',0,1,'C');

      $pdf->SetFont('Arial','L',10);
      $pdf->Cell(190,7,'No. Registrasi : '.$no_registrasi,0,1,'L');
      $pdf->Cell(190,7,'Tanggal Registrasi : '.$tgl_registrasi,0,1,'L');
      $pdf->Cell(190,7,'Nama : '.$nama_mus,0,1,'L');
      $pdf->Cell(190,7,'Tempat,Tanggal Lahir : '.$tempat_lahir.','.$tgl_lahir,0,1,'L');
      $pdf->Cell(190,7,'Usia : '.$usia,0,1,'L');
      $pdf->Cell(190,7,'Pekerjaan : '.$pekerjaan,0,1,'L');
      $pdf->Cell(190,7,'Alamat : '.$alamat_mus,0,1,'L');
      $pdf->Cell(190,7,'RT/RW : '.$rt_rw,0,1,'L');


      $pdf->Cell(190,7,'Kelurahan : '.$kelurahan,0,1,'L');
      $pdf->Cell(190,7,'Kecamatan : '.$kecamatan,0,1,'L');
      $pdf->Cell(190,7,'Masjid/Musholla Setempat : '.$masjid_musholla,0,1,'L');
      $pdf->Cell(190,7,'Kategori Asnaf : '.$kategori_asnaf,0,1,'L');
      $pdf->Cell(190,7,'Tanggal survey : '.$waktu_survey,0,1,'L');
      $pdf->Cell(190,7,'Surveyor : '.$surveyor,0,1,'L');
      $pdf->Cell(190,7,'Status Persetujuan : '.$status_persetujuan,0,1,'L');
      $pdf->Cell(190,7,'Keterangan : '.$keterangan,0,1,'L');

      $pdf->Cell(10,7,'',0,1,'C');


      $pdf->SetFont('Arial','B',10);
      $pdf->Cell(10,6,'NO.',1,0,'C');
      $pdf->Cell(100,6,'NAMA PROGRAM',1,0,'C');
      $pdf->Cell(33,6,'JENIS PROGRAM',1,0,'C');
      $pdf->Cell(20,6,'BULAN',1,0,'C');
      $pdf->Cell(30,6,'JUMLAH',1,0,'C');
      $pdf->Ln();

        // tampilkan dari database
        $pdf->SetFont('Arial','L');
        $no = 1;

        foreach ($program as $key => $r)
        {
          $bulan = new DateTime($r['bulan']);
          $pdf->Cell(10, 5, $no, 1,0,'C');
          $pdf->Cell(100, 5, $r['nama_program'], 1,0);
          $pdf->Cell(33, 5, $r['jenis_program'], 1,0,'C');
          $pdf->Cell(20, 5, $bulan->format('F'), 1,0,'C');
          $pdf->Cell(30, 5, $r['jumlah'], 1,0,'C');
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
      'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
      'borders' => array(
        'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
        'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
        'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
      )
    );
    $excel->setActiveSheetIndex(0)->setCellValue('A1', "DATA Muzakki"); // Set kolom A1 dengan tulisan "DATA SISWA"
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


}
