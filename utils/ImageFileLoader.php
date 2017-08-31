<?php

class ImageFileLoader
{
    /**
     * @param $url
     * @param $image_path
     * @return bool|string
     */
    public function uploadImageByUrl($url, $image_path)
    {
        if( $image = file_get_contents($url) ) {
            $tmp_file_name = md5(microtime());
            file_put_contents($tmp_file_name, $image);
            unset($image);
            $name = $this->uploadImageAndResize($tmp_file_name, $image_path);
            return $name;
        }
        return false;
    }

    /**
     * @param $name
     * @param $image_path
     * @return bool|string
     */
    public  function uploadImageFromFile($name, $image_path)
    {
        if(isset($_FILES[$name])){
            $tmp_file_name = $_FILES[$name]['tmp_name'];
            $name = $this->uploadImageAndResize($tmp_file_name, $image_path);
            return $name;
        } else{
            return false;
        }
    }

    /**
     * @param $imageTemp
     * @param $imagePath
     * @param int $maxWidth
     * @return bool|string
     */
    private function uploadImageAndResize($imageTemp, $imagePath, $maxWidth = 400 )
    {
        $enabled = array('png', 'gif', 'jpeg');
        if ($info = getimagesize($imageTemp)) {
            $type = trim(strrchr($info['mime'], '/'), '/');
            if (!in_array($type, $enabled))
                return false;
            $imageCreateF = 'imagecreatefrom' . $type;
            $imageSaveF = 'image' . $type;
            $imageName = md5(microtime()) . '.' . $type;
            list($width, $height) = $info;
            $src_im = $imageCreateF($imageTemp);
            $ratio = $width / $maxWidth;
            $new_width = $maxWidth;
            $new_height = $height / $ratio;
            $dst_im = imagecreatetruecolor($new_width, $new_height);
            imagecopyresampled($dst_im, $src_im, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
            unset($src_im);
            if (!$imageSaveF($dst_im, $imagePath . $imageName))
                return false;
            unset($dst_im);
            unlink($imageTemp);
            return $imageName;
        }
    }
}