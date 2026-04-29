<?


?>
<style type="text/css">
	.inner-wrapper {
		min-height: calc(100vh - 150px);
		width: 100%;

		display: flex;
		justify-content: center; /* align horizontal */
		align-items: center; /* align vertical */
	}
	.inner-wrapper > .inner .gambar {

	}
	.inner-wrapper > .inner .gambar img {
		height: 140px;
	}
	.inner-wrapper > .inner .title {
		/*color: #e76f50;*/
		font-size: 20px;
		border: 2px solid #02446e;
		border-width: 1px 4px 1px 4px;
		padding: 5px 20px 10px 20px;
		/*background-color: rgba(2,68,110,0.1);*/
		background-color: rgba(198,213,87,0.1);

		-webkit-border-radius: 20px;
		-moz-border-radius: 20px;
		border-radius: 20px;

	}
	.inner-wrapper > .inner .title .keterangan {
		display: block;
		width: auto;
		font-size: 11px;
		color: #777;
	}
	.gambar-kincir-angin {
		position: absolute;
		bottom: 0;
		right: 0;
	}
	.gambar-kincir-angin img {
		width: 600px;
	}
</style>
<div class="inner-wrapper">
	<div class="inner">
		<center>
			<div class="gambar"><img src="images/img-pekerja-pembangkit.png"></div>
			<div class="title">
				Selamat datang dihalaman administrator.
				<span class="keterangan">Silakan pilih berbagai menu administrator yang ada disisi kiri aplikasi.</span>
			</div>
		</center>
	</div>

	<div class="gambar-kincir-angin">
      <img src="images/img-kincir-angin.png">
    </div>
</div>