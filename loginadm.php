<?php
require "config/database.php";
require "config/function.php";
require "config/functions.crud.php";
?>
<div class="row ">
    <div class="col-md-6 animated bounceInLeft">
        <div class="card">
            <div class="card-header">
                <h5>LOGIN ADMIN</h5>
            </div>
            <form id="form-login">
                <div class="card-body">

                    <div class="form-group">
                        <label for="username">Masukan Username</label>
                        <input type="text" class="form-control" name="username" placeholder="username" required autocomplete="off">
                    </div>

                    <div class="form-group">
                        <label for="inputPassword4">Masukan Password</label>
                        <input type="password" class="form-control" name="password" id="inputPassword4" placeholder="Password">
                    </div>

                    <!-- <div class="form-group mb-0">
                        <p>* Masukan username dan password sesuai dengan yang diberikan oleh wali kelas</p>
                        <p>* jika password dan username lupa silahkan hubungi Pak Ian / Ibu Rika</p>

                    </div> -->
                </div>
                <div class="card-footer">
                    <button id='btnsimpan' type="submit" class="btn btn-lg btn-primary">Login</button>
                </div>
            </form>
        </div>
    </div>
    <div class="col-md-6 animated bounceInRight">
        <div class="card">
            <div class="card-header">
                <h4>Info Lebih Lanjut</h4>
            </div>
            <div class="card-body">
                <ul class="list-unstyled user-details list-unstyled-border list-unstyled-noborder">
                    <li class="media">
                        <img alt="image" class="mr-3 rounded-circle" width="50" src="assets/img/avatar/avatar-1.png">
                        <div class="media-body">
                            <div class="media-title">Pak Ian</div>
                            <div class="text-job text-muted"></i>0895800046227</div>
                        </div>
                        <div class="media-body">
                            <div class="media-title">Ibu Rika</div>
                            <div class="text-job text-muted"></i>0896********</div>
                        </div>

                    </li>

                </ul>
            </div>
        </div>
    </div>
</div>
<script>
    $('#form-login').submit(function(e) {
      e.preventDefault();
      $.ajax({
        type: 'POST',
        url: 'crud_web.php?pg=loginadm',
        data: $(this).serialize(),
        success: function(data) {
          if (data == "ok") {
            iziToast.success({
              title: 'Berhasil!',
              message: 'Anda akan dialihkan',
              position: 'topRight'
            });
            setTimeout(function() {
              window.location.href = "admin";
            }, 2000);
          } else {
            iziToast.error({
              title: 'Maaf Bro',
              message: 'Username atau Password Salah',
              position: 'topCenter'
            });
          }
        }
      });
      return false;
    });
  </script>