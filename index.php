<?php require_once('config.php'); ?>
<!DOCTYPE html>
<html lang="en" class="" style="height: auto;">
<?php require_once('inc/header.php') ?>

<body>

   <!-- Header
   ================================================== -->
   <header id="home">

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
      <?php
      $u_qry = $conn->query("SELECT * FROM users where id = 1");
      foreach($u_qry->fetch_array() as $k => $v) {
         if(!is_numeric($k)) {
            $user[$k] = $v;
         }
      }
      $c_qry = $conn->query("SELECT * FROM contacts");
      while($row = $c_qry->fetch_assoc()) {
         $contact[$row['meta_field']] = $row['meta_value'];
      }
      // var_dump($contact['facebook']);
      ?>
      <div class="row banner">
         <div class="banner-text">
            <h1 class="responsive-headline">
               <?php echo isset($user) ? ucwords($user['firstname'].' '.$user['lastname']) : ""; ?>.
            </h1>
            <h3>
               <?php echo stripslashes($_settings->info('welcome_message')) ?>
            </h3>
            <hr />

         </div>
      </div>

      <p class="scrolldown">
         <a class="smoothscroll" href="#about"><i class="icon-down-circle"></i></a>
      </p>

   </header> <!-- Header End -->

   <!-- Trend -->

   <section id="trend">





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
               <div class="row">
                  <h1>Hello</h1>

               </div>

               <div id="about_me">
                  <?php include "about.php"; ?>
               </div>



               <div class="row">
                  <?php
                  // Mengambil video dengan ID 4 dari database
                  $video_qry = $conn->query("SELECT * FROM project WHERE id = 25 ");
                  $video_row = $video_qry->fetch_assoc();

                  if($video_row) {
                     // Jika video dengan ID 4 ditemukan, tampilkan
                     ?>
                     <div class="columns portfolio-item" style="width:100%;">
                        <div class="item-wrap">
                           <?php
                           $fileType = getFileType($video_row['banner']);
                           if($fileType !== false && strpos($fileType, 'video') !== false) {
                              // If the file is a video, create a video element
                              echo '<video controls width="100%"  height="auto"><source src="'.$video_row['banner'].'" type="'.$fileType.'">Your browser does not support the video tag.</video>';
                           } elseif($fileType !== false) {
                              // If the file is an image, create an image element
                              echo '<img class="scale-with-grid" src="'.validate_image($video_row['banner']).'" alt="" />';
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
               while($row = $e_qry->fetch_assoc()):
                  ?>
                  <div class="row item">

                     <div class="twelve columns">

                        <h3>
                           <?php echo $row['school'] ?>
                        </h3>
                        <p class="info">
                           <?php echo $row['degree'] ?> <span>&bull;</span> <em class="date">
                              <?php echo $row['month'].' '.$row['year'] ?>
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
               while($row = $w_qry->fetch_assoc()):
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

         </div> <!-- End Work -->


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
                     while($row = $p_qry->fetch_assoc()):
                        ?>
                        <div class="columns portfolio-item">
                           <div class="item-wrap">
                              <a href="#modal-<?php echo $row['id'] ?>" title="">
                                 <?php
                                 $fileType = getFileType($row['banner']);
                                 if($fileType !== false && strpos($fileType, 'video') !== false) {
                                    // If the file is a video, create a video element
                                    echo '<video controls width="100%" height="auto"><source src="'.$row['banner'].'" type="'.$fileType.'">Your browser does not support the video tag.</video>';
                                 } elseif($fileType !== false) {
                                    // If the file is an image, create an image element
                                    echo '<img alt="" src="'.validate_image($row['banner']).'">';
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
               while($row = $p_qry->fetch_assoc()):
                  ?>
                  <!-- Modal Popup -->
                  <div id="modal-<?php echo $row['id'] ?>" class="popup-modal mfp-hide">
                     <?php
                     $fileType = getFileType($row['banner']);
                     if($fileType !== false && strpos($fileType, 'video') !== false) {
                        // If the file is a video, create a video element
                        echo '<video controls width="100%" height="auto"><source src="'.$row['banner'].'" type="'.$fileType.'">Your browser does not support the video tag.</video>';
                     } elseif($fileType !== false) {
                        // If the file is an image, create an image element
                        echo '<img class="scale-with-grid" src="'.validate_image($row['banner']).'" alt="" />';
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
               function getFileType($filename) {
                  if(file_exists($filename)) {
                     $finfo = finfo_open(FILEINFO_MIME_TYPE);
                     if($finfo) {
                        $fileType = finfo_file($finfo, $filename);
                        finfo_close($finfo);
                        return $fileType;
                     }
                  }
                  return false;
               }
               ?>
            </div><!-- row End -->

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

                           <li>
                              <blockquote>
                                 <p>Hasilnya sangat estetis dan detailnya sangat diperhatikan. Saya benar-benar puas
                                    dengan perhatian terhadap kualitas.
                                 </p>
                                 <cite>Mikevisuals</cite>
                              </blockquote>
                           </li> <!-- slide ends -->

                           <li>
                              <blockquote>
                                 <p>Pilihan orang yang tepat untuk proyek ini! Kreativitas dan inovasinya benar-benar
                                    membuat hasilnya berbeda dan menonjol.
                                 </p>
                                 <cite>Nadhif</cite>
                              </blockquote>
                           </li> <!-- slide ends -->

                           <li>
                              <blockquote>
                                 <p>Kemampuan orang ini untuk mengatasi tantangan dan memberikan solusi yang efektif
                                    patut diacungi jempol. Hasilnya melebihi harapan saya.
                                 </p>
                                 <cite>Isaac Langit</cite>
                              </blockquote>
                           </li> <!-- slide ends -->

                           <li>
                              <blockquote>
                                 <p>Terima kasih banyak atas dedikasinya. Hasilnya tidak hanya memenuhi kebutuhan kami,
                                    tetapi juga mencerminkan profesionalisme tinggi.
                                 </p>
                                 <cite>Olive Jezriel</cite>
                              </blockquote>
                           </li> <!-- slide ends -->

                        </ul>

                     </div> <!-- div.flexslider ends -->

                  </div> <!-- div.flex-container ends -->

               </div> <!-- row ends -->

            </div> <!-- text-container ends -->

         </section> <!-- Testimonials Section End-->



         <!-- /.content-wrapper -->
         <?php require_once('inc/footer.php') ?>
</body>

</html>