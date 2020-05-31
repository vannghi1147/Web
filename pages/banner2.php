<div class="fluid_container">
        <div class="camera_wrap camera_azure_skin" id="camera_wrap_1">
        <?php
        	$qr=mysql_query("SELECT * FROM banner ORDER BY sapxep DESC");
			while($row_banner=mysql_fetch_array($qr)){
		?>
            <div data-thumb="" data-src="upload/hinhsilede/<?php echo $row_banner['UrlHinh'];?>">
                <div class="camera_caption fadeFromBottom">
                   <?php echo $row_banner['TenBanner'];?>
                </div>
            </div> 
         <?php
			}
		 ?>           
        </div><!-- #camera_wrap_1 -->    	
</div><!-- .fluid_container -->
    

