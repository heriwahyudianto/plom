<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package plum
 */

get_header(); 
?>
<?php $home   = get_post( 786 );
	$output =  apply_filters( 'the_content', $home->post_content );
	 ?>
<div class="relative">
	<?php echo get_the_post_thumbnail( 786, 'full', array( 'class' => 'alignleft' ) );
	?>
	<div class="max-width-4 mx-auto">
		
	</div>
</div>
<div class="mt3" style="background-color: #eaffda;">
	<div class="max-width-4 mx-auto pt2 relative">
		<div class="clearfix">
			<div class="col col-4 relative">
				<div style="width: 100%">
					&nbsp;
					<img src="<?php echo bloginfo('template_url'); ?>/assets/images/hand-seed.jpg" alt="" style="    border-radius: 8px;
					    position: absolute;
					    top: -37px;
					    left: 0;" width="100%">
				</div>
			</div>
			<div class="col col-8 carifrm">
				<div class="sbold pl2 mb2" style="font-size: 30px;color: #333;">Pencarian Produk</div>
				<form action="infostokbenih" method="get" accept-charset="utf-8">
					<div class="clearfix">
						<div class="col col-6">
							<div class="clearfix">
								<div class="col col-4 labelform pr1">
									Komoditas
								</div>
								<div class="col col-8">
									<?php
									$curl = curl_init();
									curl_setopt_array($curl, array(
									  CURLOPT_URL => "http://benihtphjatim.com/pusat/api/komoditas",
									  CURLOPT_RETURNTRANSFER => true,
									  CURLOPT_ENCODING => "",
									  CURLOPT_MAXREDIRS => 10,
									  CURLOPT_TIMEOUT => 30,
									  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
									  CURLOPT_CUSTOMREQUEST => "GET",
									));
									$response = curl_exec($curl);
									$err = curl_error($curl);
									curl_close($curl);
									if ($err) {
									  echo "cURL Error #:" . $err;
									} else {
									  $response=json_decode($response,true);
									} ?>
									<select name="komoditas"  id="komoditas" required="required"  onchange="pilihvarietas(this.value);"><?php 
										foreach ($response  as $key =>  $value) { ?>				
											<option value="<?php echo $value['id']; ?>" <?php if($key==0){echo 'selected';$komoditasterpilih=$value['id'];} ?>>
												<?php echo $value['nama']; ?></option> <?php 	
										} ?>
									</select>
									
								</div>
							</div>
							<div class="clearfix mt1">
								<div class="col col-4 labelform pr1">
									Varietas
								</div>
								<div class="col col-8">
									<?php
									$curl = curl_init();
									curl_setopt_array($curl, array(
									  CURLOPT_URL => "http://benihtphjatim.com/pusat/api/varietas/".$komoditasterpilih,
									  CURLOPT_RETURNTRANSFER => true,
									  CURLOPT_ENCODING => "",
									  CURLOPT_MAXREDIRS => 10,
									  CURLOPT_TIMEOUT => 30,
									  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
									  CURLOPT_CUSTOMREQUEST => "GET",
									));
									$response = curl_exec($curl);
									$err = curl_error($curl);
									curl_close($curl);
									if ($err) {
									  echo "cURL Error #:" . $err;
									} else {
									  $response=json_decode($response,true);
									} ?>
								<select name="varietas" id="varietas" required="required">
									<option value="0">Semua Varietas</option><?php 
									foreach ($response as $value) { ?>				
										<option value="<?php echo $value['id']; ?>"><?php echo $value['nama']; ?></option> <?php 	
									} ?>
								</select>
									
								</div>
							</div>
							<div class="clearfix mt1">
								<div class="col col-4 labelform pr1">
									Tanggal Update
								</div>
								<div class="col col-8">
									<input type="date" name="tgl_update_mulai" value="" placeholder="" required="required" max="<?php echo date('Y-m-d'); ?>">
			
								</div>
							</div>
						</div>
						<div class="col col-6">
							<div class="clearfix">
								<div class="col col-4 labelform pr1">
									Kelas
								</div>
								<div class="col col-8">
									<?php
									$curl = curl_init();
									curl_setopt_array($curl, array(
									  CURLOPT_URL => "http://benihtphjatim.com/pusat/api/kelas",
									  CURLOPT_RETURNTRANSFER => true,
									  CURLOPT_ENCODING => "",
									  CURLOPT_MAXREDIRS => 10,
									  CURLOPT_TIMEOUT => 30,
									  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
									  CURLOPT_CUSTOMREQUEST => "GET",
									));
									$response = curl_exec($curl);
									$err = curl_error($curl);
									curl_close($curl);
									if ($err) {
									  echo "cURL Error #:" . $err;
									} else {
									  $response=json_decode($response, true);
									} ?>
									<select name="kelas" id="kelas" required="required">
										<option value="0">Semua Kelas</option><?php 
										foreach ($response as $value) { ?>				
											<option value="<?php echo $value['nama']; ?>"><?php echo $value['nama']; ?></option> <?php 	
										} ?>
									</select>								
								</div>
							</div>
							<div class="clearfix mt1">
								<div class="col col-4 labelform pr1">
									Kota
								</div>
								<div class="col col-8">
									<select name="kota" required="required">
										<option value="0">Semua Kota</option>     
							                    <optgroup label="Wilayah I">   
							            <option value="Surabaya" >Surabaya</option>
							            <option value="Gresik" >Gresik</option>
							            <option value="Lamongan">Lamongan</option>
							            <option value="Bojonegoro">Bojonegoro</option>
							            <option value="Tuban" >Tuban</option>
							            <option value="Bangkalan" >Bangkalan</option>
							            </optgroup>
							                    <optgroup label="Wilayah II">   
							            <option value="Madiun" >Madiun</option>
							            <option value="Ponorogo" >Ponorogo</option>
							            <option value="Magetan" >Magetan</option>
							            <option value="Ngawi" >Ngawi</option>
							            </optgroup>
							                    <optgroup label="Wilayah III">   
							            <option value="Kediri" >Kediri</option>
							            <option value="Tulungagung" >Tulungagung</option>
							            <option value="Trenggalek" >Trenggalek</option>
							            <option value="Nganjuk" >Nganjuk</option>
							            <option value="Blitar" >Blitar</option>
							            </optgroup>
							                    <optgroup label="Wilayah IV">   
							            <option value="Malang" >Malang</option>
							            <option value="Batu" >Batu</option>
							            <option value="Mojokerto" >Mojokerto</option>
							            <option value="Pasuruan" >Pasuruan</option>
							            <option value="Probolinggo" >Probolinggo</option>
							            </optgroup>
							                    <optgroup label="Wilayah V">   
							            <option value="Jember" >Jember</option>
							            <option value="Lumajang" >Lumajang</option>
							            <option value="Bojonegoro" >Bojonegoro</option>
							            </optgroup>
							                    <optgroup label="Wilayah VI">   
							            <option value="Banyuwangi" >Banyuwangi</option>
							            <option value="Situbondo" >Situbondo</option>
							            </optgroup>
									</select>
									
									
								</div>
							</div>
							<div class="clearfix mt1">
								<div class="col col-4 labelform pr1">
									Sampai
								</div>
								<div class="col col-8">
									<input type="date" name="tgl_update_sampai" value="<?php echo date('Y-m-d'); ?>" placeholder="" required="required"  max="<?php echo date('Y-m-d'); ?>">		
								</div>
							</div>
						</div>
						<div style="clear: both;">							
						</div>
					</div>
					<div>
						<button type="submit" class="ml2 mregular mt3" style="
						width: 139px;
  						height: 50px;
  						border-radius: 5px;
  						background-color: #6cb537;
  						font-size: 16px;
						font-weight: normal;
						font-style: normal;
						font-stretch: normal;
						line-height: normal;
						letter-spacing: normal;
						text-align: center;
						color: #ffffff;">Cari disini</button>
					</div>
					<div class="right-align">
						<img src="<?php echo bloginfo('template_url'); ?>/assets/images/tunas3x.png" width="93" height="auto" alt="" class="">
					</div>
				</form>
			</div>
			<div style="clear:both;"></div>
		</div>
		
	</div>
</div>
<div class="max-width-4 mx-auto mt4">
	<div class="center sregular" style="font-size: 30px;
        font-weight: bold;
		font-style: normal;
		font-stretch: normal;
		line-height: 1.5;
		letter-spacing: normal;
		color: #6cb537;">
		Pelayanan
	</div>
	<div class="flex flex-wrap"><?php
		global $post;
		$args = array( 'numberposts' => 10, 'category_name' => 'pelayanan', 'orderby'=> 'date',
		'order' => 'ASC', );
		$posts = get_posts( $args );
		$perma=[];
		foreach( $posts as $key => $post ): setup_postdata($post); ?>
			<div class="col-3 center">
				<div class="center pelayanan"><?php 
					the_post_thumbnail('thumbnail'); ?>
				</div>
				<div class="center colorgreen mb2 mt2 sregular" style="font-size: 18px; font-weight: 600;"><?php
					the_title(); ?> 	
				</div>
				<div class="center mb3 mregular color6" style="font-size: 12px;line-height: 1.5;"><?php 
					the_excerpt(); ?>	
				</div>
			</div>
			<?php
			$perma[$key]=get_the_permalink(); 
		endforeach;?>
	</div>
	<div><?php 
		foreach ($perma as $permali) { ?>
			<div class="center my3">
				<a href="<?php echo $permali; ?>" class="text-decoration-none bgblack colorf rounded p2 mx-auto">Baca Disini</a>
			</div><?php 
		} ?>		
	</div>
</div>
on development by heri wahyudianto
<?php get_footer(); ?>
