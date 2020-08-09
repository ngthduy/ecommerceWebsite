<div class="block block-pd-sm block-bg-grey block-bg-overlay block-bg-overlay-6 text-center" >
      <h2 class="h-xlg h1 m-a-0">
          <span data-counter-up>
            <?php
              $CountFile = "public/file/count.txt";
              $CF = fopen ($CountFile, "r");
              $Views = fread ($CF, filesize ($CountFile));
              echo $Views;
              fclose ($CF);
              $Views = $Views + 1;
              $CF = fopen ($CountFile, "w");
              fwrite ($CF, $Views); 
              fclose ($CF); 
          ?>
          </span> 
        </h2>
      <h3 class="h-lg m-t-0 m-b-lg">
          lượt truy cập
        </h3>
      <!-- <p>
        <a href="#" class="btn btn-more btn-lg i-right">Join them today! <i class="fa fa-angle-right"></i></a>
      </p> -->
    </div>