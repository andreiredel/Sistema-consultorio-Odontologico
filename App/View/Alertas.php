<?php
function mostraAlerta(){
    //session_start();
    if(isset($_SESSION['statusModal'])){
?>
        <div class="modal fade" id="modalExemplo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-body">
                    <?php
                        if($_SESSION['statusModal'] == 'success'){     
                    ?>
                    <div class="swal2-icon swal2-success swal2-animate-success-icon" style="display: flex;">
                    <div class="swal2-success-circular-line-left" style="background-color: rgb(255, 255, 255);"></div>
                        <span class="swal2-success-line-tip"></span>
                        <span class="swal2-success-line-long"></span>
                        <div class="swal2-success-ring"></div> 
                        <div class="swal2-success-fix" style="background-color: rgb(255, 255, 255);"></div>
                        <div class="swal2-success-circular-line-right" style="background-color: rgb(255, 255, 255);"></div>
                    </div>
                    <?php
                        } else {
                    ?>     
                    <div class="swal2-icon swal2-error swal2-animate-error-icon" style="display: flex;">
                        <span class="swal2-x-mark">
                            <span class="swal2-x-mark-line-left"></span>
                            <span class="swal2-x-mark-line-right"></span>
                        </span>
                    </div>
                    <?php
                        }        
                    ?>      
                    <div class="alert alert-<?=$_SESSION['statusModal'] ?>" role="alert" style='text-align: center;'>
                        <?= $_SESSION['mensagemModal'] ?>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class='buttonConfirm' style='margin: auto;'>
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Ok</button>
                    </div>
                </div>
                </div>
            </div>
            </div>
            
    <?php
    unset($_SESSION['statusModal']);
    unset($_SESSION['mensagemModal']);
    }
}
