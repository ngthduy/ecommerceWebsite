<?php
	include_once('model/connect.php');
	include_once('model/config.php');
	class user extends database {
		public function title($title){

			switch ($title) {
				case 'trangchu':{
					$title = "Trang Chủ";
					break;
				}
				case 'sanpham':{
					$title = "Sản Phẩm";
					break;
				}
				case 'dangki':{
					$title = "Đăng Kí";
					break;
				}
				case 'dangnhap':{
					$title = "Đăng Nhập";
					break;
				}
				case 'tintuc':{
					$title = "Tin Tức";
					break;
				}
				case 'lienhe':{
					$title = "Liên Hệ";
					break;
				}
				case 'quanlitaikhoan':{
					$title = "Quản Lí Tài Khoản";
					break;
				}
				case 'listcart':{
					$title = "Giỏ Hàng";
					break;
				}
				case 'search':{
					$title = "Kết Quả Tìm Kiếm";
					break;
				}
				case 'chitietsanpham':{
					$title = "Thông Tin Sản Phẩm";
					break;
				}
				case 'payment':{
					$title = "Thanh Toán";
					break;
				}
				case 'listorder':{
					$title = "Đơn Hàng";
					break;
				}
				case 'thaydoimatkhau':{
					$title = "Thay đổi mật khẩu";
					break;
				}
				
				default:{

					$title = str_replace('-',' ',$title);
					$title = $this->makehang($title);
				}
			}
			echo $title;
		}
		// break product
		public function break_product($sql,$sptren1trang,$trang){

			$from = ( $trang - 1 ) * $sptren1trang;
			$sql = $sql." LIMIT $from , $sptren1trang";
			return $sql;
		}
		// break page
		public function break_page($sql,$sptren1trang,$href){
			$sotrang = $this -> sotrang($sql,$sptren1trang);
	          echo '<div class="phantrang">';
	          for ($i=1; $i <= $sotrang ; $i++) { 
	            echo '<span style="color: black">
	              <a href="'.$href.'/'.$i.'">Trang '.$i.'</a> 
	            </span>';
	          }
	          echo '</div>';
		}
		public function sotrang($sql,$sptren1trang){
			$total_page =  $this->num_row($sql);
	        return $sotrang = ceil($total_page / $sptren1trang);

		}
		// kiểm tra đăng nhập
		public function checklogin($us,$pw,$remember){
			$md5_pw = md5($pw);
			$us_remember = $us;
			$pw_remember = $pw;
			$sql ="SELECT * FROM user WHERE ( email ='$us' OR phone = '$us' ) AND password = '$md5_pw' ";
			if ($this->num_row($sql)==1) {
				$data = $this ->getalldata($sql);
				foreach ($data as $row) {
					$email = $row['email'];
					$count_login = $row['count_login'];
				}
				$this->countlogin($email,$count_login);
				$_SESSION['email']=$email;
				$_SESSION['pw']=$pw;
				$this->remember_login($us_remember,$pw_remember,$remember);
				header('location: trangchu');
			} else {
				$this->alert('Đăng nhập không thành công');
			}
		}
		// nhớ đăng nhập
		public function remember_login($email,$password,$remember){
			if ($remember == 'yes') {
				setcookie("member_email",$email,time()+(10*365*24*60*60) );
				setcookie("member_password",$password,time()+(10*365*24*60*60) );
			}
			else {
				if (isset($_COOKIE["member_email"])) {
					setcookie("member_email","");
				}
				if (isset($_COOKIE["member_password"])) {
					setcookie("member_password","");
				}
				
			}
		} 

		// confirm login
		public function confirm_login($email,$pw){
			$md5_pw = md5($pw);
			$sql ="SELECT * FROM user WHERE email ='$email' AND password = '$md5_pw' ";
			if ($this->num_row($sql)==0) {
				unset($_SESSION['email']);
				unset($_SESSION['pw']);
				//header('location: dangnhap');
			}
		}

		// đếm số lần đăng nhập user
		public function countlogin($email,$count_login){
			$count_login += 1;
			$sql = "UPDATE user SET count_login = '$count_login' WHERE email = '$email'";
			$this->execute($sql);
		}
		// đăng xuất
		public function logout(){
			session_start();
			ob_start();
			//session_destroy();
			unset($_SESSION['email']);
			unset($_SESSION['pw']);
			header("location: trangchu");
		}
		// form đăng kí
		public function reg($pw,$email,$fullname){
			$pw = md5($pw);
			$sql = "INSERT INTO user(id,password,email,fullname,count_login) VALUES (null,'$pw','$email','$fullname',0)";
			if ($this->execute($sql)==0) {
				return 0;
			} else {
				return 1;
			}
			
		}
		// hàm kiểm tra đăng kí
		public function checkreg($pw,$email,$fullname,&$error_array){
			$xemail = $this->checkemail($email,$error_array);
			$xpassword = $this->checkpassword($pw,$error_array);
			$xfullname = $this->checkfullname($fullname,$error_array);
			if ($xpassword == 1 && $xemail ==1 && $xfullname ==1) {
				return 1;
			} else { return 0; }
		}
		// hàm kiểm tra email trong đăng kí
		public function checkemail($email,&$error_array){
			if ($email == "") {
				array_push($error_array,"Vui lòng điền email");
			}else {
				if(!filter_var($email, FILTER_VALIDATE_EMAIL))  {
					array_push($error_array,"Ðịnh dạng email không đúng");
				}else {
					$sql = ("SELECT * FROM user WHERE email = '$email' ");
					$this->execute($sql);
					if ($this->num_rows()==0) {
						return 1;
					}else {
						array_push($error_array,"Email đã tồn tại");
					}
					
				}
				
			}
		}
		// hàm kiểm tra password trong đăng kí
		public function checkpassword($pw,&$error_array){
			if ($pw == "") {
				array_push($error_array,"Vui lòng điền password");
			} else {
				if (strlen($pw)<6 || strlen($pw)>30 ) {
					array_push($error_array,"Vui lòng điền password tối thiểu 6 kí tự và tối đa 30 kí tự");
				} else {
					return 1;
				}
				
			}
			
		}
		// hàm kiểm tra fullname trong đăng kí 
		public function checkfullname($fullname,&$error_array){
			if ($fullname == "") {
				array_push($error_array,"Vui lòng điền họ và tên");
			} else {
				if (strlen($fullname)<6 || strlen($fullname)>50 ) {
					array_push($error_array,"Vui lòng điền họ và tên tối thiểu 6 kí tự và tối đa 50 kí tự");
				} else {
					return 1;
				}
			}
			
		}
		
		// hàm chuyển tên loại hàng
		public function makehang($string){
			switch ($string) {
				case 'Dam':{
					return 'Đầm';
					break;
				}
				case 'Vay':{
					return 'Váy';
					break;
				}
				case 'Ao':{
					return 'Áo';
					break;
				}
				case 'Quan':{
					return 'Quần';
					break;
				}
				default: {
					return $string;
				}
			}
		}
		// thay đổi thông tin user
		public function update_per_info($user_id,$name,$sex,$phone,$day,$month,$year) {
			$date_bir = mktime(0,0,0,$month,$day,$year);
			$date = date("Y-m-d",$date_bir);
			if (!is_numeric($phone) || $name == null || ( $sex != 'Nam' && $sex != 'Nữ' ) || checkdate($month,$day,$year) == false ) {
				$this->alert("Cập nhật thất bại");
			}
			else {
				$sql = "UPDATE user SET fullname = '$name', sex = '$sex', phone = '$phone', date_bir = '$date'  WHERE email = '$user_id' || phone = '$user_id' ";
				$this->execute($sql);
				$this->location('quanlitaikhoan');
			}

			

		}
		// thay đổi địa chỉ
		public function update_address($user_id,$address){
			$sql = "UPDATE user SET address = '$address' WHERE email = '$user_id' || phone = '$user_id' ";
			$this->execute($sql);
			$this->location('quanlitaikhoan');
		}
		// thêm comment
		public function cmt($id_user,$id_sp,$noidung_cmt,$date_cmt){
			$sql = "INSERT INTO binhluan(id_cmt,id_user_cmt,id_sp_cmt,noidung_cmt,date_cmt) VALUES (null,'$id_user','$id_sp','$noidung_cmt','$date_cmt')";
			$this->execute($sql);
		}
		
		// kiểm tra mã giảm giá
		public function check_isset_discount($id_disc){
			return $data = $this ->getalldata("SELECT * FROM discount WHERE id_disc = '$id_disc' ");
		}
		// tính tiền mã giảm giá
		public function check_discount($disc){
			$sql = " SELECT rate_disc FROM discount WHERE id_disc = '$disc' ";
			if ($this->num_row($sql) != 0) {
				$data = $this -> getalldata($sql);
				foreach ($data as $row) {
					$rate = $row['rate_disc'];
				}
				$_SESSION['rate'] = $rate;
		        $_SESSION['total_rate'] = $_SESSION['total']*$_SESSION['rate']/100;
		        $_SESSION['total_disc'] = $_SESSION['total'] - $_SESSION['total_rate'];
			}else{
				$rate = 0;
			}
			return $rate;
		}
		// hóa đơn
		public function payment_cod_bill($email,$amount_bill,$recive_date){
			$recive_date = date("Y-m-d",$recive_date);
			$date_order = date("Y-m-d");
			$sql = "INSERT INTO bill (id_bill,email,amount_bill,payment,date_order,date_recive,status) VALUES (NULL, '$email','$amount_bill','cod','$date_order','$recive_date','0')";
			return $this->get_id_insert($sql);
		}
		// order
		public function payment_cod_order($id_bill,$id_sp,$size_sp,$qty,$amount_order){
			$sql = "INSERT INTO orderdetail (id_order,id_bill,id_sp,size_sp,qty,amount_order) VALUES (NULL, '$id_bill','$id_sp','$size_sp','$qty','$amount_order')";
			$this->execute($sql);
		}
		// hàm chuyển url
		public function makeurl($string){
			$string = trim($string);
			$string = str_replace(' ','-',$string);
			$string = preg_replace('/(à|á|ả|ã|ạ|ă|ắ|ằ|ẳ|ặ|ẵ|ấ|â|ầ|ẫ|ẩ|ậ)/','a',$string);
			$string = preg_replace('/(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)/','A',$string);
			$string = preg_replace('/(é|è|ẹ|ẽ|ẻ|ê|ế|ề|ễ|ệ|ể)/','e',$string);
			$string = preg_replace('/(ơ|ờ|ớ|ở|ợ|ó|ò|ọ|ỏ|õ|ỡ|ô|ố|ồ|ổ|ộ)/','o',$string);
			$string = preg_replace('/(đ)/','d',$string);
			$string = preg_replace('/(ư|ứ|ừ|ự|ữ|ử|ụ|ú|ù|ũ|ủ)/','u',$string);
			$string = preg_replace('/(í|ì|ị|ỉ|ĩ)/','i',$string);
			$string = preg_replace('/(ỳ|ý|ỵ|ỷ|ỹ)/','y',$string); 
			$string = preg_replace('/(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)/','E',$string); 
			$string = preg_replace('/(Ì|Í|Ị|Ỉ|Ĩ)/','I',$string);
			$string = preg_replace('/(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)/','O',$string);
			$string = preg_replace('/(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)/','U',$string);
			$string = preg_replace('/(Ỳ|Ý|Ỵ|Ỷ|Ỹ)/','Y',$string);
			$string = preg_replace('/(Đ)/','D',$string);
			return $string;
		}
		public function check_password_old($old){
			$old = md5($old);
			$sql = " SELECT * FROM user WHERE password = '$old' and email = '".$_SESSION['email']."'";
			if ($this->num_row($sql)==1) {
				return 1;
			} else {
				return 0;
			}
			
		}

		// thay đổi mật khẩu user
		public function change_password($old,$new,$new_confirm,&$error_array){
			if ($this->check_password_old($old)==1) {
				if($this->checkpassword($new,$error_array)==1){
					if ($this->check_password_confirm($new,$new_confirm,$error_array)==1) {
						$new = md5($new);
						$sql = "UPDATE user SET password = '$new' WHERE email = '".$_SESSION['email']."'";
						$this->execute($sql);
						$this->alert("Thay đổi thành công");
						$this->location("dangxuat");
					} else {}
				}
				else{ }
			} else {
				array_push($error_array,"Mật mật khẩu cũ không đúng");
			}
			
		}
		// hàm kiểm tra nhập lại pw
		public function check_password_confirm($new,$new_conf,&$error_array){
			if ($new!=$new_conf) {
				array_push($error_array,"Mật khẩu không giống nhau");
			} else {
				return 1;
			}
		}
	}

?>