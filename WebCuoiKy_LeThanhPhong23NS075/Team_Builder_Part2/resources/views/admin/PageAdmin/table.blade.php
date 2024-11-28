<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Bảng dữ liệu</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" type="text/css" href="/vendors/bootstrap/css/bootstrap-4.3.1/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="/assets/css/simple-custom.css">
	<link rel="stylesheet" type="text/css" href="/vendors/icon/mdi/css/materialdesignicons.min.css">
</head>
<body>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-2">
				<div class="col-md-2 sidebar">
					<div class="brand">
						<a href="#" class="brand-name">Xin chào, {{ $data->name }}</a>
					</div>
					<div class="sidebar-sticky">
						<ul class="nav flex-column">
							<li class="nav-item">
								<a href="admin_page" class="nav-link"><i class="mdi mdi-monitor"></i> Dashboard</a>
							</li>
							<li class="nav-item">
								<a href="form" class="nav-link"><i class="mdi mdi-lead-pencil"></i> Up Anime</a>
							</li>
							<li class="nav-item">
								<a href="table" class="nav-link active"><i class="mdi mdi-table"></i> Bảng dữ liệu</a>
							</li>
						</ul>
					</div>
					<div class="nav-bottom">
						<ul class="nav">
							<li class="nav-item">
                                <a href="logout" class="nav-link">
                                    <i class="mdi mdi-power"></i>Đăng xuất
                                </a>
                            </li>
						</ul>
					</div>
				</div>
			</div>
			<main class="col-md-8 col-lg-14" role="main">
				<div class="container">
					<div class="content-header mt-2 mb-3">
						<h2 class="text-header">UP PHIM ANIME</h2>
					</div>
					@if (session('error'))
						<div class="alert alert-danger">
							{{ session('error') }}
						</div>
					@endif
					@if (session('success'))
						<div class="alert alert-success">
							{{ session('success') }}
						</div>
					@endif
					<div class="row basic">
						<div class="col-md-12 mb-3">
							<div class="card" style="width:130%">
								<div class="card-body pb-0">
									<label class="title-body">Danh sách phim đã up</label>
									<div class="table-responsive">
										<table class="table">
											<thead>
												<tr>
													<th>ID</th>
													<th>Hình ảnh Anime</th>
													<th>Tên Anime</th>
													<th>Tên khác</th>
													<th>Thể loại</th>
													<th style="width: 15%;">Mô tả</th>
													<th style="width: 15%;">Studio</th>
													<th style="width: 15%;">Ngày phát hành</th>
													<th style="width: 15%;">Số tập</th>
													<th style="width: 10%;">Thời lượng mỗi tập</th>
													<th style="width: 15%;">Trạng thái</th>
													<th style="width: 15%;">Hành động</th>
												</tr>
											</thead>
											<tbody>
												@forelse($animes as $anime)
													<tr>
														<td>{{ $anime->id }}</td>
														<td>
															@if($anime->Hinh_Anh_Anime)
																<img src="{{ asset($anime->Hinh_Anh_Anime) }}" alt="Anime Image" width="100">
															@else
																Không có hình ảnh
															@endif
														</td>
														<td>{{ $anime->Ten_Anime }}</td>
														<td>{{ $anime->Ten_Khac }}</td>
														<td>{{ $anime->The_loai }}</td>
														<td>{{ $anime->Mo_Ta }}</td>
														<td>{{ $anime->Studio }}</td>
														<td>{{ $anime->Ngay_Phat_Hanh }}</td>
														<td>{{ $anime->So_Tap }}</td>
														<td>{{ $anime->Thoi_Luong_Moi_Tap }}</td>
														<td>{{ $anime->Trang_Thai }}</td>
														<td>
															<a href="" class="btn btn-warning" data-toggle="modal" data-target="#exampleModal{{ $anime->id }}">Sửa</a>
															<form action="{{ route('delete-anime', $anime->id) }}" method="POST" onsubmit="return confirm('Bạn có chắc chắn muốn xóa?')">
																@csrf
																@method('DELETE')
																<button type="submit" class="btn btn-danger">Xóa</button>
															</form>
														</td>
													</tr>
												@empty
													<tr>
														<td colspan="12" class="text-center">Không có dữ liệu</td>
													</tr>
												@endforelse
											</tbody>
										</table>										
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</main>
		</div>
	</div>

	@forelse($animes as $anime)
	<div class="modal" id="exampleModal{{ $anime->id }}" tabindex="-1">
		<div class="modal-dialog">
		  <div class="modal-content">
			<div class="modal-header">
			  <h5 class="modal-title">Chỉnh sửa thông tin</h5>
			</div>
			
			<form action="{{ route('update-anime', $anime->id) }}" method="POST" enctype="multipart/form-data">
				@csrf
				@method('PUT') 
				<div class="modal-body">
						<label class="title-body">Vui lòng điền thông tin</label>
						<div class="form-group">
							<label for="image-anime">Hình ảnh Anime</label>
							<div class="form-group">
								<input type="file" class="form-control-file" name="image-anime" id="image-anime" accept="image/*">
								@if($anime->Hinh_Anh_Anime)
									<div>
										<img src="{{ asset($anime->Hinh_Anh_Anime) }}" alt="Current Image" width="100">
									</div>
								@endif
							</div>
						</div>
						<div class="form-group">
							<label for="name-anime">Tên Anime</label>
							<input type="text" class="form-control" name="name-anime" id="name-anime" value="{{ $anime->Ten_Anime }}">
						</div>
						<div class="form-group">
							<label for="name-anime-other">Tên gọi khác</label>
							<input type="text" class="form-control" name="name-anime-other" id="name-anime-other" value="{{ $anime->Ten_Khac }}">
						</div>
						<div class="form-group">
							<label for="genre">Thể loại</label>
							<select class="form-control" name="genre" id="genre">
								<option value="">Chọn thể loại</option>
								<option value="Action" {{ $anime->The_loai == 'Action' ? 'selected' : '' }}>Action</option>
								<option value="Adventure" {{ $anime->The_loai == 'Adventure' ? 'selected' : '' }}>Adventure</option>
								<option value="Comedy" {{ $anime->The_loai == 'Comedy' ? 'selected' : '' }}>Comedy</option>
								<option value="Drama" {{ $anime->The_loai == 'Drama' ? 'selected' : '' }}>Drama</option>
								<option value="Fantasy" {{ $anime->The_loai == 'Fantasy' ? 'selected' : '' }}>Fantasy</option>
								<option value="Slice of Life" {{ $anime->The_loai == 'Slice of Life' ? 'selected' : '' }}>Slice of Life</option>
								<option value="Romance" {{ $anime->The_loai == 'Romance' ? 'selected' : '' }}>Romance</option>
								<option value="Thriller" {{ $anime->The_loai == 'Thriller' ? 'selected' : '' }}>Thriller</option>
								<option value="Mystery" {{ $anime->The_loai == 'Mystery' ? 'selected' : '' }}>Mystery</option>
								<option value="Sci-Fi" {{ $anime->The_loai == 'Sci-Fi' ? 'selected' : '' }}>Sci-Fi</option>
								<option value="Supernatural" {{ $anime->The_loai == 'Supernatural' ? 'selected' : '' }}>Supernatural</option>
								<option value="Magic" {{ $anime->The_loai == 'Magic' ? 'selected' : '' }}>Magic</option>
								<option value="Historical" {{ $anime->The_loai == 'Historical' ? 'selected' : '' }}>Historical</option>
								<option value="Sports" {{ $anime->The_loai == 'Sports' ? 'selected' : '' }}>Sports</option>
								<option value="Music" {{ $anime->The_loai == 'Music' ? 'selected' : '' }}>Music</option>
								<option value="Shounen" {{ $anime->The_loai == 'Shounen' ? 'selected' : '' }}>Shounen</option>
								<option value="Shoujo" {{ $anime->The_loai == 'Shoujo' ? 'selected' : '' }}>Shoujo</option>
								<option value="Seinen" {{ $anime->The_loai == 'Seinen' ? 'selected' : '' }}>Seinen</option>
								<option value="Josei" {{ $anime->The_loai == 'Josei' ? 'selected' : '' }}>Josei</option>
								<option value="Ecchi" {{ $anime->The_loai == 'Ecchi' ? 'selected' : '' }}>Ecchi</option>
								<option value="Yaoi" {{ $anime->The_loai == 'Yaoi' ? 'selected' : '' }}>Yaoi</option>
								<option value="Yuri" {{ $anime->The_loai == 'Yuri' ? 'selected' : '' }}>Yuri</option>
								<option value="School" {{ $anime->The_loai == 'School' ? 'selected' : '' }}>School</option>
								<option value="Superhero" {{ $anime->The_loai == 'Superhero' ? 'selected' : '' }}>Superhero</option>
								<option value="Action-Adventure" {{ $anime->The_loai == 'Action-Adventure' ? 'selected' : '' }}>Action-Adventure</option>
								<option value="Action-Comedy" {{ $anime->The_loai == 'Action-Comedy' ? 'selected' : '' }}>Action-Comedy</option>
								<option value="Action-Romance" {{ $anime->The_loai == 'Action-Romance' ? 'selected' : '' }}>Action-Romance</option>
								<option value="Drama-Romance" {{ $anime->The_loai == 'Drama-Romance' ? 'selected' : '' }}>Drama-Romance</option>
								<option value="Fantasy-Romance" {{ $anime->The_loai == 'Fantasy-Romance' ? 'selected' : '' }}>Fantasy-Romance</option>
								<option value="Sci-Fi-Adventure" {{ $anime->The_loai == 'Sci-Fi-Adventure' ? 'selected' : '' }}>Sci-Fi-Adventure</option>
								<option value="Harem" {{ $anime->The_loai == 'Harem' ? 'selected' : '' }}>Harem</option>
								<option value="Reverse Harem" {{ $anime->The_loai == 'Reverse Harem' ? 'selected' : '' }}>Reverse Harem</option>
								<option value="Isekai" {{ $anime->The_loai == 'Isekai' ? 'selected' : '' }}>Isekai</option>
								<option value="Gore" {{ $anime->The_loai == 'Gore' ? 'selected' : '' }}>Gore</option>
								<option value="A slice of life" {{ $anime->The_loai == 'A slice of life' ? 'selected' : '' }}>A slice of life</option>
							</select>
						</div>
						<div class="form-group">
							<label for="description">Mô tả</label>
							<textarea class="form-control" name="description" id="description">{{ $anime->Mo_Ta }}</textarea>
						</div>
						<div class="form-group">
							<label for="studio">Studio</label>
							<select class="form-control" name="studio" id="studio">
								<option value="">Chọn studio</option>
								<option value="Madhouse" {{ $anime->Studio == 'Madhouse' ? 'selected' : '' }}>Madhouse</option>
								<option value="Kyoto Animation" {{ $anime->Studio == 'Kyoto Animation' ? 'selected' : '' }}>Kyoto Animation</option>
								<option value="Bones" {{ $anime->Studio == 'Bones' ? 'selected' : '' }}>Bones</option>
								<option value="MAPPA" {{ $anime->Studio == 'MAPPA' ? 'selected' : '' }}>MAPPA</option>
								<option value="Sunrise" {{ $anime->Studio == 'Sunrise' ? 'selected' : '' }}>Sunrise</option>
								<option value="Toei Animation" {{ $anime->Studio == 'Toei Animation' ? 'selected' : '' }}>Toei Animation</option>
								<option value="A-1 Pictures" {{ $anime->Studio == 'A-1 Pictures' ? 'selected' : '' }}>A-1 Pictures</option>
								<option value="Studio Ghibli" {{ $anime->Studio == 'Studio Ghibli' ? 'selected' : '' }}>Studio Ghibli</option>
								<option value="Production I.G" {{ $anime->Studio == 'Production I.G' ? 'selected' : '' }}>Production I.G</option>
								<option value="Trigger" {{ $anime->Studio == 'Trigger' ? 'selected' : '' }}>Trigger</option>
								<option value="Silver Link" {{ $anime->Studio == 'Sliver Link' ? 'selected' : '' }}>Silver Link</option>
								<option value="P.A. Works" {{ $anime->Studio == 'P.A. Works' ? 'selected' : '' }}>P.A. Works</option>
								<option value="Wit Studio" {{ $anime->Studio == 'Wit Studio' ? 'selected' : '' }}>Wit Studio</option>
								<option value="Studio Deen" {{ $anime->Studio == 'Studio Deen' ? 'selected' : '' }}>Studio Deen</option>
								<option value="David Production" {{ $anime->Studio == 'David Production' ? 'selected' : '' }}>David Production</option>
								<option value="White Fox" {{ $anime->Studio == 'White Fox' ? 'selected' : '' }}>White Fox</option>
								<option value="CloverWorks" {{ $anime->Studio == 'CloverWorks' ? 'selected' : '' }}>CloverWorks</option>
								<option value="J.C. Staff" {{ $anime->Studio == 'J.C. Staff' ? 'selected' : '' }}>J.C. Staff</option>
								<option value="Liden Films" {{ $anime->Studio == 'Liden Films' ? 'selected' : '' }}>Liden Films</option>
								<option value="Xebec" {{ $anime->Studio == 'Xebec' ? 'selected' : '' }}>Xebec</option>
								<option value="Geneon Universal" {{ $anime->Studio == 'Geneon Universal' ? 'selected' : '' }}>Geneon Universal</option>
								<option value="Funimation" {{ $anime->Studio == 'Funimation' ? 'selected' : '' }}>Funimation</option>
								<option value="Studio Pierrot" {{ $anime->Studio == 'Studio Pierrot' ? 'selected' : '' }}>Studio Pierrot</option>
								<option value="Aniplex" {{ $anime->Studio == 'Aniplex' ? 'selected' : '' }}>Aniplex</option>
								<option value="NUT" {{ $anime->Studio == 'NUT' ? 'selected' : '' }}>NUT</option>
								<option value="Zexcs" {{ $anime->Studio == 'Zexcs' ? 'selected' : '' }}>Zexcs</option>
								<option value="Brain’s Base" {{ $anime->Studio == 'Brain’s Base' ? 'selected' : '' }}>Brain’s Base</option>
								<option value="VIZ Media" {{ $anime->Studio == 'VIZ Media' ? 'selected' : '' }}>VIZ Media</option>
								<option value="KyoAni" {{ $anime->Studio == 'KyoAni' ? 'selected' : '' }}>KyoAni</option>
								<option value="Shaft" {{ $anime->Studio == 'Shaft' ? 'selected' : '' }}>Shaft</option>
								<option value="Millepensee" {{ $anime->Studio == 'Millepensee' ? 'selected' : '' }}>Millepensee</option>
								<option value="Studio Gonzo" {{ $anime->Studio == 'Studio Gonzo' ? 'selected' : '' }}>Studio Gonzo</option>
								<option value="Production Reed" {{ $anime->Studio == 'Production Reed' ? 'selected' : '' }}>Production Reed</option>
								<option value="Studio Lush" {{ $anime->Studio == 'Studio Lush' ? 'selected' : '' }}>Studio Lush</option>
								<option value="TMS Entertainment" {{ $anime->Studio == 'TMS Entertainment' ? 'selected' : '' }}>TMS Entertainment</option>
								<option value="Gonzo" {{ $anime->Studio == 'Gonzo' ? 'selected' : '' }}>Gonzo</option>
								<option value="Studio 4°C" {{ $anime->Studio == 'Studio 4°C' ? 'selected' : '' }}>Studio 4°C</option>
								<option value="Studio 4°C" {{ $anime->Studio == 'Nexus' ? 'selected' : '' }}>Nexus</option>
						</select>
						</div>
						<div class="form-group">
							<label for="release-date">Ngày phát hành</label>
							<input type="date" class="form-control" name="release_date" id="release-date" value="{{ $anime->Ngay_Phat_Hanh }}">
						</div>		
						<div class="form-group">
							<label for="episode_a">Số tập</label>
							<input type="text" class="form-control" name="episode_a" id="episode_a" value="{{ $anime->So_Tap }}">
						</div>	
						<div class="form-group">
							<label for="episode_t">Thời lượng mỗi tập</label>
							<input type="text" class="form-control" name="episode_t" id="episode_t" value="{{ $anime->Thoi_Luong_Moi_Tap }}">
						</div>	
						<div class="form-group">
							<label for="status">Trạng thái</label>
							<select class="form-control" name="status" id="status">
								<option value="Đã hoàn thành" {{ $anime->status == 'Đã hoàn thành' ? 'selected' : '' }}>Đã hoàn thành</option>
								<option value="Đang phát sóng" {{ $anime->status == 'Đang phát sóng' ? 'selected' : '' }}>Đang phát sóng</option>
								<option value="Tạm ngưng" {{ $anime->status == 'Tạm ngưng' ? 'selected' : '' }}>Tạm ngưng</option>
							</select>
						</div>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-primary">Lưu thay đổi</button>
				</div>
			</form>
		  </div>
		</div>
	  </div>
	  @empty
			<p>Không có dữ liệu</p>
		@endforelse


	


<!-- Jquery -->
<script src="/vendors/bootstrap/js/jquery-3.3.1/jquery-3.3.1.min.js"></script>
<!-- Bootstrap JS -->
<script src="/vendors/bootstrap/js/bootstrap-4.3.1/bootstrap.min.js"></script>
<!-- Popper -->
<script src="/vendors/bootstrap/js/popper/pooper.min.js"></script>
</body>
</html>