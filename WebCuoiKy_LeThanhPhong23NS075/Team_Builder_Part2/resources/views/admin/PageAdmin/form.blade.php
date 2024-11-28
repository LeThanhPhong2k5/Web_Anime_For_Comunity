<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Form Up Phim</title>
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
								<a href="form" class="nav-link active"><i class="mdi mdi-lead-pencil"></i> Up Anime</a>
							</li>
							<li class="nav-item">
								<a href="table" class="nav-link"><i class="mdi mdi-table"></i> Bảng dữ liệu</a>
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
			<main class="col-md-9 col-lg-10" role="main">
				<div class="container">
					<div class="content-header mt-2 mb-3">
						<h2 class="text-header">UP FILM ANIME</h2>
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
					<div class="row basic mb-3">
						<div class="col-md-12">
							<div class="card">
								<div class="card-body">
								<form action="{{ route('up-data-anime') }}" method="POST" enctype="multipart/form-data">
									@csrf
									<label class="title-body">Vui lòng điền thông tin</label>
									<div class="form-group">
										<label for="image-anime">Hình ảnh Anime</label>
										<input type="file" class="form-control-file" name="image-anime" id="image-anime" accept="image/*" required>
									</div>
									<div class="form-group">
										<label for="name-anime">Tên Anime</label>
										<input type="text" class="form-control" name="name-anime" id="name-anime" placeholder="VD:abc">
									</div>
									<div class="form-group">
										<label for="name-anime-other">Tên gọi khác</label>
										<input type="text" class="form-control" name="name-anime-other" id="name-anime-other" placeholder="VD:abc123">
									</div>
									<div class="form-group">
										<label for="genre">Thể loại</label>
										<select class="form-control" name="genre" id="genre">
											<option value="">Chọn thể loại</option>
											<option value="Action">Action</option>
											<option value="Adventure">Adventure</option>
											<option value="Comedy">Comedy</option>
											<option value="Drama">Drama</option>
											<option value="Fantasy">Fantasy</option>
											<option value="Slice of Life">Slice of Life</option>
											<option value="Romance">Romance</option>
											<option value="Horror">Horror</option>
											<option value="Thriller">Thriller</option>
											<option value="Mystery">Mystery</option>
											<option value="Sci-Fi">Sci-Fi</option>
											<option value="Supernatural">Supernatural</option>
											<option value="Magic">Magic</option>
											<option value="Historical">Historical</option>
											<option value="Mecha">Mecha</option>
											<option value="Sports">Sports</option>
											<option value="Music">Music</option>
											<option value="Shounen">Shounen</option>
											<option value="Shoujo">Shoujo</option>
											<option value="Seinen">Seinen</option>
											<option value="Josei">Josei</option>
											<option value="Ecchi">Ecchi</option>
											<option value="Yaoi">Yaoi</option>
											<option value="Yuri">Yuri</option>
											<option value="Psychological">Psychological</option>
											<option value="School">School</option>
											<option value="Superhero">Superhero</option>
											<option value="Action-Adventure">Action-Adventure</option>
											<option value="Action-Comedy">Action-Comedy</option>
											<option value="Action-Romance">Action-Romance</option>
											<option value="Drama-Romance">Drama-Romance</option>
											<option value="Fantasy-Romance">Fantasy-Romance</option>
											<option value="Sci-Fi-Adventure">Sci-Fi-Adventure</option>
											<option value="Harem">Harem</option>
											<option value="Reverse Harem">Reverse Harem</option>
											<option value="Isekai">Isekai</option>
											<option value="Gore">Gore</option>
											<option value="Psychological-Thriller">Psychological-Thriller</option>
											<option value="Military">Military</option>
											<option value="Parody">Parody</option>
											<option value="A slice of life">A slice of life</option>
										</select>
									</div>
									<div class="form-group">
										<label for="description">Mô tả</label>
										<textarea class="form-control" name="description" id="description" placeholder="Đây là bộ phim nói về ...."></textarea>
									</div>
									<div class="form-group">
										<label for="studio">Studio</label>
										<select class="form-control" name="studio" id="studio">
											<option value="">Chọn studio</option>
											<option value="Madhouse">Madhouse</option>
											<option value="Kyoto Animation">Kyoto Animation</option>
											<option value="Bones">Bones</option>
											<option value="MAPPA">MAPPA</option>
											<option value="Sunrise">Sunrise</option>
											<option value="Toei Animation">Toei Animation</option>
											<option value="A-1 Pictures">A-1 Pictures</option>
											<option value="Studio Ghibli">Studio Ghibli</option>
											<option value="Production I.G">Production I.G</option>
											<option value="Trigger">Trigger</option>
											<option value="Silver Link">Silver Link</option>
											<option value="P.A. Works">P.A. Works</option>
											<option value="Wit Studio">Wit Studio</option>
											<option value="Studio Deen">Studio Deen</option>
											<option value="David Production">David Production</option>
											<option value="White Fox">White Fox</option>
											<option value="CloverWorks">CloverWorks</option>
											<option value="J.C. Staff">J.C. Staff</option>
											<option value="Liden Films">Liden Films</option>
											<option value="Xebec">Xebec</option>
											<option value="Geneon Universal">Geneon Universal</option>
											<option value="Funimation">Funimation</option>
											<option value="Studio Pierrot">Studio Pierrot</option>
											<option value="Aniplex">Aniplex</option>
											<option value="NUT">NUT</option>
											<option value="Zexcs">Zexcs</option>
											<option value="Brain’s Base">Brain’s Base</option>
											<option value="VIZ Media">VIZ Media</option>
											<option value="KyoAni">KyoAni</option>
											<option value="Shaft">Shaft</option>
											<option value="Millepensee">Millepensee</option>
											<option value="Studio Gonzo">Studio Gonzo</option>
											<option value="Production Reed">Production Reed</option>
											<option value="Studio Lush">Studio Lush</option>
											<option value="TMS Entertainment">TMS Entertainment</option>
											<option value="Gonzo">Gonzo</option>
											<option value="Studio 4°C">Studio 4°C</option>
											<option value="Nexus">Nexus</option>
											<option value="Cloud Hearts">Cloud Hearts</option>
											<option value="Ufotable">Ufotable</option>
											<option value="C2C">C2C</option>
											<option value="Project No.9">Project No.9</option>
										</select>
									</div>
									<div class="form-group">
										<label for="release-date">Ngày phát hành</label>
										<input type="date" class="form-control" name="release_date" id="release-date" placeholder="Chọn ngày">
									</div>		
									<div class="form-group">
										<label for="episode_a">Số tập</label>
										<input type="text" class="form-control" name="episode_a" id="episode_a" placeholder="VD:1/12">
									</div>	
									<div class="form-group">
										<label for="episode_t">Thời lượng mỗi tập</label>
										<input type="text" class="form-control" name="episode_t" id="episode_t" placeholder="VD:23:59">
									</div>	
									<div class="form-group">
										<label for="status">Trạng thái</label>
										<select class="form-control" name="status" id="status">
											<option value="Đã hoàn thành">Đã hoàn thành</option>
											<option value="Đang phát sóng">Đang phát sóng</option>
											<option value="Tạm ngưng">Tạm ngưng</option>
										</select>
									</div>
									<button class="btn btn-water-mid" type="submit">Up</button>		
								</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</main>
		</div>
	</div>


<!-- Jquery -->
<script src="vendors/bootstrap/js/jquery-3.3.1/jquery-3.3.1.min.js"></script>
<!-- Bootstrap JS -->
<script src="vendors/bootstrap/js/bootstrap-4.3.1/bootstrap.min.js"></script>
<!-- Popper -->
<script src="vendors/bootstrap/js/popper/pooper.min.js"></script>
</body>
</html>