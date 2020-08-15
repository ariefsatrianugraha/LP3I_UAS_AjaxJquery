<?php

    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: GET, POST");

    include '../../database/database.php';

    class member{

        private $konek;
        private $tabel;
        private $primary;
        private $isi;

        public function __construct()
        {
            $db = new database();
            $this->konek = $db->konek();
            $this->tabel = "member";
            $this->primary="id";
            $this->isi =['nim','nama','telepon','alamat'];
        }

        public function get(){
            $query = "SELECT * FROM ".$this->tabel;
            $hasil = mysqli_query($this->konek, $query);

            $data =[];
            while($row= mysqli_fetch_assoc($hasil)){
                $data[] = $row;
            }

            return $data;
        }

        public function add($data){
            $request= json_decode(json_encode($data));
            $query = "INSERT INTO member (`nim`,`nama`,`telepon`,`alamat`)";
            $query .= "VALUES ('".$request->nim."','".$request->nama."','".$request->telepon."','".$request->alamat."')";
            $hasil = mysqli_query($this->konek, $query);
            return $hasil;
        }

        public function delete($id){
            $query  = "DELETE FROM ".$this->tabel;
            $query .=" WHERE id='".$id."'";
    
            $hasil = mysqli_query($this->konek,$query);
            return $hasil;
        }

        public function update($data){
            $request= json_decode(json_encode($data));
            $query  = "UPDATE member SET ";
            $filter = " WHERE ";
            foreach($request as $key=>$row){
    
                if(in_array($key,$this->fields))
                    $query .="`".$key."`='".$row."',";
                
                if($key ==$this->primary)
                    $filter .="`".$key."`=".$row;
            }
            $query_build = rtrim($query,",").$filter;
            
            $res = mysqli_query($this->connect, $query_build);
            return $res;
        }

    }

?>