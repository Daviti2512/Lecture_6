<?php
    include "file_folder.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lercture 5</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="controls">
            <div class="row">
                <a href="index.php">HOME</a>
            </div>
            <div class="row">
                <form action="" method="post">
                    <input type="text" placeholder="name" name="folder"> <button>Create Folder</button>
                </form>
            </div>
            <div class="row">
                <form action="" method="post">
                    <input type="text" placeholder="name" name="file"> <button>Create File</button>
                </form>
            </div>
            <div class="row">
                <form action="" method="post" enctype="multipart/form-data">
                    <input type="file" placeholder="name" name="uploaded_file"> 
                    <button name="up_file">Upload File</button>
                </form>
            </div>
        </div>
        <div class="content">
                    <table class="dataset">
                <tr>
                    <th>Name</th>
                    <th>Read</th>
                    <th>Edit</th>
                    <th>Delete</th>
                    <th>Download</th>
                </tr>
                <?php
                    for ($i = 2; $i < count($scan); $i++) {
                        if (pathinfo($scan[$i], PATHINFO_EXTENSION) === 'txt') {
                ?>
                <tr>
                    <td class="<?= is_file("MyDrive/" . $scan[$i]) ? "file" : "folder" ?>">
                        <span> <?= $scan[$i] ?> </span>
                    </td>
                    <td style="width:25%">
                        <form action="" method="post">
                            <input type="text" plcaeholder="rename" name="new_name">
                            <input type="hidden" name="old_name" value="<?=$scan[$i]?>">
                            <button>Rename</button>
                        </form>
                    </td>
                    <td>
                        <a href="?read_file=<?= $scan[$i] ?>">Read</a>
                    </td>
                    <td>
                        <form action="" method="post">
                            <input type="hidden" name="filename" value="<?= $scan[$i] ?>">
                            <button>Edit</button>
                        </form>
                    </td>
                    <td>
                        <a href="?source=<?= $scan[$i] ?>">Delete</a>
                    </td>
                    <td>
                        <a href="<?= "MyDrive/" . $scan[$i] ?>" download>Download</a>
                    </td>
                </tr>
                <?php 
                        }
                    } 
                ?>
            </table>

            <?php if (isset($file_content)): ?>
                <div>
                    <h3>Edit File</h3>
                    <form action="" method="post">
                        <textarea name="file_content" rows="10" cols="50"><?= htmlspecialchars($file_content) ?></textarea>
                        <input type="hidden" name="filename" value="<?= htmlspecialchars($filename) ?>">
                        <button type="submit" name="edit_file">Save Changes</button>
                    </form>
                </div>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>