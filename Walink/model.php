<?php

 //class utama
 class wa{

   //bikin Property
    private $server = 'localhost',
            $username = 'root',
            $pass    = '',
            $data = 'walink',
            $hal = 5,
            $conn;


    //method connect
    public function __construct(){

    $this->conn = mysqli_connect($this->server, $this->username, $this->pass, $this->data) or die ($this->conn);

          }

    //method INSERT
    public function insert(){

   if(isset($_POST['kirim'])){


    $nama = htmlspecialchars($_POST['nama']);
    $alamat = htmlspecialchars($_POST['alamat']);
    $nomor = htmlspecialchars($_POST['nomor']);

  //ambil data dari DB untuk di cocokan
    $ambil_data = mysqli_query($this->conn, "select * from teman where nama='$nama' and alamat='$alamat' and nomor='$nomor' ");

  //pengecekan banyak data
    $cek_jum = mysqli_num_rows($ambil_data);

    //kondisi dimana baranga harus lebih besar > 0
    if($cek_jum > 0){

    $fetch_dat = mysqli_fetch_array($ambil_data);

    $nama === $fetch_dat['nama'];
    $alamat === $fetch_dat['alamat'];
    $nomor === $fetch_dat['nomor'];

    echo "<div class='col-md-10 col-sm-12 col-xs-12 ml-5'>";
       echo "<div class='alert alert-warning mt-4 ml-5' role='alert'>";
      echo "<p><center>Sudah Terdaftar Sebagai Teman</center></p>";
       echo   "</div>";
       echo "</div>";


    }else{

  //untuk menginsert ke database
   $insertt =  "INSERT INTO teman VALUES (NULL,'$nama','$alamat','$nomor')";

  //kondisi insert
   if($sql = $this->conn->query($insertt)){


                                   echo "<div class='col-xl-12 col-lg-8 ml-4'>";
                                   echo "<div class='alert alert-primary mt-4 ml-5' role='alert'>";
                                   echo "<p><center>Menambah Data Sukses</center></p>";
                                   echo   "</div>";
                                   echo "</div>";


   }else{

                                   echo "<div class='col-xl-12 col-lg-8  ml-4'>";
                                   echo "<div class='alert alert-danger mt-4 ml-5' role='alert'>";
                                   echo "<p><center>Menambah Data Gagal</center></p>";
                                   echo   "</div>";
                                   echo "</div>";

   }

  }

   }

    }


      public function hal(){
        return $this->hal;
      }

      public function max_teman(){
        $kapasitas = $this->hal * $this->hal;
        echo "<b>Kapasitas Table: ".$kapasitas."</b>";
      }


    //method untuk menampilkan data atau read
      public function tampil(){

    //property untuk membatasi
        $page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
        $start = ($page - 1) * $this->hal;


        $data = null;

        $query = "SELECT * FROM teman limit $start, $this->hal ";
        if ($sql = $this->conn->query($query)) {
          while ($row = mysqli_fetch_assoc($sql)) {
            $data[] = $row;
          }
        }
        return $data;
      }



      //method untuk menghapus data
        public function delete($id){

          $query = "DELETE FROM teman where id = '$id'";
          if ($sql = $this->conn->query($query)) {
            return true;
          }else{
            return false;
          }
        }



        //method untuk menampilkan isi di edit
        public function edit($id){

          $data = null;

          $query = "SELECT * FROM teman WHERE id = '$id'";
          if ($sql = $this->conn->query($query)) {
            while($row = $sql->fetch_assoc()){
              $data = $row;
            }
          }
          return $data;
        }



        //method mengupdate isi database
        public function update($data){

          $query = "UPDATE teman SET nama='$data[nama]', alamat='$data[alamat]', nomor='$data[nomor]' WHERE id='$data[id] '";

          if ($sql = $this->conn->query($query)) {
            return true;
          }else{
            return false;
          }
        }


        //method mengupdate isi database
        public function chat($data){

       $nomor_c = $data['nomor'];
       $pesan_c = $data['pesan'];


       echo "<div class='row ml-5 mb-4'>";
       echo "<div class='col-md-5 col-sm-12 col-xs-12'>";
       echo  "<center><input class='form-control mt4' type='text' value='https://api.whatsapp.com/send?phone=$nomor_c&text=$pesan_c'  aria-label='readonly input example' readonly><center>";
       echo '</div>';
       echo "<div class='col-md-6 col-sm-12 col-xs-12'>";
       echo "<a href='https://api.whatsapp.com/send?phone=$nomor_c&text=$pesan_c'><button type='button' class='btn btn-primary'>Chat</button></a>";
        echo '</div>';
       echo '</div>';


        }



 }



//ini adalah objek
$objek_wa = new wa;



 ?>
