<?php


class FolderHelper{

  // Permet de créer des dossiers en fonction des immatriculation / part_number / OT

//*************  Localisation des emplacements de stockage *********************

  const PATH1 = "../../DATA";
  // const PATH2 = "E:/CODE/SIBA_DATA";

  const PLANES_PATH1 = "../../DATA/PLANES";
  // const PLANES_PATH2 = "E:/CODE/SIBA_DATA/PLANES";

  const ITEM_PATH1 = "../../DATA/ITEMS";
  // const ITEM_PATH2 = "E:/CODE/SIBA_DATA/ITEMS";

  const OT_PATH1 = "../../DATA/OT";
  // const OT_PATH2 = "E:/CODE/SIBA_DATA/OT";


//******************************************************************************
  public static function get_path1(){
    return self::PATH1;
  }

  public static function get_plane_path1(){
    return self::PLANES_PATH1;
  }

  public static function upload(array $file, string $folder)
  {
      $namefile = basename($file['name']);
      if(move_uploaded_file($file['tmp_name'], $folder.'/'.$namefile)){
        return true;
      }else{
        return false;
      };
  }

  public static function show(string $data)
  {
    $dir = new DirectoryIterator($data);
    foreach ($dir as $fileinfo) {
        if($fileinfo->isDot()) continue;
        $fileName = $fileinfo->getFilename();
        return "
        <div class='d-flex'><a class='my-2 ml-2' href='".$data."/".$fileName."' target='_blank'>$fileName</a></br>
          <span class='d-inline-block' data-toggle='popover' data-content='Suppression inactive.''>
            <button type='button' class='btn btn-danger btn-sm ml-4' style='pointer-events: none;'' disabled><i class='far fa-times-circle'></i></button>
          </span>
        </div>";
    }
  }


  public static function plane_create_folder(string $immat)
  {

    if(!file_exists(self::PLANES_PATH1.'/'.$immat)) {
      mkdir(self::PLANES_PATH1.'/'.$immat.'/DESCRIPTION_IMG' ,0777 ,true);
      $folder_path = self::PLANES_PATH1.'/'.$immat.'/DESCRIPTION_IMG';

      return true;
    }

    // if(!file_exists(self::PLANES_PATH2.'/'.$immat)) {
    //   mkdir(self::PLANES_PATH2.'/'.$immat.'/DESCRIPTION_IMG' ,0777 ,true);
    //   $folder_path = self::PLANES_PATH2.'/'.$immat.'/DESCRIPTION_IMG';
    // }

  }

  public static function item_create_folder(string $part_number)
  {

    if(!file_exists(self::ITEM_PATH1.'/'.$part_number)) {
      mkdir(self::ITEM_PATH1.'/'.$part_number.'/DESCRIPTION_IMG' ,0777 ,true);
      $folder_path = self::ITEM_PATH1.'/'.$part_number.'/DESCRIPTION_IMG';

      return true;
    }

    // if(!file_exists(self::ITEM_PATH2.'/'.$part_number)) {
    //   mkdir(self::ITEM_PATH2.'/'.$part_number.'/DESCRIPTION_IMG' ,0777 ,true);
    //   $folder_path = self::ITEM_PATH2.'/'.$part_number.'/DESCRIPTION_IMG';
    // }

  }

//******************************************************************************

  public static function ot_create_folder(string $number_ot)
  {

        mkdir(self::OT_PATH1.'/'.$number_ot, 0777, true);
        $new_path = self::OT_PATH1.'/'.$number_ot;
        mkdir($new_path.'/OT_IMG');
        mkdir($new_path.'/CRS');
        mkdir($new_path.'/PDF');
        mkdir($new_path.'/EASA');

      //   mkdir(self::OT_PATH2.'/'.$number_ot, 0777, true);
      //   $new_path = self::OT_PATH2.'/'.$number_ot;
      //   mkdir($new_path.'/OT_IMG');
      //   mkdir($new_path.'/CRS');
      //   mkdir($new_path.'/PDF');
      //   mkdir($new_path.'/EASA');
  }

}

?>
