<div class="login-page">
    <form class="login-form">
        <div class="flex-box">
            <div class="col">
                <div class="radio-btn-group">
                    <input id="admin-role" type="radio" checked="checked" name="role" value="admin">
                    <label for="admin-role" class="custom-radio">Administrator</label><br>
                    <input id="teacher-role" type="radio" name="role" value="teacher">
                    <label for="teacher-role" class="custom-radio">Teacher</label><br>
                    <input id="student-role" type="radio" name="role" value="student">
                    <label for="student-role" class="custom-radio">Student</label>
                </div>
            </div>
            <div class="col">
                <div class="input-group">
                    <input type="text" name="username" placeholder="Username"/>
                </div>
                <div class="input-group wrong">
                    <input type="password" name="password" placeholder="Password"/>
                    <span class="msg">Wrong username or password</span>
                </div>
            </div>
            <div class="col">
                <input id="remember" type="checkbox" checked="checked">
                <label for="remember" class="custom-checkbox">Remember me</label>
            </div>
            <div class="col">
                <button class="submit-btn"><span>log in</span></button>
            </div>
        </div>
    </form>
</div>
</html>