
<div class="login-box">
        <form class="login-form" id="guardarDatos" method="POST">
          <h4 class="login-head" onclick="modPersonal()">REGISTRAR PARTICIPANTESS</h4>
          <div class="form-group">
          <select class="form-control" id="evento" name="evento" required>

              <option value="">Selecionar Evento</option>

              <?php

                            $item  = null;
                            $valor = null;

                            $eventos = ControladorEventos::ctrMostrarEventos($item, $valor);

                            foreach ($eventos as $key => $value) {

                                echo '<option value="' . $value["id"] . '">' . $value["evento"] . '</option>';
                            }

                  ?>

              </select>
          </div>
          <div class="form-group">
            <label class="control-label">EVENTO</label>
            <input class="form-control" type="text" name="cedula" id="cedula" placeholder="Ingrese su n° de cedula" autofocus required autocomplete="off">
          </div>
         



          <div class="form-group">
            <div class="utility">
              <div class="animated-checkbox">
                <label>

                </label>
              </div>
              <p class="semibold-text mb-2"><a href="#" data-toggle="flip">Administrador</a></p>
            </div>
          </div>
          <div class="form-group btn-container">
            <button id="btnguardar" class="btn btn-primary btn-block"><i class="fa fa-sign-in fa-lg fa-fw"></i>CONFIRMAR </button>
          </div>
        </form>
        <form class="forget-form" method="post">
           <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i>INICIAR SESIÓN</h3>
          <div class="form-group">
            <label class="control-label">USUARIO</label>
            <input class="form-control" type="text" name="ingUsuario" placeholder="Usuario" autofocus required autocomplete="off">
          </div>
          <div class="form-group">
            <label class="control-label">CLAVE</label>
            <input class="form-control" type="password" name="ingPassword" placeholder="Clave" required>
          </div>
          <div class="form-group">
            <div class="utility">
              <div class="animated-checkbox">
                <label>

                </label>
              </div>
              <p class="semibold-text mb-2" style="margin-left: -70px"><a href="#" data-toggle="flip">PARTICIPANTES</a></p>
              <p class="semibold-text mb-2"><a href="olvidar/index.php?paso=1">Olvido su contraseña?</a></p>
            </div>

          </div>
          <div class="form-group btn-container">
            <button class="btn btn-primary btn-block"><i class="fa fa-sign-in fa-lg fa-fw"></i>ENTRAR</button>
          </div>

        </form>
      </div>


  <script type="text/javascript">
  // Login Page Flipbox control
  $('.login-content [data-toggle="flip"]').click(function() {
    $('.login-box').toggleClass('flipped');
    return false;
  });
</script>
