<?php
session_start();

?>
<div class="container-fluid  header p-3">
    <div class="row">
        <div class="col-12 d-flex">
            <div class="col-6">
                <h3>
                    <a class="btn btn-light mx-2" href="/home"><i class="fa-solid fa-house mx-1"></i><span>Home</span></a>
                </h3>
            </div>
            <div class="col-6  d-flex justify-content-end align-items-center">
                <div class="mx-3"><span>Welcome , <?php echo $_SESSION['fname'] ?></span></div>
                <div><a class="btn btn-primary" href="/edit-profile/<?php echo $_SESSION['user_id'] ?>">Edit Profile</a></div>
                <div class="mx-2"><a class="btn btn-primary" href="/logout">Exit</a></div>
            </div>
        </div>
    </div>

</div>
