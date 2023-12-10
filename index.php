<?php require_once('config.php');


if (isset($_POST['btnSimpan'])) {

   // var_dump($_POST);
   $nama = $_POST["nama"];
   $komen = $_POST["komen"];

   $simpan = mysqli_query($conn, "INSERT INTO komen (nama, komen) 
                        VALUES ('$nama','$komen')");

   if ($simpan) {
      echo "
         <script>
            alert('Tersimpan');
            location.replace('index.php');
         </script>
      ";
   } else {
      echo "
         <script>
            alert('Gagal Tersimpan');
            location.replace('index.php');
         </script>
      ";
   }
}



?>
<!DOCTYPE html>
<html lang="en" class="" style="height: auto;">
<?php require('inc/header.php') ?>

<body>

   <!-- Header
   ================================================== -->
   <?php
   $u_qry = $conn->query("SELECT * FROM users where id = 1");
   foreach ($u_qry->fetch_array() as $k => $v) {
      if (!is_numeric($k)) {
         $user[$k] = $v;
      }
   }
   $c_qry = $conn->query("SELECT * FROM contacts");
   while ($row = $c_qry->fetch_assoc()) {
      $contact[$row['meta_field']] = $row['meta_value'];
   }
   // var_dump($contact['facebook']);
   ?>
   <header id="home">
      <div class="header-carousel">
         <div class="slide active">
            <img src="profile_asset/images/header-background.jpg" alt="Slide 1">
            <div class="slide-text">
               <h1>
                  <?php echo isset($user) ? ucwords($user['firstname'] . ' ' . $user['lastname']) : ""; ?>.
               </h1>
               <h3>
                  <?php echo stripslashes($_settings->info('welcome_message')) ?>
               </h3>
            </div>
         </div>
         <div class="slide">
            <img src="profile_asset/images/portfolio/coffee.jpg" alt="Slide 2">
            <div class="slide-text">
               <h1>
                  <?php echo isset($user) ? ucwords($user['firstname'] . ' ' . $user['lastname']) : ""; ?>.
               </h1>
               <h3>
                  <?php echo stripslashes($_settings->info('welcome_message')) ?>
               </h3>
            </div>
         </div>
         <div class="slide">
            <img src="profile_asset/images/portfolio/farmerboy.jpg" alt="Slide 3">
            <div class="slide-text">
               <h1>
                  <?php echo isset($user) ? ucwords($user['firstname'] . ' ' . $user['lastname']) : ""; ?>.
               </h1>
               <h3>
                  <?php echo stripslashes($_settings->info('welcome_message')) ?>
               </h3>
            </div>
         </div>
      </div>


      <nav id="nav-wrap">
         <a class="mobile-btn" href="#nav-wrap" title="Show navigation">Show navigation</a>
         <a class="mobile-btn" href="#" title="Hide navigation">Hide navigation</a>
         <ul id="nav" class="nav">
            <li class="current"><a class="smoothscroll" href="#home">Home</a></li>
            <li><a class="smoothscroll" href="#trend">Trend</a></li>
            <li><a class="smoothscroll" href="#about">About</a></li>
            <li><a class="smoothscroll" href="#resume">Resume</a></li>
            <li><a class="smoothscroll" href="#portfolio">Works</a></li>
            <li><a class="smoothscroll" href="#testimonials">Testimonials</a></li>
         </ul> <!-- end #nav -->
      </nav> <!-- end #nav-wrap -->
      <p class="scrolldown">
         <a class="smoothscroll" href="#about"><i class="icon-down-circle"></i></a>
      </p>
   </header>
   <!-- Header End -->

   <!-- Trend -->
   <section id="trend">
      <div class="row">
         <div>
            <div class="twelve columns collapsed">
               <br>
               <h1>Trend Videos</h1><br>
               <style>
                  #trend * {
                     color: #7A7A7A !important;
                  }
               </style>
            </div>
         </div>
         <!-- trend-wrapper -->
         <div id="portofolio-wrapper" class="bgrid-quarters s-bgrid-thirds cf">
            <?php
            $p_qry = $conn->query("SELECT * FROM trends ");
            while ($row = $p_qry->fetch_assoc()) :
            ?>
               <div class="columns portfolio-item">
                  <div class="item-wrap">
                     <a href="#modal-<?php echo $row['id'] ?>" title="">
                        <?php
                        $fileType = getFileType($row['banner']);
                        if ($fileType !== false && strpos($fileType, 'video') !== false) {
                           // If the file is a video, create a video element
                           echo '<video controls width="100%" height="auto"><source src="' . $row['banner'] . '" type="' . $fileType . '">Your browser does not support the video tag.</video>';
                        } elseif ($fileType !== false) {
                           // If the file is an image, create an image element
                           echo '<img alt="" src="' . validate_image($row['banner']) . '">';
                        } else {
                           // Handle the case where $fileType is false (an error occurred)
                           echo '<p>Error loading file</p>';
                        }
                        ?>

                        <div class="overlay">
                           <div class="trends-item-meta">
                              <h3 class="truncate-1">
                                 <?php echo $row['name'] ?>
                              </h3>
                           </div>
                        </div>
                        <div class="link-icon"><i class="icon-plus"></i></div>
                     </a>
                  </div><br>
               </div> <!-- item end -->
            <?php endwhile; ?>
         </div>
         <!-- trend-wrapper end -->

         <?php
         $p_qry = $conn->query("SELECT * FROM trends ");
         while ($row = $p_qry->fetch_assoc()) :
         ?>
            <!-- Modal Popup -->
            <div id="modal-<?php echo $row['id'] ?>" class="popup-modal mfp-hide">
               <?php
               $fileType = getFileType($row['banner']);
               if ($fileType !== false && strpos($fileType, 'video') !== false) {
                  // If the file is a video, create a video element
                  echo '<video controls width="100%" height="auto"><source src="' . $row['banner'] . '" type="' . $fileType . '">Your browser does not support the video tag.</video>';
               } elseif ($fileType !== false) {
                  // If the file is an image, create an image element
                  echo '<img class="scale-with-grid" src="' . validate_image($row['banner']) . '" alt="" />';
               } else {
                  // Handle the case where $fileType is false (an error occurred)
                  echo '<p>Error loading file</p>';
               }
               ?>

               <div class="description-box">
                  <h4>
                     <?php echo $row['name'] ?>
                  </h4>
                  <p>
                     <?php echo stripslashes(html_entity_decode($row['description'])) ?>
                  </p>
                  <span class="categories"><i class="fa fa-tag"></i>
                     <?php echo $row['client'] ?>
                  </span>
               </div>

               <div class="link-box">
                  <!-- <a href="http://srikrishnacommunication.com/Giridesigns.html" target="_blank">Details</a> -->
                  <a class="popup-modal-dismiss">Close</a>
               </div>
            </div><!-- modal-01 End -->
         <?php endwhile; ?>

         <?php
         function getFileType($filename)
         {
            if (file_exists($filename)) {
               $finfo = finfo_open(FILEINFO_MIME_TYPE);
               if ($finfo) {
                  $fileType = finfo_file($finfo, $filename);
                  finfo_close($finfo);
                  return $fileType;
               }
            }
            return false;
         }
         ?>
      </div>
   </section>

   <!-- About Section
   ================================================== -->
   <section id="about">
      <div class="row">
         <div class="three columns">
            <img class="profile-pic" src="dist/img/logoAF.jpg" alt="" />
         </div>
         <div class="nine columns main-col">
            <h2>About Us</h2>
            <style>
               #about_me * {
                  color: #7A7A7A !important;
               }
            </style>

            <div id="about_me">
               <?php include "about.php"; ?>
            </div>
            <div class="row">
               <?php
               // Mengambil video dengan ID 4 dari database
               $video_qry = $conn->query("SELECT * FROM project WHERE id = 25 ");
               $video_row = $video_qry->fetch_assoc();

               if ($video_row) {
                  // Jika video dengan ID 4 ditemukan, tampilkan
               ?>
                  <div class="columns portfolio-item" style="width:100%;">
                     <div class="item-wrap">
                        <?php
                        $fileType = getFileType($video_row['banner']);
                        if ($fileType !== false && strpos($fileType, 'video') !== false) {
                           // If the file is a video, create a video element
                           echo '<video controls width="100%"  height="auto"><source src="' . $video_row['banner'] . '" type="' . $fileType . '">Your browser does not support the video tag.</video>';
                        } elseif ($fileType !== false) {
                           // If the file is an image, create an image element
                           echo '<img class="scale-with-grid" src="' . validate_image($video_row['banner']) . '" alt="" />';
                        } else {
                           // Handle the case where $fileType is false (an error occurred)
                           echo '<p>Error loading file</p>';
                        }
                        ?>
                     </div>
                  </div>
               <?php
               } else {
                  // Jika video dengan ID 4 tidak ditemukan, tampilkan pesan
               ?>
                  <p>Video with ID 4 not found.</p>
               <?php
               }
               ?>
               <div class="columns contact-details">
                  <br>
                  <br>
                  <br>
                  <br>
                  <h2>Contact Details</h2>
                  <p class="address">
                     <span>
                        <?php echo $contact['address'] ?>
                     </span><br>
                     <span>
                        <?php echo $contact['mobile'] ?>
                     </span><br>
                     <span>
                        <?php echo $contact['email'] ?>
                     </span>
                  </p>
               </div>
               <div class="columns download">
                  <p>
                     <!-- <a href="#" class="button"><i class="fa fa-download"></i>Download Resume</a> -->
                  </p>
               </div>
            </div> <!-- end row -->
         </div> <!-- end .main-col -->
      </div>
   </section> <!-- About Section End-->


   <!-- Resume Section
   ================================================== -->
   <section id="resume">
      <!-- Education
      ----------------------------------------------- -->
      <div class="row education">

         <div class="three columns header-col">
            <h1><span>Project Experience</span></h1>
         </div>

         <div class="nine columns main-col">
            <?php
            $e_qry = $conn->query("SELECT * FROM education order by year desc, month desc");
            while ($row = $e_qry->fetch_assoc()) :
            ?>
               <div class="row item">

                  <div class="twelve columns">

                     <h3>
                        <?php echo $row['school'] ?>
                     </h3>
                     <p class="info">
                        <?php echo $row['degree'] ?> <span>&bull;</span> <em class="date">
                           <?php echo $row['month'] . ' ' . $row['year'] ?>
                        </em>
                     </p>

                     <p>
                        <?php echo stripslashes(html_entity_decode($row['description'])) ?>
                     </p>

                  </div>

               </div> <!-- item end -->
            <?php endwhile; ?>


         </div> <!-- main-col end -->

      </div> <!-- End Education -->

      <!-- Work
      ----------------------------------------------- -->
      <div class="row work">
         <div class="three columns header-col">
            <h1><span>Work</span></h1>
         </div>
         <div class="nine columns main-col">
            <?php
            $w_qry = $conn->query("SELECT * FROM work ");
            while ($row = $w_qry->fetch_assoc()) :
            ?>
               <div class="row item">
                  <div class="twelve columns">
                     <h3>
                        <?php echo $row['company'] ?>
                     </h3>
                     <p class="info">
                        <?php echo $row['position'] ?> <span>&bull;</span> <em class="date">
                           <?php echo str_replace("_", " ", $row['started']) ?> -
                           <?php echo str_replace("_", " ", $row['ended']) ?>
                        </em>
                     </p>
                     <p>
                        <?php echo stripslashes(html_entity_decode($row['description'])) ?>
                     </p>
                  </div>
               </div> <!-- item end -->
            <?php endwhile; ?>
         </div> <!-- main-col end -->

      </div>
      <!-- End Work -->


      <!-- Skills
      ----------------------------------------------- -->
      <!-- <div class="row skill">

         <div class="three columns header-col">
            <h1><span>Skills</span></h1>
         </div>

         <div class="nine columns main-col">

            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam,
            eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam
            voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione
            voluptatem sequi nesciunt.
            </p>

        <div class="bars">

           <ul class="skills">
             <li><span class="bar-expand photoshop"></span><em>Photoshop</em></li>
                  <li><span class="bar-expand illustrator"></span><em>Illustrator</em></li>
            <li><span class="bar-expand wordpress"></span><em>Wordpress</em></li>
            <li><span class="bar-expand css"></span><em>CSS</em></li>
            <li><span class="bar-expand html5"></span><em>HTML5</em></li>
                  <li><span class="bar-expand jquery"></span><em>jQuery</em></li>
          </ul>

        </div>

      </div> 

      </div> 

   </section>
 -->

      <!-- Portfolio Section
   ================================================== -->
      <section id="portfolio">
         <div class="row">
            <div class="twelve columns collapsed">
               <h1>Check Out Some of Our Works.</h1>
               <!-- portfolio-wrapper -->
               <div id="portfolio-wrapper" class="bgrid-quarters s-bgrid-thirds cf">
                  <?php
                  $p_qry = $conn->query("SELECT * FROM project ");
                  while ($row = $p_qry->fetch_assoc()) :
                  ?>
                     <div class="columns portfolio-item">
                        <div class="item-wrap">
                           <a href="#modal-<?php echo $row['id'] ?>" title="">
                              <?php
                              $fileType = getFileType($row['banner']);
                              if ($fileType !== false && strpos($fileType, 'video') !== false) {
                                 // If the file is a video, create a video element
                                 echo '<video controls width="100%" height="auto"><source src="' . $row['banner'] . '" type="' . $fileType . '">Your browser does not support the video tag.</video>';
                              } elseif ($fileType !== false) {
                                 // If the file is an image, create an image element
                                 echo '<img alt="" src="' . validate_image($row['banner']) . '">';
                              } else {
                                 // Handle the case where $fileType is false (an error occurred)
                                 echo '<p>Error loading file</p>';
                              }
                              ?>

                              <div class="overlay">
                                 <div class="portfolio-item-meta">
                                    <h5 class="truncate-1">
                                       <?php echo $row['name'] ?>
                                    </h5>
                                 </div>
                              </div>
                              <div class="link-icon"><i class="icon-plus"></i></div>
                           </a>
                        </div>
                     </div> <!-- item end -->
                  <?php endwhile; ?>
               </div> <!-- portfolio-wrapper end -->
            </div> <!-- twelve columns end -->

            <?php
            $p_qry = $conn->query("SELECT * FROM project ");
            while ($row = $p_qry->fetch_assoc()) :
            ?>
               <!-- Modal Popup -->
               <div id="modal-<?php echo $row['id'] ?>" class="popup-modal mfp-hide">
                  <?php
                  $fileType = getFileType($row['banner']);
                  if ($fileType !== false && strpos($fileType, 'video') !== false) {
                     // If the file is a video, create a video element
                     echo '<video controls width="100%" height="auto"><source src="' . $row['banner'] . '" type="' . $fileType . '">Your browser does not support the video tag.</video>';
                  } elseif ($fileType !== false) {
                     // If the file is an image, create an image element
                     echo '<img class="scale-with-grid" src="' . validate_image($row['banner']) . '" alt="" />';
                  } else {
                     // Handle the case where $fileType is false (an error occurred)
                     echo '<p>Error loading file</p>';
                  }
                  ?>

                  <div class="description-box">
                     <h4>
                        <?php echo $row['name'] ?>
                     </h4>
                     <p>
                        <?php echo stripslashes(html_entity_decode($row['description'])) ?>
                     </p>
                     <span class="categories"><i class="fa fa-tag"></i>
                        <?php echo $row['client'] ?>
                     </span>
                  </div>
                  <div class="link-box">
                     <!-- <a href="http://srikrishnacommunication.com/Giridesigns.html" target="_blank">Details</a> -->
                     <a class="popup-modal-dismiss">Close</a>
                  </div>
               </div><!-- modal-01 End -->
            <?php endwhile; ?>
         </div>
         <!-- row End -->
      </section>
      <!-- Portfolio Section End-->

      <!-- Testimonials Section
   ================================================== -->
      <section id="testimonials">
         <div class="text-container">
            <div class="row">
               <div class="two columns header-col">
                  <h1><span>Client Testimonials</span></h1>
               </div>
               <div class="ten columns flex-container">
                  <div class="flexslider">
                     <ul class="slides">
                        <?php
                        $Komenqry = $conn->query("SELECT * FROM komen ");
                        while ($row = $Komenqry->fetch_assoc()) :
                        ?>
                           <li>
                              <blockquote>
                                 <p><?php echo ($row['komen']) ?></p>
                                 <h1><cite><?php echo ($row['nama']) ?></cite></h1>
                              </blockquote>
                           </li>
                        <?php endwhile ?>
                     </ul>
                  </div>
               </div>
            </div> <!-- row ends -->
         </div> <!-- text-container ends -->
      </section>
      <!-- Testimonials Section End-->

      <div class="row comment">
         <div class="three columns header-col">
            <h1><span>Comment</span></h1>
         </div>
         <div class="nine columns main-col">
            <div class="row">
               <div class="">
                  <form action="" method="POST">
                     <label for="nama">Nama:</label>
                     <input type="text" id="nama" name="nama" class="form-control" placeholder="Ketikkan Nama..." autocomplete="off">
                     <label for="komen">Comment:</label>
                     <!-- <input type="" id="komen" name="komen"> -->
                     <textarea class="form-control bg-gray" name="komen" id="komen" placeholder="ketikkan komentar..." style="width: 400px"></textarea>
                     <button class="btn btn-primary" name="btnSimpan" id="btnSimpan">Simpan</button>
                  </form>
               </div>
            </div>
         </div>
      </div>

      <section id="google-map">
         <!-- How to change your own map point
            1. Go to Google Maps
            2. Click on your location point
            3. Click "Share" and choose "Embed map" tab
            4. Copy only URL and paste it within the src="" field below-->
         <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3982.0835657407665!2d98.69237217572548!3d3.5682438504319327!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30313059bc5c1dcd%3A0x4711e61bc0acbfcc!2sUniversitas%20Harapan%20Medan!5e0!3m2!1sid!2sid!4v1702211557343!5m2!1sid!2sid" width="100%" height="500" frameborder="0" style="border:0" allowfullscreen="" loading="lazy"></iframe>
      </section>

      <!-- /.content-wrapper -->
      <?php require_once('inc/footer.php') ?>

</body>

<script>
   const slides = document.querySelectorAll('.slide');
   let currentSlide = 0;

   function nextSlide() {
      slides[currentSlide].classList.remove('active');
      currentSlide = (currentSlide + 1) % slides.length;
      slides[currentSlide].classList.add('active');
   }

   setInterval(nextSlide, 5000); // Ubah gambar setiap 5 detik, sesuaikan jika diperlukan
</script>

</html>