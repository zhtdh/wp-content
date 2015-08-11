<div class="DRight">

    <div style="margin-left: 10px;margin-top: 10px;">
        <script type="text/javascript">
            $(function(){
                $('#submitbtn').bind('click',function(event){
                    event.preventDefault();
                    if ($('input[name="employee_no"]').val().length != 5){
                        alert('员工编号错误');
                        return;
                    }
                    if ($.trim($('input[name="oldpw"]').val()).length == 0){
                        alert('旧密码不能空');
                        return;
                    }
                    if ($.trim($('input[name="newpw"]').val()).length == 0){
                        alert('新密码不能空');
                        return;
                    }
                    if ($.trim($('input[name="newpw"]').val()) != $.trim($('input[name="confirmpw"]').val())){
                        alert('新密码与确认密码不一致');
                        return;
                    }
                    $('#changepwform').submit();
                });
            });
        </script>

        <?php
        if (!localrequest()){
            echo "<h3 style='color:red;'>" . '非内部员工禁止访问' . "</h3>";
            exit;
        }
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $employee_no = $_POST['employee_no'];
            $oldpw = $_POST['oldpw'];
            $newpw = $_POST['newpw'];
            $confirmpw =$_POST['confirmpw'];
            if (strlen($employee_no) != 5){
                $error = '员工编号错误!';
            }
            if (empty($oldpw)){
                $error = '旧密码不能为空';
            }
            if (empty($newpw)){
                $error = '新密码不能为空';
            }
            if ($newpw != $confirmpw){
                $error = '确认密码错误';
            }
            $result = '';
            if (empty($error)) {
                $queryStr = " begin p_change_querypw(:iv_employee_no,:iv_oldpw,:iv_newpw,:ov_rtn); end;";
                $exec = $business_db->prepare($queryStr);
                $exec->bindParam('iv_employee_no', $employee_no, PDO::PARAM_STR);
                $exec->bindParam('iv_oldpw', $oldpw, PDO::PARAM_STR);
                $exec->bindParam('iv_newpw', $newpw, PDO::PARAM_STR);
                $exec->bindParam('ov_rtn', $result, PDO::PARAM_STR | PDO::PARAM_INPUT_OUTPUT, 200);
                $exec->execute();
                if ($result == 'SUC'){
                    $_SESSION['EMPLOYEENO'] = null;
                    echo "<h3>密码修改成功</h3>";
                    exit;
                }else{
                    echo "<h3 style='color:red;'>" . mb_convert_encoding($result,'utf-8', 'gbk') . "</h3>";
                }
            }else{
                echo "<h3 style='color:red;'>" . $error . "</h3>";

            }
        }
        ?>

        <form id="changepwform" action="<?php echo urldecode(post_permalink($post->ID)); ?>" method="post">
            <fieldset>
                <legend>密码修改</legend>
                <div class="form-group">
                    <label>员工编号</label>
                    <input type="text" name="employee_no" required maxlength="5"
                           class="form-control" placeholder="请输入员工编号"
                        value="<?php echo empty($employee_no) ? '' : $employee_no ;?>">
                </div>
                <div class="form-group">
                    <label>旧密码</label>
                    <input type="password" name="oldpw" class="form-control" placeholder="旧密码"
                           value="<?php echo empty($oldpw) ? '' : $oldpw ;?>">
                </div>
                <div class="form-group">
                    <label>新密码</label>
                    <input type="password" name="newpw" class="form-control" placeholder="新密码"
                           value="<?php echo empty($newpw) ? '' : $newpw ;?>">
                </div>
                <div class="form-group">
                    <label>确认密码</label>
                    <input type="password" name="confirmpw" class="form-control" placeholder="重复输入新密码"
                           value="<?php echo empty($confirmpw) ? '' : $confirmpw ;?>">
                </div>
                <button type="submit" class="btn btn-default" id="submitbtn">提交</button>
            </fieldset>
        </form>
    </div>
</div>
