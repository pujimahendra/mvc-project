<?php 

class Home extends Controller{

    public function index()
    {

        $data =[
                'title' => 'Home',
                'mahasiswa' => $this->model('Mahasiswa_model')->getAllMahasiswa()
        ];
        $this->view('templates/header', $data);
        $this->view('home/index',$data);
        $this->view('templates/footer',$data);
    }

    public function detail($id)
    {

        $data_mahasiswa = $this->model('Mahasiswa_model')->getMahasiswaById($id);

        if ($data_mahasiswa==null){
            header('Location:' . BASEURL);
            exit();
        }else{
        $data =[
                'title' => $data_mahasiswa['nama'],
                'mahasiswa' => $data_mahasiswa
        ];
        $this->view('templates/header', $data);
        $this->view('home/detail',$data);
        $this->view('templates/footer',$data);
        }
    }

    public function insert()
    {
        
        if($this->model('Mahasiswa_model')->insertDataMahasiswa($_POST) > 0){
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location:' . BASEURL );
            exit();
        }else{
            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location:' . BASEURL );
            exit();
        }
        
    }

    public function hapus()
    {
        if($this->model('Mahasiswa_model')->hapusDataMahasiswa($_POST) > 0){
            Flasher::setFlash('berhasil', 'dihapus', 'success');
            header('Location:' . BASEURL .'/home/index');
            exit();
        }else{
            Flasher::setFlash('gagal', 'dihapus', 'danger');
            header('Location:' . BASEURL . '/home/detail/'.$_POST['id']);
            exit();
        }
    }
    
    public function update()
    {
        if($this->model('Mahasiswa_model')->updateDataMahasiswa($_POST) > 0){
            Flasher::setFlash('berhasil', 'diperbarui', 'success');
            header('Location:' . BASEURL . '/home/detail/'.$_POST['id']);
            exit();
        }else{
            Flasher::setFlash('gagal', 'diperbarui', 'danger');
            header('Location:' . BASEURL . '/home/detail/'.$_POST['id']);
            exit();
        }
    }
}

?>