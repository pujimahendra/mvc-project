<?php 

class Mahasiswa_model {
    // penggunaan tabel mahasiswa khusus pada tabel ini
    private $table = 'mahasiswa';

    private $db;

    public function __construct()
        {
            // instasisasi agar dapat memakai semua method di dalam Database.php
            $this->db = new Database;
        }
    
    public function getAllMahasiswa()
    {
        // memanggil method query dengan tabel khusus mahasiswa
        $this->db->query("SELECT * FROM ". $this->table);
        // memanggil method resultset pada Database.php agar memanggil banyak data
        return $this->db->resultset();
    }

    public function getMahasiswaById($id)
    {
        // untuk menghindari sql injection
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');
        $this->db->bind('id',$id);
        return $this->db->single();
    }

    public function insertDataMahasiswa($data)
    {
        $query = "INSERT INTO mahasiswa
            (nim, nama, prodi, pt)
          VALUES
            (:nim, :nama, :prodi, :pt)";
            
        $this->db->query($query);
        $this->db->bind('nim', $data['nim']);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('prodi', $data['ps']);
        $this->db->bind('id', $data['id']);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function hapusDataMahasiswa($data)
    {
        $query = "DELETE FROM mahasiswa WHERE id = :id";

        $this->db->query($query);
        $this->db->bind('id', $data['id']);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function updateDataMahasiswa($data)
    {
        $query = "UPDATE mahasiswa SET
                    nim = :nim,
                    nama = :nama,
                    prodi = :prodi,
                    pt = :pt 
                WHERE id = :id ";
            
        $this->db->query($query);
        $this->db->bind('nim', $data['nim']);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('prodi', $data['ps']);
        $this->db->bind('pt', $data['pt']);
        $this->db->bind('id', $data['id']);

        $this->db->execute();
        return $this->db->rowCount();
    }
}
