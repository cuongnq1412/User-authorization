<?php

namespace App\Controllers;

use App\Models\AuthModel;

class FileController extends BaseController
{

    public function downloadCsv($filename)
    {
        $filePath = 'downloads/' . $filename;

        if (file_exists($filePath)) {
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename="' . basename($filePath) . '"');
            header('Content-Length: ' . filesize($filePath));
            readfile($filePath);

            // Ghi một JavaScript trong phần body để chuyển hướng sau khi tải xong
            echo '<script type="text/javascript">
                setTimeout(function() {
                    window.location.href = document.referrer;
                }, 2000); // Chờ 2 giây rồi chuyển hướng
                </script>';
            exit();
        } else {
            echo 'File không tồn tại.';
        }
    }
}
