<?php 
// print_r($_FILES);
if(!empty($_FILES) && $_FILES['myFile']['error']==0){
    //构建随机文件名字（避免文件名重复）
    $name = time().rand(1000,9999);
    //得到当前文件扩展名 png --> png 
    $ext = strrchr($_FILES['myFile']['name'],'.');
    //构建一个文件最终路径 注意事项：upload文件夹一定要手动创建
    $fileName = './upload/'.$name.$ext;
    move_uploaded_file($_FILES['myFile']['tmp_name'],$fileName);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
        <input type="file" name="myFile">
        <input type="submit">
    </form>
</body>
</html>