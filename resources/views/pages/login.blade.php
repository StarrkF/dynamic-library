@extends('master')
@section('css')
    @vite('resources/css/login.css')
@endsection
@section('content')
	<div class="section text-white">
		<div class="container">
			<div class="row full-height justify-content-center">
				<div class="col-12 text-center align-self-center py-5">
					<div class="section pb-5 pt-5 pt-sm-2 text-center">
						<h6 class="pb-3"><span>Giriş</span><span>Kaydol</span></h6>
			          	<input class="checkbox" type="checkbox" id="reg-log"/>
			          	<label for="reg-log"></label>
						<div class="card-3d-wrap mx-auto">
							<div class="card-3d-wrapper">
								<div class="card-front">
									<div class="center-wrap">
										<div class="section text-center">
                                            <form action="{{ route('login') }}" method="POST">
                                                @csrf
                                                <h4 class="mb-4 pb-3">Giriş Yap</h4>
                                                <div class="form-group">
                                                    <input type="email" name="email" class="form-style" placeholder="Email">
                                                    <i class="input-icon fa-solid fa-at"></i>
                                                </div>
                                                <div class="form-group mt-2">
                                                    <input type="password" name="password" class="form-style" placeholder="Şifre">
                                                    <i class="input-icon fa-solid fa-key"></i>
                                                </div>
                                                <button type="submit" class="btn-custom mt-4">Giriş</button>
                                            </form>
				      					</div>
			      					</div>
			      				</div>
								<div class="card-back">
									<div class="center-wrap">
										<div class="section text-center">
                                            <form action="{{ route('post.register') }}" method="POST">
                                                @csrf
                                                <h4 class="mb-4 pb-3">Kayıt Ol</h4>
                                                <div class="form-group">
                                                    <input type="text" name="name" class="form-style" placeholder="Ad Soyad">
                                                    <i class="input-icon fa-solid fa-user"></i>
                                                </div>
                                                <div class="form-group mt-2">
                                                    <input type="email" name="email" class="form-style" placeholder="Email Adresi">
                                                    <i class="input-icon fa-solid fa-at"></i>
                                                </div>
                                                <div class="form-group mt-2">
                                                    <input type="password" name="password" class="form-style" placeholder="Şifre">
                                                    <i class="input-icon fa-solid fa-key"></i>
                                                </div>
                                                <button type="submit" class="btn-custom mt-4">Kaydol</button>
                                            </form>
				      					</div>
			      					</div>
			      				</div>
			      			</div>
			      		</div>
			      	</div>
		      	</div>
	      	</div>
	    </div>
	</div>
@endsection
