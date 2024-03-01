<div class="container">
    <h1>Портфолио</h1>
    <div class="d-flex justify-content-start w-50">
        <div class="d-flex flex-column w-50">
            <div class="m-1">Имя</div>
        </div>
        <div class="d-flex flex-column w-50">
            <div class="m-1">Email</div>
        </div>
    </div>
    <div class="d-flex justify-content-start w-50">
        <div class="d-flex flex-column w-50">
        <?php foreach($arr as $row){
            if($row['name']){?>
                <div class="m-1"><?php echo $row['name'] ?></div>
            <?php
            }
        } ?>
        </div>
        <div class="d-flex flex-column w-50">
        <?php foreach($arr as $row){
        if($row['email']){?>
        <div class="m-1"><?php echo $row['email'] ?></div>
        <?php
        }
        } ?>
        </div>
</div>


