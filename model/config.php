<?php
	class database extends connect{
		public function connect() {
			$this->conn = new mysqli($this->hostname,$this->username,$this->password,$this->dbname);
			if (!$this->conn) {
				echo "Kết nối thất bại";
				exit();
			} else {
				mysqli_set_charset($this->conn,'utf8');
			}
			return $this->conn;
		}
		//thực thi truy vấn
		public function execute($sql){
			$this->result = $this->conn->query($sql);
			return $this->result;
		}
		//lấy dữ liệu
		public function getdata(){
			if ($this->result) {
				$data = mysqli_fetch_array($this->result);
			} else {
				$data = 0;
			}
			return $data;
		}
		//lấy dữ liệu cần sửa theo ID
		public function getdataid($table,$id){
			$sql = "SELECT * FROM $table WHERE id = '$id'";
			$this->execute($sql);
			if ($this->num_rows()!=0) {
				$data = mysqli_fetch_array($this->result);
			} else {
				$data = 0;
			}
			return $data;
		}
		//lấy dữ liệu cần sửa theo mã sản phẩm
		public function getdatasanpham($id){
			$sql = "SELECT * FROM sanpham WHERE masp = '$id'";
			$this->execute($sql);
			if ($this->num_rows()!=0) {
				$data = mysqli_fetch_array($this->result);
			} else {
				$data = 0;
			}
			return $data;
		}
		//lấy tất cả dữ liệu
		public function getalldata($table) {
			$sql = $table;
			$this->execute($sql);
			if ($this->num_rows()==0) {
				$data = 0;
			} else {
				while ( $datas = $this->getdata()) {
					$data[] = $datas ;
				}
			}
			return $data;
		}
		// đếm số lượng num_rows
		public function num_rows(){
			if ($this->result) {
				$num = mysqli_num_rows($this->result);
			} else {
				$num = 0;	
			}
			return $num;
		}
		// đếm só lượng hàng
		public function num_row($table){
			$sql = $table;
			$this->execute($sql);
			return $this->num_rows();
		}
		//thêm dữ liệu
		public function insertdata($hoten, $namsinh, $quequan) {
			$sql = "INSERT INTO thanhvien(id,hoten,namsinh,quequan) VALUES (null,'$hoten','$namsinh','$quequan')";
			return $this->execute($sql);
		}
		//sửa dữ liệu
		public function updatedata($id,$hoten,$namsinh,$quequan) {
			$sql = "UPDATE thanhvien SET hoten='$hoten',namsinh='$namsinh',quequan='$quequan' WHERE id='$id'";
			return $this->execute($sql);
		}
		// xóa dữ liệu
		public function deletedata($table,$id) {
			$sql = "DELETE FROM $table WHERE id = '$id'";
			return $this->execute($sql);
		}
		// alert javascript
		public function alert($noidung){
			echo '<script type="text/javascript">alert("'.$noidung.'");</script>';
		}
		// location javascript
		public function location($noidung){
			echo '<script language="javascript">location.href="'.$noidung.'";</script>';
		}
		
		//tìm kiếm dữ liệu
		public function searchdata($table,$key) {
			$sql = ("SELECT * FROM $table WHERE hoten REGEXP '$key' ORDER BY id DESC");
			$this->execute($sql);
			if ($this->num_rows()==0) {
				$data = 0;
			} else {
				while ( $datas = $this->getdata()) {
					$data[] = $datas ;
				}
			}
			return $data;
		}
		// chuyển đổi dạng tiền
		public function change_money($str){
			if ($str == 0) {
				unset($_SESSION['cart']);
				return 0;
				break;
			}
			$len = strlen($str);
			if ($len == 5) {
				$str1 =  substr($str,0,2);
				$str2 =  substr($str,2,5);
				$string = "$str1,$str2";
			}
			if ($len == 6) {
				$str1 =  substr($str,0,3);
				$str2 =  substr($str,3,6);
				$string = "$str1,$str2";
			}
			if ($len == 7) {
				$str1 =  substr($str,0,1);
				$str2 =  substr($str,1,3);
				$str3 =  substr($str,4,6);
				$string = "$str1,$str2,$str3";
			}
			if ($len == 8) {
				$str1 =  substr($str,0,2);
				$str2 =  substr($str,2,3);
				$str3 =  substr($str,5,7);
				$string = "$str1,$str2,$str3";
			}
			return $string;
		}
		// lấy id vừa insert
		public function get_id_insert($sql){
			$con=mysqli_connect($this->hostname,$this->username,$this->password,$this->dbname);
			mysqli_query($con,$sql);
			$id_insert = mysqli_insert_id($con); 
			return $id_insert;
			
		}
		// tạo mã giảm giá 
		public function str_rand($len,$rate) {
		    
		    do {
			    $str = '';
			    $times = ceil($len/10);
			    for ($i = 0; $i < $times; $i++) {
			        $str .= md5(rand());
			    }
			    $str = strtoupper($str);
			    $str = substr($str, 0, $len);
			    if ($this->check_isset_discount($str)==0) {
			    	$sql = "INSERT INTO discount(id,id_disc,rate_disc) VALUES (null,'$str','$rate')";
					$this->execute($sql);
					$i = 0;
			    }
			    else{
			    	$i = 1;
			    }
			} while ($i==1); 
		 	
		}
		// check id on URL
		public function check_id_url($sql,$error404){
			if ($this -> num_row($sql) == 0 ) {
              $this -> location($error404);
            }
		}
		//kiểm tra tồn tại data form
		public function check_exist_data_form($table,$column,$key){
			$sql = "SELECT * FROM $table WHERE $column like '$key'";
			if($this->num_row($sql) == 0){
				return 0;
			}else{
				return 1;
			}
		}
	}
?>