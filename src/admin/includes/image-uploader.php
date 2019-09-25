<?php
/**
 * image-uploader.php
 *
 * Handles the uploading process of images from 'image_upload.php'
 *
 * @author Ryan Haytree
 * @copyright 2019 Ryan Haytree
 */

# only run script if a file is present and there are no errors in the upload process
if ((!empty($_FILES['uploaded_file'])) && ($_FILES['uploaded_file']['error'] == 0))
{
    # get name of uploaded file
    $file = basename($_FILES['uploaded_file']['name']);
    # get file extension
    $ext = substr($file, strrpos($file, '.') + 1);
    # array of possible content types
    $types = array('image/jpeg', 'image/png', 'image/jpg');

    # check if file is a supported extension and content type
    if (($ext == "jpg" || $ext == "png" || $ext == "jpeg") && (in_array($_FILES["uploaded_file"]["type"], $types)))
    {
        # check if file is larger than 350kb in size
        if ($_FILES["uploaded_file"]["size"] < 350000)
        {
            # point new name to the upload directory in the root of the whole project
            $newname = '../../uploads/' . $file;

            # check if file already exists
            if (!file_exists($newname))
            {
                # move file to new location
                if ((move_uploaded_file($_FILES['uploaded_file']['tmp_name'], $newname)))
                {
                    # provide success message
                    header('Location: ../image_upload.php?upload=success');
                    exit;
                }
            }
            else 
            {
                # file already exists at path. Provide error
                header('Location: ../image_upload.php?upload=fail&error=exists');
                exit;
            }
        }
        else 
        {
            # file is too large. Provide error 
            header('Location: ../image_upload.php?upload=fail&error=toolarge');
            exit;
        }
    }
    else 
    {
        # file is not present of type. Provide error
        header('Location: ../image_upload.php?upload=fail&error=nofile');
        exit;
    }
}
else 
{
    # no content or error occurred in upload form, send back to upload page
    header('Location: ../image_upload.php');
}