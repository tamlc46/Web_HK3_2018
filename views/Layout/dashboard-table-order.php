<?php
	
if (count($dashboardController->orderList) == 0)
	echo "<hr><br><p align=\"center\">Không có hóa đơn nào!!!</p>";
else
{
	echo "	<table class=\"table ListProducts\">
				<thead>
					<tr>
					<th scope=\"col\">Id</th>
					<th scope=\"col\">Người mua</th>
					<th scope=\"col\"diffshipaddr</th>
					<th scope=\"col\">Tổng tiền</th>
					<th></th>
					</tr>
				</thead>
				<tbody>";
	
	#foreach ($dashboardController->orderList as $order)
	echo "
		<tr>
			<th scope=\"row\">{$order->id}</th>
			<td>{$order->id}</td>
			<td>{$order->id}</td>
			<td>{$order->id}</td>
			<td>{$order->id}</td>
			<td>
				<form action=\"\" method=\"\">
				
					<!-- Button trigger modal update order -->
					<button type=\"button\" class=\"btn btn-primary btn-sm\" data-toggle=\"modal\" data-target=\"#UpdateOrder\">Chi tiết</button>
					<!-- Modal Update Order -->
					<div class=\"modal fade\" id=\"UpdateOrder\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"UpdateOrderModalLabel\" aria-hidden=\"true\">
					  <div class=\"modal-dialog\" role=\"document\">
						<div class=\"modal-content container\">
							<div class=\"modal-header\">
								<h3 class=\"modal-title\" id=\"UpdateProductModalLabel\">Cập nhật sản phẩm</h3>
								<button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\">
									<span aria-hidden=\"true\">&times;</span>
								</button>
							</div>
						  
							<div class=\"modal-body\">
								<div class=\"form-group\">
									<label for=\"NameProduct\">Tên sản phẩm</label>
									<input type=\"text\" class=\"form-control\" id=\"NameProduct\" placeholder=\"Tên . . .\">
								</div>
								
								<div class=\"form-group\">
									<label for=\"CategoryProduct\">Loại sản phẩm</label>
									<input type=\"text\" class=\"form-control\" id=\"CategoryProduct\" placeholder=\"Loại . . .\">
								</div>
							</div>
							
							<div class=\"modal-footer\">
								<button type=\"button\" class=\"btn btn-primary btn-lg btn-block\">Cập nhật</button>
							</div>
						</div>
					  </div>
					</div>
					
					<!-- Button trigger modal remove product-->
					<button type=\"button\" class=\"btn btn-danger btn-sm\" data-toggle=\"modal\" data-target=\"#RemoveProduct\">Xóa</button>
					<!-- Modal Remove Product -->
					<div class=\"modal fade\" id=\"RemoveProduct\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"RemoveProductModalLabel\" aria-hidden=\"true\">
					  <div class=\"modal-dialog\" role=\"document\">
						<div class=\"modal-content\">
						  <div class=\"modal-header\">
							<h5 class=\"modal-title\" id=\"RemoveProductModalLabel\">Xóa sản phẩm</h5>
							<button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\">
							  <span aria-hidden=\"true\">&times;</span>
							</button>
						  </div>
						  <div class=\"modal-body\">
							Sản phẩm sẽ bị xóa. Bạn chắc chứ?
						  </div>
						  <div class=\"modal-footer\">
							<button type=\"button\" class=\"btn btn-secondary\" data-dismiss=\"modal\">Close</button>
							<button type=\"button\" class=\"btn btn-primary\">Save changes</button>
						  </div>
						</div>
					  </div>
					</div>
				
				</form>
				
			</td>
		</tr>";

	echo "</tbody></table>";
}
?>