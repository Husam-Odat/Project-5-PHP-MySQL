      <?php
        require_once("../../db.php");
        $categories = $crudObj->getAllCategories();

        ?>
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav">
              <li class="nav-item">
                  <a class="nav-link" href="../../index.php" id="dash">
                      <i class="icon-grid menu-icon"></i>
                      <span class="menu-title">Dashboard</span>
                  </a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                      <i class="icon-layout menu-icon"></i>
                      <span class="menu-title">Categories</span>
                      <i class="menu-arrow"></i>
                  </a>
                  <div class="collapse" id="ui-basic">
                      <ul class="nav flex-column sub-menu">
                          <li class="nav-item"><a class="nav-link" href="all_products.php">All Products</a></li>
                          <?php
                            while ($category = $categories->fetch_assoc()) { ?>

                              <li class="nav-item"><a class="nav-link" href="proudact.php?category_id=<?php echo $category['id'] ?>"><?php echo $category['category_name'] ?></a></li>

                          <?php } ?>

                      </ul>
                  </div>
              </li>
              <li class="nav-item">
                  <a class="nav-link" data-toggle="collapse" href="#form-elements" aria-expanded="false" aria-controls="form-elements">
                      <i class="icon-columns menu-icon"></i>
                      <span class="menu-title">Users</span>
                      <i class="menu-arrow"></i>
                  </a>
                  <div class="collapse" id="form-elements">
                      <ul class="nav flex-column sub-menu">
                          <li class="nav-item"><a class="nav-link" href="users.php">Users</a></li>
                      </ul>
                  </div>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="../../pages/prodacts/manage_categories.php">
                      <i class="icon-columns menu-icon"></i>
                      <span class="menu-title">Manage Categories</span>
                  </a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="../../pages/prodacts/manage_brands.php">
                      <i class="icon-columns menu-icon"></i>
                      <span class="menu-title">Manage Brands</span>
                  </a>
              </li>
              <!-- <li class="nav-item">
                  <a class="nav-link" data-toggle="collapse" href="#charts" aria-expanded="false" aria-controls="charts">
                      <i class="icon-bar-graph menu-icon"></i>
                      <span class="menu-title">Review</span>
                      <i class="menu-arrow"></i>
                  </a>
                  <div class="collapse" id="charts">
                      <ul class="nav flex-column sub-menu">
                          <li class="nav-item"><a class="nav-link" href="pages/charts/chartjs.html">All Review</a></li>
                      </ul> -->
              <!-- </div>
              </li> -->
          </ul>
      </nav>