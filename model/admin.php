<?php
	include_once('model/connect.php');
	include_once('model/config.php');
	class admin extends database{
		// đăng nhập admin
		public function login_admin($tk,$pw){
			$tk_encode = md5($tk);
			$pw_encode = md5($pw);
			$sql ="SELECT * FROM admin WHERE user_admin ='$tk_encode' and password_admin = '$pw_encode' ";
			$this->execute($sql);
			if ($this->num_rows()==1) {
				$_SESSION['user_admin']=$tk;
				$_SESSION['pw_admin']=$pw;
				$this->alert("Đăng nhập thành công");
				$this->location("admin/");
			} else {
				$this->alert("Đăng nhập không thành công");
			}
		}
		// logout admin
		public function logout_admin(){
			ob_start();
			//session_destroy();
			unset($_SESSION['user_admin']);
			unset($_SESSION['pw_admin']);
			$this->location("admin/");
		}
		// thêm sản phẩm
		public function add_product($name,$hang,$gia){
			$type_img = $_FILES["img_product"]["type"];
			$tmp_img  = $_FILES["img_product"]["tmp_name"];
			if ($name != null || $gia != null || $type_img != null ) {
				if ($this->check_exist_data_form('hang','id_hang',$hang)==1 && !is_float($gia) ) { // kiểm tra giá trị "hang" từ form có trong csdl không
					if ($this->check_img_product($type_img) == 1) {
						$name_img = $this->handle_name_add_product($name);
						move_uploaded_file($tmp_img,"public/img/sanpham/".$name_img);
						$sql = "INSERT INTO sanpham(masp,tensp,hang,gia,hinh_sp) VALUES (null,'$name','$hang','$gia','$name_img')";
						$this->execute($sql);
						$this->alert("Thêm thành công");
					}else{
						exit();
					}
				} else {
					$this->alert("Thêm thất bại");
				}
						
			} else {
				$this->alert("Vui lòng nhập đủ thông tin");
				
			}
		}
		// đổi tên sản phẩm để làm tên hình của sản phẩm
		public function handle_name_add_product($string){
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
			$string = "$string.png";
			return $string;
		}
		// kiểm tra ảnh upload
		public function check_img_product($type){
			if ($type=="image/png"){
				return 1;
			}else{
				$this->alert("Vui lòng chọn file ảnh (.png)");
				return 0;
			}
		}
		
		// chỉnh sửa sản phẩm
		public function edit_product($id,$name,$hang,$gia){
			$type_img = $_FILES["edit_img_product"]["type"];
			$tmp_img  = $_FILES["edit_img_product"]["tmp_name"];
			if ($name != null && $gia != null && !is_int($gia) ) { // kiểm tra name và price null , giá phải số nguyên không
				if ($this->check_exist_data_form('hang','id_hang',$hang)==1) { // kiểm tra giá trị "hang" từ form có trong csdl không
					if ($type_img != null) { // chỉnh sửa không có ảnh
						if ($this->check_img_product($type_img) == 1) {
							$name_img = $this->handle_name_add_product($name);
							move_uploaded_file($tmp_img,"public/img/sanpham/".$name_img);
							$sql = "UPDATE sanpham SET tensp='$name',hang='$hang',gia='$gia',hinh_sp='$name_img' WHERE masp ='$id'";
						}else{
							exit();
						}

					} else {
						$sql = "UPDATE sanpham SET tensp='$name',hang='$hang',gia='$gia' WHERE masp ='$id'";
					}
					$this->execute($sql);
					$this->alert("Chỉnh sửa thành công");
					$this->location("admin/listproduct");
				} else {
					$this->alert("Chỉnh sửa thất bại");
				}
				
			} else {
				$this->alert("Vui lòng nhập đủ thông tin");
				
			}
		}
		// xóa sản phẩm
		public function delete_product($id){
			$sql = "DELETE FROM sanpham WHERE masp = '$id'";
			$this->execute($sql);
			$this->alert("Xóa thành công");
			$this->location("admin/listproduct");
		}
		// đếm só lượng hàng
		public function num_row($table){
			$sql = $table;
			$this->execute($sql);
			return $this->num_rows();
		}
		// tổng tiền bán hàng
		public function count_avg_sum($sql){
			$data = $this -> getalldata($sql);
			foreach ($data as $row ) {
				return $row['0'];
			}
		}
		// lấy ngày bill đầu tuần đến ngày hiện tại
		public function bill_week(){
		    $date_now = date('Y-m-d') ;
		    $day_now_D = date('D');
		    $day_now_d = date('d');
		    $day_now_Y = date('Y');
		    $day_now_m = date('m');
		    switch ($day_now_D) {
		                case 'Mon':{
		                    $day_now_d = $day_now_d;
		                    break;
		                }
		                case 'Tue':{
		                    $day_now_d = $day_now_d - 1;
		                    break;
		                }
		                case 'Wed':{
		                    $day_now_d = $day_now_d - 2;
		                    break;
		                }
		                case 'Thu':{
		                    $day_now_d = $day_now_d - 3;
		                    break;
		                }
		                case 'Fri':{
		                    $day_now_d = $day_now_d - 4;
		                    break;
		                }
		                case 'Sat':{
		                    $day_now_d = $day_now_d - 5;
		                    break;
		                }
		                case 'Sun':{
		                    $day_now_d = $day_now_d - 6;
		                    break;
		                }
		            }        
				    $d1 = mktime(0,0,0,$day_now_m ,$day_now_d,$day_now_Y);
				    $date_start = date('Y-m-d',$d1);
				    return $sql = "SELECT * FROM bill WHERE date_order BETWEEN '".$date_start."' AND '".$date_now."'";
				    
            
		}
		// tổng số tiền bill trong tuần
		public function total_bill_week($sql){
			if ($this->num_row($sql)!=0) {
				$data = $this -> getalldata($sql);
				$total_bill_week = 0;
				foreach ($data as $row ) {
					$total_bill_week = $total_bill_week + $row['2'];
				}
				return $total_bill_week;
			}else {
				return 0;
			}


		}
		// cập nhật trạng thái bill
		public function update_status_bill($status,$id_bill){
			if ($this -> check_exist_data_form('statusbill','id_statusbill',$status)==1) {
				$sql = "UPDATE bill SET status='$status' WHERE id_bill ='$id_bill'";
				if($this->execute($sql) == 0){
					$this->alert("Chỉnh sửa thất bại");
				}else{
					$this->alert("Chỉnh sửa thành công");
				}
			} else {
				$this->alert("Chỉnh sửa thất bại");
			}
			
			
		}
		
		
	}


?>
