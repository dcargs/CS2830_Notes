<!DOCTYPE html>
<head>
	<title>File Upload Example</title>
</head>
<body>
    <h1>File Upload Test</h1>
<?php
    // Require our Upload class
    require_once "Upload.php";

	$target_dir = "uploads/"; 


        try {
            $upload = new Upload('file1');
            $origFileName = $upload->getOrigFileName();
            $fileExt = $upload->getFileExt();
            $fileSize = $upload->getFileSize();
            $mimeType = $upload->getMimeType();

            print "Original File Name: $origFileName<br>\n";
            print "File Extension: $fileExt<br>\n";
            print "Mime Type: $mimeType<br>\n";
            print "File Size: $fileSize<br>\n";
			
			if(!is_dir($target_dir) && !mkdir($target_dir)){
				die("error creating folder $targer_dir"); 
			}


            // Files will be named based on their order
            $destFilePath = $target_dir. 'file' . $n . '.' . $fileExt;
            $upload->moveFile($destFilePath);

            if ($fileExt == 'jpg' || $fileExt == 'gif' || $fileExt == 'png') {
                print "<p><img src='$destFilePath' alt='uploaded image'></p>\n";
            }

            print "<hr>\n";

        } catch (UploadExceptionNoFile $e) {
            print "No file was uploaded.<br>\n";
        } catch (UploadException $e) {
            $code = $e->getCode();
            $message = $e->getMessage();
            print "Error: $message (code=$code)<br>\n";
        }
    }

?>
</body>
</html>
