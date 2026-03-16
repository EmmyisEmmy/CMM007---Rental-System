<?php
    if (isset($_SESSION['order_success'])) {
        $message = $_SESSION['order_success']; ?>


      <div class="toast-container bottom-0 end-0 p-3">
            <div  id="liveToast" class="toast align-items-center border-0" style="background-color: #D6E5BD; color: #003049">
              <div class="d-flex">
                <div class="toast-body">
                  <strong><?php echo $message; ?></strong>
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
              </div>
            </div>
      </div>
  
    <script>
        var toastEl = document.getElementById('liveToast');
        var toast = new bootstrap.Toast(toastEl);
        toast.show();
    </script>

<?php } ?>