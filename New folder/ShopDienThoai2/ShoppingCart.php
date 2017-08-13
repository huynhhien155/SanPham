<?php
	class Product{
		var $MaSP;
		var $SoLuong;
		var $TenHinhAnh;
		var $TenSP;
	}
	
	class ShoppingCart{
		var $listProduct;
		
		public function __construct(){
			$this->listProduct = array();
		}
		
		public function update($MaSP, $newNum){
			for($i = 0; $i < count($this->listProduct); $i++){
				if($this->listProduct[$i]->MaSP == $MaSP){
					$this->listProduct[$i]->SoLuong = $newNum;		
				}
			}
		}
		
		public function delete($MaSP){
			for($i = 0; $i < count($this->listProduct); $i++){
				if($this->listProduct[$i]->MaSP == $MaSP)
					array_splice($this->listProduct,$i, 1);
			}
		}
		
		public function add($MaSP,$SoLuong,$TenHinhAnh,$TenSP){
			if(count($this->listProduct) == 0){
				//Chưa có sản phảm trong giỏ hàng
				$p = new Product();
				$p->MaSP = $MaSP;
				$p->SoLuong = $SoLuong;
				$p->TenHinhAnh = $TenHinhAnh;
				$p->TenSP = $TenSP;
				$this->listProduct[] = $p;
			}
			else{
				//Đã có sản phẩm trong giỏ hàng rồi
				//cần kiểm tra sản phẩm đó đã tồn tại trong giỏ hàng chưa
				//nếu đã có rồi thì chỉ cần cập nhật số lượng lên 1
				//nếu chưa có thì thềm mới sản phẩm đó vào giỏ hàng
				
				for($i = 0; $i < count($this->listProduct); $i++){
					if($this->listProduct[$i]->MaSP == $MaSP)
						break;
				}
				
				if($i == count($this->listProduct)){
					//Có nghĩa là đã duyệt hết giỏ hàng mà ko có sản phẩm cần thềm vào
					//Thêm sản phẩm mới vào giỏ hàng.	
					$p = new Product();
					$p->MaSP = $MaSP;
					$p->SoLuong = $SoLuong;
					$p->TenHinhAnh = $TenHinhAnh;
					$p->TenSP = $TenSP;
					$this->listProduct[] = $p;
				}
				else{
					$this->listProduct[$i]->SoLuong= $this->listProduct[$i]->SoLuong + $SoLuong;
				} 
					
			}
				
		}
	}
?>