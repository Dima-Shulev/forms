<div class="d-flex justify-content-center align-items-center min-vh-100">
    <div class="container">
        <div class="d-flex justify-content-center align-items-center">
            <div class="col-8 col-md-6 col-sm-6">
                <form class="form-control bg-success-subtle" action="http://mvc.loc:1234/main/store" method="post">
                    <label for="name" class="mb-2">Ваше имя: <i class="text-danger">*</i></label><br>
                    <input type="text" name="name" minlength="2" id="name" placeholder="Ваше имя" class="form-control"/><br>
                    <label for="tel" class="mb-2">Ваш телефон:<i class="text-danger">*</i></label><br>
                    <input type="tel" name="tel" id="tel" minlength="10" placeholder="Ваш телефон" class="form-control"/><br>
                    <input type="hidden" name="test" value="test" class="form-control"/><br>
                    <input type="submit" name="pushButton" value="Отправить" class="btn btn-success"/>
                </form>
            </div>
        </div>
    </div>
</div>