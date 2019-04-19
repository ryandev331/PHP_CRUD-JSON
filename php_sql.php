<?php
/**
 * DB able: MEMBERS
 * 欄位有: 
 * SN: 流水號
 * USERNAME: EMAIL帳號
 * MOBILE: 手機
 * CHINESE_NAME: 中文姓名
 * 
 * 
 * 題目1：請參閱如下範例, 用PHP寫出SQL語法中的 新增/刪除/修改。
 * 
 */

// DB Connection
include '/var/www/html/mshop/db.php';

function getMemberInfo($email){
    $result = false;
    $db = getMemberDB();
    $stmt = $db->prepare("SELECT * FROM MEMBERS  WHERE USERNAME = ?");
    $stmt->execute(array($email));
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $count = $stmt->rowCount();
    if($count>0)
        $result = $data[0];
    return $result;
}
$memberInfo = getMemberInfo($_SESSION["email"]);

//新增--註冊
function addMemberInfo($email, $mobile, $c_name, $password){
    $password = sha1(trim($password));
    $result = false;
    $db = getMemberDB();
    $stmt = $db->prepare("INSERT INTO `MEMBERS`(`MOBILE`, `CHINESE_NAME`,`USERNAME`,`PASSWORD`) VALUES (?,?,?,?)");
    $stmt->execute([
        $mobile, 
        $c_name,
        $email,
        $password
        ]);
    $count = $stmt->rowCount();
     if($count==1){
        $result['code'] = 200;
        $result['info'] = '註冊完成';
        $_SESSION['usernane'] = $email;
        $_SESSION['chinese_name'] = $c_name;
        
    } else {
        $result['code'] = 410;
        $result['info'] = '註冊未完成';
    }
    return $result;
}
$addInfo= addMemberInfo($_POST['email'], $_POST['mobile'], $_POST['c_name'], $_POST['password'] );


//修改--登入後 假設登入後已有session資料，並提供提供 "密碼"確認本人，可修改欄位 "手機"、"中文姓名"
function updateMemberInfo($email, $mobile, $c_name, $password){
    $password = sha1(trim($password));
    $result = false;
    $db = getMemberDB();
    $stmt = $db->prepare("UPDATE `MEMBERS`  SET `MOBILE` = ?, `CHINESE_NAME` = ? WHERE `USERNAME` = ? AND `PASSWORD` = ?");
    $stmt->execute([
        $mobile, 
        $c_name,
        $email,
        $password
        ]);
    $count = $stmt->rowCount();
     if($count==1){
        $result['code'] = 200;
        $result['info'] = '已完成資料更新';
        $_SESSION['mobile'] = $mobile;
        $_SESSION[' chinese_name'] = $c_name;
        
    } else {
        $result['code'] = 410;
        $result['info'] = '更新未完成';
    }
    return $result;
}
$updateInfo= updateMemberInfo($_SESSION["email"], $_POST['mobile'], $_POST['c_name'], $_POST['password'] );



//刪除--登入後 假設登入後已有session資料，並提供 "密碼" 欄位

function deleteMemberInfo($email, $password){
    $password = sha1(trim($password));
    $result = false;
    $db = getMemberDB();
    $stmt = $db->prepare("DELETE FROM `MEMBERS`  WHERE `USERNAME` = ? AND `PASSWORD` = ?");
    $stmt->execute([
        $email,
        $password
        ]);
    $count = $stmt->rowCount();
     if($count==1){
        $result['success'] = true;
        $result['code'] = 200;
        $result['info'] = '已完成資料刪除';
    } else {
        $result['code'] = 410;
        $result['info'] = '刪除未完成';
    }
    return $result;
}
$deleteInfo= deleteMemberInfo($_SESSION["email"], $_POST['password'] )






?>