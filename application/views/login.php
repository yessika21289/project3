<div>
  <a class="hiddenanchor" id="signup"></a>
  <a class="hiddenanchor" id="signin"></a>

  <div class="login_wrapper">
    <div class="animate form login_form">
      <section class="login_content">
        <form method="post" action="<?php echo base_url().'login';?>">
          <h1>Login</h1>
          <div class="text-danger">
            <?php echo validation_errors(); ?>
          </div>
          <div>
            <input type="text" class="form-control" name="username" placeholder="Username" required />
          </div>
          <div>
            <input type="password" class="form-control" name="password" placeholder="Password" required />
          </div>
          <div>
            <button type="submit" class="btn btn-default submit">Log in</button>
          </div>

          <div class="clearfix"></div>

          <div class="separator">
            <div class="clearfix"></div>
            <br />

            <div>
              <h1><i class="fa fa-university"></i> Gani Marble Tile System</h1>
              <p>©2016</p>
            </div>
          </div>
        </form>
      </section>
    </div>
  </div>
</div>