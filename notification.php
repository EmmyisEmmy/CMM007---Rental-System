


<?php
            $message = '';
            if (isset($_SESSION['order_limit_error'])) {
              $message = $_SESSION['order_limit_error']; 
              unset($_SESSION['order_limit_error']);

            } elseif (isset($_SESSION['error_availability'])){
                $message = $_SESSION['error_availability']; 
                unset($_SESSION['error_availability']);

            } elseif (isset($_SESSION['order_success'])){
                 $message = $_SESSION['order_success']; 
                 unset($_SESSION['order_success']);

            } elseif (isset($_SESSION['return_success'])){
            $message = $_SESSION['return_success']; 
            unset($_SESSION['return_success']);
            }

          if ($message != '') { ?>
            <div class="toast-container bottom-0 end-0 p-3">
                  <div  id="liveToast" class="toast align-items-center border-0" style="background-color: #C1E1C1; color: white border-radius: 12px; box-shadow: 0 6px 18px rgba(0,0,0,0.15);">
                    <div class="d-flex">
                      <div class="toast-body">
                        <strong><?php echo $message; ?></strong>
                      </div>
                      <button type="button" class="btn-close btn-close-black me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                  </div>
            </div>
        
          
            <script>
                var toastEl = document.getElementById('liveToast');
                var toast = new bootstrap.Toast(toastEl);
                toast.show();
            </script>

<?php } ?>