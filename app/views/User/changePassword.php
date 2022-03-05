<div class="row">
    <div class="col-md-6">
        <form method="POST" action="/public/user/changePassword">
            <div class="form-group">
            <label for="password">Старый пароль</label>
                <input type="password" name="password" class="form-control" id="password" placeholder="Старый пароль">
            </div>
            <div class="form-group">
            <label for="newpassword">Новый пароль</label>
                <input type="password" name="newpassword" class="form-control" id="newpassword" placeholder="Новый пароль">
            </div>
            <button type="submit" class="btn btn-default">Изменить пароль</button>
        </form>
    </div>
</div>